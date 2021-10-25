<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\TokoController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home', [
        'pos' => 'home'
    ]);
});

Route::prefix('toko')->group(function (){
    Route::get('/', [TokoController::class, 'index'])->middleware('auth');
    Route::post('/', [TokoController::class, 'addProduct'])->name('addProduct');

    Route::get('/login', [LoginController::class, 'index'])->middleware('guest');
    Route::post('/login', [LoginController::class, 'login'])->name('login');

    Route::get('/status', [TokoController::class, 'status'])->middleware('auth');
    Route::get('/status/view/', [TokoController::class, 'viewStatus'])->middleware('auth');

    Route::get('/ganti-password', [TokoController::class, 'gantiPass'])->middleware('auth');

    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

    Route::get('checkout', [TokoController::class, 'checkout'])->middleware('auth');
    Route::post('/checkout/success', [TokoController::class, 'checkoutToOrder'])->name('checkoutToOrder');
    Route::get('/checkout/hapus-produk', [TokoController::class, 'viewDeleteCheckout'])->name('viewDeleteCheckout');
    Route::post('/checkout/delete', [TokoController::class, 'deleteCheckout'])->name('deleteCheckout');
});

Route::middleware('admin')->group(function () {
    Route::prefix('admin')->group(function () {
        Route::get('/', [AdminController::class, 'index']);
        Route::post('/logout', [AdminController::class, 'logout'])->name('logoutAdmin');


        // Promosi
        Route::get('/promosi', [AdminController::class, 'promosi']);
        Route::post('/promosi', [AdminController::class, 'inputPromosi'])->name('inputPromosi');
        Route::get('/promosi/edit/{id}', [AdminController::class, 'viewPromosi']);
        Route::post('/promosi/edit/success', [AdminController::class, 'editPromosi'])->name('editPromosi');
        Route::post('/promosi/hapus_semua/', [AdminController::class, 'deleteAllPromosi'])->name('deleteAllPromosi');
        Route::post('/promosi/hapus', [AdminController::class, 'deletePromosi'])->name('deletePromosi');

        // Produk
        Route::get('/produk', [AdminController::class, 'produk']);
        Route::post('/produk', [AdminController::class, 'gantiProduk'])->name('gantiProduk');

        // Pelanggan
        Route::get('/admin', [AdminController::class, 'admin']);
        Route::post('/admin/input', [AdminController::class, 'addCustomer'])->name('inputCustomer');
        Route::post('/admin/delete/', [AdminController::class, 'deleteCustomer'])->name('deleteCustomer');
        Route::get('/admin/edit/{id}', [AdminController::class, 'viewCustomer']);
        Route::post('/admin/success', [AdminController::class, 'editCustomer'])->name('editCustomer');

        // Order
        Route::get('/order', [AdminController::class, 'order']);
        Route::get('/order/view/{id}', [AdminController::class, 'viewOrder']);
        Route::post('/order/view/terima', [AdminController::class, 'terimaOrder'])->name('terimaOrder');
        Route::post('/order/view/tolak', [AdminController::class, 'tolakOrder'])->name('tolakOrder');

        // Master Data Produk
        Route::get('/master_data', [AdminController::class, 'master']);
        Route::get('/master_data/view/{id}', [AdminController::class, 'viewProduk']);
        Route::post('/master_data', [AdminController::class, 'inputProduk'])->name('inputProduk');
        Route::post('/master_data/success', [AdminController::class, 'editProduk'])->name('editProduk');
        Route::post('/master_data/delete', [AdminController::class, 'deleteProduk'])->name('deleteProduk');
    });
});

