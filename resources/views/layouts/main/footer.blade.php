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