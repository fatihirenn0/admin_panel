<div class="header-top-area style-two d-none d-lg-block {{ url()->current() == route('site.index') ? 'index-current' : '' }}">
    <div class="container">
        <div class="header-top__wrp">
            <div class="header-top__socials">
                @if($settings->get('twitter'))
                    <a href="{{ $settings->get('twitter') }}"><i class="fa-brands fa-twitter"></i></a>
                @endif
                @if($settings->get('facebook'))
                    <a href="{{ $settings->get('facebook') }}"><i class="fa-brands fa-facebook-f"></i></a>
                @endif
                @if($settings->get('linkedin'))
                    <a href="{{ $settings->get('linkedin') }}"><i class="fa-brands fa-linkedin-in"></i></a>
                @endif
                @if($settings->get('instagram'))
                    <a href="{{ $settings->get('instagram') }}"><i class="fa-brands fa-instagram"></i></a>
                @endif
                @if($settings->get('youtube'))
                    <a href="{{ $settings->get('youtube') }}"><i class="fa-brands fa-youtube"></i></a>
                @endif
                @if($settings->get('tiktok'))
                    <a href="{{ $settings->get('tiktok') }}"><i class="fa-brands fa-tiktok"></i></a>
                @endif
                @if($settings->get('google_business'))
                    <a href="{{ $settings->get('google_business') }}"><i class="fa-brands fa-google"></i></a>
                @endif
            </div>
            <ul class="header-top__links two">
                @if($settings->get('address'))
                    <li><i class="fa-light fa-location-dot"></i> <a href="#0">{{ $settings->get('address') }}</a></li>
                @endif
                @if($settings->get('telephone'))
                    <li><i class="fa-light fa-phone"></i> <a href="tel:{{ $settings->get('telephone') }}">{{ $settings->get('telephone') }}</a></li>
                @endif
            </ul>
        </div>
    </div>
</div>
<header class="header-area header-two-area {{ url()->current() == route('site.index') ? 'index-current' : '' }}">
    <div class="container">
        <div class="header-two__main">
            <a href="{{ route('site.index') }}" class="logo">
                <img src="/storage/{{ $settings->get('logo_white') }}" class="for-dark" alt="Logo">
                <img src="/storage/{{ $settings->get('logo') }}" class="for-light" alt="Logo">
            </a>
            <div class="main-menu">
                <nav>
                    <ul>
                        <li><a href="{{ route('site.index') }}">{{ __('Ana Sayfa') }}</a></li>
                        <li>
                            <a href="#0">{{ __('Kurumsal') }} <i class="fa-solid fa-angle-down"></i></a>
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
                            <a href="{{ route(getResourceFullLink('services')) }}">{{ __('Hizmetler') }} <i class="fa-solid fa-angle-down"></i></a>
                            <ul class="sub-menu">
                                @foreach($allServices as $headerService)
                                    <li><a href="{{ route(getResourceFullLink('services','show'),$headerService) }}">{{ $headerService->name }}</a></li>
                                @endforeach
                            </ul>
                        </li>
                        <li>
                            <a href="{{ route(getResourceFullLink('projects')) }}">{{ __('Projeler') }} <i class="fa-solid fa-angle-down"></i></a>
                            <ul class="sub-menu">
                                @foreach($allProjects as $headerProject)
                                    <li><a href="{{ route(getResourceFullLink('projects','show'),$headerProject) }}">{{ $headerProject->name }}</a></li>
                                @endforeach
                            </ul>
                        </li>
                        <li>
                            <a href="{{ route(getResourceFullLink('blogs')) }}">{{ __('Bloglar') }} <i class="fa-solid fa-angle-down"></i></a>
                            <ul class="sub-menu">
                                @foreach($allBlogCategories as $headerBlogCategory)
                                    <li><a href="{{ route(getResourceFullLink('blog_categories','show'),$headerBlogCategory) }}">{{ $headerBlogCategory->name }}</a></li>
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
                    <button class="menubars d-inline-block" type="button" data-bs-toggle="offcanvas"
                            data-bs-target="#menubar">
                        <span></span>
                        <span></span>
                        <span></span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</header>
<div class="sidebar-area offcanvas offcanvas-end" id="menubar">
    <div class="offcanvas-header">
        <a href="{{ route('site.index') }}" class="logo"> <img src="/storage/{{ $settings->get('logo_white') }}" alt="logo"></a>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas"><i
                class="fa-regular fa-xmark"></i></button>
    </div>
    <div class="offcanvas-body sidebar__body">
        <div class="mobile-menu overflow-hidden"></div>
        <div class="d-none d-lg-block">
            <h5 class="text-white mb-20">{{ __('Hakkımızda') }}</h5>
            <p class="sidebar__text">{{ __('Avukatlık, kişilerin ya da kurumların hak ve menfaatlerini korumak, hukuki sorunlarına çözüm üretmek ve yargı mercileri ile resmi kurumlarda onları temsil etmek amacıyla yapılan meslektir.') }}</p>
        </div>
        <div class="sidebar__contact-info mt-30">
            <h5 class="text-white mb-20">{{ __('İletişim Bilgileri') }}</h5>
            <ul>
                <li><i class="fa-solid fa-location-dot"></i> <a href="#0">{{ $settings->get('address') }}</a></li>
                <li class="py-2"><i class="fa-solid fa-phone-volume"></i> <a href="tel:{{ $settings->get('telephone') }}">{{ $settings->get('telephone') }}</a></li>
                <li><i class="fa-solid fa-paper-plane"></i> <a href="mailto:{{ $settings->get('email') }}">{{ $settings->get('telephone') }}</a></li>
            </ul>
        </div>
    </div>
</div>
