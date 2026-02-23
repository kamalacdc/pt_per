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
                    <li><i class="fas fa-map-marker-alt me-2"></i> Jl.Hayam Wuruk. 87, Jombang</li>
                    <li><i class="fas fa-phone me-2"></i> +62 855 496 221</li>
                    <li><i class="fas fa-envelope me-2"></i> ptfadiriteknologi.com</li>
                    <li><i class="fas fa-clock me-2"></i> Senin - Jumat: 09:00 - 17:00</li>
                </ul>
            </div>

            {{-- Contact Form --}}
            <div class="col-lg-3 col-md-6">
                <h5>Lokasi Kantor</h5>
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d396.24495241133616!2d112.34305794330767!3d-7.560200503520255!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e1!3m2!1sen!2sid!4v1767080470778!5m2!1sen!2sid"
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
