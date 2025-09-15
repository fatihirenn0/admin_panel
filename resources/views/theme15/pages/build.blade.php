<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
@include('theme15.layouts.head')
<body class="container-1340px">
<div id="wrapper" class="clearfix">
    @include('theme15.layouts.menu')
    <div class="main-content-area">
        @yield('content')
    </div>
    @include('theme15.layouts.footer')
</div>

@include('theme15.layouts.script')
</body>

</html>
