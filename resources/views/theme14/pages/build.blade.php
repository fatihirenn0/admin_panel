<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
@include('theme14.layouts.head')
<body>
<!-- Preloader area start -->
<div id="preloader">
    <div class="animation-preloader">
        <div class="spinner"></div>
        <div class="txt-loading">
                <span data-text-preloader="L" class="letters-loading">
                    L
                </span>
            <span data-text-preloader="A" class="letters-loading">
                    A
                </span>
            <span data-text-preloader="W" class="letters-loading">
                    W
                </span>
            <span data-text-preloader="P" class="letters-loading">
                    P
                </span>
            <span data-text-preloader="O" class="letters-loading">
                    O
                </span>
            <span data-text-preloader="I" class="letters-loading">
                    I
                </span>
            <span data-text-preloader="N" class="letters-loading">
                    N
                </span>
            <span data-text-preloader="T" class="letters-loading">
                    T
                </span>
        </div>
        <p class="text-center">Loading...</p>
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
<!-- Preloader area end -->
@include('theme14.layouts.menu')
<main>
    @yield('content')

</main>
@include('theme14.layouts.footer')
<!-- Back to top area start here -->
<div class="scroll-up">
    <svg class="scroll-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
        <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
    </svg>
</div>
<!-- Back to top area end here -->
@include('theme14.layouts.script')
</body>
</html>
