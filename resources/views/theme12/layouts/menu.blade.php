<div class="sidemenu-wrapper sidemenu-info d-none d-lg-block">
    <div class="sidemenu-content">
        <button class="closeButton sideMenuCls"><i class="far fa-times"></i></button>
        <div class="widget">
            <div class="th-widget-about">
                <div class="about-logo">
                    <a href="{{ route('site.index') }}"><img src="/storage/{{ $settings->get('logo_dark') }}" alt="Logo" /></a>
                </div>
                <p class="about-text">{{ __('Deneyim ve uzmanlığımızla müvekkillerimize güvenilir, şeffaf ve etkili hukuki çözümler sunuyoruz.') }}</p>
                <div class="th-social">
                    @if($settings->get('twitter'))
                        <a href="{{ $settings->get('twitter') }}"><i class="fab fa-twitter"></i></a>
                    @endif @if($settings->get('facebook'))
                        <a href="{{ $settings->get('facebook') }}"><i class="fab fa-facebook"></i></a>
                    @endif @if($settings->get('linkedin'))
                        <a href="{{ $settings->get('linkedin') }}"><i class="fab fa-linkedin"></i></a>
                    @endif @if($settings->get('instagram'))
                        <a href="{{ $settings->get('instagram') }}"><i class="fab fa-instagram"></i></a>
                    @endif @if($settings->get('youtube'))
                        <a href="{{ $settings->get('youtube') }}"><i class="fab fa-youtube"></i></a>
                    @endif @if($settings->get('google_business'))
                        <a href="{{ $settings->get('google_business') }}"><i class="fab fa-google"></i></a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
<div class="popup-search-box d-none d-lg-block">
    <button class="searchClose"><i class="fal fa-times"></i></button>
    <form action="#">
        <input type="text" placeholder="What are you looking for?" /> <button type="submit"><i class="fal fa-search"></i></button>
    </form>
</div>
<div class="th-menu-wrapper">
    <div class="th-menu-area text-center">
        <button class="th-menu-toggle"><i class="fal fa-times"></i></button>
        <div class="mobile-logo">
            <a href="{{ route('site.index') }}"><img src="/storage/{{ $settings->get('logo_dark') }}" alt="Logo" /></a>
        </div>
        <div class="th-mobile-menu">
            <ul>
                <li>
                    <a href="{{ route('site.index') }}">{{ ('Anasayfa') }}</a>
                </li>
                <li class="menu-item-has-children">
                    <a href="#">{{ __('Kurumsal') }}</a>
                    <ul class="sub-menu">
                        @foreach($allPages as $headerPage)
                            <li>
                                <a href="{{ route(getResourceFullLink('pages','show'),$headerPage) }}">{{ $headerPage->name }}</a>
                            </li>
                        @endforeach
                        <li><a href="{{ route(getResourceFullLink('teams')) }}">{{ __('Ekibimiz') }}</a></li>
                        <li><a href="{{ route(getResourceFullLink('customer_comments')) }}">{{ __('Müşteri Yorumları') }}</a></li>
                        <li><a href="{{ route(getResourceFullLink('faqs')) }}">{{ __('Sıkça Sorulan Sorular') }}</a></li>
                    </ul>
                </li>
                <li class="menu-item-has-children">
                    <a href="{{ route(getResourceFullLink('services')) }}">{{ __('Hizmetler') }}</a>
                    <ul class="sub-menu">
                        @foreach($allServices as $headerService)
                            <li>
                                <a href="{{ route(getResourceFullLink('services','show'),$headerService) }}">{{ $headerService->name }}</a>
                            </li>
                        @endforeach
                    </ul>
                </li>
                <li class="menu-item-has-children">
                    <a href="#">{{ __('Bloglar') }}</a>
                    <ul class="sub-menu">
                        @foreach($allBlogCategories as $headerBlogCategory)
                            <li>
                                <a href="{{ route(getResourceFullLink('blog_categories','show'),$headerBlogCategory) }}">{{ $headerBlogCategory->name }}</a>
                            </li>
                        @endforeach
                    </ul>
                </li>
                <li><a href="{{ route(getOtherFullLink('contact')) }}">{{ __('İletişim') }}</a></li>
            </ul>
        </div>
    </div>
