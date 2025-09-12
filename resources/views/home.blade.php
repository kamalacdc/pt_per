@extends('layouts.app')

@section('content')
    {{-- ================= HERO CAROUSEL ================= --}}
    <div id="heroCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            @forelse($slides as $index => $slide)
                <div class="carousel-item @if ($index === 0) active @endif">
                    <img src="{{ asset('storage/carousel/' . $slide->filename) }}" class="d-block w-100" alt="Slide {{ $index + 1 }}">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>{{ $slide->title ?? '' }}</h5>
                        <p>{{ $slide->description ?? '' }}</p>
                    </div>
                </div>
            @empty
                <div class="carousel-item active">
                    <img src="https://via.placeholder.com/1600x500?text=No+Slides" class="d-block w-100"
                        alt="default slide">
                </div>
            @endforelse
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon"></span>
        </button>
    </div>

    {{-- ================= SERVICES ================= --}}
    <section id="services" class="py-5 container">
        <h2 class="mb-4 text-center">Layanan Kami</h2>
        <div class="row g-4">
            @foreach ($services as $service)
                <div class="col-md-3">
                    <div class="card h-100 text-center">
                        <img src="{{ asset('storage/' . $service->image) }}" class="card-img-top mx-auto" style="width:80px"
                            alt="{{ $service->title }}">

                        <div class="card-body">
                            <h5>{{ $service->title }}</h5>
                            <p>{{ $service->excerpt }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

    {{-- ================= ABOUT ================= --}}
    @if ($about)
        <section id="about" class="py-5 bg-light">
            <div class="container text-center">
                <h2>Tentang Kami</h2>
                <p class="lead">{!! $about->content !!}</p>
            </div>
        </section>
    @endif

    {{-- ================= PARTNERS ================= --}}
    <section id="partners" class="py-5 container">
        <h2 class="mb-4 text-center">Partner Kami</h2>
        <div class="row g-4 text-center">
            @foreach ($partners as $partner)
                <div class="col-6 col-md-2">
                    <img src="{{ asset('storage/' . $partner->logo) }}" class="img-fluid" alt="{{ $partner->name }}">
                </div>
            @endforeach
        </div>
    </section>

    {{-- ================= TESTIMONIALS ================= --}}
    <section id="testimonials" class="py-5 bg-light">
        <div class="container">
            <h2 class="mb-4 text-center">Testimoni</h2>
            <div class="row g-4">
                @foreach ($testimonials as $testimonial)
                    <div class="col-md-4">
                        <div class="card h-100">
                            <div class="card-body">
                                <p>"{{ $testimonial->content }}"</p>
                                <h6 class="mt-3">- {{ $testimonial->author }}</h6>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- ================= POSTS ================= --}}
    <section id="posts" class="py-5 container">
        <h2 class="mb-4 text-center">Artikel Terbaru</h2>
        <div class="row g-4">
            @foreach ($posts as $post)
                <div class="col-md-4">
                    <div class="card h-100">
                        @if ($post->image)
                            <img src="{{ asset('storage/' . $post->image) }}" class="card-img-top"
                                alt="{{ $post->title }}">
                        @endif
                        <div class="card-body">
                            <h5>{{ $post->title }}</h5>
                            <p>{{ $post->excerpt }}</p>
                            <a href="{{ route('posts.show', $post->slug) }}" class="btn btn-outline-primary">Baca</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

    {{-- ================= GALLERY ================= --}}
    <section id="gallery" class="py-5 bg-light">
        <div class="container">
            <h2 class="mb-4 text-center">Galeri</h2>
            <div class="row g-3">
                @foreach ($galleryGroups as $category => $items)
                    <h5 class="mt-4">{{ ucfirst($category) }}</h5>
                    @foreach ($items as $item)
                        <div class="col-md-3">
                            <img src="{{ asset('storage/' . $item->image) }}" class="img-fluid rounded shadow-sm"
                                alt="{{ $item->title }}">
                        </div>
                    @endforeach
                @endforeach
            </div>
        </div>
    </section>

    {{-- ================= BRANCHES ================= --}}
    <section id="branches" class="py-5 container">
        <h2 class="mb-4 text-center">Cabang Kami</h2>
        <div class="row g-4">
            @foreach ($branches as $branch)
                <div class="col-md-3">
                    <div class="card h-100 text-center">
                        <div class="card-body">
                            <h5>{{ $branch->name }}</h5>
                            <p>{{ $branch->address }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

    {{-- ================= PROJECTS ================= --}}
    <section id="projects" class="py-5 bg-light">
        <div class="container">
            <h2 class="mb-4 text-center">Proyek Terbaru</h2>
            <div class="row g-4">
                @foreach ($projects as $project)
                    <div class="col-md-4">
                        <div class="card h-100">
                            @if ($project->image)
                                <img src="{{ asset('storage/' . $project->image) }}" class="card-img-top"
                                    alt="{{ $project->title }}">
                            @endif
                            <div class="card-body">
                                <h5>{{ $project->title }}</h5>
                                <p>{{ Str::limit($project->description, 100) }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

@endsection
