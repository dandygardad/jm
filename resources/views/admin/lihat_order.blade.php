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
                    <a href="{{ url('/admin') }}"><span class="la la-tachometer"></span>
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
                    <a href="{{ url('/admin/order') }}" class="active"><span class="las la-clipboard"></span>
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
            <h3>View Order</h3>
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

    <div class="bagian_lihat_order">
        <br>
        <div class="row-1">
            <div class="col-awal">
                <h5 class="nama_lihat_order">Nama Toko &ensp; &ensp; &ensp; &ensp; &ensp;&ensp; &ensp;:</h5>
            </div>
            <div class="col-panggilan">
                <h5 class="nama_lihat_order">{{ $order_profile->name }}</h5>
            </div>
            @if ($created_date->status == 0)
                <form action="{{ route('terimaOrder') }}" method="post">
                    @csrf
                    <input type="hidden" name="id" value="{{ Crypt::encryptString($created_date->id) }}">
                    <div class="col-button-terima">
                        <button class="button_terima_lihat_order text-white">Terima</button>
                    </div>
                </form>
            @endif

        </div>
        <div class="row-1">
            <div class="col-awal">
                <h5 class="nama_lihat_order">ID Toko &ensp; &ensp; &ensp; &ensp; &ensp; &ensp; &ensp; &ensp; &ensp;:</h5>
            </div>
            <div class="col-panggilan">
                <h5 class="nama_lihat_order">{{ $order_profile->toko_id }}</h5>
            </div>
            @if ($created_date->status == 0)
            <form action="{{ route('tolakOrder') }}" method="post">
                @csrf
                <input type="hidden" name="id" value="{{ Crypt::encryptString($created_date->id) }}">
                <div class="col-button-tolak">
                    <button type="submit" class="button_tolak_lihat_order text-white">Tolak</button>
                </div>
            </form>
            @endif
        </div>
        <div class="row-1">
            <div class="col-awal">
                <h5 class="nama_lihat_order">Tanggal Pemesanan &ensp;  :</h5>
            </div>
            <div class="col-panggilan">
                <h5 class="nama_lihat_order">{{ $created_date->created_at }}</h5>
            </div>
        </div>
        <br>
    </div>
    <div class="bagian_list_order_tabel">
        <h3 class="tabel_tulisan_list_order">List Order</h3>
        <table class="letak_tabel_produk">
            <tr>
                <th>No.</th>
                <th>Nama Barang</th>
                <th>Jumlah Item</th>
            </tr>
            @foreach ($order_product as $order)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td class="nama_barang_order">{{ $order->product->name}}</td>
                    <td class="jumlah_item_order">{{ $order->jumlah }} {{ $order->product->unit }}</td>
                </tr>
            @endforeach

        </table>
    </div>
</body>
</html>
