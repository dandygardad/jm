@extends('layouts.main')

@section('container')
<div class="toko">
    <div class="container">
        <div class="welcome">
            <div class="tanggal-full">
                <p class="text-welcome">{{ date('d/m/Y') }}</p>
            </div>
            <div class="nama-toko">
                <h1>Selamat Datang</h1>
                <p class="text-welcome">{{ Auth::user()->name }}</p>
            </div>
            <div class="tanggal">
                <h1 class="hari">Selasa</h1>
                <p class="text-welcome isi-tanggal">27/09/2021</p>
            </div>
        </div>

        <div class="halaman" id="produk">
            <div class="checkout">
                <div class="back">
                    <a href="{{ url('/toko') }} " class="back">← Kembali ke halaman produk</a>
                </div>
                <h1 class="heading-title">Checkout</h1>
                <table>
                    <tr>
                        <th style="width: 5%" class="mobile">No</th>
                        <th style="width: 70%">Nama Produk</th>
                        <th>Jumlah</th>
                    </tr>
                    @foreach ($checkouts as $checkout)
                        <tr>
                            <td class="mobile">{{ $loop->iteration }}</td>
                            <td class>{{ $checkout->product->name }}</td>
                            <td class="bold">
                                <div class="plusminus">
                                    <button class="minus">-</button>
                                    <p class="jumlah">{{ $checkout->jumlah }}</p>
                                    <button class="plus">+</button>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </table>
                <div class="container-center">
                    <p>Mohon dicek kembali <b>Nama Produk</b> dan <b>Jumlah Barang</b> sebelum menekan <b>Tombol Kirim!</b></p>
                    <button class="kirim">Kirim</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
