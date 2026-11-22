<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Layanan Pengaduan Masyarakat')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: #f4f6f9;
            font-family: Arial, sans-serif;
        }

        .sidebar {
            width: 250px;
            min-height: 100vh;
            background: #202b3c;
            position: fixed;
            top: 0;
            left: 0;
            padding: 25px 15px;
        }

        .brand {
            color: white;
            font-size: 19px;
            font-weight: bold;
            padding: 10px;
        }

        .sidebar a {
            display: block;
            color: #cbd5e1;
            text-decoration: none;
            padding: 12px 15px;
            border-radius: 7px;
            margin: 5px 0;
        }

        .sidebar a:hover,
        .sidebar a.active {
            background: #34445d;
            color: white;
        }

        .main {
            margin-left: 250px;
        }

        .topbar {
            background: white;
            padding: 18px 28px;
            border-bottom: 1px solid #eee;
        }

        .content {
            padding: 28px;
        }

        .stat-card {
            border: 0;
            border-radius: 12px;
            padding: 22px;
        }

        @media(max-width: 768px) {
            .sidebar {
                width: 190px;
            }

            .main {
                margin-left: 190px;
            }
        }
    </style>
</head>

<body>
    <aside class="sidebar">
        <div class="brand mb-4">LAYANAN PENGADUAN</div>

        <a href="{{ route('dashboard') }}" class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">
            Dashboard
        </a>

        <a href="{{ route('kategori.index') }}" class="{{ request()->routeIs('kategori.*') ? 'active' : '' }}">
            Kategori Pengaduan
        </a>

        <a href="#" onclick="return false;">Data Warga</a>
        <a href="{{ route('pengaduan.index') }}" class="{{ request()->routeIs('pengaduan.*') ? 'active' : '' }}">
            Data Pengaduan
        </a>
        <a href="{{ route('tanggapan.index') }}" class="{{ request()->routeIs('tanggapan.*') ? 'active' : '' }}">
            Tanggapan
        </a>
    </aside>

    <main class="main">
        <header class="topbar d-flex justify-content-between">
            <strong>@yield('page-title', 'Dashboard')</strong>
            <span>Admin</span>
        </header>

        <section class="content">
            @yield('content')
        </section>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>