@extends('admin.layouts.app')

@section('title', 'Dashboard')

@section('content')

{{-- {{ dd($chartLabels, $chartData) }} --}}

    <h1>Selamat datang di Dashboard Admin</h1>

    <div class="row mb-4">
        <div class="col-md-12">
            <form method="GET" class="row mb-3 align-items-end">
                <div class="col-md-3">
                    <label class="form-label">Bulan</label>
                    <select name="month" class="form-select">

                        <option value="all" {{ $month === 'all' ? 'selected' : '' }}>
                            All Data
                        </option>

                        @foreach (range(1,12) as $m)
                            <option value="{{ $m }}" {{ (string) $month === (string) $m ? 'selected' : '' }}>
                                {{ \Carbon\Carbon::create()->month($m)->translatedFormat('F') }}
                            </option>
                        @endforeach

                    </select>
                </div>


                <div class="col-md-3">
                    <label class="form-label">Tahun</label>
                    <select name="year" class="form-select">
                        @foreach (range(now()->year - 5, now()->year) as $y)
                            <option value="{{ $y }}" {{ $year == $y ? 'selected' : '' }}>
                                {{ $y }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-2">
                    <button class="btn btn-primary w-100">
                        Filter
                    </button>
                </div>
            </form>

            <div class="card">
                <div class="card-header">
                    <strong>Jumlah Pelanggan per Category</strong>
                </div>
                <div class="card-body" style="height:350px;">
                    @if ($chartData->sum() > 0)
                        <canvas id="pelangganChart"></canvas>
                    @else
                        <p class="text-muted mb-0">
                            Belum ada data pelanggan
                        </p>
                    @endif
                </div>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-md-3">
            <div class="card text-white bg-primary mb-3">
                <div class="card-header">Carousel</div>
                <div class="card-body">
                    <h5 class="card-title">{{ $carouselCount }}</h5>
                    @if ($carouselCount == 0)
                        <small class="text-light opacity-75">
                            Belum ada data
                        </small>
                    @endif
                </div>
                
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-white bg-secondary mb-3">
                <div class="card-header">Services</div>
                <div class="card-body">
                    <h5 class="card-title">{{ $serviceCount }}</h5>
                    @if ($serviceCount == 0)
                        <small class="text-light opacity-75">
                            Belum ada data
                        </small>
                    @endif
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-white bg-success mb-3">
                <div class="card-header">Partners</div>
                <div class="card-body">
                    <h5 class="card-title">{{ $partnerCount }}</h5>
                    @if ($partnerCount == 0)
                        <small class="text-light opacity-75">
                            Belum ada data
                        </small>
                    @endif
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-white bg-danger mb-3">
                <div class="card-header">Testimonials</div>
                <div class="card-body">
                    <h5 class="card-title">{{ $testimonialCount }}</h5>
                    @if ($testimonialCount == 0)
                        <small class="text-light opacity-75">
                            Belum ada data
                        </small>
                    @endif
                </div>
            </div>
        </div>
    </div>

    {{-- <div class="row">
        <div class="col-md-3">
            <div class="card text-white bg-warning mb-3">
                <div class="card-header">Posts</div>
                <div class="card-body">
                    <h5 class="card-title">{{ $postCount }}</h5>
                     @if ($postCount == 0)
                        <small class="text-light opacity-75">
                            Belum ada data
                        </small>
                    @endif
                </div>
            </div>
        </div> --}}
        <div class="col-md-3">
            <div class="card text-white bg-info mb-3">
                <div class="card-header">Gallery Items</div>
                <div class="card-body">
                    <h5 class="card-title">{{ $galleryItemCount }}</h5>
                     @if ($galleryItemCount == 0)
                        <small class="text-light opacity-75">
                            Belum ada data
                        </small>
                    @endif
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-white bg-dark mb-3">
                <div class="card-header">Branches</div>
                <div class="card-body">
                    <h5 class="card-title">{{ $branchCount }}</h5>
                     @if ($branchCount == 0)
                        <small class="text-light opacity-75">
                            Belum ada data
                        </small>
                    @endif
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-white bg-secondary mb-3">
                <div class="card-header">Projects</div>
                <div class="card-body">
                    <h5 class="card-title">{{ $projectCount }}</h5>
                     @if ($projectCount == 0)
                        <small class="text-light opacity-75">
                            Belum ada data
                        </small>
                    @endif
                </div>
            </div>
        </div>
    </div>

    {{-- <div class="row">
        <div class="col-md-3">
            <div class="card text-white bg-primary mb-3">
                <div class="card-header">Pages</div>
                <div class="card-body">
                    <h5 class="card-title">{{ $pageCount }}</h5>
                     @if ($pageCount == 0)
                        <small class="text-light opacity-75">
                            Belum ada data
                        </small>
                    @endif
                </div>
            </div>
        </div>
    </div> --}}
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.1/dist/chart.umd.min.js"></script>

<script>
document.addEventListener('DOMContentLoaded', function () {

    const canvas = document.getElementById('pelangganChart');
    if (!canvas) return;

    const labels = {!! json_encode($chartLabels->values()) !!};
    const dataValues = {!! json_encode($chartData->values()) !!};

    const colors = [
        '#4e73df',
        '#1cc88a',
        '#36b9cc',
        '#f6c23e',
        '#e74a3b',
        '#858796',
        '#20c997'
    ];

    new Chart(canvas, {
        type: 'bar',
        data: {
            labels: labels,
            datasets: [{
                label: 'Jumlah Pelanggan',
                data: dataValues,
                backgroundColor: labels.map((_, i) => colors[i % colors.length]),
                borderRadius: 8,
                borderSkipped: false,
                maxBarThickness: 50
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,

            plugins: {
                legend: {
                    display: false
                },
                tooltip: {
                    backgroundColor: '#212529',
                    titleColor: '#fff',
                    bodyColor: '#f8f9fa',
                    padding: 12,
                    cornerRadius: 6,
                    callbacks: {
                        label: function(context) {
                            return ` ${context.raw} pelanggan`;
                        }
                    }
                }
            },

            scales: {
                x: {
                    grid: {
                        display: false
                    },
                    ticks: {
                        color: '#6c757d',
                        font: {
                            size: 12,
                            weight: '500'
                        }
                    }
                },
                y: {
                    beginAtZero: true,
                    grid: {
                        color: '#f1f3f5'
                    },
                    ticks: {
                        precision: 0,
                        color: '#6c757d'
                    }
                }
            }
        }
    });
});
</script>

@endpush
