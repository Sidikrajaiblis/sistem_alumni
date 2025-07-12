<!doctype html>
<html lang="en" data-bs-theme="bordered-theme">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sistem Informasi Alumni</title>
    <!--favicon-->
    <!-- <link rel="icon" href="{{ asset('user/images/favicon-32x32.png') }}" type="image/png"> -->
    <!-- loader-->
    <link href="{{ asset('user/css/pace.min.css') }}" rel="stylesheet">
    <script src="{{ asset('user/js/pace.min.js') }}"></script>

    <!--plugins-->
    <link href="{{ asset('user/plugins/OwlCarousel/css/owl.carousel.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('user/plugins/lightbox/dist/css/glightbox.min.css') }}">
    <!--bootstrap css-->
    <link href="{{ asset('user/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Material+Icons+Outlined" rel="stylesheet">
    <!--main css-->
    <link href="{{ asset('user/css/bootstrap-extended.css') }}" rel="stylesheet">
    <link href="{{ asset('user/sass/main.css') }}" rel="stylesheet">
    <link href="{{ asset('user/css/horizontal-menu.css') }}" rel="stylesheet">
    <link href="{{ asset('user/sass/dark-theme.css') }}" rel="stylesheet">
    <link href="{{ asset('user/sass/semi-dark.css') }}" rel="stylesheet">
    <link href="{{ asset('user/sass/blue-theme.css') }}" rel="stylesheet">
    <link href="{{ asset('user/sass/bordered-theme.css') }}" rel="stylesheet">
</head>

