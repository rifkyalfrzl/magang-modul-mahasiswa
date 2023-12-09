<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Halaman Mahasiswa</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <script src="{{ asset('javascript/dropdown.js') }}"></script>
</head>
<body>
    <nav class="navbar">
        <div class="navbar__logo">
            <a href="{{ url('/beranda') }}">
                <img src="{{ asset('modul_mahasiswa/Navbar/logo_unsika.png') }}" alt="Logo">
            </a>
        </div>
        <ul class="navbar__menu">
            <li <?php echo ($_SERVER['REQUEST_URI'] == '/beranda') ? 'class="active"' : ''; ?>><a href="{{ url('/beranda') }}">Beranda</a></li>
            <li <?php echo ($_SERVER['REQUEST_URI'] == '/tentang-magang') ? 'class="active"' : ''; ?>><a href="{{ url('/tentang-magang') }}">Tentang Magang</a></li>
            <li <?php echo ($_SERVER['REQUEST_URI'] == '/panduan-magang') ? 'class="active"' : ''; ?>><a href="{{ url('/panduan-magang') }}">Panduan Magang</a></li>
            
            @guest <!-- Tampilkan jika pengguna belum login -->
            <div class="login-btn">
                <li><a href="{{ route('login') }}">Login</a></li>
            </div>
            @else <!-- Tampilkan jika pengguna sudah login -->
                <li>
                    <div class="navbar__user" id="userDropdown">
                        <div id="userContent">
                            <img src="\modul_mahasiswa-2\user-icon.svg" alt="Avatar" id="userAvatar">
                        </div>
                        
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin logout?');">
                        @csrf
                        <span id="user-name">{{ Auth::user()->username }}</span>
                        <div id="userContent">
                            <a href="/daftar-lamaran">Daftar Lamaran</a>
                        </div>
                        <button type="submit">Logout</button>
                    </form>
                    </div>
                </li>
            @endguest
        </ul>
    </nav>
    <div>
        @yield('content')
    </div>
</body>
</html>
