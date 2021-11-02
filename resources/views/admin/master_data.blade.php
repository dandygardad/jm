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
                    <a href="{{ url('/admin/order') }}"><span class="las la-clipboard"></span>
                    <span>Order</span></a>
                </li>
                <li>
                    <a href="{{ url('/admin/master_data') }}" class="active"><span class="las la-database"></span>
                    <span>Master Data Produk</span></a>
                </li>
            </ul>
        </div>
    </div>
    <!-- Akhir menu bagian samping -->

    <div class="main-content">
        <div class="header_order">
            <h3>Master Data Produk</h3>
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
                    <form action="{{ route('inputProduk') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <h3 class="tulisan_input_data_promosi_master_data">Input Produk</h3>
                            @error('name')
                            <p class="warning">Nama produk sudah terdaftar!</p>
                            @enderror

                            @error('unit')
                            <p class="warning">Unit tidak boleh kosong!</p>
                            @enderror

                            @error('img')
                            <p class="warning">Gambar tidak boleh kosong/lebih dari 1MB!</p>
                            @enderror

                            @error('desc')
                            <p class="warning">Deksripsi tidak boleh kosong!</p>
                            @enderror
                            <div class="col-25">
                                <h5 class="tulisan_label"><label for="nama">Nama</label></h5>
                            </div>
                            <div class="col-75">
                                <input type="text" id="nama" name="name" placeholder="Nama Barang" style="width:100%" required>
                            </div>
                            <div class="col-25">
                                <h5 class="tulisan_label"><label for="unit">Unit</label></h5>
                            </div>
                            <div class="col-75">
                                <input type="text" id="unit" name="unit" placeholder="Unit" required>
                            </div>
                            <div class="col-25">
                                <h5 class="tulisan_label"><label for="name">Gambar</label></h5>
                            </div>
                            <div class="col-75">
                                <input type="file" id="img" name="img" accept="image/*" required>
                            </div>
                            <div class="col-25">
                                <h5 class="tulisan_label"><label for="nama">Deskripsi</label></h5>
                            </div>
                            <div class="col-75">
                                <textarea id="deskripsi" name="desc" placeholder="Deskripsi promosi" style="height: 130px; width: 100%; font-size: 15px;" required></textarea>
                            </div>
                            <div class="letak_button">
                                <h5><button class="submit_promosi text-white" onclick="return confirm('Apakah data yang anda isi sudah benar?')">Tambah</button></h5>
                            </div>
                        </div>
                    </form>
                </div>
            <br>
        </div>
    </div>

        <div class="main-content">
            <div class="page_order">
                <h3 class="tulisan_master_data">Daftar Master Data Nestle</h3>
                <!-- Awal Tabel Order pada Dashboard -->
                <table class="letak_tabel_order">
                    <tr>
                        <th>No.</th>
                        <th>Nama Barang</th>
                        <th>Deskripsi Barang</th>
                        <th>Unit</th>
                        <th>Lihat Gambar</th>
                        <th>Aksi</th>
                    </tr>
                    @foreach ($products as $product)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td class="nama_barang">{{ $product->name }}</td>
                        <td class="deskripsi">{{  $product->desc  }}</td>
                        <td class="unit">{{ $product->unit }}</td>
                        <td><a href="{{ asset('storage/' . $product->img) }}" target="_blank">Lihat</a></td>
                        <td>
                            <a href="{{ url('admin/master_data/view/' . $product->id) }}"><button class="button_edit text-white">Edit</button></a>
                            <form action="{{ route('deleteProduk') }}" method="POST">
                                @csrf
                                <input type="hidden" name="id" value="{{ Crypt::encryptString($product->id) }}">
                                <input type="hidden" name="gambar" value="{{ Crypt::encryptString($product->img) }}">

                                {{-- JANGAN DINYALAKAN TOMBOL HAPUS PRODUK, KONSEKUENSINYA ORDER AKAN KACAU --}}
                                {{-- <button class="button_hapus" type="submit" onclick="return confirm('APAKAH ANDA INGIN MENGHAPUS PRODUK INI?')">Hapus</button> --}}
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</body>
</html>
