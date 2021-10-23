<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Jaya Mandiri Admin</title>
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('') }}dash/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/js/standalone/selectize.min.js" integrity="sha256-+C0A5Ilqmu4QcSPxrlGpaZxJ04VjsRjKu+G82kl5UJk=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/css/selectize.bootstrap3.min.css" integrity="sha256-ze/OEYGcFbPRmvCnrSeKbRTtjG4vGLHXgOqsyLFTRjg=" crossorigin="anonymous" />
    <script>
        $(document).ready(function () {
            $('select').selectize({
                sortField: 'text'
            });
        });
    </script>

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
                    <a href="{{ url('/admin/promosi') }}" class="active"><span class="la la-percent"></span>
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
        <div class="header_order">
            <h3>Promosi</h3>
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
                    <form action="{{ route('inputPromosi') }}" method="post">
                        @csrf
                        <div class="row">
                            <h3 class="tulisan_input_data_promosi">Input Data</h3>
                            @error('name')
                                <p class="warning">Nama Produk Sudah Terdaftar/Nama Tidak Boleh Kosong</p>
                            @enderror
                            @error('desc_promo')
                                <p class="warning">Deskripsi Tidak Boleh kosong!</p>
                            @enderror
                            <div class="col-25">
                                <h5 class="tulisan_label"><label for="nama">Nama</label></h5>
                            </div>
                            <div class="col-75">
                                <select id="name" name="name" placeholder="Pilih produk..." style="width: 100%" required>
                                    <option value="">Pilih produk...</option>
                                    @foreach ($products as $product)
                                    <option value="{{ $product->name }}">{{ $product->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-25">
                                <h5 class="tulisan_label"><label for="deskripsi">Deskripsi</label></h5>
                            </div>
                            <div class="col-75">
                                <textarea id="deskripsi" name="desc_promo" placeholder="Deskripsi promosi" style="height: 130px; width: 100%; font-size: 15px;" required></textarea>
                            </div>
                            <div class="letak_button">
                                <h5><button type="submit" class="submit_promosi text-white" onclick="return confirm('Apakah anda yakin ingin menambah produk ini ke bagian Toko?')">Tambah</button></h5>
                    </form>
                    <form action="{{ route('deleteAllPromosi') }}" method="post">
                        @csrf
                            <h5>
                                <button type="submit" class="submit_promosi text-white bg-danger" onclick="return confirm('Apakah anda yakin untuk MENGHAPUS SEMUA?')">Hapus Semua</button>
                            </h5>
                    </form>
                            </div>
                        </div>
                    </div>
                </div>
            <br>
        </div>
    </div>

    <div class="main-content">
        <div class="page_order">
            <h3 class="tulisan_master_data">Daftar Barang Promosi</h3>
            <!-- Awal Tabel Order pada Dashboard -->
            <table class="letak_tabel_order">
                <tr>
                    <th>No.</th>
                    <th>Nama Barang</th>
                    <th>Deskripsi Promo</th>
                    <th>Aksi</th>
                </tr>
                @foreach ($promotions as $promotion)
                <tr>
                    <td>{{ $num++ }}</td>
                    <td class="nama_barang">{{ $promotion->name }}</td>
                    <td class="deskripsi">{{ $promotion->desc_promo }}</td>
                    <td>
                        <a href="{{ url('admin/promosi/edit/' . $promotion->id) }}"><button class="button_edit text-white">Edit</button></a>
                        <form action="{{ route('deletePromosi') }}" method="post">
                            @csrf
                            <input type="hidden" name="id" value="{{ $promotion->id }}">
                            <button type="submit" class="button_hapus" onclick="return confirm('Apakah anda yakin ingin menghapus?')">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
</body>
</html>
