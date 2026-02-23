<footer>
    <div class="container py-5">
        <div class="row g-4">
            {{-- Company Info --}}
            <div class="col-lg-4 col-md-6">
                <h5>{{ config('app.name') }}</h5>
                <p>Kami adalah perusahaan teknologi yang berfokus pada solusi digital inovatif untuk kebutuhan bisnis
                    Anda.</p>
                <div class="d-flex">
                    <a href="#" class="me-3 fs-4"><i class="fab fa-facebook"></i></a>
                    <a href="#" class="me-3 fs-4"><i class="fab fa-twitter"></i></a>
                    <a href="#" class="me-3 fs-4"><i class="fab fa-instagram"></i></a>
                    <a href="#" class="fs-4"><i class="fab fa-linkedin"></i></a>
                </div>
            </div>

            {{-- Quick Links --}}
            <div class="col-lg-2 col-md-6">
                <h5>Link Cepat</h5>
                <ul class="list-unstyled">
                    <li><a href="#services" class="text-decoration-none">Layanan</a></li>
                    <li><a href="#about" class="text-decoration-none">Tentang</a></li>
                    <li><a href="#posts" class="text-decoration-none">Berita</a></li>
                    <li><a href="#gallery" class="text-decoration-none">Galeri</a></li>
                    <li><a href="#contact" class="text-decoration-none">Kontak</a></li>
                </ul>
            </div>

            {{-- Contact Info --}}
            <div class="col-lg-3 col-md-6">
                <h5>Kontak Kami</h5>
                <ul class="list-unstyled">
                    <li><i class="fas fa-map-marker-alt me-2"></i> Jl. Guyangan 004/001 Betek Barat Kec. Mojoagung Kab. Jombang</li>
                    <li><i class="fas fa-envelope me-2"></i> PT.LANANGTEKNOLOGIGROUP</li>
                </ul>
            </div>

            {{-- Contact Form --}}
            <div class="col-lg-3 col-md-6">
                <h5>Lokasi Kantor</h5>
                <iframe
                    src="https://www.google.com/maps/place/F84W%2B4CG,+Jl.+Sayyid+Sulaiman,+Betek+Utara,+Betek,+Kec.+Mojoagung,+Kabupaten+Jombang,+Jawa+Timur+61482/@-7.5447439,112.3462508,21z/data=!4m6!3m5!1s0x2e786cbb4e8e4755:0xaf43fbd1d1b7ae13!8m2!3d-7.54471!4d112.3461874!16s%2Fg%2F11j0yk2sk6?entry=ttu&g_ep=EgoyMDI2MDIxOC4wIKXMDSoASAFQAw%3D%3D"
                    width="300" height="300" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>

        <hr class="my-4">

        <div class="row">
            <div class="col-md-6">
                <p>&copy; {{ date('Y') }} {{ config('app.name') }}. All rights reserved.</p>
            </div>
            <div class="col-md-6 text-md-end">
                <a href="#" class="text-decoration-none me-3">Privacy Policy</a>
                <a href="#" class="text-decoration-none">Terms of Service</a>
            </div>
        </div>
    </div>
</footer>
