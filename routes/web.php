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
    Route::get('/', [TokoController::class, 'index']);
    Route::post('/', [TokoController::class, 'addProduct'])->name('add-product');
    Route::get('login', [LoginController::class, 'index']);
    Route::get('checkout', [TokoController::class, 'checkout']);

});

Route::prefix('admin')->group(function () {
    Route::get('/', [AdminController::class, 'index']);
    Route::get('/promosi', [AdminController::class, 'promosi']);
    Route::get('/promosi/input', [AdminController::class, 'inputPromosi']);
    // Route::get('/promosi/hapus', [AdminController::class, 'hapus_promosi']);
    Route::get('/produk', [AdminController::class, 'produk']);
    Route::get('/produk/input', [AdminController::class, 'inputProduk']);
    Route::get('/admin', [AdminController::class, 'admin']);
    Route::get('/admin/input', [AdminController::class, 'inputAdmin']);
    Route::get('/order', [AdminController::class, 'order']);
});
