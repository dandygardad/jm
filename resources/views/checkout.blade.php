@extends('layouts.main')

@section('container')
<div class="toko">
    <div class="container">
        <div class="welcome">
            <div class="tanggal-full">
                <p class="text-welcome">Selasa, 27/09/2021</p>
            </div>
            <div class="nama-toko">
                <h1>Selamat Datang</h1>
                <p class="text-welcome">Nama Toko</p>
            </div>
            <div class="tanggal">
                <h1>Selasa</h1>
                <p class="text-welcome">27/09/2021</p>
            </div>
        </div>

        <div class="halaman" id="produk">
            <div class="checkout">
                <h1 class="heading-title">Checkout</h1>
                <table>
                    <tr>
                        <th style="width: 70%">Nama Produk</th>
                        <th>Jumlah</th>
                    </tr>
                    <tr>
                        <td class>Lorem ipsum dolor sit amet.</td>
                        <td class="bold">
                            <div class="plusminus">
                                <button class="minus">-</button>
                                <p class="jumlah">0</p>
                                <button class="plus">+</button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>Lorem ipsum dolor sit amet.</td>
                        <td class="bold">
                            <div class="plusminus">
                                <button class="minus">-</button>
                                <p class="jumlah">0</p>
                                <button class="plus">+</button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>Lorem ipsum dolor sit amet.</td>
                        <td class="bold">
                            <div class="plusminus">
                                <button class="minus">-</button>
                                <p class="jumlah">0</p>
                                <button class="plus">+</button>
                            </div>
                        </td>
                    </tr>
                </table>
                <div class="container-center">
                    <button class="kirim">Kirim</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
