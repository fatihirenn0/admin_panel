<!-- Header top section start -->
<div class="header-top-section">
    <div class="container-fluid">
        <div class="header-top-wrapper">
            <div class="top-left">
                <h6>{{ __('Adalet Yolculuğunda Yanınızdayız. Profesyonel Hukuki Destek İçin.') }} <span>{{ __('Bize Ulaşın.') }} </span> <i class="fa-solid fa-xmark"></i></h6>
            </div>
            <ul class="top-right">
                <li>
                    <i class="fa-solid fa-phone-volume"></i>
                    <a href="{{ $settings->get('telephone') }}">{{ $settings->get('telephone') }}</a>
                </li>
                <li>
                    <i class="fa-sharp fa-regular fa-location-dot"></i>
                    {{ $settings->get('address') }}
                </li>
            </ul>
        </div>
    </div>
</div>

<!-- Header Section Start -->
<header id="header-sticky" class="header-1">
    <div class="container-fluid">
        <div class="mega-menu-wrapper">
            <div class="header-main">
                <div class="logo">
                    <a href="{{ route('site.index') }}" class="header-logo">
                        <img src="/storage/{{ $settings->get('logo_white') }}" alt="logo">
                    </a>
                </div>
                <div class="mean__menu-wrapper">
                    <div class="main-menu">
                        <nav id="mobile-menu">
                            <ul>
                                <li class="has-dropdown active menu-thumb">
                                    <a href="{{ route('site.index') }}">
                                        {{ __('Ana Sayfa') }}
                                    </a>
                                </li>
                                <li class="has-dropdown active d-xl-none">
                                    <a href="{{ route('site.index') }}" class="border-none">
                                        {{ __('Ana Sayfa') }}
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        {{ __('Kurumsal') }}
                                        <i class="fa-solid fa-plus"></i>
                                    </a>
                                    <ul class="submenu">
                                        @foreach($allPages as $headerPage)
                                        <li><a href="{{ route(getResourceFullLink('pages','show'),$headerPage) }}">{{ $headerPage->name }}</a></li>
                                        @endforeach
                                            <li><a href="{{ route(getResourceFullLink('teams')) }}">{{ __('Ekibimiz') }}</a></li>
                                            <li><a href="{{ route(getResourceFullLink('customer_comments')) }}">{{ __('Müşteri Yorumları') }}</a></li>
                                            <li><a href="{{ route(getResourceFullLink('faqs')) }}">{{ __('Sıkça Sorulan Sorular') }}</a></li>
                                    </ul>
                                </li>
                                <li class="has-dropdown">
                                    <a href="{{ route(getResourceFullLink('services')) }}">
                                        {{ __('Hizmetler') }}
                                        <i class="fa-solid fa-plus"></i>
                                    </a>
                                    <ul class="submenu">
                                        @foreach($allServices as $headerService)
                                        <li><a href="{{ route(getResourceFullLink('services','show'),$headerService) }}">{{ $headerService->name }}</a></li>
                                        @endforeach
                                    </ul>
                                </li>
                                <li>
                                    <a href="{{ route(getResourceFullLink('blogs')) }}">
                                        {{ __('Bloglar') }}
                                        <i class="fa-solid fa-plus"></i>
                                    </a>
                                    <ul class="submenu">
                                        @foreach($allBlogCategories as $headerBlogCategory)
                                        <li><a href="{{ route(getResourceFullLink('blog_categories','show'),$headerBlogCategory) }}">{{ $headerBlogCategory->name }}</a></li>
                                        @endforeach
                                    </ul>
                                </li>
                                <li>
                                    <a href="{{ route(getOtherFullLink('contact')) }}">{{ __('İletişim') }}</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <div class="header-right d-flex justify-content-end align-items-center">
                    <a href="{{ route(getOtherFullLink('contact')) }}" class="theme-btn">
                        {{ __('Bize Ulaşın') }} <img class="static-image" src="/theme2/img/head-arrow.svg" alt="{{__('Ana Sayfa Menü 1. İkon')}}">
                    </a>
                    <div class="header__hamburger d-block my-auto">
                        <div class="sidebar__toggle">
                            <div class="header-bar">
                                <img class="static-image" src="/theme2/img/bar.svg" alt="{{__('Ana Sayfa Menü 2. İkon')}}">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
