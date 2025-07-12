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
    @include('layouts.main.navbar')
    <!--end top header-->


    <!--start main wrapper-->
    <main class="main-wrapper" data-bs-spy="scroll" data-bs-target="#Parent_Scroll_Div" data-bs-smooth-scroll="false" tabindex="0">
        <div class="main-content">

            @yield('content')

        </div>
    </main>
    <!--end main wrapper-->


    <!--start footer -->
    @include('layouts.main.footer')
    <!--end footer section-->

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