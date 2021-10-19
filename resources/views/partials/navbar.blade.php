<div class="navbarMobile">
    <div class="exitBtn">
        <img src="{{ asset('') }}assets/img/icons/exit.png" alt="Exit">
    </div>
    <ul>
        @if($pos === 'home')
            <li><a href="#tentang" class="closedNav">Tentang Kami</a></li>
            <li><a href="#visidanmisi" class="closedNav">Visi Misi</a></li>
            <li><a href="#penghargaan" class="closedNav">Penghargaan</a></li>
            <li><a href="#mitra" class="closedNav">Mitra</a></li>
            <li>
                <div class="login">
                    @auth
                            <a href="toko" target="_blank">Masuk Toko</a>
                    @else
                            <a href="toko/login" target="_blank">Login Toko</a>
                    @endauth
                </div>
            </li>
        @elseif ($pos === 'toko')
            <li><a href="#produk" class="closedNav">Produk</a></li>
            <li><a href="#kontak" class="closedNav">Kontak</a></li>
            <form action="{{ route('logout') }}" method="post">
                @csrf
                <li><button type="submit" class="closedNav">Logout</button></li>
            </form>
        @endif
    </ul>
</div>

<div class="header-call">
    <div class="container-call">
        <span class="content">
            <img src="{{ asset('') }}assets/img/icons/header-mobile.png" alt="Logo Telepon">
        </span>
        <span class="content call-text">
            <a href="tel:+628134012222">
                +6281340122XX
            </a>
        </span>
    </div>
</div>

<div class="container-header">
    <div class="content company-name">
        <img src="{{ asset('') }}assets/img/icons/header-logo.png" alt="Logo Jaya Mandiri">
        <span class="jm-text">Jaya Mandiri</span class="jm-text">
    </div>
    <div class="navMobile">
        <img src="{{ asset('') }}assets/img/icons/hamburger.png" alt="Menu button">
    </div>

    <div class="content nav">
        <ul>
            @if($pos === 'home')
                <li><a href="#tentang">Tentang Kami</a></li>
                <li><a href="#visidanmisi">Visi Misi</a></li>
                <li><a href="#penghargaan">Penghargaan</a></li>
                <li><a href="#mitra">Mitra</a></li>
                <li>
                    <div class="login">
                        @auth
                            <a href="toko" target="_blank">Masuk Toko</a>
                        @else
                            <a href="toko/login" target="_blank">Login Toko</a>
                        @endauth
                    </div>
                </li>
            @elseif ($pos === 'toko')
                <li><a href="#produk">Produk</a></li>
                <li><a href="#kontak">Kontak</a></li>

                <form action="{{ route('logout') }}" method="post">
                    @csrf
                    <li><button type="submit" class="closedNav">Logout</button></li>
                </form>
                {{-- <li><a href="{{ url('toko/logout') }}">Logout</a></li> --}}
            @endif
        </ul>
    </div>
</div>
