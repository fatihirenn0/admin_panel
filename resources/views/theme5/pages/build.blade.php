<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
@include('theme5.layouts.head')

<body>
<!-- Preloader -->
<div class="preloader" id="preloader">
    <div class="spinner-grow" role="status">
        <span class="visually-hidden">{{ __('Yükleniyor') }}...</span>
    </div>
</div>

<!-- Search Form -->
<div class="search-bg-overlay" id="searchOverlay"></div>
<div class="search-form-popup">
    <h2 class="mb-4">{{ __('Size Nasıl Yardımcı Olabiliriz') }}?</h2>
    <button type="button" class="close-btn" id="searchClose" aria-label="Close">
        &times;
    </button>
    <form class="search-form">
        <input type="search" class="form-control" placeholder="Ara...">
        <button type="submit" class="btn btn-primary">
            <span><i class="ti ti-search"></i> {{ __('Ara') }}</span>
            <span><i class="ti ti-search"></i> {{ __('Ara') }}</span>
        </button>
    </form>
</div>

@include('theme5.layouts.menu')

@yield('content')

@include('theme5.layouts.footer')


@include(('theme5.layouts.script'))
</body>

</html>
