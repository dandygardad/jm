<!DOCTYPE html>

<html lang="id">
    <head>
        <title>Login Toko Jaya Mandiri</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" type="image/png" sizes="32x32" href="../../assets/favicon/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="96x96" href="../../assets/favicon/favicon-96x96.png">
        <link rel="icon" type="image/png" sizes="16x16" href="../../assets/favicon/favicon-16x16.png">

        <link rel="stylesheet" href="{{ asset('') }}css/login.css">
    </head>

    <body class="ganti-bg">
        <div class="full-page">
            <div class="container">
                <div class="login">
                    <div class="jm-image">
                        <a href="{{ url('/toko') }}"><img src="{{ asset('') }}assets/img/jm-logo.png" alt="Logo Jaya Mandiri"></a>
                    </div>
                    <h1>Ganti Password</h1>
                    <form action="{{ route('login') }}" method="post">
                        @csrf
                        <div class="input-text">
                            @if (session()->has('error'))
                                <span class="error-text">{{ session('error') }}</span>
                            @endif
                            <input type="password" name="old_pass" class="input-box" placeholder="Masukkan Password Lama" required autofocus>
                            <input type="password" name="new_pass" class="input-box" placeholder="Masukkan Password Baru" required >
                            <input type="password" name="confirm_pass" class="input-box" placeholder="Konfirmasi Password Baru" required>
                        </div>
                        <div class="login-button-form">
                            <button type="submit">Ganti</button>
                        </div>
                    </form>
                </div>

                <div class="switch">
                    <p>Akun sedang bermasalah?</p>
                    <h1>Silahkan hubungi kami!</h1>
                    <div class="register-button-form">
                        <a href="/#kontak" target="_blank">Cek disini!</a>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
