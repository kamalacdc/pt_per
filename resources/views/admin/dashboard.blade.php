@extends('admin.layouts.app')

@section('title', 'Dashboard')

@section('content')
    <h1>Selamat datang di Dashboard Admin</h1>

    <div class="row">
        <div class="col-md-3">
            <div class="card text-white bg-primary mb-3">
                <div class="card-header">Carousel</div>
                <div class="card-body">
                    <h5 class="card-title">{{ $data['carousel_count'] ?? 0 }}</h5>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-white bg-secondary mb-3">
                <div class="card-header">Services</div>
                <div class="card-body">
                    <h5 class="card-title">{{ $data['service_count'] ?? 0 }}</h5>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-white bg-success mb-3">
                <div class="card-header">Partners</div>
                <div class="card-body">
                    <h5 class="card-title">{{ $data['partner_count'] ?? 0 }}</h5>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-white bg-danger mb-3">
                <div class="card-header">Testimonials</div>
                <div class="card-body">
                    <h5 class="card-title">{{ $data['testimonial_count'] ?? 0 }}</h5>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-3">
            <div class="card text-white bg-warning mb-3">
                <div class="card-header">Posts</div>
                <div class="card-body">
                    <h5 class="card-title">{{ $data['post_count'] ?? 0 }}</h5>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-white bg-info mb-3">
                <div class="card-header">Gallery Items</div>
                <div class="card-body">
                    <h5 class="card-title">{{ $data['gallery_item_count'] ?? 0 }}</h5>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-white bg-dark mb-3">
                <div class="card-header">Branches</div>
                <div class="card-body">
                    <h5 class="card-title">{{ $data['branch_count'] ?? 0 }}</h5>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-white bg-secondary mb-3">
                <div class="card-header">Projects</div>
                <div class="card-body">
                    <h5 class="card-title">{{ $data['project_count'] ?? 0 }}</h5>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-3">
            <div class="card text-white bg-primary mb-3">
                <div class="card-header">Pages</div>
                <div class="card-body">
                    <h5 class="card-title">{{ $data['page_count'] ?? 0 }}</h5>
                </div>
            </div>
        </div>
    </div>
@endsection
