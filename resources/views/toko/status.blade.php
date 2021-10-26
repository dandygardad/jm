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

                {{-- Status belum selesai --}}
                <h1 class="heading-title">Order yang diproses</h1>
                <table>
                    <tr>
                        <th style="width: 5%" class="mobile">No</th>
                        <th style="width: 65%">ID Order</th>
                        <th>Status</th>
                    </tr>
                    @foreach ($order_not_finished as $order)
                        <tr>
                            <td class="mobile">{{ $loop->iteration }}</td>
                            <td style="text-align: center;">#{{ $order->id }}</td>
                            <td style="text-align: center; font-weight:600;"><a href="{{ url('toko/status/view/'. $order->id) }}" class="view-link-belum">Lihat</a>
                        </tr>
                    @endforeach
                </table>

                {{-- Status selesai --}}
                <h1 class="heading-title">Selesai</h1>
                <table>
                    <tr>
                        <th style="width: 5%" class="mobile">No</th>
                        <th style="width: 65%">ID Order</th>
                        <th>Status</th>
                    </tr>
                    @foreach ($order_finished as $order)
                        <tr>
                            <td class="mobile">1</td>
                            <td style="text-align: center;">#{{ $order->id }}</td>
                            <td style="text-align: center; font-weight:600;"><a href="{{ url('toko/status/view/' . $order->id) }}" class="view-link-selesai">Lihat</a>
                        </tr>
                    @endforeach
                </table>
                <div class="container-center">
                    <p><b>Jika terjadi kesalahan, mohon hubungi nomor dibawah ini.</b></p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
