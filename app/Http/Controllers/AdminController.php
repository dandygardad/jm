<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use App\Models\Promotion;
use App\Models\Orderslist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Storage;
use Illuminate\Contracts\Encryption\DecryptException;

class AdminController extends Controller
{
    // Dashboard
    public function index() {
        $this->authorize('admin');

        return view('admin/dashboard', [
            // Kurang 1 dikarenakan ada akun administrator
            'totalCustomer' => User::all()->count()-1,
            'totalOrder' => Orderslist::where('status', 0)->count()
        ]);
    }


    // Promosi
    public function promosi() {
        return view('admin.promosi', [
            'num' => 1,
            'products' => Product::all(),
            'promotions' => Promotion::with('product')->orderBy('product_id', 'asc')->get(),
        ]);
    }

    public function inputPromosi(Request $request) {
        $validated = $request->validate([
            'product_id' => 'required|unique:promotions|exists:products,id',
            'desc_promo' => 'required'
        ]);

        Promotion::create($validated);
        return redirect('/admin/promosi');
    }

    public function viewPromosi($id){
        // Untuk memunculkan product yang tidak dalam tabel promotions
        // fun fact: membutuhkan 2 jam untuk mendapatkan kode ini
        $promotion = Promotion::pluck('product_id');
        $products = Product::whereNotIn('id',$promotion)->get();

        return view('admin.edit_promosi',[
            'findPromo' => Promotion::find($id),
            'products' => $products
        ]);
    }

    public function editPromosi(Request $request) {
        try {
            $request['id'] = Crypt::decryptString($request->id);
        } catch (DecryptException $e) {
            abort(403);
        }

        $rules = [
            'id' => 'required',
            'product_id' => 'required',
            'desc_promo' => 'required',
        ];

        $check = Promotion::find($request->id);

        if($request->product_id != $check->product_id){
            $rules['product_id'] = 'required|exists:products,id|unique:promotions,product_id';
        }

        $validated = $request->validate($rules);

        $update = Promotion::find($validated['id']);
        $update->product_id = $validated['product_id'];
        $update->desc_promo = $validated['desc_promo'];
        $update->save();

        return redirect('/admin/promosi');
    }

    public function deleteAllPromosi() {
        Promotion::truncate();
        return redirect('/admin/promosi');
    }

    public function deletePromosi(Request $request) {
        $validated = $request->validate([
            'id' => 'required'
        ]);

        try {
            $validated['id'] = Crypt::decryptString($request->id);
        } catch (DecryptException $e) {
            abort(403);
        }

        $promosi = Promotion::find($validated['id']);
        $promosi->delete();

        return redirect('/admin/promosi');
    }



    // Produk
    public function produk() {
        return view('admin.produk', [
            'num' => 1,
            'products' => Product::all()
        ]);
    }

    public function gantiProduk(Request $request) {
        $old = Product::where('unggulan', 1)->first();
        if($old != null){
            $old->unggulan = 0;
            $old->save();
        }


        $validated = $request->validate([
            'unggulan' => 'required|unique:products,unggulan'
        ]);

        $new = Product::where('id', $validated['unggulan'])->first();
        $new->unggulan = 1;
        $new->save();

        return redirect('/admin/produk')->with('success', 'Berhasil mengubah Produk Unggulan');
    }



    // Pelanggan
    public function admin() {
        return view('admin.admin', [
            'no' => 1,
            'customers' => User::all()
        ]);
    }

    public function inputAdmin() {
        return view('admin.input_data_admin');
    }

    public function addCustomer(Request $request) {
        // Validasi
        $validated = $request->validate([
            'toko_id' => 'required|unique:users,toko_id',
            'name' => 'required',
            'password' => 'required|min:5'
        ]);

        // Hashing password
        $validated['password'] = Hash::make($validated['password']);

        // Add user
        User::create($validated);

        return redirect('/admin/admin');
    }

    public function deleteCustomer(Request $request) {
        $validated = $request->validate([
            'id' => 'required'
        ]);

        if($request->id == 1) {
            abort(403);
        }

        $customer = User::find($validated['id']);
        $customer->delete();
        return redirect('/admin/admin');
    }

    public function viewCustomer($id) {
        return view('admin.edit_data_admin', [
            'user' => User::find($id)
        ]);
    }

