<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - @yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body class="d-flex">

    {{-- Sidebar --}}
    <div class="bg-dark text-white p-3 vh-100" style="width: 220px;">
        <h4 class="text-center">Admin Panel</h4>
        <hr>
        <ul class="nav flex-column">
            <li class="nav-item"><a href="{{ route('admin.dashboard') }}" class="nav-link text-white"><i class="bi bi-speedometer2"></i> Dashboard</a></li>
            <li class="nav-item"><a href="{{ route('admin.services.index') }}" class="nav-link text-white"><i class="bi bi-layers"></i> Services</a></li>
            <li class="nav-item"><a href="{{ route('admin.carousel.index') }}" class="nav-link text-white"><i class="bi bi-images"></i> Carousel</a></li>
            <li class="nav-item"><a href="{{ route('admin.partners.index') }}" class="nav-link text-white"><i class="bi bi-handshake"></i> Partners</a></li>
            <li class="nav-item"><a href="{{ route('admin.testimonials.index') }}" class="nav-link text-white"><i class="bi bi-chat-quote"></i> Testimonials</a></li>
            <li class="nav-item"><a href="{{ route('admin.posts.index') }}" class="nav-link text-white"><i class="bi bi-file-post"></i> Posts</a></li>
            <li class="nav-item"><a href="{{ route('admin.gallery_items.index') }}" class="nav-link text-white"><i class="bi bi-collection"></i> Gallery Items</a></li>
            <li class="nav-item"><a href="{{ route('admin.branches.index') }}" class="nav-link text-white"><i class="bi bi-geo-alt"></i> Branches</a></li>
            <li class="nav-item"><a href="{{ route('admin.projects.index') }}" class="nav-link text-white"><i class="bi bi-briefcase"></i> Projects</a></li>
            <li class="nav-item"><a href="{{ route('admin.pages.index') }}" class="nav-link text-white"><i class="bi bi-file-earmark-text"></i> Pages</a></li>
            <li class="nav-item"><a href="#" class="nav-link text-white"><i class="bi bi-gear"></i> Settings</a></li>
            <li class="nav-item"><a href="#" class="nav-link text-white"><i class="bi bi-people"></i> Users</a></li>

            <li class="nav-item mt-3">
                <form method="POST" action="{{ route('admin.logout') }}">
                    @csrf
                    <button type="submit" class="btn btn-outline-light w-100"><i class="bi bi-box-arrow-right"></i> Logout</button>
                </form>
            </li>
        </ul>
    </div>

    {{-- Main content --}}
    <div class="flex-grow-1 p-4">
        <h3>@yield('title')</h3>
        <hr>
        @yield('content')
    </div>

</body>
</html>
