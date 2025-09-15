<!-- Header Start -->
<header class="site-header">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="header-box">
                    <div class="site-branding">
                        <a href="{{ route('site.index') }}" title="Logo">
                            <img src="/storage/{{ $settings->get('logo_dark') }}" width="164" height="47" alt="Logo" />
                        </a>
                    </div>
                    <div class="header-menu">
                        <nav class="main-navigation">
                            <button class="toggle-button"><span></span></button>
                            <div class="mobile-menu-box">
                                <ul>
                                    <li><a href="{{ route('site.index') }}">{{ __('Anasayfa') }}</a></li>
                                    <li class="sub-items">
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
                                    <li class="sub-items">
                                        <a href="{{ route(getResourceFullLink('services')) }}">{{ __('Hizmetler') }}</a>
                                        <ul class="sub-menu">
                                            @foreach($allServices as $headerService)
                                                <li>
                                                    <a href="{{ route(getResourceFullLink('services','show'),$headerService) }}">{{ $headerService->name }}</a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </li>
                                    <li class="sub-items">
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
                                <div class="for-mob">
                                    <div class="header-mob-btn">
                                        <a href="{{ route(getOtherFullLink('contact')) }}" class="sec-btn" title="Get Appointment"><span> {{ __('Bize Ulaşın') }}</span></a>
                                    </div>
                                </div>
                            </div>
                        </nav>
                        <div class="header-btn">
                            <a href="{{ route(getOtherFullLink('contact')) }}" class="sec-btn" title="Get Appointment"><span>{{ __('Bize Ulaşın') }}</span></a>
                        </div>
                        <div class="black-shadow"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- Header End -->
