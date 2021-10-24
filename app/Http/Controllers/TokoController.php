<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Checkout;
use App\Models\Promotion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        $promosi = Promotion::orderBy('product_id', 'asc')->get();

        return view('toko.toko', [
            'pos' => 'toko',
            'unggulan' => $unggulan,
            'products' => $promosi,
            'productAlready' => $check
        ]);
    }

    public function addProduct(Request $request){
        $rules = [
            'product_id' => 'required'
        ];

        $validated = $request->validate($rules);

        try{
            $validated['product_id'] = Crypt::decryptString($request->product_id);
        } catch (DecryptException) {
            abort(403);
        }

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

        return view('toko.checkout', [
            'pos' => 'toko',
            'checkouts' => Checkout::get()
        ]);
    }



    // STATUS
    public function status() {
        if(auth()->user()->toko_id === 'D121181506') {
            return redirect('/admin');
        }

        return view('toko.status', [
            'pos' => 'toko',
            'checkouts' => Checkout::all(),
            // 'date' => now()->toDateTimeString('Y-m-d')
        ]);
    }

    // View
    public function viewStatus() {
        if(auth()->user()->toko_id === 'D121181506') {
            return redirect('/admin');
        }

        return view('toko.view', [
            'pos' => 'toko',
            'checkouts' => Checkout::all(),
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
            'checkouts' => Checkout::all(),
            // 'date' => now()->toDateTimeString('Y-m-d')
        ]);
    }
}
