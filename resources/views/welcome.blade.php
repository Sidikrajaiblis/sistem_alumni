@extends('layouts.app')
@section('content')
    <!--start main wrapper-->
            <!--start banner-->
            <section class="py-5" id="home">
                <div class="container py-4 px-4 px-lg-0">
                    <div class="row align-items-center justify-content-center g-4">
                        <div class="col-12 col-xl-6 order-xl-first order-last">
                            <h1 class="fw-bold mb-3 banner-heading">Selamat Datang di Sistem Informasi Alumni.</h1>
                            <h5 class="mb-0 banner-paragraph">Menghubungkan alumni dengan almamater dan sesama alumni dalam satu platform terpadu.</h5>
                            <div class="d-flex flex-column flex-lg-row align-items-center gap-3 mt-5">
                                <a href="javascript:;"
                                    class="btn btn-lg btn-grd btn-grd-primary d-flex align-items-center rounded-5 gap-2 raised">
                                    <i class="material-icons-outlined">speed</i>Get Started
                                </a>
                            </div>
                        </div>
                        <div class="col-12 col-xl-6 text-center">
                            <img src="{{ asset('user/images/banners/graduation.jpeg') }}" class="img-fluid" width="560" alt="">
                        </div>
                    </div><!--end row-->
                </div>
            </section>
            <!--end banner-->


            <!--start about us-->
            <section class="py-5 bg-section" id="About">
                <div class="container py-4 px-4 px-lg-0">
                    <div class="section-title text-center mb-5">
                        <h1 class="mb-0 section-title-name">Tentang Kami</h1>
                    </div>
                    <div class="row g-4">
                        <div class="col-12 col-xl-6">
                            <h6 class="text-uppercase mb-3">Siapa Kami</h6>
                            <h2 class="mb-3"> Menghubungkan Alumni Melalui Teknologi dan Kolaborasi..</h2>
                            <p class="mb-3">
                                Sistem Informasi Alumni adalah platform digital yang dirancang untuk mempererat hubungan antara alumni dengan almamater, serta membuka ruang kolaborasi dan kesempatan kerja antar sesama alumni.
                            </p>
                            <div class="d-flex flex-column gap-2">
                                <p class="d-flex align-items-start gap-3 mb-0"><i
                                        class="material-icons-outlined fs-5">check_circle</i> Mencatat dan menampilkan data alumni secara real-time.</p>
                                <p class="d-flex align-items-start gap-3 mb-0"><i
                                        class="material-icons-outlined fs-5">check_circle</i>Menyediakan forum diskusi dan berbagi informasi.</p>
                                <p class="d-flex align-items-start gap-3 mb-0"><i
                                        class="material-icons-outlined fs-5">check_circle</i>Menyebarkan informasi lowongan kerja dari dan untuk alumni</p>
                            </div>
                        </div>
                        <div class="col-12 col-xl-6">
                            <!-- <img src="{{ asset('user/images/gallery/24.png') }}" class="img-fluid img-thumbnail rounded-4 bg-grd-warning" alt=""> -->
                            <img src="{{ asset('user/images/banners/widget-1.png') }}" class="img-fluid img-thumbnail rounded-4 bg-grd-warning"
                                alt="">
                        </div>
                    </div><!--end row-->

                    <div class="mt-5 clients">
                        <h3 class="d-none">Brands</h3>
                        <div class="clients-grid py-3">
                            <div class="clients-shops owl-carousel owl-theme">
                                <div class="item">
                                    <div class="p-4 rounded-4 card mb-0">
                                        <a href="javascript:;">
                                            <img src="{{ asset('user/images/clients/01.png') }}" class="img-fluid" alt="...">
                                        </a>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="p-4 rounded-4 card mb-0">
                                        <a href="javascript:;">
                                            <img src="{{ asset('user/images/clients/02.png') }}" class="img-fluid" alt="...">
                                        </a>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="p-4 rounded-4 card mb-0">
                                        <a href="javascript:;">
                                            <img src="{{ asset('user/images/clients/03.png') }}" class="img-fluid" alt="...">
                                        </a>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="p-4 rounded-4 card mb-0">
                                        <a href="javascript:;">
                                            <img src="{{ asset('user/images/clients/04.png') }}" class="img-fluid" alt="...">
                                        </a>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="p-4 rounded-4 card mb-0">
                                        <a href="javascript:;">
                                            <img src="{{ asset('user/images/clients/05.png') }}" class="img-fluid" alt="...">
                                        </a>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="p-4 rounded-4 card mb-0">
                                        <a href="javascript:;">
                                            <img src="{{ asset('user/images/clients/06.png') }}" class="img-fluid" alt="...">
                                        </a>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="p-4 rounded-4 card mb-0">
                                        <a href="javascript:;">
                                            <img src="{{ asset('user/images/clients/07.png') }}" class="img-fluid" alt="...">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!--end about us-->


            <!--start services-->
            <section class="py-5" id="Services">
                <div class="container py-4 px-4 px-lg-0">
                    <div class="section-title text-center mb-5">
                        <h1 class="mb-0 section-title-name">Informasi Lowongan Kerja</h1>
                    </div>
                    <div class="row row-cols-1 row-cols-xl-2">
                        @foreach ($loker as $data)
                        <div class="col">
                            <div class="card">
                                <div class="row g-0">
                                    <div class="col-md-4 border-end align-items-stretch">
                                        <div class="p-3">
                                            <img src="{{ asset('storage/' . $data->gambar) }}" class="w-100 rounded h-100" alt="...">
                                        </div>
                                    </div>
                                    <div class="col-md-8 align-items-stretch">
                                        <div class="card-body">
                                            <h5 class="card-title mb-3">{{ $data->judul }}</h5>
                                            <p class="card-text">
                                            <h6>Lokasi : {{ $data->lokasi }}</h6>
                                            </p>
                                            <h5>Gaji : {{ $data->gaji }}</h5>
                                            <p class="card-text">
                                            <h6>Persyaratan :</h6>{{ $data->persyaratan}}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div><!--end row-->
                </div>
            </section>
            <!--end services-->


            <!-- start call to action-->
            <section class="py-5 bg-call-to-action cta-section">
                <div class="container py-4 px-4 px-lg-0">
                    <div class="text-center">
                        <h1 class="text-white">Bergabunglah Bersama Komunitas Alumni Kami</h1>
                        <p class="mb-1 text-white">Temukan jaringan alumni, informasi lowongan kerja, dan ikuti berbagai kegiatan menarik lainnya.</p>
                        <div class="mt-4">
                            <a href="{{ route('register') }}" class="btn btn-grd btn-lg btn-grd-primary rounded-5 px-4 raised">Gabung Sekarang</a>
                        </div>
                    </div>
                </div>
            </section>
            <!--end call to action-->


            <!--start portfolio-->
            <section class="py-5" id="Portfolio">
                <div class="container py-4 px-4 px-lg-0">
                    <div class="section-title text-center mb-5">
                        <h1 class="mb-0 section-title-name">Portfolio</h1>
                    </div>

                    <div class="row row-cols-1 row-cols-lg-3 g-4">
                        <div class="col">
                            <div class="inner">
                                <a href="https://placehold.co/1920x600/png" class="glightbox">
                                    <img src="https://placehold.co/800x500/png" class="img-fluid rounded-4 p-1 bg-grd-branding"
                                        alt="image">
                                </a>
                            </div>
                        </div>
                        <div class="col">
                            <div class="inner">
                                <a href="https://placehold.co/1920x600/png" class="glightbox">
                                    <img src="https://placehold.co/800x500/png" class="img-fluid rounded-4 p-1 bg-grd-danger"
                                        alt="image">
                                </a>
                            </div>
                        </div>
                        <div class="col">
                            <div class="inner">
                                <a href="https://placehold.co/1920x600/png" class="glightbox">
                                    <img src="https://placehold.co/800x500/png" class="img-fluid rounded-4 p-1 bg-grd-info"
                                        alt="image">
                                </a>
                            </div>
                        </div>
                        <div class="col">
                            <div class="inner">
                                <a href="https://placehold.co/1920x600/png" class="glightbox">
                                    <img src="https://placehold.co/800x500/png" class="img-fluid rounded-4 p-1 bg-grd-warning"
                                        alt="image">
                                </a>
                            </div>
                        </div>
                        <div class="col">
                            <div class="inner">
                                <a href="https://placehold.co/1920x600/png" class="glightbox">
                                    <img src="https://placehold.co/800x500/png" class="img-fluid rounded-4 p-1 bg-grd-success"
                                        alt="image">
                                </a>
                            </div>
                        </div>
                        <div class="col">
                            <div class="inner">
                                <a href="https://placehold.co/1920x600/png" class="glightbox">
                                    <img src="https://placehold.co/800x500/png" class="img-fluid rounded-4 p-1 bg-grd-voilet"
                                        alt="image">
                                </a>
                            </div>
                        </div>
                    </div><!--end row-->
                </div>
            </section>
            <!--end portfolio-->

            <!--start contact form-->
            <section class="py-5 bg-section" id="Contact">
                <div class="container py-4 px-4 px-lg-0">
                    <div class="section-title text-center mb-5">
                        <h1 class="mb-0 section-title-name">Contact</h1>
                    </div>

                    <div class="row g-4">
                        <div class="col-12 col-xl-5">
                            <div class="card rounded-4">
                                <div class="card-body p-4">
                                    <div class="d-flex flex-column gap-4">
                                        <div class="d-flex align-items-center gap-3">
                                            <div
                                                class="wh-48 bg-info bg-opacity-10 text-info rounded-circle d-flex align-items-center justify-content-center">
                                                <i class="material-icons-outlined">house</i>
                                            </div>
                                            <div class="">
                                                <h5 class="mb-0">Address</h5>
                                                <p class="mb-0">B895 Sudan Street, United Kingdom, Pin 569874</p>
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-center gap-3">
                                            <div
                                                class="wh-48 bg-danger bg-opacity-10 text-danger rounded-circle d-flex align-items-center justify-content-center">
                                                <i class="material-icons-outlined">call</i>
                                            </div>
                                            <div class="">
                                                <h5 class="mb-0">Phone</h5>
                                                <p class="mb-0">+01-854-256-49</p>
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-center gap-3">
                                            <div
                                                class="wh-48 bg-warning bg-opacity-10 text-warning rounded-circle d-flex align-items-center justify-content-center">
                                                <i class="material-icons-outlined">email</i>
                                            </div>
                                            <div class="">
                                                <h5 class="mb-0">Email</h5>
                                                <p class="mb-0">info@example.com</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card rounded-4">
                                <div class="card-body p-4">
                                    <iframe
                                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d9584993.017565502!2d-15.007252921431434!3d54.08994727271037!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x25a3b1142c791a9%3A0xc4f8a0433288257a!2sUnited%20Kingdom!5e0!3m2!1sen!2sin!4v1721760880045!5m2!1sen!2sin"
                                        height="255" style="border:0; border-radius: 16px; width: 100%;" allowfullscreen="" loading="lazy"
                                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                                </div>
                            </div>

                        </div>
                        <div class="col-12 col-xl-7">
                            <div class="card rounded-4 mb-0">
                                <div class="card-body p-4">
                                    <form>
                                        <div class="row g-4">
                                            <div class="col-12 col-lg-6">
                                                <label for="YourName" class="form-label">Your Name</label>
                                                <input type="text" class="form-control" id="YourName" placeholder="Enter Your Name">
                                            </div>
                                            <div class="col-12 col-lg-6">
                                                <label for="YourName" class="form-label">Email Id</label>
                                                <input type="email" class="form-control" id="EmailId" placeholder="Enter Email Address">
                                            </div>
                                            <div class="col-12 col-lg-12">
                                                <label for="Subject" class="form-label">Subject</label>
                                                <input type="text" class="form-control" id="Subject" placeholder="Subject">
                                            </div>
                                            <div class="col-12 col-lg-12">
                                                <label for="Message" class="form-label">Message</label>
                                                <textarea class="form-control" id="Message" rows="10" cols="5"></textarea>
                                            </div>
                                            <div class="col-12 col-lg-12">
                                                <button type="submit" class="btn btn-grd btn-grd-primary px-4 rounded-5">Submit</button>
                                            </div>
                                        </div><!--end row-->
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div><!--end row-->
                </div>
            </section>
            <!--end contact form-->
    <!--end main wrapper-->
@endsection