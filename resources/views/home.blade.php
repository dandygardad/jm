@extends('layouts.main')

@section('container')
        <div class="carousel">
            <div class="container">
                <div class="carousel-img">
                    <div class="produk active">
                        <img src="assets/img/dummy/slide 1.jpeg" alt="Produk 1">
                    </div>
                    <div class="produk">
                        <img src="assets/img/dummy/slide 2.jpeg" alt="Produk 2">
                    </div>
                    <div class="produk">
                        <img src="assets/img/dummy/slide 3.png" alt="Produk 3">
                    </div>
                </div>
                <button id="prev" class="nav-carousel kiri">&lt;</button>
                <button id="next" class="nav-carousel kanan">&gt;</button>
            </div>
        </div>

        <div class="tentang-kami" id="tentang">
            <div class="container">
                <div class="img-office">
                    <img src="{{ asset('assets/img/dummy/tentang kami.jpeg') }}" width="600px" alt="Gambar suasana kantor">
                </div>
                <div class="text-box">
                    <h1 class="heading-title">TENTANG KAMI</h1>
                    <p class="text">CV Jaya Mandiri adalah perusahaan distributor Consumer Good yang didirikan pada tahun 1996. </p>
                    <button onclick="location.href='{{ url('/about') }}'" class="baca-selengkapnya">Baca selengkapnya</button>
                </div>

            </div>
        </div>

        <div class="visi-misi" id="visidanmisi">
            <div class="container">
                <div class="pekerja">
                    <div class="img-pekerja active">
                        <img src="assets/img/dummy/richie_kerja.png" alt="Pekerja 1">
                    </div>
                    <div class="img-pekerja">
                        <img src="assets/img/dummy/nota_kerja.png" alt="Pekerja 2">
                    </div>
                    <div class="img-pekerja">
                        <img src="{{ asset('assets/img/dummy/gudang_kerja.jpeg') }}" alt="Gudang">
                    </div>
                </div>

                <div class="text">
                    <div class="text-box visi">
                        <div class="visi-text">
                            <h2 class="heading-title">VISI</h2>
                            <p>Menjadi Perusahaan distribusi yang cukup dikenal di Sulawesi khususnya Sulawesi Selatan dan Tenggara</p>
                        </div>
                    </div>
                    <div class="text-box misi">
                        <div class="misi-text">
                            <h2 class="heading-title">MISI</h2>
                            <ul>
                                <li>Meningkatkan kemampuan kerja karyawan sehingga memiliki kemampuan yang siap pakai</li>
                                <li>Memberikan kepuasaan kepada karyawan sehingga bisa bekerja dengan nyaman</li>
                                <li>Memperluas jaringan distribusi pemasaran</li>
                            </ul>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div class="penghargaan" id="penghargaan">
            <div class="container">
                <div class="penghargaan-header">
                    <h1 class="heading-title">PENGHARGAAN</h1>
                    <p>Penghargaan yang telah dicapai oleh CV. Jaya Mandiri</p>
                </div>
                <div class="container-card">
                    <div class="card">
                        <img src="assets/img/dummy/achivement_1.png" alt="Penghargaan 1">
                        <div class="container-text">
                            <p class="rank">#1</p>
                            <h3>The Best Distributor In The Year 2019 (KAO)</h3>
                            <p class="content-card">CV. Jaya Mandiri menjadi distributor KAO terbaik pada tahun 2018</p>
                        </div>
                    </div>
                    <div class="card">
                        <img src="assets/img/dummy/achievement.png" alt="Penghargaan 2">
                        <div class="container-text">
                            <p class="rank">#1</p>
                            <h3>Sangat Terbaik</h3>
                            <p class="content-card">Lorem ipsum dolor sit amet,sicing elit. Placeat numquam itaque, illum adipisci beatae vitae ipsum, est vero dolore, debitis soluta nesciunt voluptas inventore consectetur?</p>
                        </div>
                    </div>
                    <div class="card">
                        <img src="assets/img/dummy/achievement.png" alt="Penghargaan 3">
                        <div class="container-text">
                            <p class="rank">#1</p>
                            <h3>Penjualan Produk Terbaik</h3>
                            <p class="content-card">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Placeat numquam itaque, illum adipisci beatae vitae ipsum, est vero dolore, debitis soluta nesciunt voluptas inventore consectetur?</p>
                        </div>
                    </div>
                    <div class="card">
                        <img src="assets/img/dummy/achievement.png" alt="Penghargaan 4">
                        <div class="container-text">
                            <p class="rank">#1</p>
                            <h3>Penjualan Produk Terbaik</h3>
                            <p class="content-card">Lorem ipsum dolor sit amet, consectetur</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="mitra" id="mitra">
            <div class="container">
                <div class="mitra-text">
                    <h1 class="heading-title">KAMI BEKERJA DENGAN<br>PARTNER TERBAIK</h1>
                    <p>Beberapa partner yang bekerjasama dengan CV. Jaya Mandiri</p>
                </div>
                <div class="mitra-logo">
                    <div class="logo">
                        <img src="assets/img/Gambar_logo_parthner/nestle.png" width="75px" alt="Nestle">
                    </div>
                    <div class="logo">
                        <img src="assets/img/Gambar_logo_parthner/kao.png" width="75px" alt="Kao">
                    </div>
                    <div class="logo">
                        <img src="assets/img/Gambar_logo_parthner/pt. pangan lestari.jpg" width="75px" alt="PT. Pangan Lestari">
                    </div>
                    <div class="logo">
                        <img src="assets/img/Gambar_logo_parthner/lotte.png" width="75px" alt="LOTTE">
                    </div>
                    <div class="logo">
                        <img src="assets/img/Gambar_logo_parthner/sari ayu.png" width="75px" alt="Sari Ayu">
                    </div>
                    <div class="logo">
                        <img src="assets/img/Gambar_logo_parthner/universal_indofood.png" width="75px" alt="Indofood">
                    </div>
                </div>
            </div>
        </div>
@endsection
