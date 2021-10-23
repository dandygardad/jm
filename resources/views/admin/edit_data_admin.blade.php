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

        <div class="form_admin_1">
            {{-- Error --}}
            @error('toko_id')
                <p>ID Toko tidak sesuai (ID Toko sudah ada/Tidak boleh kosong)!</p>
            @enderror
            @error('name')
                <p>Nama Toko tidak sesuai!</p>
            @enderror
            @error('password')
                <p>Password tidak sesuai (Harus lebih dari 5 karakter)!</p>
            @enderror

            <form action="{{ route('editCustomer') }}" method="post">
                @csrf
                <input type="hidden" name="id" value="{{ $user->id }}">
                <div class="row">
                    <div class="col-25">
                        <h5 class="tulisan_label"><label for="id_pelanggan">ID Pelanggan</label></h5>
                    </div>
                    <div class="col-75">
                        <input type="text" id="id_pelanggan" name="toko_id" placeholder="ID Pelanggan" value="{{ $user->toko_id }}" autofocus required>
                    </div>
                    <div class="col-25">
                        <h5 class="tulisan_label"><label for="nama_toko">Nama</label></h5>
                    </div>
                    <div class="col-75">
                        <input type="text" id="nama_toko" name="name" placeholder="Nama Toko" value="{{ $user->name }}" required>
                    </div>
                    <div class="col-25">
                        <h5 class="tulisan_label"><label for="password">Password</label></h5>
                    </div>
                    <div class="col-75">
                        <input type="password" id="password" name="password" placeholder="Password" required>
                    </div>
                    <div class="letak_button">
                        <h5><button class="submit_promosi"><a href="{{ url('admin/admin') }}" class="text-white text-decoration-none">Kembali</a></h5></button>
                        <h5><button type="submit" class="submit_promosi" onclick="return confirm('Apakah data sudah benar?')">Submit</button></h5>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
