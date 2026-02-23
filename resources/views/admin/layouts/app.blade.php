<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - @yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        .sidebar-collapsed { width: 60px !important; }
        .sidebar-collapsed .nav-link span { display: none; }
        .sidebar-collapsed h4 { display: none; }
        .sidebar-collapsed .btn-outline-light { font-size: 0.8rem; }
    </style>
</head>
<body class="d-flex">

    {{-- Sidebar --}}
    <div id="sidebar" class="bg-dark text-white p-3 vh-100" style="width: 220px; transition: width 0.3s;">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h4 class="text-center flex-grow-1">Admin Panel</h4>
            <button id="sidebarToggle" class="btn btn-sm btn-outline-light"><i class="bi bi-chevron-left"></i></button>
        </div>
        <hr>
        <ul class="nav flex-column">
            <li class="nav-item"><a href="{{ route('admin.dashboard') }}" class="nav-link text-white"><i class="bi bi-speedometer2"></i> <span>Dashboard</span></a></li>
        <ul class="nav drop-column">    
            <li class="nav-item"><a href="{{ route('admin.pelanggans.index') }}" class="nav-link text-white"><i class="bi bi-people"></i> <span>Data Pelanggan</span></a></li>
            <li class="nav-item"><a href="{{ route('admin.categories.index') }}" class="nav-link text-white"><i class="bi bi-tags"></i> <span>Kategori pesanan</span></a></li>
            <li class="nav-item"><a href="{{ route('admin.services.index') }}" class="nav-link text-white"><i class="bi bi-layers"></i> <span>Services</span></a></li>
            <li class="nav-item"><a href="{{ route('admin.carousel.index') }}" class="nav-link text-white"><i class="bi bi-images"></i> <span>Carousel</span></a></li>
            <li class="nav-item"><a href="{{ route('admin.partners.index') }}" class="nav-link text-white"><i class="bi bi-person"></i> <span>Partners</span></a></li>
            <li class="nav-item"><a href="{{ route('admin.testimonials.index') }}" class="nav-link text-white"><i class="bi bi-chat-quote"></i> <span>Testimonials</span></a></li>
            <li class="nav-item"><a href="{{ route('admin.gallery_items.index') }}" class="nav-link text-white"><i class="bi bi-collection"></i> <span>Gallery Items</span></a></li>
            <li class="nav-item"><a href="{{ route('admin.branches.index') }}" class="nav-link text-white"><i class="bi bi-geo-alt"></i> <span>Branches</span></a></li>
            <li class="nav-item"><a href="{{ route('admin.projects.index') }}" class="nav-link text-white"><i class="bi bi-briefcase"></i> <span>Projects</span></a></li>
            <li class="nav-item"><a href="{{ route('admin.pages.index') }}" class="nav-link text-white"><i class="bi bi-file-earmark-text"></i> <span>Tentang kami</span></a></li>
            <li class="nav-item"><a href="{{ route('admin.admins.index') }}" class="nav-link text-white"><i class="bi bi-person-badge"></i> <span>Admins</span></a></li>

            <li class="nav-item mt-3">
                <form method="POST" action="{{ route('admin.logout') }}">
                    @csrf
                    <button type="submit" class="btn btn"><i class="bi bi-box-arrow-right"></i> <span>Logout</span></button>
                </form>
            </li>
        </ul>
    </div>

    {{-- Main content --}}
    <div class="flex-grow-1 p-4">
         <div class="d-flex justify-content-between align-items-center mb-3">
           <h3>@yield('title')</h3>
           <a href="{{ route('admin.admins.create') }}" class="btn btn-primary">Buat Akun Admin</a>
    </div>
        <hr>
        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Sidebar toggle
        const sidebar = document.getElementById('sidebar');
        const sidebarToggle = document.getElementById('sidebarToggle');
        const chevronIcon = sidebarToggle.querySelector('i');

        sidebarToggle.addEventListener('click', function() {
            sidebar.classList.toggle('sidebar-collapsed');
            if (sidebar.classList.contains('sidebar-collapsed')) {
                chevronIcon.className = 'bi bi-chevron-right';
            } else {
                chevronIcon.className = 'bi bi-chevron-left';
            }
        });
    </script>
</body>
</html>
