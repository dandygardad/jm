<!DOCTYPE html>
<html lang="en">
<head>
    @if ($pos === 'home')
        @include('partials.head_home')
    @elseif ($pos === 'toko')
        @include('partials.head_toko')
    @elseif ($pos === 'about')
        @include('partials.head_about')
    @endif
</head>

<body>
    @include('partials.navbar')

    @yield('container')

    @include('partials.footer')
</body>
</html>
