<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
@include('theme17.layouts.head')
<body class="fixed">
<div class="main">
    <!-- Loader Start -->
    <div class="loader-box">
        <div class="loader"></div>
    </div>
    <!-- Loader End -->
    @include('theme17.layouts.menu')
    @yield('content')
    @include('theme17.layouts.footer')
    <!-- Scroll To Top Start -->
    <a href="javascript:void(0);" id="scroll-to-top" class="scroll-to-top">
        <i class="fas fa-arrow-up"></i>
    </a>
    <!-- Scroll To Top End -->
</div>
@include('theme17.layouts.script')
</body>
</html>
