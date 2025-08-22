<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
@include('theme1.layouts.head')
<body>

<!-- Preloader area start -->
<div id="preloader">
    <div class="animation-preloader">
        <div class="spinner"></div>
        <div class="txt-loading">
            @foreach(str_split($settings->get('title_'.app()->getLocale())) as $word)
                <span data-text-preloader="{{ $word }}" class="letters-loading">{{ $word }}</span>
            @endforeach
        </div>
        <p class="text-center">{{ __('Yükleniyor') }}...</p>
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

<!-- Mouse cursor area start here -->
<div class="mouse-cursor cursor-outer"></div>
<div class="mouse-cursor cursor-inner"></div>

@include('theme1.layouts.menu')

<div class="search-wrap">
    <div class="search-inner">
        <i class="fa-light fa-xmark search-close" id="search-close"></i>
        <div class="search-cell">
            <form action="{{ route(getOtherFullLink('search')) }}" method="get">
                <div class="search-field-holder">
                    <input type="search" name="q" value="{{ $_GET['q'] ?? '' }}" class="main-search-input" placeholder="{{ __('Ara') }}...">
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Fullscreen search area end here -->

@yield('content')

<!-- Footer area start here -->
@include('theme1.layouts.footer')
<!-- Footer area end here -->

<!-- Back to top btn area start here -->
<button id="back-top" class="btn-backToTop">
    <i class="fa-regular fa-arrow-up"></i>
</button>
<!-- Back to top btn area end here -->
@include('theme1.layouts.script')
</body>
</html>
