<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Buku</title>

    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>

    {{-- Table --}}
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.css">
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

<style>
        /* Reset CSS */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            color: #333;
        }

        .dashboard {
            display: flex;
        }

        /* Sidebar */
        .sidebar {
            width: 250px; /* Lebar sidebar saat terbuka */
            background-color: #2c3e50;
            color: #fff;
            height: 100vh;
            padding: 20px;
            transition: width 0.3s ease; /* Animasi saat melipat */
            position: fixed; /* Sidebar tetap di tempat */
            top: 0;
            left: 0;
            z-index: 1; /* Pastikan sidebar di atas main content */
            overflow: hidden; /* Sembunyikan konten yang keluar */
        }

        .sidebar h2 {
            margin-bottom: 20px;
            font-size: 24px;
        }

        .sidebar ul {
            list-style: none;
        }

        .sidebar ul li {
            margin: 15px 0;
        }

        .sidebar ul li a {
            color: #fff;
            text-decoration: none;
            font-size: 18px;
        }

        .sidebar ul li a:hover {
            color: #1abc9c;
        }

        /* Main Content */
        .main-content {
            margin-left: 250px; /* Sesuaikan dengan lebar sidebar */
            transition: margin-left 0.3s ease; /* Animasi saat sidebar melipat */
            padding: 20px;
            width: calc(100% - 250px); /* Sesuaikan lebar main content */
            padding-bottom: 100px;
        }

        /* Header */
        .header {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }

        .header h1 {
            font-size: 28px;
            color: #2c3e50;
            display: inline-block;
            margin-left: 10px;
        }

        /* Tombol Toggle */
        .toggle-btn {
            background-color: transparent;
            color: #2c3e50;
            border: none;
            font-size: 24px;
            cursor: pointer;
        }

        /* Cards */
        .cards {
            display: flex;
            gap: 20px;
        }

        .card {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            flex: 1;
            text-align: center;
        }

        .card h3 {
            font-size: 20px;
            margin-bottom: 10px;
            color: #2c3e50;
        }

        .card p {
            font-size: 24px;
            color: #1abc9c;
        }

        /* Class untuk sidebar yang melipat */
        .sidebar.collapsed {
            width: 0; /* Sidebar benar-benar menghilang */
            padding: 0; /* Hilangkan padding */
        }

        .sidebar.collapsed + .main-content {
            margin-left: 0; /* Main content mengisi seluruh layar */
            width: 100%;
        }


        /* Menu Dropdown */
    .dropdown-content {
        display: none; /* Sembunyikan menu secara default */
        position: absolute;
        background-color: #fff;
        min-width: 160px;
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        border-radius: 5px;
        z-index: 1;
        margin-top: 5px; /* Jarak antara tombol dan menu */
    }

    .dropdown-content a {
        color: #333;
        padding: 12px 16px;
        text-decoration: none;
        display: block;
        transition: background-color 0.3s ease;
    }

    .dropdown-content a:hover {
        background-color: #f1f1f1;
    }

    /* Tampilkan menu saat class 'show' ditambahkan */
    .dropdown-content.show {
        display: block;
    }
</style>

</head>
<body>
    <div class="dashboard">
        @include('layouts.sidebar')
        <div class="main-content" id="mainContent">
            <!-- Header -->
            <div class="header">
                <button class="toggle-btn" id="toggleBtn">☰</button>
                <h1>Selamat Datang, Membaca adalah kunci!</h1>
                <div class="dropdown" style="float:right">
                    <!-- Tombol Dropdown -->
                    <button class="dropdown-btn1 btn btn-danger" id="dropdownBtn1">Logout !<i class="fas fa-user fa-fw"></i></button>

                    <!-- Menu Dropdown -->
                    <div class="dropdown-content" id="dropdownContent">
                        <a href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                    </div>
                </div>
            </div>
            @yield('content')
        </div>
    </div>
    <footer style="background-color: #f8f9fa; padding: 15px 0; text-align: center; position: fixed; bottom: 0; width: 100%; box-shadow: 0 -2px 5px rgba(0,0,0,0.1);">
        <div style="color: #6c757d; font-size: 14px;">
            &copy; 2025 Pengelolaan Buku. All Rights Reserved.
        </div>
        <div style="margin-top: 5px;">
            <a href="/privacy" style="color: #007bff; text-decoration: none; margin: 0 10px;">Privacy Policy</a>
            <a href="/terms" style="color: #007bff; text-decoration: none; margin: 0 10px;">Terms of Service</a>
            <a href="/contact" style="color: #007bff; text-decoration: none; margin: 0 10px;">Contact Us</a>
        </div>
    </footer>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
    const toggleBtn = document.getElementById('toggleBtn');
    const sidebar = document.getElementById('sidebar');
    const mainContent = document.getElementById('mainContent');

    toggleBtn.addEventListener('click', function () {
        sidebar.classList.toggle('collapsed'); // Toggle class 'collapsed'
    });
});
</script>
<script>
    // JavaScript untuk toggle dropdown
    document.addEventListener('DOMContentLoaded', function () {
        const dropdownBtn = document.getElementById('dropdownBtn1');
        const dropdownContent = document.getElementById('dropdownContent');

        dropdownBtn.addEventListener('click', function () {
            dropdownContent.classList.toggle('show');
        });

        window.addEventListener('click', function (event) {
            if (!event.target.matches('.dropdown-btn1')) {
                if (dropdownContent.classList.contains('show')) {
                    dropdownContent.classList.remove('show');
                }
            }
        });
    });
</script>


</html>