</div>
<header class="th-header header-layout1">
    <div class="header-top">
        <div class="container header-1-container">
            <div class="row justify-content-center justify-content-lg-between align-items-center gy-2">
                <div class="col-auto d-none d-lg-block">
                    <div class="header-links">
                        <ul>
                            <li><i class="fa-regular fa-phone"></i> <a href="tel:{{ $settings->get('telephone') }}">{{ $settings->get('telephone') }}</a></li>
                            <li><i class="fa-sharp fa-regular fa-envelope"></i> <a href="mailto:{{ $settings->get('email') }}">{{ $settings->get('email') }}</a></li>
                            <li><i class="fal fa-location-dot"></i> {{ $settings->get('address') }}</li>
                        </ul>
                    </div>
                </div>
                <div class="col-auto">
                    <div class="header-links">
                        <div class="social-links">
                            @if($settings->get('twitter'))
                                <a href="{{ $settings->get('twitter') }}"><i class="fab fa-twitter"></i></a>
                            @endif @if($settings->get('facebook'))
                                <a href="{{ $settings->get('facebook') }}"><i class="fab fa-facebook"></i></a>
                            @endif @if($settings->get('linkedin'))
                                <a href="{{ $settings->get('linkedin') }}"><i class="fab fa-linkedin"></i></a>
                            @endif @if($settings->get('instagram'))
                                <a href="{{ $settings->get('instagram') }}"><i class="fab fa-instagram"></i></a>
                            @endif @if($settings->get('youtube'))
                                <a href="{{ $settings->get('youtube') }}"><i class="fab fa-youtube"></i></a>
                            @endif @if($settings->get('google_business'))
                                <a href="{{ $settings->get('google_business') }}"><i class="fab fa-google"></i></a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="sticky-wrapper">
        <div class="menu-area">
            <div class="container header-1-container">
                <div class="row align-items-center justify-content-between">
                    <div class="col-auto">
                        <div class="header-logo">
                            <div class="logo-bg"></div>
                            <a href="{{ route('site.index') }}"><img src="/storage/{{ $settings->get('logo_dark') }}" alt="Logo" /></a>
                        </div>
                    </div>
                    <div class="col-auto me-xl-auto">
                        <nav class="main-menu main-menu d-none d-lg-inline-block">
                            <ul>
                                <li>
                                    <a href="{{ route('site.index') }}">{{ ('Anasayfa') }}</a>
                                </li>
                                <li class="menu-item-has-children">
                                    <a href="#">{{ __('Kurumsal') }}</a>
                                    <ul class="sub-menu">
                                        @foreach($allPages as $headerPage)
                                            <li>
                                                <a href="{{ route(getResourceFullLink('pages','show'),$headerPage) }}">{{ $headerPage->name }}</a>
                                            </li>
                                        @endforeach
                                        <li><a href="{{ route(getResourceFullLink('teams')) }}">{{ __('Ekibimiz') }}</a></li>
                                        <li><a href="{{ route(getResourceFullLink('customer_comments')) }}">{{ __('Müşteri Yorumları') }}</a></li>
                                        <li><a href="{{ route(getResourceFullLink('faqs')) }}">{{ __('Sıkça Sorulan Sorular') }}</a></li>
                                    </ul>
                                </li>
                                <li class="menu-item-has-children">
                                    <a href="{{ route(getResourceFullLink('services')) }}">{{ __('Hizmetler') }}</a>
                                    <ul class="sub-menu">
                                        @foreach($allServices as $headerService)
                                            <li>
                                                <a href="{{ route(getResourceFullLink('services','show'),$headerService) }}">{{ $headerService->name }}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </li>
                                <li class="menu-item-has-children">
                                    <a href="#">{{ __('Bloglar') }}</a>
                                    <ul class="sub-menu">
                                        @foreach($allBlogCategories as $headerBlogCategory)
                                            <li>
                                                <a href="{{ route(getResourceFullLink('blog_categories','show'),$headerBlogCategory) }}">{{ $headerBlogCategory->name }}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </li>
                                <li><a href="{{ route(getOtherFullLink('contact')) }}">{{ __('İletişim') }}</a></li>
                            </ul>
                        </nav>
                        <button type="button" class="th-menu-toggle d-block d-lg-none"><i class="far fa-bars"></i></button>
                    </div>
                    <div class="col-auto d-none d-xl-block">
                        <div class="header-button">
                            <button type="button" class="icon-btn searchBoxToggler"><i class="far fa-magnifying-glass"></i></button>
                            <a href="{{ route(getOtherFullLink('contact')) }}" class="th-btn style4">{{ __('Bize Ulaşın') }} <i class="far fa-arrow-right-long"></i></a>
                            <button type="button" class="icon-btn sideMenuInfo"><i class="fa-solid fa-bars"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
