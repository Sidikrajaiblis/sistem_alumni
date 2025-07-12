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
                            <a class="nav-link" href="#home">
                                <div class="parent-icon"><i class="material-icons-outlined">home</i>
                                </div>
                                <div class="menu-title">Beranda</div>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#Services">
                                <div class="parent-icon"><i class="material-icons-outlined">work_outline</i>
                                </div>
                                <div class="menu-title">Loker</div>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('forum') }}">
                                <div class="parent-icon"><i class="material-icons-outlined">people_alt</i>
                                </div>
                                <div class="menu-title">Forum</div>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#Contact">
                                <div class="parent-icon"><i class="material-icons-outlined">call</i>
                                </div>
                                <div class="menu-title">Kontak</div>
                            </a>
                        </li>   
                    </ul>
                </div>
            </div>
            <div class="">
                @if (Route::has('login'))
                <nav class="flex items-center justify-end gap-4">
                    @auth
                    <a
                        href="{{ Auth::user()->role == 'admin' ? url('/admin/dashboard') : (Auth::user()->role == 'moderator' ? url('/moderator/dashboard') : url('/home')) }}"
                        class="btn btn-grd btn-grd-primary raised d-flex align-items-center rounded-5 gap-2 px-4">
                        Dashboard
                    </a>
                    @else
                    <div class="d-flex align-items-center gap-2">
                        <a
                            href="{{ route('login') }}"
                            class="btn btn-grd btn-grd-primary raised d-flex align-items-center rounded-5 gap-2 px-4">
                            <i class="material-icons-outlined">account_circle</i>Login
                        </a>
                        @if (Route::has('register'))
                        <a
                            href="{{ route('register') }}"
                            class="btn btn-grd btn-grd-primary raised d-flex align-items-center rounded-5 gap-2 px-4">
                            <i class="material-icons-outlined">account_circle</i>Register
                        </a>
                        @endif
                    </div>
                    @endauth
                </nav>
                @endif
            </div>
        </nav>
    </header>