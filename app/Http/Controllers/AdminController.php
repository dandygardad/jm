<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index() {
        return view('admin/dashboard');
    }

    public function promosi() {
        return view('admin.promosi');
    }

    public function inputPromosi() {
        return view('admin.input_data_promosi');
    }

    public function produk() {
        return view('admin.produk');
    }

    public function inputProduk() {
        return view('admin.input_data_produk');
    }

    public function admin() {
        return view('admin.admin');
    }

    public function inputAdmin() {
        return view('admin.input_data_admin');
    }

    public function order() {
        return view('admin.order');
    }
}
