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
                    <a href="{{ url('/admin/produk') }}" class="active"><span class="la la-box"></span>
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
        <div class="header_produk">
            <h3 class="produk_unggulan_tulisan">Produk Unggulan</h3>
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
            <h3 class="tulisan_produk_unggulan_daftar">Daftar Produk Unggulan</h3>
            <p class="tulisan_success" style="text-align: center; vertical-align:middle; height: auto;">
            @if (session('success'))
                {{ session('success') }}
            @endif
            <p>
            <!-- Awal Tabel Order pada Dashboard -->
            <form action="{{ route('gantiProduk') }}" method="post">
                @csrf
                <table class="letak_tabel_produk">
                    <tr>
                        <th class="checklist">Checklist</th>
                        <th>No.</th>
                        <th>Nama Barang</th>
                        <th>Deskripsi Barang</th>
                    </tr>
                    @foreach ($products as $product)
                    <tr>
                        @if ($product->unggulan)
                            <td><input type="radio" name="unggulan" value="{{ $product->id }}" checked></td>
                        @else
                            <td><input type="radio" name="unggulan" value="{{ $product->id }}"></td>
                        @endif

                        <td>{{ $num++ }}</td>
                        <td class="nama_barang">{{ $product->name }}</td>
                        <td class="deskripsi">{{ $product->desc }}</td>
                    </tr>
                    @endforeach
                </table>
                <button type="submit" class="button_produk_unggulan" onclick="return confirm('Apakah anda yakin ingin mengubah Produk Unggulan?')">Submit</button>
            </form>
        </div>
    </div>
</body>
</html>
