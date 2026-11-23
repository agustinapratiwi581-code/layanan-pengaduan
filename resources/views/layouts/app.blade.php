
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Layanan Pengaduan Masyarakat')</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">

    <style>
        :root {
            --navy: #17263c;
            --navy-light: #263b58;
            --primary: #3976c6;
            --background: #f4f6fa;
        }

        body {
            margin: 0;
            background: var(--background);
            font-family: 'Segoe UI', Arial, sans-serif;
            color: #263449;
        }

        .sidebar {
            width: 260px;
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            background: var(--navy);
            padding: 25px 17px;
            z-index: 1030;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 12px;
            color: white;
            font-size: 17px;
            font-weight: 700;
            padding: 5px 10px 28px;
        }

        .brand-icon {
            width: 40px;
            height: 40px;
            border-radius: 12px;
            background: var(--primary);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 21px;
        }

        .menu-label {
            color: #8292a9;
            font-size: 11px;
            font-weight: 700;
            letter-spacing: 1.2px;
            padding: 12px 12px 8px;
        }

        .sidebar a {
            display: flex;
            align-items: center;
            gap: 13px;
            color: #c2ccda;
            text-decoration: none;
            padding: 12px 14px;
            border-radius: 9px;
            margin: 5px 0;
            font-size: 14px;
            transition: .2s;
        }

        .sidebar a i {
            font-size: 18px;
        }

        .sidebar a:hover,
        .sidebar a.active {
            background: var(--navy-light);
            color: white;
        }

        .sidebar a.active {
            border-left: 3px solid #65a4ff;
        }

        .main {
            margin-left: 260px;
            min-height: 100vh;
        }

        .topbar {
            height: 72px;
            background: white;
            padding: 0 30px;
            border-bottom: 1px solid #e9edf3;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .page-heading {
            font-weight: 700;
            font-size: 18px;
            margin: 0;
        }

        .admin-profile {
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 14px;
            font-weight: 600;
        }

        .admin-icon {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            background: #e8f0fc;
            color: var(--primary);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 18px;
        }

        .content {
            padding: 30px;
        }

        .stat-card {
            border: 0;
            border-radius: 14px;
            padding: 22px;
            background: white;
        }

        @media (max-width: 991.98px) {
            .main {
                margin-left: 0;
            }

            .content {
                padding: 20px;
            }

            .topbar {
                padding: 0 18px;
            }
        }

        @media (max-width: 576px) {
            .content {
                padding: 15px;
            }

            .topbar {
                height: 62px;
            }

            .page-heading {
                font-size: 16px;
            }
        }
    </style>
</head>

<body>

    <!-- SIDEBAR DESKTOP -->
    <aside class="sidebar d-none d-lg-block">
        <div class="brand">
            <div class="brand-icon">
                <i class="bi bi-buildings"></i>
            </div>
            <div>
                LAYANAN<br>PENGADUAN
            </div>
        </div>

        <div class="menu-label">MENU UTAMA</div>

        <a href="{{ route('dashboard') }}"
            class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">
            <i class="bi bi-grid-1x2-fill"></i> Dashboard
        </a>

        <a href="{{ route('kategori.index') }}"
            class="{{ request()->routeIs('kategori.*') ? 'active' : '' }}">
            <i class="bi bi-folder-fill"></i> Kategori Pengaduan
        </a>

        <a href="{{ route('warga.index') }}"
            class="{{ request()->routeIs('warga.*') ? 'active' : '' }}">
            <i class="bi bi-people-fill"></i> Data Warga
        </a>

        <a href="{{ route('pengaduan.index') }}"
            class="{{ request()->routeIs('pengaduan.*') ? 'active' : '' }}">
            <i class="bi bi-chat-square-text-fill"></i> Data Pengaduan
        </a>

        <a href="{{ route('tanggapan.index') }}"
            class="{{ request()->routeIs('tanggapan.*') ? 'active' : '' }}">
            <i class="bi bi-reply-all-fill"></i> Tanggapan
        </a>
    </aside>

    <!-- SIDEBAR MOBILE -->
    <div class="offcanvas offcanvas-start text-white"
        tabindex="-1" id="mobileSidebar"
        style="width: 270px; background: var(--navy);">

        <div class="offcanvas-header">
            <div class="brand mb-0 pb-0">
                <div class="brand-icon">
                    <i class="bi bi-buildings"></i>
                </div>
                LAYANAN PENGADUAN
            </div>
            <button type="button" class="btn-close btn-close-white"
                data-bs-dismiss="offcanvas"></button>
        </div>

        <div class="offcanvas-body pt-2">
            <div class="menu-label">MENU UTAMA</div>

            <a href="{{ route('dashboard') }}"
                class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">
                <i class="bi bi-grid-1x2-fill"></i> Dashboard
            </a>

            <a href="{{ route('kategori.index') }}"
                class="{{ request()->routeIs('kategori.*') ? 'active' : '' }}">
                <i class="bi bi-folder-fill"></i> Kategori Pengaduan
            </a>

            <a href="{{ route('warga.index') }}"
                class="{{ request()->routeIs('warga.*') ? 'active' : '' }}">
                <i class="bi bi-people-fill"></i> Data Warga
            </a>

            <a href="{{ route('pengaduan.index') }}"
                class="{{ request()->routeIs('pengaduan.*') ? 'active' : '' }}">
                <i class="bi bi-chat-square-text-fill"></i> Data Pengaduan
            </a>

            <a href="{{ route('tanggapan.index') }}"
                class="{{ request()->routeIs('tanggapan.*') ? 'active' : '' }}">
                <i class="bi bi-reply-all-fill"></i> Tanggapan
            </a>
        </div>
    </div>

    <!-- KONTEN UTAMA -->
    <main class="main">

        <header class="topbar">
            <div class="d-flex align-items-center gap-3">
                <button class="btn btn-light d-lg-none"
                    type="button"
                    data-bs-toggle="offcanvas"
                    data-bs-target="#mobileSidebar">
                    <i class="bi bi-list fs-4"></i>
                </button>

                <h5 class="page-heading">
                    @yield('page-title', 'Dashboard')
                </h5>
            </div>

            <div class="admin-profile">
                <div class="admin-icon">
                    <i class="bi bi-person-fill"></i>
                </div>
                <span>Admin</span>
            </div>
        </header>

        <section class="content">
            @yield('content')
        </section>

    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
