<?php

namespace App\Http\Controllers;

use App\Models\Checkout;
use App\Models\Product;
use Illuminate\Http\Request;

class TokoController extends Controller
{
    public function index() {
        if(auth()->user()->toko_id === 'D121181506') {
            return redirect('/admin');
        }

        return view('toko', [
            'pos' => 'toko',
            'products' => Product::all()
        ]);
    }

    public function checkout() {
        if(auth()->user()->toko_id === 'D121181506') {
            return redirect('/admin');
        }

        return view('checkout', [
            'pos' => 'toko',
            'checkouts' => Checkout::all()
        ]);
    }

    // Untuk tambahkan produk ke database
    public function addProduct(Request $request){
        $request->validate([
            'product_id' => 'required'
        ]);

        Checkout::create([
            'product_id' => $request->product_id,
            'jumlah' => 1
        ]);
        return redirect('/toko');
    }
}
