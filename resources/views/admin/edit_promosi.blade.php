<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Jaya Mandiri Admin</title>
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('') }}dash/inputstyle.css">
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
    <div class="container">
        <div class="form_promosi">
            <br>
            <img src="{{ asset('dash') }}/gambar/logo/imageonline-co-sharpenedimage.png" class="gambar_input_promosi" width=75rem;>
                <h4 class="tulisan_input_data_promosi">Jaya Mandiri</h4><br>
        </div>
        <div class="edit_promosi_1">
            <form action="{{ route('editPromosi') }}" method="post">
                @csrf
                <input type="hidden" name="id" value="{{ Crypt::encryptString($findPromo->id) }}">
                <div class="row">
                    <h3 class="tulisan_input_data_promosi">Edit Promosi</h3>
                    @error('product_id')
                    <p class="warning">Produk sudah ada/Tidak boleh kosong!</p>
                    @enderror
                    @error('desc_promo')
                    <p class="warning">Deskripsi tidak boleh kosong!</p>
                    @enderror
                    <div class="col-25">
                        <h5 class="tulisan_label"><label for="nama">Nama</label></h5>
                    </div>
                    <div class="col-75">
                        <select id="name" name="product_id" placeholder="Pilih produk..." style="width: 100%" required>
                            <option value="{{ $findPromo->product_id }}">{{ $findPromo->product->name }}</option>
                            @foreach ($products as $product)
                            <option value="{{ $product->id }}">{{ $product->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-25">
                        <h5 class="tulisan_label"><label for="nama">Deskripsi</label></h5>
                    </div>
                    <div class="col-75">
                        <textarea id="deskripsi" name="desc_promo" placeholder="Deskripsi promosi" style="height: 130px; width: 100%; font-size: 15px;">{{ $findPromo->desc_promo }}</textarea>
                    </div>
                    <div class="letak_button">
                        <h5><button class="submit_promosi"><a href="{{ url('/admin/promosi') }}" class="text-white">Kembali</a></h5></button>
                        <h5><button type="submit" class="submit_promosi text-white">Ubah</button></h5></div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
