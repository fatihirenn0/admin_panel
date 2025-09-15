<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
@include('theme13.layouts.head')
<body>
<!-- loader -->
<div class="loader-container">
    <div class="loader">
        <div class="circle"></div>
        <div class="circle"></div>
        <div class="circle"></div>
        <div class="circle"></div>
    </div>
</div>
<!-- Navbar section -->
@include('theme13.layouts.menu')

@yield('content')

@include('theme13.layouts.footer')
@include('theme13.layouts.script')
</body>
</html>
