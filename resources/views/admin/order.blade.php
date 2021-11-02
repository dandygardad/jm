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
        <div class="header_order">
            <h3>Order Barang</h3>
            <div class="user-wrapper">
                <img src="{{ asset('') }}dash/gambar/dasboard/logout.png" width="50px" height="40px" alt="">
                <form action='{{ route('logoutAdmin') }}' method="post">
                    @csrf
                    <div>
                        <button class="button_logout" type="submit">Logout</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="main-content">
        <div class="page_order">
            <h3 class="tulisan_order">Order yang belum selesai</h3>
            <!-- Awal Tabel Order pada Dashboard -->
            <table class="letak_tabel_order">
                <tr class="tr_order">
                    <th>ID Order</th>
                    <th>Nama Toko</th>
                    <th>ID Toko</th>
                    <th>Aksi</th>
                </tr>
                {{-- @foreach ($orders_not_finished as $order) --}}
                @foreach ($orders_not_finished as $order)
                <tr class="tr_order">
                    <td>{{ $order->id }}</td>
                    <td>{{ $order->users->name }}</td>
                    <td>{{ $order->users->toko_id }}</td>
                    {{-- IDnya merupakan ID order, dimana bakal di catch di view --}}
                    <td><a href="{{ url('admin/order/view/' . $order->id) }}" class="text-white"><button class="button_lihat">Lihat</a></button></td>
                </tr>
                @endforeach
            </table>
            <!-- Tabel riwayat -->
            <h3 class="tulisan_riwayat">Order yang sudah selesai</h3>
            <table class="letak_tabel_order">
                <tr>
                    <th>ID Order</th>
                    <th>Nama Toko</th>
                    <th>ID Toko</th>
                    <th>Keterangan</th>
                    <th>Aksi</th>
                </tr>
                @foreach ($orders_finished as $order)
                <tr>
                    <td>{{ $order->id }}</td>
                    <td>{{ $order->users->name }}</td>
                    <td>{{ $order->users->toko_id }}</td>
                    <td>Terverifikasi</td>
                    <td><a href="{{ url('admin/order/view/' . $order->id) }}" class="text-white"><button class="button_lihat">Lihat</a></button></td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
</body>
</html>
