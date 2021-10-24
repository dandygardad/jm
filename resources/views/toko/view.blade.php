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
                <h1 class="heading-title">View Order #1212</h1>

                <p style="text-align: center; font-weight: 700">Di order pada tanggal: 12/12/2021</p>

                <table>
                    <tr>
                        <th style="width: 5%" class="mobile">No</th>
                        <th style="width: 60%">Nama Produk</th>
                        <th>Jumlah</th>
                    </tr>
                    <tr>
                        <td class="mobile">1</td>
                        <td class>Lorem ipsum dolor sit amet.</td>
                        <td class="bold">
                            <div class="plusminus">
                                <p style="font-size: 22px" class="jumlah">3 dus</p>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="mobile">2</td>
                        <td>Lorem ipsum dolor sit amet.</td>
                        <td class="bold">
                            <div class="plusminus">
                                <p style="font-size: 22px" class="jumlah">2 dus</p>
                            </div>
                        </td>
                    </tr>
                </table>
                <div class="container-center">
                    <p>Jika terjadi kesalahan, mohon hubungi kami.</b></p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
