<!doctype html>
<html lang="en" data-bs-theme="bordered-theme">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Maxton | Bootstrap 5 Admin Dashboard Template</title>
    <!--favicon-->
    <link rel="icon" href="{{ asset('admin/images/favicon-32x32.png') }}" type="image/png">
    <!-- loader-->
    <link href="{{ asset('admin/css/pace.min.css') }}" rel="stylesheet">
    <script src="{{ asset('admin/js/pace.min.js') }}"></script>

    <!--plugins-->
    <link href="{{ asset('admin/plugins/perfect-scrollbar/css/perfect-scrollbar.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/plugins/metismenu/metisMenu.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/plugins/metismenu/mm-vertical.css') }}">
    <!--bootstrap css-->
    <link href="{{ asset('admin/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Material+Icons+Outlined" rel="stylesheet">
    <!--main css-->
    <link href="{{ asset('admin/css/bootstrap-extended.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/sass/main.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/sass/dark-theme.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/sass/blue-theme.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/sass/responsive.css') }}" rel="stylesheet">

</head>

<body>
    <!--authentication-->

    <div class="mx-3 mx-lg-0">

        <div class="card my-5 col-xl-9 col-xxl-8 mx-auto rounded-4 overflow-hidden border-3 p-4">
            <div class="row g-4">
                <div class="col-lg-6 d-flex">
                    <div class="card-body">
                        <img src="{{ asset('admin/images/logo1.png') }}" class="mb-4" width="145" alt="">
                        <h4 class="fw-bold">Welcome Back</h4>
                        <p class="mb-0">Enter your credentials to login</p>

                        <!-- Social login buttons (optional) -->
                        <div class="row gy-2 gx-0 my-4">
                            <div class="col-12 col-lg-12">
                                <button class="btn btn-filter py-2 px-4 font-text1 fw-bold d-flex align-items-center justify-content-center w-100">
                                    <span><img src="{{ asset('admin/images/apps/05.png') }}" width="20" class="me-2" alt="">Login with Google</span>
                                </button>
                            </div>
                        </div>

                        <div class="separator">
                            <div class="line"></div>
                            <p class="mb-0 fw-bold">OR LOGIN WITH EMAIL</p>
                            <div class="line"></div>
                        </div>

                        <!-- FORM LOGIN -->
                        <form method="POST" action="{{ route('login') }}" class="row g-3 mt-4">
                            @csrf

                            <div class="col-12">
                                <label for="email" class="form-label">Email Address</label>
                                <input id="email" type="email"
                                    class="form-control @error('email') is-invalid @enderror"
                                    name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                <span class="invalid-feedback d-block" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                                @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul class="mb-0">
                                        @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                                @endif

                            </div>

                            <div class="col-12">
                                <label for="password" class="form-label">Password</label>
                                <div class="input-group" id="show_hide_password">
                                    <input id="password" type="password"
                                        class="form-control border-end-0 @error('password') is-invalid @enderror"
                                        name="password" required autocomplete="current-password">
                                    <a href="javascript:;" class="input-group-text bg-transparent"><i class="bi bi-eye-slash-fill"></i></a>
                                </div>

                                @error('password')
                                <span class="invalid-feedback d-block" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="col-12">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                    <label class="form-check-label" for="remember">
                                        Remember Me
                                    </label>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="d-grid">
                                    <button type="submit" class="btn btn-grd-info">Login</button>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="text-start">
                                    @if (Route::has('password.request'))
                                    <p class="mb-0">
                                        <a href="{{ route('password.request') }}">Forgot Your Password?</a>
                                    </p>
                                    @endif
                                    <p class="mb-0">Don't have an account? <a href="{{ route('register') }}">Register</a></p>
                                </div>
                            </div>
                        </form>
                        <!-- END FORM -->
                    </div>
                </div>
                <div class="col-lg-6 d-lg-flex d-none">
                    <div class="p-3 rounded-4 w-100 d-flex align-items-center justify-content-center bg-grd-info">
                        <img src="{{ asset('admin/images/auth/register1.png') }}" class="img-fluid" alt="">
                    </div>
                </div>
            </div><!--end row-->
        </div>

    </div>

    <!--authentication-->

    <!--plugins-->
    <script src="{{ asset('admin/js/jquery.min.js') }}"></script>

    <script>
        $(document).ready(function() {
            $("#show_hide_password a").on('click', function(event) {
                event.preventDefault();
                if ($('#show_hide_password input').attr("type") == "text") {
                    $('#show_hide_password input').attr('type', 'password');
                    $('#show_hide_password i').addClass("bi-eye-slash-fill");
                    $('#show_hide_password i').removeClass("bi-eye-fill");
                } else if ($('#show_hide_password input').attr("type") == "password") {
                    $('#show_hide_password input').attr('type', 'text');
                    $('#show_hide_password i').removeClass("bi-eye-slash-fill");
                    $('#show_hide_password i').addClass("bi-eye-fill");
                }
            });
        });
    </script>

</body>

</html>