<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
@include('theme11.layouts.head')
<body class="hidden-bar-wrapper">
<div class="page-wrapper">

    <!-- Preloader -->
    <div class="preloader"></div>
    @include('theme11.layouts.menu')
    @yield('content')

    @include('theme11.layouts.footer')
</div>
<!--Scroll to top-->
<div class="scroll-to-top scroll-to-target" data-target="html"><span class="fa fa-arrow-up"></span></div>
@include('theme11.layouts.script')
</body>
</html>
