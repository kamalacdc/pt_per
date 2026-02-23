<header>


    <nav class="navbar navbar-expand-lg navbar-light fixed-top shadow-sm bg-white">
        <div class="container">
            {{-- Logo --}}
            <a class="navbar-brand d-flex align-items-center" href="{{ url('/') }}">
                <img src="{{ asset('images/LOGO LANANG KIRI.png') }}" alt="Logo" height="50" class="me-2">
                {{-- <span class="fw-bold text-primary d-none d-lg-block">PT.SolusiTek Info</span> --}}
            </a>
            <div class="container d-flex justify-content-between align-items-center py-1">

                <div class="contact-info text-dark small d-none d-lg-flex">
                    <i class="fas fa-envelope me-2"></i> 
                    <span class="mx-3">|</span>
                    <i class="fas fa-phone me-2"></i> ()
                </div>

                {{-- Toggler (mobile) --}}
                <button class="navbar-toggler border-0 ms-auto" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarMain" aria-controls="navbarMain" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

            {{-- Menu --}}
            <div class="collapse navbar-collapse" id="navbarMain">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0 fw-semibold">
                    <li class="nav-item">
                        <a class="nav-link"
                            href="{{ url('/') }}">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#about">Tentang kami</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#services">Layanan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#partners">Partner</a>
                    </li>
                    {{-- <li class="nav-item">
                        <a class="nav-link" href="#posts">Berita</a>
                    </li> --}}
                    <li class="nav-item">
                        <a class="nav-link" href="#testimonials">Testimoni</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#gallery">Galeri</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link"
                            href="https://wa.me/6281515127572?text=Hai,%20saya%20ingin%20konsultasi">WhatsApp</a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-primary ms-3" href="{{ route('admin.login') }}">Login</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>
