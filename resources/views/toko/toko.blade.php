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
            <div class="produk-unggulan">
                <h1 class="heading-title">Produk Unggulan</h1>
                <div class="item">
                    <img src="assets/img/dummy_toko/produk-unggulan.png" alt="Produk Unggulan">
                    <div class="teks-produk-unggulan">
                        <h2>{{ $unggulan->name }}</h2>
                        <p>{{ $unggulan->desc }}</p>
                    </div>
                </div>
            </div>

            <div class="promosi-hari-ini" id="promosi-hari-ini">
                <h1 class="heading-title">Promosi Hari Ini</h1>

                @if (session('error'))
                    <div class="error-sudah-ada">{{ session('error') }}</div>
                @elseif (session('success'))
                    <div class="berhasil">{{ session('success') }}</div>
                @endif

                <div class="container-card">
                    @foreach ($products as $product)
                    @if (!$productAlready->contains('product_id', $product->product_id))
                    <div class="card">
                        {{-- ISI ASSET GAMBAR DISINI DAN TENTUKAN SIZENYA --}}
                        <img src="assets/img/dummy_toko/card.png" alt="Penghargaan 1">
                        <div class="container-text">
                            <h3>{{ $product->product->name }}</h3>
                            <p class="content-card">{{ $product->desc_promo }}</p>
                        </div>
                        <div class="plusminus">
                            <form action="{{ route('addProduct') }}" method="post">
                                @csrf
                                <input type="hidden" value="{{ Crypt::encryptString($product->product_id) }}" name="product_id">
                                <button type="submit" class="plus"><img src="{{ asset('assets/img/icons/cart.png') }}" alt="Tambahkan ke keranjang", width="30", height="30"></button>
                            </form>
                        </div>
                    </div>
                    @else
                    <div class="card">
                        {{-- ISI ASSET GAMBAR DISINI DAN TENTUKAN SIZENYA --}}
                        <img src="assets/img/dummy_toko/card.png" alt="Penghargaan 1">
                        <div class="container-text">
                            <h3>{{ $product->product->name }}</h3>
                            <p class="content-card">{{ $product->desc_promo }}</p>
                        </div>

                        <div class="tertambah">Sudah tertambah</div>
                    </div>
                    @endif
                    @endforeach
                </div>
                <!-- Pagination -->
                <nav class="nav-card" aria-label="Page navigation">
                    <ul class="pagination pagination-lg">
                        <li>
                            <a href="#" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                            </a>
                        </li>
                        <li class="active"><a href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">4</a></li>
                        <li><a href="#">5</a></li>
                        <li><a href="#">6</a></li>
                        <li><a href="#">7</a></li>
                        <li><a href="#">8</a></li>
                        <li>
                            <a href="#" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                            </a>
                        </li>
                    </ul>
                </nav>
                <div class="checkout-button">
                    <p>Sudah selesai? Klik tombol di bawah ini</p>
                    <a href="toko/checkout">Checkout</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
