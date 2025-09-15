<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
@include('theme12.layouts.head')
<body class="">
<div class="preloader">
    <div class="preloader-inner"><div class="loader"></div></div>
</div>
@include('theme12.layouts.menu')

@yield('content')


@include('theme12.layouts.footer')
<div class="scroll-top">
    <svg class="progress-circle svg-content" width="100%" height="100%" viewbox="-1 -1 102 102">
        <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" style="transition: stroke-dashoffset 10ms linear 0s; stroke-dasharray: 307.919, 307.919; stroke-dashoffset: 307.919;"></path>
    </svg>
</div>
@include('theme12.layouts.script')
</body>
</html>
