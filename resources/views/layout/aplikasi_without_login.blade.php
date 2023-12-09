<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Magang Informatika</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <nav class="navbar-without-login">
        <div class="navbar__logo">
            <a href="{{ url('/') }}">
                <img src="{{ asset('modul_mahasiswa/Navbar/logo_unsika.png') }}" alt="Logo">
            </a>
        </div>
        <div>
            <h3>MAGANG INFORMATIKA</h3>
        </div>
    </nav>
    <div>
        @yield('content')
    </div>
</body>
</html>
