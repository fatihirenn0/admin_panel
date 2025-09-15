<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
@include('theme19.layouts.head')
<body>
<!-- Loader -->
<div class="jurispro-loader">
    <div class="loader"><svg xmlns="http://www.w3.org/2000/svg" version="1.1"><defs><filter id="goo"><fegaussianblur in="SourceGraphic" stddeviation="6" result="blur"></fegaussianblur><fecolormatrix in="blur" values="1 0 0 0 0  0 1 0 0 0  0 0 1 0 0  0 0 0 18 -7" result="goo"></fecolormatrix><feblend in="SourceGraphic" in2="goo"></feblend></filter></defs></svg></div>
</div>
@include('theme19.layouts.menu')
@yield('content')
@include('theme19.layouts.footer')
@include('theme19.layouts.script')
</body>
</html>
