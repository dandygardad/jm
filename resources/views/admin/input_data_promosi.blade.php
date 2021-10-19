<!DOCTYPE html>
<html lang="en">
<head>
    <style>

    </style>
    <meta charset="UTF-8">
    <title>Jaya Mandiri Admin</title>
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
        <div class="form_promosi_1">
            <form action="#">
                <div class="row">
                    <div class="col-25">
                        <h5 class="tulisan_label"><label for="mitra">Mitra</label></h5>
                    </div>
                    <div class="col-75">
                        <input type="text" id="mitra" name="mitra" placeholder="Nama Mitra">
                    </div>
                    <div class="col-25">
                        <h5 class="tulisan_label"><label for="nama">Nama</label></h5>
                    </div>
                    <div class="col-75">
                        <input type="text" id="nama" name="nama" placeholder="Nama Barang">
                    </div>
                    <div class="col-25">
                        <h5 class="tulisan_label"><label for="nama">Tanggal</label></h5>
                    </div>
                    <div class="col-75">
                        <input type="date" id="tanggal" name="tanggal">
                    </div>
                    <div class="col-25">
                        <h5 class="tulisan_label"><label for="nama">Deskripsi</label></h5>
                    </div>
                    <div class="col-75">
                        <textarea id="deskripsi" name="deskripsi" placeholder="Deskripsi promosi" style="height: 130px; width: 100%; font-size: 15px;"></textarea>
                    </div>
                    <div class="letak_button">
                        <h5><button class="submit_promosi">Submit</button></h5>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
