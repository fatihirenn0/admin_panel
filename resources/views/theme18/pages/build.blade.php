<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
@include('theme18.layouts.head')
<body>
<!-- Preloader -->
<div class="loader">
    <div class="d-table">
        <div class="d-table-cell">
            <div class="sk-folding-cube">
                <div class="sk-cube1 sk-cube"></div>
                <div class="sk-cube2 sk-cube"></div>
                <div class="sk-cube4 sk-cube"></div>
                <div class="sk-cube3 sk-cube"></div>
            </div>
        </div>
    </div>
</div>
<!-- End Preloader -->
@include('theme18.layouts.menu')
@yield('content')
@include('theme18.layouts.footer')
@include('theme18.layouts.script')
</body>
</html>
