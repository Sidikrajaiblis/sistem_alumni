@extends('layouts.admin')

@section('content')
<main class="main-wrapper">
    <div class="main-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Dashboard</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Analysis</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!--end breadcrumb-->

        <div class="row">
            <div class="col-xxl-8 d-flex align-items-stretch">
                <div class="card w-100 overflow-hidden rounded-4">
                    <div class="card-body position-relative p-4">
                        <div class="row">
                            <div class="col-12 col-sm-7">
                                <div class="d-flex align-items-center gap-3 mb-5">
                                    <img src="{{ asset('storage/' . Auth::user()->foto) }}" class="rounded-circle bg-grd-info p-1" width="60" height="60" alt="user">
                                    <div class="">
                                        <p class="mb-0 fw-semibold">Welcome back</p>
                                        <h4 class="fw-semibold mb-0 fs-4 mb-0">{{ Auth::user()->name }}</h4>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center gap-5">
                                    <div class="">
                                        <p class="mb-3">Total Moderator</p>
                                        <h4 class="mb-1 fw-semibold d-flex align-content-center">{{ \App\Models\User::where('role', 'moderator')->count() }}<i class="ti ti-arrow-up-right fs-5 lh-base text-success"></i>
                                        </h4>
                                    </div>
                                    <div class="vr"></div>
                                    <div class="">
                                        <p class="mb-3">Total User</p>
                                        <h4 class="mb-1 fw-semibold d-flex align-content-center">{{ \App\Models\User::where('role', 'user')->count() }}<i class="ti ti-arrow-up-right fs-5 lh-base text-success"></i>
                                        </h4>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-5">
                                <div class="welcome-back-img pt-4">
                                    <img src="{{ asset('admin/images/gallery/welcome-back-3.png') }}" height="180" alt="">
                                </div>
                            </div>
                        </div><!--end row-->
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-xxl-4 d-flex align-items-stretch">
                <div class="card w-100 rounded-4">
                    <div class="card-body">
                        <div class="text-center">
                            <h6 class="mb-0">Jumlah Loker per Kategori</h6>
                        </div>
                        <div class="mt-4" id="chartLokerKategori"></div>
                    </div>
                </div>
            </div>

            <div class="col-xl-6 col-xxl-4 d-flex align-items-stretch">
                <div class="card w-100 rounded-4">
                    <div class="card-body">
                        <div class="text-center">
                            <h6 class="mb-0">Jumlah Forum per Kategori</h6>
                        </div>
                        <div class="mt-4" id="chartForumKategori"></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-xxl-4 d-flex align-items-stretch">
                <div class="card w-100 rounded-4">
                    <div class="card-header border-0 p-3 border-bottom">
                        <div class="d-flex align-items-start justify-content-between">
                            <div class="">
                                <h5 class="mb-0">Data User</h5>
                            </div>
                        </div>
                    </div>
                    <div class="card-body p-0">
                        <div class="user-list p-3">
                            <div class="d-flex flex-column gap-3">
                                @foreach ($users as $user)
                                <div class="d-flex align-items-center gap-3">
                                    <img src="{{ asset('storage/' . $user->foto) }}" width="45" height="45" class="rounded-circle" alt="">
                                    <div class="flex-grow-1">
                                        <h6 class="mb-0">{{ $user->name }}</h6>
                                        <p class="mb-0">{{ $user->email }}</p>
                                        <small class="text-muted">Role: {{ ucfirst($user->role) }}</small>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 col-xxl-8 d-flex align-items-stretch">
                <div class="card w-100 rounded-4">
                    <div class="card-body">
                        <div class="d-flex align-items-start justify-content-between mb-3">
                            <div class="">
                                <h5 class="mb-0">Recent Orders</h5>
                            </div>
                            <div class="dropdown">
                                <a href="javascript:;" class="dropdown-toggle-nocaret options dropdown-toggle"
                                    data-bs-toggle="dropdown">
                                    <span class="material-icons-outlined fs-5">more_vert</span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="javascript:;">Action</a></li>
                                    <li><a class="dropdown-item" href="javascript:;">Another action</a></li>
                                    <li><a class="dropdown-item" href="javascript:;">Something else here</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="order-search position-relative my-3">
                            <input class="form-control rounded-5 px-5" type="text" placeholder="Search">
                            <span class="material-icons-outlined position-absolute ms-3 translate-middle-y start-0 top-50">search</span>
                        </div>
                        <div class="table-responsive">
                            <table class="table align-middle">
                                <thead>
                                    <tr>
                                        <th>Item Name</th>
                                        <th>Amount</th>
                                        <th>Vendor</th>
                                        <th>Status</th>
                                        <th>Rating</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center gap-3">
                                                <div class="">
                                                    <img src="{{ asset('admin/images/top-products/01.png') }}" class="rounded-circle" width="50" height="50" alt="">
                                                </div>
                                                <p class="mb-0">Sports Shoes</p>
                                            </div>
                                        </td>
                                        <td>$149</td>
                                        <td>Julia Sunota</td>
                                        <td>
                                            <p class="dash-lable mb-0 bg-success bg-opacity-10 text-success rounded-2">Completed</p>
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center gap-1">
                                                <p class="mb-0">5.0</p>
                                                <i class="material-icons-outlined text-warning fs-6">star</i>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center gap-3">
                                                <div class="">
                                                    <img src="{{ asset('admin/images/top-products/02.png') }}" class="rounded-circle" width="50" height="50" alt="">
                                                </div>
                                                <p class="mb-0">Goldan Watch</p>
                                            </div>
                                        </td>
                                        <td>$168</td>
                                        <td>Julia Sunota</td>
                                        <td>
                                            <p class="dash-lable mb-0 bg-success bg-opacity-10 text-success rounded-2">Completed</p>
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center gap-1">
                                                <p class="mb-0">5.0</p>
                                                <i class="material-icons-outlined text-warning fs-6">star</i>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center gap-3">
                                                <div class="">
                                                    <img src="{{ asset('admin/images/top-products/03.png') }}" class="rounded-circle" width="50" height="50" alt="">
                                                </div>
                                                <p class="mb-0">Men Polo Tshirt</p>
                                            </div>
                                        </td>
                                        <td>$124</td>
                                        <td>Julia Sunota</td>
                                        <td>
                                            <p class="dash-lable mb-0 bg-warning bg-opacity-10 text-warning rounded-2">Pending</p>
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center gap-1">
                                                <p class="mb-0">4.0</p>
                                                <i class="material-icons-outlined text-warning fs-6">star</i>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center gap-3">
                                                <div class="">
                                                    <img src="{{ asset('admin/images/top-products/04.png') }}" class="rounded-circle" width="50" height="50" alt="">
                                                </div>
                                                <p class="mb-0">Blue Jeans Casual</p>
                                            </div>
                                        </td>
                                        <td>$289</td>
                                        <td>Julia Sunota</td>
                                        <td>
                                            <p class="dash-lable mb-0 bg-success bg-opacity-10 text-success rounded-2">Completed</p>
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center gap-1">
                                                <p class="mb-0">3.0</p>
                                                <i class="material-icons-outlined text-warning fs-6">star</i>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center gap-3">
                                                <div class="">
                                                    <img src="{{ asset('admin/images/top-products/06.png') }}" class="rounded-circle" width="50" height="50" alt="">
                                                </div>
                                                <p class="mb-0">Fancy Shirts</p>
                                            </div>
                                        </td>
                                        <td>$389</td>
                                        <td>Julia Sunota</td>
                                        <td>
                                            <p class="dash-lable mb-0 bg-danger bg-opacity-10 text-danger rounded-2">Canceled</p>
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center gap-1">
                                                <p class="mb-0">2.0</p>
                                                <i class="material-icons-outlined text-warning fs-6">star</i>
                                            </div>
                                        </td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Chart Loker
        var chartLoker = new ApexCharts(document.querySelector("#chartLokerKategori"), {
            chart: {
                type: 'bar',
                height: 250
            },
            series: [{
                name: 'Jumlah Loker',
                data: @json($jumlahLoker)
            }],
            xaxis: {
                categories: @json($kategoriLoker)
            },
            colors: ['#00c6ff'],
            plotOptions: {
                bar: {
                    borderRadius: 6,
                    columnWidth: '40%'
                }
            }
        });
        chartLoker.render();

        // Chart Forum
        var chartForum = new ApexCharts(document.querySelector("#chartForumKategori"), {
            chart: {
                type: 'bar',
                height: 250
            },
            series: [{
                name: 'Jumlah Forum',
                data: @json($jumlahForum)
            }],
            xaxis: {
                categories: @json($kategoriForum)
            },
            colors: ['#4e73df'],
            plotOptions: {
                bar: {
                    borderRadius: 6,
                    columnWidth: '40%'
                }
            }
        });
        chartForum.render();
    });
</script>

@endsection