<?php

namespace App\Http\Controllers;

use App\Models\Checkout;
use App\Models\Product;
use Illuminate\Http\Request;

class TokoController extends Controller
{
    // TOKO
    public function index() {
        if(auth()->user()->toko_id === 'D121181506') {
            return redirect('/admin');
        }

        return view('toko.toko', [
            'pos' => 'toko',
            'products' => Product::all()
        ]);
    }


    // CHECKOUT
    public function checkout() {
        if(auth()->user()->toko_id === 'D121181506') {
            return redirect('/admin');
        }

        return view('toko.checkout', [
            'pos' => 'toko',
            'checkouts' => Checkout::all(),
            // 'date' => now()->toDateTimeString('Y-m-d')
        ]);
    }

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
