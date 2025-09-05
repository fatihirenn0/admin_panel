<header class="main-header main-header--two sticky-header sticky-header--normal">
    <div class="main-header__inner">
        <div class="main-header__logo">
            <a href="{{ route('site.index') }}">
                <img src="/storage/{{ $settings->get('logo_white') }}" alt="Logo" width="160">
            </a>
        </div><!-- /.main-header__logo -->
        <div class="main-header__center">
            <div class="topbar-one">
                <div class="topbar-one__inner">
                    <ul class="list-unstyled topbar-one__info">
                        <li class="topbar-one__info__item">
                            <i class="fas fa-map-marker-alt topbar-one__info__icon"></i>
                            {{ $settings->get('address') }}
                        </li>
                        <li class="topbar-one__info__item">
                            <i class="fas fa-envelope topbar-one__info__icon"></i>
                            <a href="mailto:{{ $settings->get('email') }}">{{ $settings->get('email') }}</a>
                        </li>
                    </ul><!-- /.list-unstyled topbar-one__info -->
                    <div class="topbar-one__right">
                        <p class="topbar-one__text"><i class="icon-clock topbar-one__info__icon"></i>{{ __('Çalışma Saatleri:') }}
                            {{ __('Pazartesi-Cuma 08.30-17.30') }}</p><!-- /.topbar-one__text -->
                    </div><!-- /.topbar-one__right -->
                </div><!-- /.topbar-one__inner -->
            </div><!-- /.topbar-one -->
            <div class="main-header__center__bottom">
                <nav class="main-header__nav main-menu">
                    <ul class="main-menu__list">
                        <li class="dropdown">
                            <a href="{{ route('site.index') }}">{{ __('Ana Sayfa') }}</a>
                        </li>
                        <li class="dropdown">
                            <a href="#">{{ __('Kurumsal') }}</a>
                            <ul>
                                @foreach($allPages as $headerPage)
                                    <li><a href="{{ route(getResourceFullLink('pages','show'),$headerPage) }}">{{ $headerPage->name }}</a></li>
                                @endforeach
                                    <li><a href="{{ route(getResourceFullLink('teams')) }}">{{ __('Ekibimiz') }}</a></li>
                                    <li><a href="{{ route(getResourceFullLink('customer_comments')) }}">{{ __('Müşteri Yorumları') }}</a></li>
                                    <li><a href="{{ route(getResourceFullLink('faqs')) }}">{{ __('Sıkça Sorulan Sorular') }}</a></li>
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
                            <a href="#">{{ __('Bloglar') }}</a>
                        <ul>
                             @foreach($allBlogCategories as $headerBlogCategory)
                            <li><a href="{{ route(getResourceFullLink('blog_categories','show'),$headerBlogCategory) }}">{{ $headerBlogCategory->name }}</a></li>
                            @endforeach
                        </ul>
                        </li>
                        <li>
                            <a href="{{ route(getOtherFullLink('contact')) }}">{{ __('İletişim') }}</a>
                        </li>
                    </ul>
                </nav><!-- /.main-header__nav -->
                <div class="main-header__center__right">
                    <div class="mobile-nav__btn mobile-nav__toggler">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div><!-- /.mobile-nav__toggler -->
                    <div class="main-header__btn">
                        <a href="#" class="search-toggler main-header__search">
                            <i class="icon-search" aria-hidden="true"></i>
                            <span class="sr-only">{{ __('Arama') }}</span>
                        </a><!-- /.search-toggler -->
                    </div>
                </div>
            </div>
        </div>
        <div class="main-header__right">
            <div class="main-header__info">
                <div class="main-header__info__icon">
                    <i class="icon-phone-1"></i>
                    <span class="main-header__info__icon__zoom">
                                <i class="icon-phone-1"></i>
                            </span>
                </div>
                <div>
                    <span class="main-header__info__text">{{ __('Bize Ulaşın') }}</span>
                    <a href="tel:{{ $settings->get('telephone') }}">{{ $settings->get('telephone') }}</a>
                </div>
            </div>
        </div><!-- /.main-header__right -->
    </div><!-- /.main-header__inner -->
</header><!-- /.main-header -->
