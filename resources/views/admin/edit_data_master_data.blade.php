<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Ubah Customer - Jaya Mandiri Admin</title>
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('') }}dash/inputstyle.css">
    <link rel="stylesheet" href="{{ asset('') }}dash/style.css">
</head>
<body>
    <div class="container">
        <div class="form_promosi">
            <br>
            <img src="{{ asset('') }}dash/gambar/logo/imageonline-co-sharpenedimage.png" class="gambar_input_promosi" width=75rem;>
                <h4 class="tulisan_input_data_promosi">Jaya Mandiri</h4><br>
        </div>
        <div class="form_master_data">
            <form action="{{ route('editProduk') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" value="{{ Crypt::encryptString($produk->id); }}">
                <input type="hidden" name="gambar" value="{{ Crypt::encryptString($produk->img); }}">
                <div class="row">
                    <h3 class="tulisan_input_data_promosi">Edit Data</h3>
                    @error('name')
                        <p class="warning">Nama Barang tidak boleh kosong!</p>
                    @enderror
                    @error('img')
                        <p class="warning">Gambar tidak boleh kosong/lebih dari 1MB!</p>
                    @enderror
                    @error('desc')
                        <p class="warning">Deskripsi tidak boleh kosong!</p>
                    @enderror

                    <div class="col-25">
                        <h5 class="tulisan_label"><label for="nama">Nama</label></h5>
                    </div>
                    <div class="col-75">
                        <input type="text" id="nama" name="name" placeholder="Nama Barang" value="{{ $produk->name }}" required>
                    </div>
                    <div class="col-25">
                        <h5 class="tulisan_label"><label for="nama">Gambar</label></h5>
                    </div>
                    <div class="col-75">
                        <p><a href="{{ asset('storage/' . $produk->img) }}" target="blank">Lihat Gambar Sebelumnya</a></p>
                        <input type="file" id="img" name="img" accept="image/*">
                    </div>
                    <div class="col-25">
                        <h5 class="tulisan_label"><label for="nama">Unit</label></h5>
                    </div>
                    <div class="col-75">
                        <input type="text" id="nama" name="unit" placeholder="Unit" value="{{ $produk->unit }}" required>
                    </div>
                    <div class="col-25">
                        <h5 class="tulisan_label"><label for="nama">Deskripsi</label></h5>
                    </div>
                    <div class="col-75">
                        <textarea id="deskripsi" name="desc" placeholder="Deskripsi promosi" style="height: 130px; width: 100%; font-size: 15px;">{{ $produk->desc }}</textarea>
                    </div>
                    <div class="letak_button">
                        <h5><button class="submit_promosi"><a href="{{ url('/admin/master_data') }}" class="text-white">Kembali</a></h5></button>
                        <h5><button type="submit" class="submit_promosi text-white">Ubah</button></h5>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>
</html>

