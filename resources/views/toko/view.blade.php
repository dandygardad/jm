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
                    <a href="{{ url('/toko/status') }} " class="back">← Kembali ke halaman status</a>
                </div>
                <h1 class="heading-title">View Order #{{ $orderlists->id }}</h1>

                <p style="text-align: center; font-weight: 700">Di order pada tanggal: {{ $orderlists->created_at }}</p>

                <table>
                    <tr>
                        <th style="width: 5%" class="mobile">No</th>
                        <th style="width: 60%">Nama Produk</th>
                        <th>Jumlah</th>
                    </tr>
                    @foreach ($orders as $order)
                    <tr>
                        <td class="mobile">{{ $loop->iteration  }}</td>
                        <td class>{{ $order->product->name }}</td>
                        <td class="bold">
                            <div class="plusminus">
                                <p style="font-size: 22px" class="jumlah">{{ $order->jumlah }} {{ $order->product->unit }}</p>
                            </div>
                        </td>
                    </tr>
                    @endforeach

                </table>
                <div class="container-center">
                    <p>Jika terjadi kesalahan, mohon hubungi kami.</b></p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
