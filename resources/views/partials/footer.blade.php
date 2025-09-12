<footer class="bg-dark text-light py-5 mt-5">
    <div class="container">
        <div class="row g-4">
            {{-- Company Info --}}
            <div class="col-lg-4 col-md-6">
                <h5 class="mb-3">{{ config('app.name') }}</h5>
                <p class="mb-3">Kami adalah perusahaan teknologi yang berfokus pada solusi digital inovatif untuk kebutuhan bisnis Anda.</p>
                <div class="d-flex">
                    <a href="#" class="text-light me-3 fs-4"><i class="fab fa-facebook"></i></a>
                    <a href="#" class="text-light me-3 fs-4"><i class="fab fa-twitter"></i></a>
                    <a href="#" class="text-light me-3 fs-4"><i class="fab fa-instagram"></i></a>
                    <a href="#" class="text-light fs-4"><i class="fab fa-linkedin"></i></a>
                </div>
            </div>

            {{-- Quick Links --}}
            <div class="col-lg-2 col-md-6">
                <h5 class="mb-3">Link Cepat</h5>
                <ul class="list-unstyled">
                    <li class="mb-2"><a href="#services" class="text-light text-decoration-none">Layanan</a></li>
                    <li class="mb-2"><a href="#about" class="text-light text-decoration-none">Tentang</a></li>
                    <li class="mb-2"><a href="#posts" class="text-light text-decoration-none">Berita</a></li>
                    <li class="mb-2"><a href="#gallery" class="text-light text-decoration-none">Galeri</a></li>
                    <li class="mb-2"><a href="#contact" class="text-light text-decoration-none">Kontak</a></li>
                </ul>
            </div>

            {{-- Contact Info --}}
            <div class="col-lg-3 col-md-6">
                <h5 class="mb-3">Kontak Kami</h5>
                <ul class="list-unstyled">
                    <li class="mb-2"><i class="fas fa-map-marker-alt me-2"></i> Jl. Contoh No. 123, Jakarta</li>
                    <li class="mb-2"><i class="fas fa-phone me-2"></i> +62 123 456 7890</li>
                    <li class="mb-2"><i class="fas fa-envelope me-2"></i> info@company.com</li>
                    <li class="mb-2"><i class="fas fa-clock me-2"></i> Senin - Jumat: 09:00 - 17:00</li>
                </ul>
            </div>

            {{-- Contact Form --}}
            <div class="col-lg-3 col-md-6">
                <h5 class="mb-3">Kirim Pesan</h5>
                <form action="{{ route('contact.store') }}" method="post" class="small">
                    @csrf
                    <div class="mb-2">
                        <input type="text" name="name" class="form-control form-control-sm" placeholder="Nama" required>
                    </div>
                    <div class="mb-2">
                        <input type="email" name="email" class="form-control form-control-sm" placeholder="Email" required>
                    </div>
                    <div class="mb-2">
                        <textarea name="message" rows="3" class="form-control form-control-sm" placeholder="Pesan" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary btn-sm w-100">Kirim</button>
                </form>
            </div>
        </div>

        <hr class="my-4">

        <div class="row">
            <div class="col-md-6">
                <p class="mb-0">&copy; {{ date('Y') }} {{ config('app.name') }}. All rights reserved.</p>
            </div>
            <div class="col-md-6 text-md-end">
                <a href="#" class="text-light text-decoration-none me-3">Privacy Policy</a>
                <a href="#" class="text-light text-decoration-none">Terms of Service</a>
            </div>
        </div>
    </div>
</footer>
