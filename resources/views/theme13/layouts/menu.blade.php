<div class="loader-container">
    <div class="loader">
        <div class="circle"></div>
        <div class="circle"></div>
        <div class="circle"></div>
        <div class="circle"></div>
    </div>
</div>
<!-- Navbar section -->
<header id="header" class="header index-1 w-100">
    <div class="container g-0 g-lg-1">
        <nav id="navbar-menu" class="d-flex px-3 px-lg-0 justify-content-between align-items-center">
            <a class="" href="{{ route('site.index') }}">
                <img src="/storage/{{ $settings->get('logo_white') }}" alt="Logo" />
            </a>
            <!-- <div id="brand">COMPANY</div> -->
            <ul class="mb-0 menu d-none d-lg-flex">
                <li><a href="{{ route('site.index') }}">{{ ('Anasayfa') }}</a></li>
                <li class="submenu">
                    <span>{{ __('Kurumsal') }}</span>
                    <ul class="submenu-dropdown">
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
                <li class="submenu">
                    <span>{{ __('Hizmetler') }}</span>
                    <ul class="submenu-dropdown">
                        @foreach($allServices as $headerService)
                            <li>
                                <a href="{{ route(getResourceFullLink('services','show'),$headerService) }}">{{ $headerService->name }}</a>
                            </li>
                        @endforeach
                    </ul>
                </li>
                <li class="submenu">
                    <span>{{ __('Bloglar') }}</span>
                    <ul class="submenu-dropdown">
                        @foreach($allBlogCategories as $headerBlogCategory)
                            <li>
                                <a href="{{ route(getResourceFullLink('blog_categories','show'),$headerBlogCategory) }}">{{ $headerBlogCategory->name }}</a>
                            </li>
                        @endforeach
                    </ul>
                </li>
                <li><a href="{{ route(getOtherFullLink('contact')) }}">{{ __('İletişim') }}</a></li>
            </ul>
            <div class="d-flex align-items-center gap-4">
                <a href="{{ route(getOtherFullLink('contact')) }}" class="primary-btn d-none d-lg-block">{{ __('Bize Ulaşın') }} <i class="ti ti-arrow-up-right"></i></a>
                <button class="show-offcanvas bg-transparent border-0 text-white d-none d-xl-block fs-3"><i class="ti ti-menu-2"></i></button>
            </div>
            <div class="toggle-menu"><i class="ti ti-menu-2"></i></div>
        </nav>
    </div>
</header>
<div class="left-sidebar" tabindex="-1">
    <div class="offcanvas-body d-flex flex-column align-items-center text-center">
        <div class="d-flex justify-content-end w-100 mb-5">
            <button class="bg-transparent text-primary border-0 fs-4 left-sidebar-close" aria-label="Close"><i class="ti ti-x"></i></button>
        </div>

        <img src="/storage/{{ $settings->get('logo_white') }}" alt="Logo" />
        <p class="text-white">{{ __('Deneyim ve uzmanlığımızla müvekkillerimize güvenilir, şeffaf ve etkili hukuki çözümler sunuyoruz.') }}</p>
        <h5 class="fw-semibold text-white">{{ __('Sosyal Medya') }}</h5>
        <ul class="social-links p-0">
            @if($settings->get('twitter'))
                <li>
                    <a href="{{ $settings->get('twitter') }}"><span class="ti ti-brand-twitter"></span></a>
                </li>
            @endif @if($settings->get('facebook'))
                <li>
                    <a href="{{ $settings->get('facebook') }}"><span class="ti ti-brand-facebook"></span></a>
                </li>
            @endif @if($settings->get('linkedin'))
                <li>
                    <a href="{{ $settings->get('linkedin') }}"><span class="ti ti-brand-linkedin"></span></a>
                </li>
            @endif @if($settings->get('instagram'))
                <li>
                    <a href="{{ $settings->get('instagram') }}"><span class="ti ti-brand-instagram"></span></a>
                </li>
            @endif @if($settings->get('youtube'))
                <li>
                    <a href="{{ $settings->get('youtube') }}"><span class="ti ti-brand-youtube"></span></a>
                </li>
            @endif @if($settings->get('google_business'))
                <li>
                    <a href="{{ $settings->get('google_business') }}"><span class="ti ti-brand-google_business"></span></a>
                </li>
            @endif
        </ul>
    </div>
</div>
<div class="left-sidebar-overlay"></div>

<!-- Mobile Menu -->
<header class="mobile-menu d-lg-none">
    <div class="container g-0 g-lg-1">
        <nav id="navbar-menu-mobile" class="px-3 px-lg-0">
            <div class="d-flex justify-content-between align-items-center w-100">
                <a class="" href="{{ route('site.index') }}">
                    <img src="/storage/{{ $settings->get('logo_white') }}" alt="Logo" />
                </a>
                <i class="ti ti-x text-white fs-2 close-menu"></i>
            </div>
            <!-- <div id="brand">COMPANY</div> -->
            <ul class="mb-0 menu">
                <li><a href="{{ route('site.index') }}">{{ ('Anasayfa') }}</a></li>
                <li class="submenu">
                    <span>{{ __('Kurumsal') }}</span>
                    <ul class="submenu-dropdown">
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
                <li class="submenu">
                    <span>{{ __('Hizmetler') }}</span>
                    <ul class="submenu-dropdown">
                        @foreach($allServices as $headerService)
                            <li>
                                <a href="{{ route(getResourceFullLink('services','show'),$headerService) }}">{{ $headerService->name }}</a>
                            </li>
                        @endforeach
                    </ul>
                </li>
                <li class="submenu">
                    <span>{{ __('Bloglar') }}</span>
                    <ul class="submenu-dropdown">
                        @foreach($allBlogCategories as $headerBlogCategory)
                            <li>
                                <a href="{{ route(getResourceFullLink('blog_categories','show'),$headerBlogCategory) }}">{{ $headerBlogCategory->name }}</a>
                            </li>
                        @endforeach
                    </ul>
                </li>
                <li><a href="{{ route(getOtherFullLink('contact')) }}">{{ __('İletişim') }}</a></li>
            </ul>
            <a href="{{ route(getOtherFullLink('contact')) }}" class="primary-btn max-w-full w-100">{{ __('Bize Ulaşın') }} <i class="ti ti-arrow-up-right"></i></a>
        </nav>
    </div>
</header>
<div class="mobile-menu-overlay d-lg-none"></div>