<body>

    <!--start header-->
    <header class="top-header" id="Parent_Scroll_Div">
        <nav class="navbar navbar-expand-xl align-items-center gap-3 container px-4 px-lg-0">
            <div class="logo-header d-none d-xl-flex align-items-center gap-2">
                <div class="logo-icon">
                    <img src="{{ asset('user/images/logo-icon.png') }}" class="logo-img" width="45" alt="">
                </div>
                <div class="logo-name">
                    <h5 class="mb-0">Alumni</h5>
                </div>
            </div>
            <div class="btn-toggle d-xl-none" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar">
                <a href="javascript:;"><i class="material-icons-outlined">menu</i></a>
            </div>

            <div class="offcanvas offcanvas-start w-260" tabindex="-1" id="offcanvasNavbar">
                <div class="offcanvas-header border-bottom h-70">
                    <div class="d-flex align-items-center gap-2">
                        <div class="">
                            <img src="{{ asset('user/images/logo-icon.png') }}" class="logo-icon" width="45" alt="logo icon">
                        </div>
                        <div class="">
                            <h4 class="logo-text">Alumni</h4>
                        </div>
                    </div>
                    <a href="javascript:;" class="primaery-menu-close" data-bs-dismiss="offcanvas">
                        <i class="material-icons-outlined">close</i>
                    </a>
                </div>
                <div class="offcanvas-body p-0 primary-menu">
                    <ul class="navbar-nav align-items-center mx-auto gap-0 gap-xl-1">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('welcome') }}">
                                <div class="parent-icon"><i class="material-icons-outlined">home</i>
                                </div>
                                <div class="menu-title">Beranda</div>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('forum') }}">
                                <div class="parent-icon"><i class="material-icons-outlined">people_alt</i>
                                </div>
                                <div class="menu-title">Forum</div>
                            </a>
                        </li>
                        @auth
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle dropdown-toggle-nocaret position-relative" data-bs-auto-close="outside"
                                data-bs-toggle="dropdown" href="javascript:;">
                                <i class="material-icons-outlined">notifications</i>
                                @if (Auth::user()->unreadNotifications->count() > 0)
                                <span class="badge-notify">{{ Auth::user()->unreadNotifications->count() }}</span>
                                @endif
                            </a>

                            <div class="dropdown-menu dropdown-notify dropdown-menu-end shadow"
                                style="min-width: 600px; max-width: 800px;">
                                <div class="px-3 py-1 d-flex align-items-center justify-content-between border-bottom">
                                    <h5 class="notiy-title mb-0">Notifikasi Komentar</h5>
                                </div>

                                <div class="notify-list">
                                    @forelse (Auth::user()->unreadNotifications as $notif)
                                    @php
                                    $forum = \App\Models\Forum::find($notif->data['forum_id']);
                                    $foto = $notif->data['foto'] ?? 'default.png';
                                    @endphp
                                    <div>
                                        <a class="dropdown-item border-bottom py-2"
                                            href="{{ route('forum.show', $notif->data['forum_id']) }}">
                                            <div class="d-flex align-items-center gap-3 position-relative">
                                                <div>
                                                    @php
                                                    $user = \App\Models\User::find($notif->data['komentar_user_id']);
                                                    @endphp
                                                    <img src="{{ asset('storage/' . ($user?->foto ?? 'default.png')) }}" class="rounded-circle" width="45" height="45" alt="avatar">
                                                </div>
                                                <div class="flex-grow-1">
                                                    <p class="notify-title mb-1">{{ $notif->data['komentar_oleh'] }}</p>
                                                    <p class="mb-0 notify-time text-muted">
                                                        Forum: {{ $forum?->judul ?? 'Forum tidak ditemukan' }}
                                                    </p><br>
                                                    <h6 class="mb-0 notify-desc">Komen: {{ $notif->data['isi'] }}</h6>
                                                </div>
                                                <!-- <div class="notify-close position-absolute top-0 end-0 mt-2 me-3">
                                                    <form action="{{ route('notification.read', $notif->id) }}" method="POST">
                                                        @csrf
                                                        <button type="submit" class="btn btn-sm btn-link text-dark p-0 m-0">
                                                            <i class="material-icons-outlined fs-6">close</i>
                                                        </button>
                                                    </form>
                                                </div> -->
                                            </div>
                                        </a>
                                    </div>
                                    @empty
                                    <div>
                                        <span class="dropdown-item text-muted">
                                            Tidak ada notifikasi baru
                                        </span>
                                    </div>
                                    @endforelse
                                </div>
                            </div>
                        </li>
                        @endauth


                    </ul>
                </div>
            </div>
            <div class="">
                @if (Route::has('login'))
                <nav class="flex items-center justify-end gap-4">
                    <div class="nav-item dropdown">
                        <a id="navbarDropdown" class="btn btn-grd btn-grd-primary raised d-flex align-items-center rounded-5 gap-2 px-4" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </div>

                </nav>
                @endif
            </div>
        </nav>
    </header>
    <!--end top header-->


    <!--start main wrapper-->
    <main class="main-wrapper" data-bs-spy="scroll" data-bs-target="#Parent_Scroll_Div" data-bs-smooth-scroll="false" tabindex="0">
        <div class="main-content">

            <section class="py-5 bg-section" id="About">
                <div class="container py-4 px-4 px-lg-0">
                    <div class="section-title text-center mb-5">
                        <h1 class="mb-0 section-title-name">Forum Saya</h1>
                    </div>
                    <h6 class="mb-0 text-uppercase">Informasi Forum</h6>
                    <hr>
                    @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="close"></button>
                    </div>
                    @endif
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example2" class="table table-striped table-bordered" style="width:100%">
                                    <a href="{{ route('forum.create') }}" class="btn btn-primary tombol-tambah">Tambah Informasi forum</a>
                                    <thead>
                                        <tr>
                                            <th>User Id</th>
                                            <th>Kategori Id</th>
                                            <th>Judul</th>
                                            <th>Isi</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($forums as $data)
                                        <tr>
                                            <td>{{ $data->user_id }}</td>
                                            <td>{{ $data->kategori_forum_id }}</td>
                                            <td>{{ $data->judul }}</td>
                                            <td>{{ $data->isi }}</td>
                                            <td>
                                                @if ($data->status == 'pending')
                                                <span class="text-warning fw-bold">Pending</span>
                                                @elseif ($data->status == 'published')
                                                <span class="text-success fw-bold">Published</span>
                                                @else
                                                <span class="text-secondary fw-bold">Unknown</span>
                                                @endif
                                            </td>
                                            <td width="20%">
                                                <form action="{{ route('forum.destroy', $data->id) }}" method="POST" style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-outline-danger" onclick="return confirm('Apakah anda yakin?')"><i class="bi bi-trash3"></i>Hapus</button>
                                                </form>
                                            </td>
                                        </tr>
                                        @endforeach
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

        </div>
    </main>
    <!--end main wrapper-->


    <!--start footer -->
    <section class="page-footer py-5">
        <div class="container py-4 px-4 px-lg-0">
            <div class="row g-4">
                <div class="col-12 col-xl-4">
                    <div class="footer-widget-1">
                        <div class="footer-logo mb-4">
                            <img src="{{ asset('user/images/logo1.png') }}" width="160" alt="">
                        </div>
                        <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
                            Explicabo voluptatem mollitia et repellat qui dolorum quasi.</p>
                        <p class="mb-2"><strong>Address: </strong>B895 Sudan Street,<br> United Kingdom, Pin 569874</p>
                        <p class="mb-2"><strong>Phone: </strong>+01-854-256-49</p>
                        <p class="mb-0"><strong>Email: </strong>info@example.com</p>
                        <div class="play-store-images d-flex align-items-center gap-3 mt-4">
                            <a href="javascript:;">
                                <img src="{{ asset('user/images/google-play-store.png') }}" width="160" alt="">
                            </a>
                            <a href="javascript:;">
                                <img src="{{ asset('user/images/apple-store.png') }}" width="160" alt="">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-xl-2">
                    <div class="footer-widget-2">
                        <div class="footer-links">
                            <h5 class="mb-4">Useful Links</h5>
                            <div class="d-flex flex-column gap-2">
                                <a href="javascript:;">Home</a>
                                <a href="javascript:;">About us</a>
                                <a href="javascript:;">Services</a>
                                <a href="javascript:;">Portfolio</a>
                                <a href="javascript:;">Contact</a>
                                <a href="javascript:;">Terms of service</a>
                                <a href="javascript:;">Privacy policy</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-xl-2">
                    <div class="footer-widget-3">
                        <div class="footer-links">
                            <h5 class="mb-4">Our Services</h5>
                            <div class="d-flex flex-column gap-2">
                                <a href="javascript:;">Product Development</a>
                                <a href="javascript:;">Graphic Design</a>
                                <a href="javascript:;">Human resourse</a>
                                <a href="javascript:;">Software Developer</a>
                                <a href="javascript:;">Web Design</a>
                                <a href="javascript:;">CRM Management</a>
                                <a href="javascript:;">eCommerce website</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-xl-4">
                    <div class="footer-widget-4">
                        <h5 class="mb-4">Our Newsletter</h5>
                        <div class="d-flex flex-column gap-2">
                            <p>Join our newsletter to get the most recent information about our goods and services!</p>
                            <form>
                                <div class="input-group subscribe-control">
                                    <input type="text" class="form-control">
                                    <button class="btn btn-grd btn-grd-primary px-4" type="button">Subscribe</button>
                                </div>
                            </form>
                        </div>
                        <h6 class="mb-3 mt-4">Follow Us</h6>
                        <div class="d-flex align-items-center justify-content-start gap-3">
                            <a href="javascript:;"
                                class="wh-42 bg-grd-deep-blue text-white rounded-circle d-flex align-items-center justify-content-center"><i
                                    class="bi bi-linkedin fs-5"></i></a>
                            <a href="javascript:;"
                                class="wh-42 bg-grd-info text-white rounded-circle d-flex align-items-center justify-content-center"><i
                                    class="bi bi-facebook fs-5"></i></a>
                            <a href="javascript:;"
                                class="wh-42 bg-grd-danger text-white rounded-circle d-flex align-items-center justify-content-center"><i
                                    class="bi bi-youtube fs-5"></i></a>
                            <a href="javascript:;"
                                class="wh-42 bg-grd-voilet text-white rounded-circle d-flex align-items-center justify-content-center"><i
                                    class="bi bi-twitter-x fs-5"></i></a>
                        </div>
                    </div>
                </div>

            </div><!--end row-->
        </div>
    </section>
    <!--end footer section-->


    <!--start footer strip-->
    <footer class="footer-strip py-3 px-4 px-lg-0 text-center border-top">
        <p class="mb-0">© 2024. www.codervent.com. | All rights reserved.</p>
    </footer>
    <!--end footer strip-->


    <!--Start Back To Top Button-->
    <a href="javaScript:;" class="back-to-top"><i class="material-icons-outlined">arrow_upward</i></a>
    <!--End Back To Top Button-->

    <!--start switcher-->
    <button class="btn btn-grd btn-grd-danger btn-switcher position-fixed top-50 d-flex align-items-center gap-2"
        type="button" data-bs-toggle="offcanvas" data-bs-target="#staticBackdrop">
        <i class="material-icons-outlined">tune</i>Customize
    </button>

    <div class="offcanvas offcanvas-end" data-bs-scroll="true" tabindex="-1" id="staticBackdrop">
        <div class="offcanvas-header border-bottom h-70">
            <div class="">
                <h5 class="mb-0">Theme Customizer</h5>
                <p class="mb-0">Customize your theme</p>
            </div>
            <a href="javascript:;" class="primaery-menu-close" data-bs-dismiss="offcanvas">
                <i class="material-icons-outlined">close</i>
            </a>
        </div>
        <div class="offcanvas-body">
            <div>
                <p>Theme variation</p>

                <div class="row g-3">
                    <div class="col-12 col-xl-6">
                        <input type="radio" class="btn-check" name="theme-options" id="BlueTheme" checked>
                        <label
                            class="btn btn-outline-secondary d-flex flex-column gap-1 align-items-center justify-content-center p-4"
                            for="BlueTheme">
                            <span class="material-icons-outlined">contactless</span>
                            <span>Blue</span>
                        </label>
                    </div>
                    <div class="col-12 col-xl-6">
                        <input type="radio" class="btn-check" name="theme-options" id="LightTheme">
                        <label
                            class="btn btn-outline-secondary d-flex flex-column gap-1 align-items-center justify-content-center p-4"
                            for="LightTheme">
                            <span class="material-icons-outlined">light_mode</span>
                            <span>Light</span>
                        </label>
                    </div>
                    <div class="col-12 col-xl-6">
                        <input type="radio" class="btn-check" name="theme-options" id="DarkTheme">
                        <label
                            class="btn btn-outline-secondary d-flex flex-column gap-1 align-items-center justify-content-center p-4"
                            for="DarkTheme">
                            <span class="material-icons-outlined">dark_mode</span>
                            <span>Dark</span>
                        </label>
                    </div>
                    <div class="col-12 col-xl-6">
                        <input type="radio" class="btn-check" name="theme-options" id="SemiDarkTheme">
                        <label
                            class="btn btn-outline-secondary d-flex flex-column gap-1 align-items-center justify-content-center p-4"
                            for="SemiDarkTheme">
                            <span class="material-icons-outlined">contrast</span>
                            <span>Semi Dark</span>
                        </label>
                    </div>
                    <div class="col-12 col-xl-6">
                        <input type="radio" class="btn-check" name="theme-options" id="BoderedTheme">
                        <label
                            class="btn btn-outline-secondary d-flex flex-column gap-1 align-items-center justify-content-center p-4"
                            for="BoderedTheme">
                            <span class="material-icons-outlined">border_style</span>
                            <span>Bordered</span>
                        </label>
                    </div>
                </div><!--end row-->

            </div>
        </div>
    </div>
    <!--start switcher-->

    <!--bootstrap js-->
    <script src="{{ asset('user/js/bootstrap.bundle.min.js') }}"></script>

    <!--plugins-->
    <script src="{{ asset('user/js/jquery.min.js') }}"></script>
    <!--plugins-->
    <script src="{{ asset('user/plugins/OwlCarousel/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('user/plugins/OwlCarousel/js/owl.carousel2.thumbs.min.js') }}"></script>
    <script src="{{ asset('user/js/main.js') }}"></script>

    <script src="{{ asset('user/plugins/lightbox/dist/js/glightbox.min.js') }}"></script>

    <style>
        .cta-section {
            background-image: url('/user/images/cta.jpeg');
            background-size: cover;
        }
    </style>

    <script>
        var lightbox = GLightbox();
        lightbox.on('open', (target) => {
            console.log('lightbox opened');
        });
        var lightboxDescription = GLightbox({
            selector: '.glightbox2'
        });
        var lightboxVideo = GLightbox({
            selector: '.glightbox3'
        });
        lightboxVideo.on('slide_changed', ({
            prev,
            current
        }) => {
            console.log('Prev slide', prev);
            console.log('Current slide', current);

            const {
                slideIndex,
                slideNode,
                slideConfig,
                player
            } = current;

            if (player) {
                if (!player.ready) {
                    // If player is not ready
                    player.on('ready', (event) => {
                        // Do something when video is ready
                    });
                }

                player.on('play', (event) => {
                    console.log('Started play');
                });

                player.on('volumechange', (event) => {
                    console.log('Volume change');
                });

                player.on('ended', (event) => {
                    console.log('Video ended');
                });
            }
        });

        var lightboxInlineIframe = GLightbox({
            selector: '.glightbox4'
        });
    </script>

    <script>
        $('.clients-shops').owlCarousel({
            loop: true,
            margin: 24,
            responsiveClass: true,
            nav: false,
            navText: [
                "<i class='bx bx-chevron-left'></i>",
                "<i class='bx bx-chevron-right' ></i>"
            ],
            autoplay: true,
            autoplayTimeout: 3000,
            dots: false,
            responsive: {
                0: {
                    nav: false,
                    items: 1
                },
                576: {
                    nav: false,
                    items: 2
                },
                768: {
                    nav: false,
                    items: 3
                },
                1024: {
                    nav: false,
                    items: 3
                },
                1366: {
                    items: 4
                },
                1400: {
                    items: 5
                }
            },
        })
    </script>

</body>

</html>