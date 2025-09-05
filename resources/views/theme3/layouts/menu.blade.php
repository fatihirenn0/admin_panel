<!-- Main Header-->
<header class="main-header header-style-three outer-box-position">
    <!-- Header Top -->
    <div class="header-top light">
        <div class="inner-container">
            <div class="top-left">
                <ul class="social-icon-one">
                    @if($settings->get('twitter'))
                        <a href="{{ $settings->get('twitter') }}"><i class="fa-brands fa-twitter"></i></a>
                    @endif @if($settings->get('facebook'))
                        <a href="{{ $settings->get('facebook') }}"><i class="fa-brands fa-facebook-f"></i></a>
                    @endif @if($settings->get('linkedin'))
                        <a href="{{ $settings->get('linkedin') }}"><i class="fa-brands fa-linkedin-in"></i></a>
                    @endif @if($settings->get('instagram'))
                        <a href="{{ $settings->get('instagram') }}"><i class="fa-brands fa-instagram"></i></a>
                    @endif @if($settings->get('youtube'))
                        <a href="{{ $settings->get('youtube') }}"><i class="fa-brands fa-youtube"></i></a>
                    @endif @if($settings->get('tiktok'))
                        <a href="{{ $settings->get('tiktok') }}"><i class="fa-brands fa-tiktok"></i></a>
                    @endif @if($settings->get('google_business'))
                        <a href="{{ $settings->get('google_business') }}"><i class="fa-brands fa-google"></i></a>
                    @endif
                </ul>
            </div>

            <div class="top-right">
                <!-- Info List -->
                <ul class="list-style-one">
                    <li><i class="fa fa-map-marker-alt"></i> {{ $settings->get('address') }}</li>
                    <li>
                        <i class="fa fa-envelope"></i> <a href="mailto:{{ $settings->get('email') }}"><span class="__cf_email__">{{ $settings->get('email') }}</span></a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Header Top -->

    <div class="header-lower">
        <!-- Main box -->
        <div class="main-box">
            <div class="logo-box">
                <div class="logo">
                    <a href="{{ route('site.index') }}"><img src="/storage/{{ $settings->get('logo_dark') }}" class="for-dark" alt="Logo" /></a>
                </div>
            </div>

            <!--Nav Box-->
            <div class="nav-outer">
                <nav class="nav main-menu">
                    <ul class="navigation">
                        <li class="current dropdown"><a href="{{ route('site.index') }}">{{ __('Ana Sayfa') }}</a></li>
                        <li class="dropdown">
                            <a href="#">{{ __('Kurumsal') }}</a>
                            <ul>
                                @foreach($allPages as $headerPage)
                                    <li><a href="{{ route(getResourceFullLink('pages','show'),$headerPage) }}">{{ $headerPage->name }}</a></li>
                                @endforeach
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="{{ route(getResourceFullLink('services')) }}">{{ __('Hizmetler') }}</a>
                            <ul>
                                @foreach($allServices as $headerService)
                                    <li><a href="{{ route(getResourceFullLink('services','show'),$headerService) }}">{{ $headerService->name }}</a></li>
                                @endforeach
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="{{ route(getResourceFullLink('projects')) }}">{{ __('Projeler') }}</a>
                            <ul>
                                @foreach($allProjects as $headerProject)
                                    <li><a href="{{ route(getResourceFullLink('projects','show'),$headerProject) }}">{{ $headerProject->name }}</a></li>
                                @endforeach
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="{{ route(getResourceFullLink('blogs')) }}">{{ __('Bloglar') }}</a>
                            <ul>
                                @foreach($allBlogCategories as $headerBlogCategory)
                                    <li><a href="{{ route(getResourceFullLink('blog_categories','show'),$headerBlogCategory) }}">{{ $headerBlogCategory->name }}</a></li>
                                @endforeach
                            </ul>
                        </li>
                        <li><a href="{{ route(getOtherFullLink('contact')) }}">{{ __('İletişim') }}</a></li>
                    </ul>
                </nav>
                <div class="mobile-nav-toggler">
                    <span class="icon fa-sharp far fa-bars"></span>
                </div>
            </div>

            <!-- Outer Box -->
            <div class="outer-box">
                <!-- Btn Box -->
                <div class="btn-box search-btn call-btn">
                    <!-- Info Btn -->
                    <a href="tel:{{ $settings->get('telephone') }}">
                        <i class="icon fal fa-phone"></i>
                        <strong> {{ $settings->get('telephone') }} </strong>
                    </a>
                </div>
                <!-- Mobile Nav toggler -->
                <div class="mobile-nav-toggler"><span class="icon fa-sharp far fa-bars"></span></div>
            </div>
        </div>
    </div>

    <!-- Mobile Menu  -->
    <div class="mobile-menu">
        <div class="menu-backdrop"></div>
        <!--Here Menu Will Come Automatically Via Javascript / Same Menu as in Header-->
        <nav class="menu-box">
            <div class="upper-box">
                <div class="nav-logo">
                    <a href="{{ route('site.index') }}"><img class="for-dark" src="/storage/{{ $settings->get('logo_white') }}" alt="Logo" /></a>
                </div>
                <div class="close-btn"><i class="icon fa fa-times"></i></div>
            </div>
            <ul class="navigation clearfix">
                <!--Keep This Empty / Menu will come through Javascript-->
            </ul>
            <ul class="contact-list-one">
                <li>
                    <i class="icon far fa-phone-flip"></i> <span class="title">{{ __('Telefon') }}</span>
                    <div class="text"><a href="tel:{{ $settings->get('telephone') }}">{{ $settings->get('telephone') }}</a></div>
                </li>
                <li>
                    <i class="icon far fa-envelope"></i> <span class="title">{{ __('E-Posta Adresi') }}</span>
                    <div class="text">
                        <a href="mailto:{{ $settings->get('email') }}"><span class="__cf_email__">{{ $settings->get('email') }}</span></a>
                    </div>
                </li>
                <li>
                    <i class="icon far fa-location-dot"></i> <span class="title">{{ __('Adres') }}</span>
                    <div class="text">{{ $settings->get('address') }}</div>
                </li>
            </ul>
            <ul class="social-links">
                @if($settings->get('twitter'))
                    <a href="{{ $settings->get('twitter') }}"><i class="fa-brands fa-twitter"></i></a>
                @endif @if($settings->get('facebook'))
                    <a href="{{ $settings->get('facebook') }}"><i class="fa-brands fa-facebook-f"></i></a>
                @endif @if($settings->get('linkedin'))
                    <a href="{{ $settings->get('linkedin') }}"><i class="fa-brands fa-linkedin-in"></i></a>
                @endif @if($settings->get('instagram'))
                    <a href="{{ $settings->get('instagram') }}"><i class="fa-brands fa-instagram"></i></a>
                @endif @if($settings->get('youtube'))
                    <a href="{{ $settings->get('youtube') }}"><i class="fa-brands fa-youtube"></i></a>
                @endif @if($settings->get('tiktok'))
                    <a href="{{ $settings->get('tiktok') }}"><i class="fa-brands fa-tiktok"></i></a>
                @endif @if($settings->get('google_business'))
                    <a href="{{ $settings->get('google_business') }}"><i class="fa-brands fa-google"></i></a>
                @endif
            </ul>
        </nav>
    </div>
    <!-- End Mobile Menu -->

    <!-- Sticky Header  -->
    <div class="sticky-header">
        <div class="auto-container">
            <div class="inner-container">
                <!--Logo-->
                <div class="logo">
                    <a href="{{ route('site.index') }}"><img src="/storage/{{ $settings->get('logo_dark') }}" alt="Logo" /></a>
                </div>

                <!--Right Col-->
                <div class="nav-outer">
                    <!-- Main Menu -->
                    <nav class="main-menu">
                        <div class="navbar-collapse show collapse clearfix">
                            <ul class="navigation clearfix">
                                <!--Keep This Empty / Menu will come through Javascript-->
                            </ul>
                        </div>
                    </nav>
                    <!-- Main Menu End-->

                    <!--Mobile Navigation Toggler-->
                    <div class="mobile-nav-toggler"><span class="icon fa-sharp far fa-bars"></span></div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Sticky Menu -->
</header>
<!--End Main Header -->
