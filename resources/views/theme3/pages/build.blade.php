<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
@include('theme3.layouts.head')

<body>
<div class="page-wrapper">
    <!-- Preloader -->
    <div class="preloader"></div>

    @include('theme3.layouts.menu')

    @yield('content')

  @include('theme3.layouts.footer')

</div><!-- End Page Wrapper -->

<!-- Scroll To Top -->
<div class="scroll-to-top scroll-to-target" data-target="html"><span class="fa fa-angle-up"></span></div>

@include('theme3.layouts.script')
</body>
</html>
