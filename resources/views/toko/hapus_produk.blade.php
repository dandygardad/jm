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
                    <a href="{{ url('/toko/checkout') }} " class="back">← Kembali ke halaman checkout</a>
                </div>
                <h1 class="heading-title">Hapus Produk</h1>
                <p class="tutorial-checkout">Pilih produk yang ingin dihapus, tekan tombol <span class="red">X</span> di dalam tabel.</p>

                <table>
                    <tr>
                        <th style="width: 5%" class="mobile">No</th>
                        <th style="width: 80%">Nama Produk</th>
                        <th>Hapus</th>
                    </tr>
                    @foreach ($checkouts as $checkout)
                        <tr>
                            <td class="mobile">{{ $loop->iteration }}</td>
                            <td class>{{ $checkout->product->name }}</td>
                            <td class="bold">
                                <div class="plusminus">
                                    <form action="{{ route('deleteCheckout') }}" method="post">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ Crypt::encryptString($checkout->id) }}">
                                        <button type="submit" class="minus">X</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </table>
                <div class="container-center">
                    <p>Jika sudah sesuai, tekan tombol dibawah ini untuk kembali ke halaman Checkout</b></p>
                    <a href="{{ url('/toko/checkout') }}" class="kirim">Kembali ke Checkout</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
