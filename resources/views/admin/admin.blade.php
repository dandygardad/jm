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
                    <a href="{{ url('/admin/admin') }}" class="active"><span class="las la-users"></span>
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
        <div class="header_order">
            <h3>Admin</h3>
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

    <div class="main-content-promosi">
        <div class="page_input_data_promosi">
            <br>
                <div class="form_promosi_1">
                    <form action="{{ route('inputCustomer') }}" method="post">
                        @csrf
                        <div class="row">
                            <h3 class="tulisan_input_data_promosi">Input Pelanggan</h3>

                            @error('toko_id')
                            <p class="warning">ID Pelanggan tidak sesuai! (ID sudah terdaftar!)</p>
                            @enderror
                            @error('name')
                            <p class="warning">Nama tidak sesuai!</p>
                            @enderror
                            @error('password')
                            <p class="warning">Password harus lebih dari 5 kata!</p>
                            @enderror

                            <div class="col-25">
                                <h5 class="tulisan_label"><label for="id_pelanggan">ID Pelanggan</label></h5>
                            </div>
                            <div class="col-75-input">
                                <input type="text" id="id_pelanggan" name="toko_id" placeholder="ID Pelanggan" style="width: 90%;" required value="{{ old('toko_id') }}">
                            </div>
                            <div class="col-25-input">
                                <h5 class="tulisan_label"><label for="nama_toko">Nama Toko</label></h5>
                            </div>
                            <div class="col-75-input">
                                <input type="text" id="nama_toko" name="name" placeholder="Nama Toko" style="width: 90%;" required value="{{ old('name') }}">
                            </div>
                            <div class="col-25-input">
                                <h5 class="tulisan_label"><label for="password">Password</label></h5>
                            </div>
                            <div class="col-75-input">
                                <input type="password" id="password" name="password" placeholder="Password" style="width: 90%;" required>
                            </div>
                            <div class="letak_button">
                                <h5><button type="submit" class="submit_promosi" onclick="return confirm('Apakah data sudah sesuai?')">Tambah</button></h5>
                    </form>
                            </div>
                        </div>

                </div>
            <br>
        </div>
    </div>

    <div class="main-content">
        <div class="page_order">
            <h3 class="tulisan_admin">Daftar Pelanggan</h3>
            <!-- Awal Tabel Order pada Dashboard -->
            <table class="letak_tabel_order">
                <tr class="tr_admin">
                    <th>No.</th>
                    <th>Id Toko</th>
                    <th>Nama Toko</th>
                    <th>Aksi</th>
                </tr>

                @foreach ($customers as $customer)
                <tr class="tr_admin">
                    <td>{{ $no++ }}</td>
                    <td>{{ $customer->toko_id }}</td>
                    <td>{{ $customer->name }}</td>
                    <td>
                        <a href="{{ url('/admin/admin/edit/'. $customer->id) }}"><button type="submit" class="button_edit">Edit</button></a>
                        <form action="{{ route('deleteCustomer') }}" method="post">
                            @csrf
                            <input type="hidden" name="id" value="{{ $customer->id }}">
                            <button type="submit" class="button_hapus" onclick="return confirm('APAKAH ANDA YAKIN INGIN MENGHAPUS USER INI?')">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
</body>
</html>
