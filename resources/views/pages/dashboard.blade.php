@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Dashboard'])
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-uppercase font-weight-bold">Today's Money</p>
                                    <h5 class="font-weight-bolder">
                                        Rp{{ number_format($uangHariIni, 0, ',', '.') }},-
                                    </h5>
                                    <p class="mb-0">
                                        @if ($persenHariIni < 0)
                                            <span
                                                class="text-danger text-sm font-weight-bolder">{{ $persenHariIni }}%</span>
                                            since yesterday
                                        @else
                                            <span
                                                class="text-success text-sm font-weight-bolder">{{ $persenHariIni }}%</span>
                                            since yesterday
                                        @endif
                                    </p>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="icon icon-shape bg-gradient-info shadow-info text-center rounded-circle">
                                    <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-uppercase font-weight-bold">Weekly money</p>
                                    <h5 class="font-weight-bolder">
                                        Rp{{ number_format($uangMingguIni, 0, ',', '.') }},-
                                    </h5>
                                    <p class="mb-0">
                                        @if ($persenMingguIni < 0)
                                            <span
                                                class="text-danger text-sm font-weight-bolder">{{ $persenMingguIni }}%</span>
                                            since last week
                                        @else
                                            <span
                                                class="text-success text-sm font-weight-bolder">{{ $persenMingguIni }}%</span>
                                            since last week
                                        @endif
                                    </p>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="icon icon-shape bg-gradient-danger shadow-danger text-center rounded-circle">
                                    <i class="ni ni-world text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-uppercase font-weight-bold">Monthly money</p>
                                    <h5 class="font-weight-bolder">
                                        Rp{{ number_format($uangBulanIni, 0, ',', '.') }},-
                                    </h5>
                                    <p class="mb-0">
                                        @if ($persenBulanIni < 0)
                                            <span
                                                class="text-danger text-sm font-weight-bolder">{{ $persenBulanIni }}%</span>
                                            since last month
                                        @else
                                            <span
                                                class="text-success text-sm font-weight-bolder">{{ $persenBulanIni }}%</span>
                                            since last month
                                        @endif

                                    </p>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="icon icon-shape bg-gradient-warning shadow-warning text-center rounded-circle">
                                    <i class="ni ni-cart text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-uppercase font-weight-bold">New Clients</p>
                                    <h5 class="font-weight-bolder">
                                        +{{ $userBaru }}
                                    </h5>
                                    <p class="mb-0">
                                        @if ($persenUserBaru < 0)
                                            <span
                                                class="text-danger text-sm font-weight-bolder">{{ $persenUserBaru }}%</span>
                                            since last month
                                        @else
                                            <span
                                                class="text-success text-sm font-weight-bolder">{{ $persenUserBaru }}%</span>
                                            since last month
                                        @endif
                                    </p>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="icon icon-shape bg-gradient-success shadow-success text-center rounded-circle">
                                    <i class="ni ni-paper-diploma text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-lg-7 mb-lg-0 mb-4">
                <div class="card z-index-2 h-100">
                    <div class="card-header pb-0 pt-3 bg-transparent">
                        <h6 class="text-capitalize">Grafik Penjualan Buku</h6>
                        <p class="text-sm mb-0">
                            <i class="fa fa-arrow-up text-success"></i>
                            <span class="font-weight-bold">{{ $persenGrafikTahunIni }}% more</span> in {{ $tahunLalu }}
                        </p>
                    </div>
                    <div class="card-body p-3">
                        <div class="chart">
                            <canvas id="chart-line" class="chart-canvas" height="300"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="card card-carousel overflow-hidden h-100 p-0">
                    <div id="carouselExampleCaptions" class="carousel slide h-100" data-bs-ride="carousel">
                        <div class="carousel-inner border-radius-lg h-100">
                            <div class="carousel-item h-100 active"
                                style="background-image: url('http://galerifdsk.mercubuana.ac.id/wp-content/uploads/2021/06/pendukung6-1280x720.jpg');
            background-size: cover;">
                                <div class="carousel-caption d-none d-md-block bottom-0 text-start start-0 ms-5">
                                    <h5 class="text-white mb-1">Buku adalah teman baik</h5>
                                    <p>Buku adalah teman yang berharga. Namun, sulit untuk menjelaskan hal itu kepada yang tak suka membaca.</p>
                                </div>
                            </div>
                            <div class="carousel-item h-100"
                                style="background-image: url('http://galerifdsk.mercubuana.ac.id/wp-content/uploads/2020/07/2-20.jpg');
            background-size: cover;">
                                <div class="carousel-caption d-none d-md-block bottom-0 text-start start-0 ms-5">
                                    <h5 class="text-white mb-1">Buku adalah sumber ilmu</h5>
                                    <p>Mari ambil buku dan pena kita, itu adalah senjata paling ampuh.</p>
                                </div>
                            </div>
                            <div class="carousel-item h-100"
                                style="background-image: url('http://galerifdsk.mercubuana.ac.id/wp-content/uploads/2021/07/isi-buku3-scaled.jpg');
            background-size: cover;">
                                <div class="carousel-caption d-none d-md-block bottom-0 text-start start-0 ms-5">
                                    <h5 class="text-white mb-1">Buku adalah teman berharga</h5>
                                    <p>Pada malam tanpa bulan yang sunyi, aku tidak merasa kesepian! Aku memiliki teman-teman terbaik - buku-bukuku yang menemaniku</p>
                                </div>
                            </div>
                        </div>
                        <button class="carousel-control-prev w-5 me-3" type="button"
                            data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next w-5 me-3" type="button"
                            data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script src="./assets/js/plugins/chartjs.min.js"></script>
    <script>
        var ctx1 = document.getElementById("chart-line").getContext("2d");

        var gradientStroke1 = ctx1.createLinearGradient(0, 230, 0, 50);

        gradientStroke1.addColorStop(1, 'rgb(17,205,239, 0.2)');
        gradientStroke1.addColorStop(0.2, 'rgb(17,205,239, 0.0)');
        gradientStroke1.addColorStop(0, 'rgb(17,205,239, 0)');
        new Chart(ctx1, {
            type: "line",
            data: {
                labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
                datasets: [{
                    label: "Penjualan Buku",
                    tension: 0.4,
                    borderWidth: 0,
                    pointRadius: 0,
                    borderColor: "#11cdef",
                    backgroundColor: gradientStroke1,
                    borderWidth: 3,
                    fill: true,
                    data: [{{ $Jan }}, {{ $Feb }}, {{ $Mar }}, {{ $Apr }}, {{ $May }}, {{ $Jun }}, {{ $Jul }}, {{ $Aug }}, {{ $Sep }}, {{ $Oct }}, {{ $Nov }}, {{ $Dec }}],
                    maxBarThickness: 6

                }],
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false,
                    }
                },
                interaction: {
                    intersect: false,
                    mode: 'index',
                },
                scales: {
                    y: {
                        grid: {
                            drawBorder: false,
                            display: true,
                            drawOnChartArea: true,
                            drawTicks: false,
                            borderDash: [5, 5]
                        },
                        ticks: {
                            display: true,
                            padding: 10,
                            color: '#fbfbfb',
                            font: {
                                size: 11,
                                family: "Open Sans",
                                style: 'normal',
                                lineHeight: 2
                            },
                        }
                    },
                    x: {
                        grid: {
                            drawBorder: false,
                            display: false,
                            drawOnChartArea: false,
                            drawTicks: false,
                            borderDash: [5, 5]
                        },
                        ticks: {
                            display: true,
                            color: '#ccc',
                            padding: 20,
                            font: {
                                size: 11,
                                family: "Open Sans",
                                style: 'normal',
                                lineHeight: 2
                            },
                        }
                    },
                },
            },
        });
    </script>
@endpush
