@extends('layouts.main')

@section('container')
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
    <div class="produk-unggulan">
        <h1 class="heading-title">Produk Unggulan</h1>
        <div class="item">
            <img src="assets/img/dummy_toko/produk-unggulan.png" alt="Produk Unggulan">
            <div class="teks-produk-unggulan">
                <h2>Lorem, ipsum.</h2>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Porro maxime odio nemo quidem eos ad quae alias enim esse?</p>
            </div>
        </div>
    </div>
    
    <div class="promosi-hari-ini">
        <h1 class="heading-title">Promosi Hari Ini</h1>
        <div class="filter-logo">
            <img src="assets/img/dummy_toko/filter-logo.png" alt="Logo">
            <img src="assets/img/dummy_toko/filter-logo.png" alt="Logo">
            <img src="assets/img/dummy_toko/filter-logo.png" alt="Logo">
        </div>

        <div class="container-card">
            <div class="card">
                <img src="assets/img/dummy_toko/card.png" alt="Penghargaan 1">
                <div class="container-text">
                    <h3>Penjualan Produk Terbaik</h3>
                    <p class="content-card">Lorem ipsum dolor sit amet, itaque, illum adipisci beatae vitae ipsum, est vero dolore, debitis soluta nesciunt voluptas inventore consectetur?</p>
                </div>
            </div>
            <div class="card">
                <img src="assets/img/dummy_toko/card.png" alt="Penghargaan 1">
                <div class="container-text">
                    <h3>Sangat Terbaik</h3>
                    <p class="content-card">Lorem ipsum dolor sit amet,sicing elit. Placeat numquam itaque, illum adipisci beatae vitae ipsum, est vero dolore, debitis soluta nesciunt voluptas inventore consectetur?</p>
                </div>
            </div>
            <div class="card">
                <img src="assets/img/dummy_toko/card.png" alt="Penghargaan 1">
                <div class="container-text">
                    <h3>Penjualan Produk Terbaik</h3>
                    <p class="content-card">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Placeat numquam itaque, illum adipisci beatae vitae ipsum, est vero dolore, debitis soluta nesciunt voluptas inventore consectetur?</p>
                </div>
            </div>
            <div class="card">
                <img src="assets/img/dummy_toko/card.png" alt="Penghargaan 1">
                <div class="container-text">
                    <h3>Penjualan Produk Terbaik</h3>
                    <p class="content-card">Lorem ipsum dolor sit amet, consectetur</p>
                </div>
            </div>
            <div class="card">
                <img src="assets/img/dummy_toko/card.png" alt="Penghargaan 1">
                <div class="container-text">
                    <h3>Penjualan Produk Terbaik</h3>
                    <p class="content-card">Lorem ipsum dolor sit amet, consectetur</p>
                </div>
            </div>
            <div class="card">
                <img src="assets/img/dummy_toko/card.png" alt="Penghargaan 1">
                <div class="container-text">
                    <h3>Penjualan Produk Terbaik</h3>
                    <p class="content-card">Lorem ipsum dolor sit amet, consectetur</p>
                </div>
            </div>
            <div class="card">
                <img src="assets/img/dummy_toko/card.png" alt="Penghargaan 1">
                <div class="container-text">
                    <h3>Penjualan Produk Terbaik</h3>
                    <p class="content-card">Lorem ipsum dolor sit amet, consectetur</p>
                </div>
            </div>
            <div class="card">
                <img src="assets/img/dummy_toko/card.png" alt="Penghargaan 1">
                <div class="container-text">
                    <h3>Penjualan Produk Terbaik</h3>
                    <p class="content-card">Lorem ipsum dolor sit amet, consectetur</p>
                </div>
            </div>
            <div class="card">
                <img src="assets/img/dummy_toko/card.png" alt="Penghargaan 1">
                <div class="container-text">
                    <h3>Penjualan Produk Terbaik</h3>
                    <p class="content-card">Lorem ipsum dolor sit amet, consectetur</p>
                </div>
            </div>
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
    </div>
</div>
@endsection