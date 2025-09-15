<!-- Top header area start here -->
<div class="header-top-area d-none d-lg-block">
    <div class="container">
        <div class="header-top__wrp">
            <ul class="header-top__links">
                <li><i class="fa-light fa-location-dot"></i> {{ $settings->get('address') }}</li>
                <li>
                    <i class="fa-light fa-envelope-open-text"></i> <a href="mailto:{{ $settings->get('email') }}"><span style="color: #ffffff;">{{ $settings->get('email') }}</span></a>
                </li>
            </ul>

            <div class="header-top__btn">
                <a href="{{ route(getOtherFullLink('contact')) }}" class="btn-three rounded-0" data-splitting data-text="{{ __('Bize Ulaşın') }}">
                    <div class="icon-box">
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M17.5 1.25H2.5C1.46625 1.25 0.625 2.09125 0.625 3.125V13.125C0.625 14.1587 1.46625 15 2.5 15H4.375V18.125C4.375 18.3656 4.51312 18.5837 4.72875 18.6881C4.81563 18.7294 4.90812 18.75 5 18.75C5.13938 18.75 5.2775 18.7038 5.39062 18.6131L9.90687 15H17.5C18.5338 15 19.375 14.1587 19.375 13.125V3.125C19.375 2.09125 18.5338 1.25 17.5 1.25ZM10 10H5C4.65438 10 4.375 9.72 4.375 9.375C4.375 9.03 4.65438 8.75 5 8.75H10C10.3456 8.75 10.625 9.03 10.625 9.375C10.625 9.72 10.3456 10 10 10ZM15 7.5H5C4.65438 7.5 4.375 7.22 4.375 6.875C4.375 6.53 4.65438 6.25 5 6.25H15C15.3456 6.25 15.625 6.53 15.625 6.875C15.625 7.22 15.3456 7.5 15 7.5Z"
                                fill="white"
                            />
                        </svg>
                    </div>
                    {{ __('Bize Ulaşın') }}
                </a>
            </div>
        </div>
    </div>
</div>
<!-- Top header area end here -->

<!-- Header area start here -->
<header class="header-area header-three-area">
    <div class="container">
        <div class="header__main">
            <a href="{{ route('site.index') }}" class="logo">
                <img src="/storage/{{ $settings->get('logo_dark') }}" alt="Logo" />
            </a>
            <div class="main-menu">
                <nav>
                    <ul>
                        <li><a href="{{ route('site.index') }}">{{ __('Anasayfa') }}</a></li>
                        <li>
                            <a href="#">{{ __('Kurumsal') }} <i class="fa-solid fa-angle-down"></i></a>
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
                        <li>
                            <a href="{{ route(getResourceFullLink('services')) }}">{{ __('Hizmetler') }}<i class="fa-solid fa-angle-down"></i></a>
                            <ul class="sub-menu">
                                @foreach($allServices as $headerService)
                                    <li>
                                        <a href="{{ route(getResourceFullLink('services','show'),$headerService) }}">{{ $headerService->name }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </li>
                        <li>
                            <a href="#">{{ __('Bloglar') }}<i class="fa-solid fa-angle-down"></i></a>
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
                <div class="menu-btns">
                    <button class="search-trigger d-none d-lg-block">
                        <i class="fa-light fa-magnifying-glass"></i>
                    </button>
                    <button class="menubars" type="button" data-bs-toggle="offcanvas" data-bs-target="#menubar">
                        <span></span>
                        <span></span>
                        <span></span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- Header area end here -->

<!-- Sidebar area start here -->
<div class="sidebar-area offcanvas offcanvas-end" id="menubar">
    <div class="offcanvas-header">
        <a href="{{ route('site.index') }}" class="logo"> <img src="/storage/{{ $settings->get('logo_white') }}" alt="Logo" /></a>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas"><i class="fa-regular fa-xmark"></i></button>
    </div>
    <div class="offcanvas-body sidebar__body">
        <div class="mobile-menu overflow-hidden"></div>
        <div class="d-none d-lg-block">
            <h5 class="text-white mb-20">{{ __('Hakkımızda') }}</h5>
            <p class="sidebar__text">{{ __('Deneyim ve uzmanlığımızla müvekkillerimize güvenilir, şeffaf ve etkili hukuki çözümler sunuyoruz.') }}</p>
        </div>
        <div class="sidebar__contact-info mt-30">
            <h5 class="text-white mb-20">{{ __('İletişim Bilgileri') }}</h5>
            <ul>
                <li style="color: #ffffff;"><i class="fa-solid fa-location-dot"></i> {{ $settings->get('address') }}</li>
                <li class="py-2"><i class="fa-solid fa-phone-volume"></i> <a href="tel:{{ $settings->get('telephone') }}">{{ $settings->get('telephone') }}</a></li>
                <li>
                    <i class="fa-solid fa-paper-plane"></i> <a href="{{ $settings->get('email') }}"><span style="color: #ffffff;">{{ $settings->get('email') }}</span></a>
                </li>
            </ul>
        </div>
        <div class="sidebar__socials mt-5">
            <ul>
                @if($settings->get('twitter'))
                    <a href="{{ $settings->get('twitter') }}"><span class="fab fa-twitter"></span></a>
                @endif @if($settings->get('facebook'))
                    <a href="{{ $settings->get('facebook') }}"><span class="fab fa-facebook-f"></span></a>
                @endif @if($settings->get('linkedin'))
                    <a href="{{ $settings->get('linkedin') }}"><span class="fab fa-linkedin"></span></a>
                @endif @if($settings->get('instagram'))
                    <a href="{{ $settings->get('instagram') }}"><span class="fab fa-instagram"></span></a>
                @endif @if($settings->get('youtube'))
                    <a href="{{ $settings->get('youtube') }}"><span class="fab fa-youtube"></span></a>
                @endif @if($settings->get('google_business'))
                    <a href="{{ $settings->get('google_business') }}"><span class="fab fa-google_business"></span></a>
                @endif
            </ul>
        </div>
    </div>
</div>
<!-- Sidebar area end here -->

<!-- Fullscreen search area start here -->
<div class="search-wrap">
    <div class="search-inner">
        <i class="fa-light fa-xmark search-close" id="search-close"></i>
        <div class="search-cell">
            <form method="get">
                <div class="search-field-holder">
                    <input type="search" class="main-search-input" placeholder="Search..." />
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Fullscreen search area end here -->
