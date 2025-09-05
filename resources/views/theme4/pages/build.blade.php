<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
@include('theme4.layouts.head')

<body class="custom-cursor">
<div class="custom-cursor__cursor"></div>
<div class="custom-cursor__cursor-two"></div>

<div class="preloader">
    <div class="preloader__image" style="background-image: url('/storage/{{ $settings->get('favicon') }}');"></div>
</div>

<div class="page-wrapper">
    @include('theme4.layouts.menu')

    @yield('content')

    @include('theme4.layouts.footer')

</div>

<div class="mobile-nav__wrapper">
    <div class="mobile-nav__overlay mobile-nav__toggler"></div>
    <!-- /.mobile-nav__overlay -->
    <div class="mobile-nav__content">
        <span class="mobile-nav__close mobile-nav__toggler"><i class="fa fa-times"></i></span>

        <div class="logo-box">
            <a href="{{ route('site.index') }}" aria-label="logo image"><img src="/storage/{{ $settings->get('logo_white') }}" width="155" alt="Logo"></a>
        </div>
        <!-- /.logo-box -->
        <div class="mobile-nav__container"></div>
        <!-- /.mobile-nav__container -->

        <ul class="mobile-nav__contact list-unstyled">
            <li>
                <i class="fa fa-envelope"></i>
                <a href="mailto:{{ $settings->get('email') }}">{{ $settings->get('email') }}</a>
            </li>
            <li>
                <i class="fa fa-phone-alt"></i>
                <a href="tel:{{ $settings->get('telephone') }}">{{ $settings->get('telephone') }}</a>
            </li>
        </ul><!-- /.mobile-nav__contact -->
        <div class="mobile-nav__social">
            @if($settings->get('twitter'))
                <a href="{{ $settings->get('twitter') }}"><i class="fab fa-facebook-f"></i></a>
            @endif @if($settings->get('facebook'))
                <a href="{{ $settings->get('facebook') }}"><i class="fab fa-twitter"></i></a>
            @endif @if($settings->get('linkedin'))
                <a href="{{ $settings->get('linkedin') }}"><i class="fab fa-instagram"></i></a>
            @endif @if($settings->get('instagram'))
                <a href="{{ $settings->get('instagram') }}"><i class="fab fa-youtube"></i></a>
            @endif @if($settings->get('youtube'))
                <a href="{{ $settings->get('youtube') }}"><i class="fab fa-tiktok"></i></a>
            @endif @if($settings->get('tiktok'))
                <a href="{{ $settings->get('tiktok') }}"><i class="fab fa-github"></i></a>
            @endif @if($settings->get('google_business'))
                <a href="{{ $settings->get('google_business') }}"><i class="fab fa-google"></i></a>
            @endif
        </div><!-- /.mobile-nav__social -->
    </div>
    <!-- /.mobile-nav__content -->
</div>
<!-- /.mobile-nav__wrapper -->
<div class="search-popup">
    <div class="search-popup__overlay search-toggler"></div>
    <!-- /.search-popup__overlay -->
    <div class="search-popup__content">
        <form role="search" method="get" class="search-popup__form" action="#">
            <input type="text" id="search" placeholder="Search Here...">
            <button type="submit" aria-label="search submit" class="procounsel-btn">
                <i><i class="icon-search"></i></i><span><i class="icon-search"></i></span>
            </button>
        </form>
    </div>
    <!-- /.search-popup__content -->
</div>
<!-- /.search-popup -->

<a href="#" data-target="html" class="scroll-to-target scroll-to-top">
    <span class="scroll-to-top__text">{{ __('Yukarı Çık') }}</span>
    <span class="scroll-to-top__wrapper"><span class="scroll-to-top__inner"></span></span>
</a>

@include('theme4.layouts.script')

</body>
</html>
