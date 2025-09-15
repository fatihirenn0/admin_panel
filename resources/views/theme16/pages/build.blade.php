<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
@include('theme16.layouts.head')
<body>
<!-- Preloader -->
<div id="preloader">
    <div class="preloader-inner">
        <div class="spinner"></div>
        <div class="loading-text">
            <span data-preloader-text="L" class="characters">L</span>

            <span data-preloader-text="A" class="characters">A</span>

            <span data-preloader-text="W" class="characters">W</span>

            <span data-preloader-text="R" class="characters">R</span>

            <span data-preloader-text="E" class="characters">E</span>

            <span data-preloader-text="T" class="characters">T</span>

            <span data-preloader-text="O" class="characters">O</span>
        </div>
    </div>
</div>
@include('theme16.layouts.menu')
<div class="main_wrapper">
    @yield('content')

    @include('theme16.layouts.footer')
</div>

@include('theme16.layouts.script')
</body>
</html>
