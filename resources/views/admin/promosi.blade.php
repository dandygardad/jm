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
                <li >
                    <a href="{{ url('') }}/admin"><span class="la la-tachometer"></span>
                    <span>Dashboard</span></a>
                </li>
                <li>
                    <a href="promosi" class="active"><span class="la la-percent"></span>
                    <span>Promosi</span></a>
                </li>
                <li>
                    <a href="produk"><span class="la la-box"></span>
                    <span>Produk Unggulan</span></a>
                </li>
                <li>
                    <a href="admin"><span class="las la-users"></span>
                    <span>Admin</span></a>
                </li>
                <li>
                    <a href="order"><span class="las la-clipboard"></span>
                    <span>Order</span></a>
                </li>
            </ul>
        </div>
    </div>
    <!-- Akhir menu bagian samping -->

    <div class="main-content">
        <header>
            <h3>Promosi</h3>
            <div class="user-wrapper">
                <img src="{{ asset('') }}dash/gambar/dasboard/logo_admin.png" width="40px" height="40px" alt="">
                <div>
                    <h5>Admin</h5>
                </div>
            </div>
        </header>
        <main>
            <a href="promosi/input"><button class="button">Input Data</button></a>
            <!-- menghapus semua data promosi yang sudah di input -->
            <button class="button">Clear Data</button>
        </main>
    </div>

</body>
</html>
