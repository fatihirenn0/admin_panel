<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
@include('theme10.layouts.head')
<body>
<div class="page-wrapper">
    <!-- Preloader -->
    <div class="preloader"></div>
    @include('theme10.layouts.menu')
    @yield('content')

    @include('theme10.layouts.footer')

</div>
<!--Scroll to top-->
<div class="scroll-to-top scroll-to-target" data-target="html"><span class="fa fa-arrow-circle-up"></span></div>
@include('theme10.layouts.script')
</body>
</html>