    public function editCustomer(Request $request) {
        $user = User::where('id', $request->id)->first();

        $rules = [
            'id' => 'required',
            'toko_id' => 'required',
            'name' => 'required',
            'password' => 'required|min:5'
        ];

        if ($request->toko_id != $user->toko_id){
            $rules['toko_id'] = 'required|unique:users,toko_id';
        }

        $validated = $request->validate($rules);

        if($validated['id'] == 1){
            $validated['toko_id'] = 'D121181506';
            $validated['name'] = 'Administrator';
        }

        // Hashing password
        $validated['password'] = Hash::make($validated['password']);

        $update = User::find($request->id);
        $update->toko_id = $validated['toko_id'];
        $update->name = $validated['name'];
        $update->password = $validated['password'];
        $update->save();

        return redirect('/admin/admin');
    }



    // Order
    public function order() {
        $not_finished = Orderslist::with('users')->where('status', 0)->get();
        $finished = Orderslist::with('users')->where('status', 1)->get();

        // dd($not_finished);
        return view('admin.order', [
            'orders_not_finished' => $not_finished,
            'orders_finished' => $finished
        ]);
    }

    public function viewOrder($id) {
        // GET PROFILE
        // Find by id dulu
        $profile = Orderslist::find($id);

        // GET ORDERNYA
        // Find by id Product
        $orders = Order::with(['orderlist', 'product'])->where('orderslist_id', $id)->get();

        return view('admin.lihat_order', [
            'order_profile' => $profile->users,
            'created_date' => $profile,
            'order_product' => $orders,
        ]);
    }

    public function terimaOrder(Request $request) {
        // Validated
        $validated = $request->validate([
            'id' => 'required'
        ]);

        try {
            $validated['id'] = Crypt::decryptString($request->id);
        } catch (DecryptException $e) {
            abort(403);
        }

        $terima = Orderslist::find($validated['id']);
        $terima->status = '1';
        $terima->save();
        return redirect('/admin/order');
    }

    public function tolakOrder(Request $request){
        $validated = $request->validate([
            'id' => 'required'
        ]);

        try {
            $validated['id'] = Crypt::decryptString($request->id);
        } catch (DecryptException $e) {
            abort(403);
        }

        $customer = Orderslist::find($validated['id']);
        $customer->delete();

        $order = Order::where('orderslist_id', $validated['id']);
        $order->delete();

        return redirect('/admin/order');
    }



    // Master
    public function master() {
        return view('admin.master_data', [
            'products' => Product::all()
        ]);
    }

    public function inputProduk(Request $request){
        // Validate
        $validated = $request->validate([
            'name' => 'required|unique:products,name',
            'unit' => 'required|max:10',
            'img' => 'required|image|file|max:1024',
            'desc' => 'required'
        ]);

        // Mengganti isi validated menjadi path file
        $validated['img'] = $request->file('img')->store('products');

        // Mengupload ke database
        Product::create($validated);

        return redirect('/admin/master_data');
    }

    public function viewProduk($id) {
        return view('admin.edit_data_master_data', [
            'produk' => Product::find($id)
        ]);
    }

    public function editProduk(Request $request) {
        $rules = [
            'id' => 'required',
            'gambar' => 'required',
            'name' => 'required|unique:products',
            'unit' => 'required|max:5',
            'img' => 'image|file|max:1024',
            'desc' => 'required'
        ];

        try {
            $request['gambar'] = Crypt::decryptString($request->gambar);
            $request['id'] = Crypt::decryptString($request->id);
        } catch (DecryptException $e) {
            abort(403);
        }

        $product = Product::find($request['id']);

        if($request->name == $product->name){
            $rules['name'] = 'required';
        }

        $validated = $request->validate($rules);

        if(!$request->img) {
            $validated['img'] = $validated['gambar'];
        }
        else {
            $validated['img'] = $request->file('img')->store('products');
            Storage::delete($validated['gambar']);
        }

        $update = Product::find($validated['id']);
        $update->name = $validated['name'];
        $update->img = $validated['img'];
        $update->unit = $validated['unit'];
        $update->desc = $validated['desc'];
        $update->save();

        return redirect('/admin/master_data');
    }

    public function deleteProduk(Request $request) {
        $validated = $request->validate([
            'id' => 'required',
            'gambar' => 'required'
        ]);

        try {
            $validated['gambar'] = Crypt::decryptString($request->gambar);
            $validated['id'] = Crypt::decryptString($request->id);
        } catch (DecryptException $e) {
            abort(403);
        }

        Storage::delete($validated['gambar']);
        $customer = Product::find($validated['id']);
        $customer->delete();
        return redirect('/admin/master_data');
    }



    // Logout
    public function logout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
