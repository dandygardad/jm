<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Jaya Mandiri Admin</title>
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('') }}dash/style.css">
</head>
<body>
    <!-- Awal Menu bagian samping -->
    <div class="sidebar">
            <div class="sidebar-brand">
            <!-- Logo Jaya mandiri -->
            <h3 class="tulisan_logo"><img src="{{ asset('') }}dash/gambar/logo/imageonline-co-sharpenedimage.png" width=75rem;>Jaya Mandiri</h3>
        </div>
        <div class="sidebar-menu">
            <ul>
                <li>
                    <a href="{{ url('/admin') }}" class="active"><span class="la la-tachometer"></span>
                    <span>Dashboard</span></a>
                </li>
                <li>
                    <a href="{{ url('/admin/promosi') }}"><span class="la la-percent"></span>
                    <span>Promosi</span></a>
                </li>
                <li>
                    <a href="{{ url('/admin/produk') }}"><span class="la la-box"></span>
                    <span>Produk Unggulan</span></a>
                </li>
                <li>
                    <a href="{{ url('/admin/admin') }}"><span class="las la-users"></span>
                    <span>Pelanggan</span></a>
                </li>
                <li>
                    <a href="{{ url('/admin/order') }}"><span class="las la-clipboard"></span>
                    <span>Order</span></a>
                </li>
                <li>
                    <a href="{{ url('/admin/master_data') }}"><span class="las la-database"></span>
                    <span>Master Data Produk</span></a>
                </li>
            </ul>
        </div>
    </div>
    <!-- Akhir menu bagian samping -->

    <div class="main-content">
        <header>
            <h3>Dashboard</h3>
            <div class="user-wrapper">
                <img src="{{ asset('') }}dash/gambar/dasboard/logout.png" width="50px" height="40px" alt="">
                <form action='{{ route('logoutAdmin') }}' method="post">
                    @csrf
                    <div>
                        <button class="button_logout" type="submit">Logout</button>
                    </div>
                </form>
            </div>
        </header>
        <main>
            <!-- Untuk visitor otomatis berapa banyak orang sudah mengunjungi website -->
            {{-- <div class="cards">
                <div class="card-single">
                    <div>
                        <h1>200</h1>
                        <span>Visitors</span>
                    </div>
                    <div>
                        <img src="{{ asset('') }}dash/gambar/dasboard/visitor.png" style="padding-left: 30px;" width="150px" height="95px" alt="">
                    </div>
                </div>
            </div> --}}
            <!-- Untuk costumers akan menghitung jumlah costumer yang ada pada master -->
            <div class="cards">
                <div class="card-single">
                    <div>
                        <h1>{{ $totalCustomer }}</h1>
                        <span>Costumers</span>
                    </div>
                    <div>
                        <img src="{{ asset('') }}dash/gambar/dasboard/Capture-removebg-preview (1).png" style="padding-left: 30px;" width="125px" alt="">
                    </div>
                </div>
            </div>
            <div class="cards">
                <div class="card-single">
                    <div>
                        <h1>{{ $totalOrder }}</h1>
                        <span>Order</span>
                    </div>
                    <div>
                        <img src="{{ asset('') }}dash/gambar/dasboard/order-removebg-preview.png" class="gambar_order" alt="">
                    </div>
                </div>
            </div>
        </main>
    </div>

</body>
</html>
