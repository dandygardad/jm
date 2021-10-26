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
                    <img src="assets/img/dummy/tentang_kami.png" width="600px" alt="Gambar suasana kantor">
                </div>
                <div class="text-box">
                    <h1 class="heading-title">TENTANG KAMI</h1>
                    <p class="text">CV Jaya Mandiri adalah perusahaan distributor Consumer Good yang didirikan pada tahun 1996. Pada mulanya berkantor di jalan Sultan Hasanuddin Kabupaten Gowa Sulawesi Selatan. Awalnya, CV Jaya Mandiri hanya memasarkan produk-produk UD Kian Jaya berupa minuman berkarbonisasi (soda) dalam perkembangannya. Pada tahun 1998, CV. Jaya Mandiri menambah produk untuk dipasarkan yaitu Air Mineral Merk Aquaria. Kemudiah berturut-turut pada tahun 2000, CV Jaya Mandiri menambah produk-produk yang di pasarkan yaitu berupa Snack Kerupuk Merk Kenyi dan Kacang Merk Mayasi.</p>
                    {{-- <p class="text">Pada tahun 2001, CV Jaya Mandiri mendapat kepercayaan untuk menambah produk-produk terkenal yaitu: PT Nestle Indonesia yang mana produknya antara lain : Dancow, Milo, Nescafe dan lain-lain. Pada Juli 2001 CV Jaya Mandiri berpindah tempat yang lebih luas ( Memiliki gudang dan kantor ). Tempat tersebut berada di Jalan Andi Tonro No.19C, Gowa. Pada Tahun 2004, CV. Jaya Mandiri membuka cabang yang pertama di Sulawesi Tenggara yang bertempat di Jalan A. Yani No 117 Wua Wua Kendari sedangkan produknya yang dipasarkan hampir sama yang ada di Makassar.</p>
                    {{-- <p class="text">Sampai saat ini CV Jaya Mandiri telah mendistribusikan beberapa produk Nasional dan Internasional, Seperti :</p>
                    {{-- <li>PT. Nestle Indonesia</li>
                    <li>PT. KAO Indonesia</li>
                    <li>PT. Sari Ayu Indonesia</li>
                    <li>PT. Panjan Lestari</li>
                    <li>Produk pasta gigi enzim</li>
                    <li>Produk Madu Nusantara</li>
                    <li>Dan masih banyak lagi</li> --}}
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
                        <img src="assets/img/dummy/richie_kerja.png" alt="Gudang">
                    </div>
                </div>

                <div class="text">
                    <div class="text-box visi">
                        <h2 class="heading-title">VISI</h2>
                            <p>Menjadi Perusahaan distribusi yang cukup dikenal di Sulawesi khususnya Sulawesi Selatan dan Tenggara</p>
                    </div>
                    <div class="text-box misi">
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
                            <h3>The Best Distributor in the year 2019</h3>
                            <p class="content-card">CV. Jaya Mandiri menjadi distributor terbaik pada tahun 2018</p>
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
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugit ex commodi sequi sit doloribus, atque accusamus illum officia.</p>
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
                        <img src="assets/img/Gambar_logo_parthner/sari_ayu.png" width="75px" alt="Sari Ayu">
                    </div>
                    <div class="logo">
                        <img src="assets/img/Gambar_logo_parthner/universal_indofood.png" width="75px" alt="Indofood">
                    </div>
                </div>
            </div>
        </div>
@endsection
