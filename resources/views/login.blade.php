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

    <body>
        <div class="full-page">
            <div class="container">
                <div class="login">
                    <div class="jm-image">
                        <img src="{{ asset('') }}assets/img/jm-logo.png" alt="Logo Jaya Mandiri">
                    </div>
                    <h1>Masuk</h1>
                    <form action="{{ route('login') }}" method="post">
                        @csrf
                        <div class="input-text">
                            @if (session()->has('error'))
                                <span class="error-text">{{ session('error') }}</span>
                            @endif
                            <input type="text" name="toko_id" id="username" placeholder="ID Toko" required autofocus>
                            <input type="password" name="password" id="password" placeholder="Password" required>
                        </div>
                        <div class="login-button-form">
                            <button type="submit">Masuk</button>
                        </div>
                    </form>
                </div>

                <div class="switch">
                    <p>Ingin bermitra dengan kami?</p>
                    <h1>Silahkan hubungi kami!</h1>
                    <div class="register-button-form">
                        <a href="/#kontak" target="_blank">Cek disini!</a>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
