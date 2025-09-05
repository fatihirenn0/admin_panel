<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
@include('theme2.layouts.head')

<body class="body-color" >
<!-- Preloader Start -->
<div id="preloader" class="preloader">
    <div class="animation-preloader">
        <div class="spinner">
        </div>
        <div class="txt-loading">
                    <span data-text-preloader="L" class="letters-loading">
                        L
                    </span>
            <span data-text-preloader="O" class="letters-loading">
                        O
                    </span>
            <span data-text-preloader="W" class="letters-loading">
                        W
                    </span>
            <span data-text-preloader="T" class="letters-loading">
                        T
                    </span>
            <span data-text-preloader="E" class="letters-loading">
                        E
                    </span>
            <span data-text-preloader="R" class="letters-loading">
                        R
                    </span>
        </div>
        <p class="text-center">Loading</p>
    </div>
    <div class="loader">
        <div class="row">
            <div class="col-3 loader-section section-left">
                <div class="bg"></div>
            </div>
            <div class="col-3 loader-section section-left">
                <div class="bg"></div>
            </div>
            <div class="col-3 loader-section section-right">
                <div class="bg"></div>
            </div>
            <div class="col-3 loader-section section-right">
                <div class="bg"></div>
            </div>
        </div>
    </div>
</div>


<!-- Back To Top Start -->
<button id="back-top" class="back-to-top">
    <i class="fa-regular fa-arrow-up"></i>
</button>

<!--<< Mouse Cursor Start >>-->
<div class="mouse-cursor cursor-outer"></div>
<div class="mouse-cursor cursor-inner"></div>

<div class="line-shape-animation cus-z-1 first w-100 h-100 d-flex flex-wrap"><span></span><span></span><span></span><span></span></div>

<!-- Offcanvas Area Start -->
@include('theme2.layouts.header')

@include('theme2.layouts.menu')


@yield('content')

<!-- Footer Section Start -->
@include('theme2.layouts.footer')
<!-- Footer Section End -->

<!--<< All JS Plugins >>-->
@include('theme2.layouts.script')
</body>
</html>
