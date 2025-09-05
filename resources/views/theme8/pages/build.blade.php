<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
@include('theme8.layouts.head')
<body>

<div id="mcgill-page"> <a href="#" class="js-mcgill-nav-toggle mcgill-nav-toggle"><i></i></a>

    @include('theme8.layouts.menu')
    <div id="mcgill-main">
        @yield('content')

        @include('theme8.layouts.footer')
    </div>
    @include('theme8.layouts.script')
</div>

</body>

</html>
