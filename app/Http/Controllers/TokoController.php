<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use App\Models\Checkout;
use App\Models\Promotion;
use App\Models\Orderslist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Encryption\DecryptException;

class TokoController extends Controller
{
    // TOKO INDEX
    public function index() {
        if(auth()->user()->toko_id === 'D121181506') {
            return redirect('/admin');
        }

        $check = Checkout::where('user_id', Auth::id())->get(['product_id']);

        $unggulan = Product::where('unggulan', 1)->first();

        $promosi = Promotion::orderBy('product_id', 'asc');

        if (request('search')) {
            $search = Promotion::with('product')->whereHas('product', function($q){
                $q->where('name', 'like', '%' . request('search') . '%')->orWhere('desc_promo', 'like', '%' . request('search') . '%');});

            return view('toko.toko', [
                'pos' => 'toko',
                'unggulan' => $unggulan,
                'products' => $search->paginate(6),
                'productAlready' => $check,
                'count' => Orderslist::where('user_id', Auth::id())->where('status', 0)
            ]);
        }

        return view('toko.toko', [
            'pos' => 'toko',
            'unggulan' => $unggulan,
            'products' => $promosi->paginate(6),
            'productAlready' => $check,
            'count' => Orderslist::where('user_id', Auth::id())->where('status', 0)
        ]);
    }

    public function addProduct(Request $request){
        try{
            $request['product_id'] = Crypt::decryptString($request->product_id);
        } catch (DecryptException) {
            abort(403);
        }

        $rules = [
            'product_id' => 'required|exists:products,id'
        ];

        $validated = $request->validate($rules);

        $check = Checkout::where('user_id', Auth::id())->get(['product_id']);

        if ($check->contains(['product_id'],$validated['product_id'])){
            return redirect('/toko#promosi-hari-ini')->with('error', 'Produk sudah tertambah di checkout!');
        }

        Checkout::create([
            'product_id' => $validated['product_id'],
            'user_id' => Auth::id(),
            'jumlah' => 1
        ]);

        return redirect('/toko#promosi-hari-ini')->with('success', 'Produk berhasil ditambahkan ke checkout!');
    }



    // CHECKOUT
    public function checkout() {
        if(auth()->user()->toko_id === 'D121181506') {
            return redirect('/admin');
        }

        // Pindah halaman ke toko jika tidak ada checkout
        if(Checkout::where('user_id', Auth::id())->count() == 0){
            return redirect('/toko');
        }

        return view('toko.checkout', [
            'pos' => 'toko',
            'checkouts' => Checkout::where('user_id', Auth::id())->get(),
            'count' => Orderslist::where('user_id', Auth::id())->where('status', 0)
        ]);
    }

    public function checkoutToOrder (Request $request) {
        // Inisialisasi
        $rules = [];
        $keys = [];
        $value = [];

        // Mengambil id dari product untuk validasi dan disimpan dalam array
        $products  = Product::pluck('id')->toArray();

        // Menghitung berapa banyak produk yang dipesan
        $checkouts = Checkout::where('user_id', Auth::id())->count();

        // Mengambil keys dari Request diubah menjadi Array
        // Berguna untuk menjadikan product_id nantinya
        $requestArray = $request->keys();



        // Melakukan perulangan untuk decrypt product_id dan
        // Memasukkan jumlah ke dalam value
        for ($i = 1; $i < $checkouts+1; $i++) {
            try {
                $keys[$i-1] = Crypt::decryptString($requestArray[$i]);
            } catch(DecryptException) {
                // Jika seseorang merubah valuenya maka akan muncul 403 (Tidak diizinkan)
                abort(403);
            }

            $value[$i-1] = $request[$keys[$i-1]];
            $rules[$requestArray[$i]] = 'required|numeric|min:1|not_in:0';
        }

        // Validasi input
        $validated = $request->validate($rules);

        // Cek jika product_id (checkout) ada dalam tabel produk
        // Untuk mencegah perubahan sengaja di inspect
        // May not the best security but bismillah saja
        for ($i=0; $i < count($keys); $i++) {
            if(!in_array($keys[$i], $products)){
                abort('403');
            }
        }

        // Buat Orderlist untuk mendapatkan ID Order
        $orderlist = new Orderslist;
        $orderlist->user_id = Auth::id();
        $orderlist->save();

        $id_order = $orderlist->latest()->get(['id'])->first();

        // Isi produk-produk ke dalam tabel Orders
        for ($i=0; $i < count($keys); $i++) {
                Order::create([
                'orderslist_id' => $id_order->id,
                'product_id' => $keys[$i],
                'jumlah' => $validated[$requestArray[$i+1]]
            ]);
        }

        // Jika berhasil tertambah, lakukan bersihkan checkout dari user
        $deleteCheckout = Checkout::where('user_id', Auth::id());
        $deleteCheckout->delete();

        return redirect('/toko/status')->with('success', 'Order anda sudah diterima, kami akan menghubungi anda nanti.');
    }

    public function viewDeleteCheckout() {
        if(Checkout::where('user_id', Auth::id())->count() == 0){
            return redirect('/toko');
        }

        return view('toko.hapus_produk', [
            'pos' => 'toko',
            'count' => Orderslist::where('user_id', Auth::id())->where('status', 0),
            'checkouts' => Checkout::where('user_id', Auth::id())->get()
        ]);
    }

    public function deleteCheckout(Request $request){
        $validated = $request->validate([
            'id' => 'required'
        ]);

        try {
            $id = Crypt::decryptString($validated['id']);
        } catch (DecryptException) {
            abort(403);
        }

        $delete = Checkout::where('user_id', Auth::id())->find($id);
        $delete->delete();
        return redirect('/toko/checkout/hapus-produk');
    }

    // STATUS
    public function status() {
        if(auth()->user()->toko_id === 'D121181506') {
            return redirect('/admin');
        }

        $order_nf = Orderslist::where('user_id', Auth::id())->where('status', 0)->get();
        $order_f = Orderslist::where('user_id', Auth::id())->where('status', 1)->get();

        return view('toko.status', [
            'pos' => 'toko',
            'order_not_finished' => $order_nf,
            'order_finished' => $order_f,
            'count' => Orderslist::where('user_id', Auth::id())->where('status', 0)
        ]);
    }

    // View
    public function viewStatus($id) {
        if(auth()->user()->toko_id === 'D121181506') {
            return redirect('/admin');
        }

        $orderlist = Orderslist::where('user_id', Auth::id())->where('id', $id)->first();
        $order = Order::where('orderslist_id', $id)->get();

        return view('toko.view', [
            'pos' => 'toko',
            'checkouts' => Checkout::all(),
            'count' => Orderslist::where('user_id', Auth::id())->where('status', 0),
            'orderlists' => $orderlist,
            'orders' => $order
            // 'date' => now()->toDateTimeString('Y-m-d')
        ]);
    }



    // Ganti Password
    public function gantiPass() {
        if(auth()->user()->toko_id === 'D121181506') {
            return redirect('/admin');
        }

        return view('toko.passwordchange', [
            'pos' => 'toko',
        ]);
    }

    public function gantiPassBerhasil(Request $request) {
        $user = User::findOrFail(Auth::id());

        $validated = $request->validate([
            'old_pass' => 'required',
            'password' => 'required|min:5|confirmed',
        ]);

        // Check password lama
        if (Hash::check($validated['old_pass'], $user->password)){
            $user->fill([
                'password' => Hash::make($validated['password'])
            ])->save();
            return redirect('/toko');
        }
        else {
            return redirect('toko/ganti-password')->with('error', 'Password lama tidak sesuai!');
        }
    }
}
