<?php

namespace App\Http\Controllers;

use App\Models\Checkout;
use App\Models\Product;
use App\Models\Produk;
use Illuminate\Http\Request;

class TokoController extends Controller
{
    public function index() {
        return view('toko', [
            'pos' => 'toko',
            'products' => Product::all()
        ]);
    }

    public function checkout() {
        return view('checkout', [
            'pos' => 'toko',
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
