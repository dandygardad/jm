<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use App\Models\Promotion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    // Dashboard
    public function index() {
        $this->authorize('admin');

        return view('admin/dashboard', [
            'totalCustomer' => User::all()->count(),
            'totalOrder' => User::all()->count()
        ]);
    }


    // Promosi
    public function promosi() {
        return view('admin.promosi', [
            'num' => 1,
            'products' => Product::all(),
            'promotions' => Promotion::all(),
        ]);
    }

    public function inputPromosi(Request $request) {
        $validated = $request->validate([
            'name' => 'required|unique:promotions|exists:products,name',
            'desc_promo' => 'required'
        ]);

        Promotion::create($validated);
        return redirect('/admin/promosi');
    }

    public function viewPromosi($id){
        // Untuk memunculkan product yang tidak dalam tabel promotions
        // fun fact: membutuhkan 2 jam untuk mendapatkan kode ini
        $promotion = Promotion::pluck('name');
        $products = Product::whereNotIn('name',$promotion)->get();

        return view('admin.edit_promosi',[
            'findPromo' => Promotion::find($id),
            'products' => $products
        ]);
    }

    public function editPromosi(Request $request) {
        $validated = $request->validate([
            'id' => 'required',
            'name' => 'required|exists:products,name',
            'desc_promo' => 'required'
        ]);

        $update = Promotion::find($validated['id']);
        $update->name = $validated['name'];
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
        $old->unggulan = 0;
        $old->save();

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
        return view('admin.order', [
            'orders_num' => 1,
            'orders_not_finished' => Order::where('terverifikasi', 0)->get(),
            'orders_finished' => Order::where('terverifikasi', 1)->get()
        ]);
    }

    public function viewOrder($id) {
        $id = Order::find($id);
        $find = Order::where('user_id', $id->user_id)->get();
        return view('admin.lihat_order', [
            'order' => $id,
            'listOrder' => $find
        ]);
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
            'name' => 'required',
            'unit' => 'required|max=5',
            'img' => 'required|image|file|max:1024',
            'desc' => 'required'
        ]);

        // Mengganti isi validated menjadi path file
        $validated['img'] = $request->file('img')->store('products');

        // Mengupload ke database
        Product::create($validated);

        return redirect('/admin/master_data');
    }

    public function logout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
