<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm fixed-top">
        <div class="container">
            {{-- Logo --}}
            <a class="navbar-brand fw-bold text-primary" href="{{ url('/') }}">
                <img src="{{ asset('images/mlbb.png') }}" alt="Logo" height="80">
            </a>

            {{-- Toggler (mobile) --}}
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMain" aria-controls="navbarMain" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            {{-- Menu --}}
            <div class="collapse navbar-collapse" id="navbarMain">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('/') ? 'active' : '' }}" href="{{ url('/') }}">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('galeri*') ? 'active' : '' }}" href="{{ route('galeri.index') }}">Galeri</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('services*') ? 'active' : '' }}" href="{{ route('services.index') }}">Layanan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('posts*') ? 'active' : '' }}" href="{{ route('posts.index') }}">Berita</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('testimoni*') ? 'active' : '' }}" href="{{ route('testimoni.index') }}">testimoni</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('contact*') ? 'active' : '' }}" href="{{ route('contact.create') }}">Kontak</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>
