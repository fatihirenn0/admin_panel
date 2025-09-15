<!-- Header -->
<header id="header" class="header header-layout-type-header-2rows">
    <div class="header-top">
        <div class="container">
            <div class="row">
                <div class="col-xl-auto header-top-left align-self-center text-center text-xl-left">
                    <ul class="element contact-info">
                        <li class="contact-phone"><i class="fa fa-phone font-icon sm-display-block"></i> {{ __('Telefon') }}: {{ $settings->get('telephone') }}</li>
                        <li class="contact-email"><i class="fa fa-envelope-o font-icon sm-display-block"></i> <a href="mailto:{{ $settings->get('email') }}" class="__cf_email__"> {{ $settings->get('email') }}</a></li>
                        <li class="contact-address"><i class="fa fa-map-o font-icon sm-display-block"></i> {{ $settings->get('address') }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="header-nav">
        <div class="header-nav-wrapper navbar-scrolltofixed green">
            <div class="menuzord-container header-nav-container green">
                <div class="container position-relative">
                    <div class="row">
                        <div class="col">
                            <div class="row header-nav-col-row">
                                <div class="col-sm-auto align-self-center">
                                    <a class="menuzord-brand site-brand" href="{{ route('site.index') }}">
                                        <img class="logo-default logo-1x" src="/storage/{{ $settings->get('logo_dark') }}" alt="Logo" />
                                        <img class="logo-default logo-2x retina" src="/storage/{{ $settings->get('logo_dark') }}" alt="Logo" />
                                    </a>
                                </div>
                                <div class="col-sm-auto ml-auto pr-0 align-self-center">
                                    <nav id="top-primary-nav" class="menuzord green" data-effect="fade" data-animation="none" data-align="right">
                                        <ul id="main-nav" class="menuzord-menu">
                                            <li><a href="{{ route('site.index') }}">{{ __('Anasayfa') }}</a></li>
                                            <li>
                                                <a href="#">{{ __('Kurumsal') }}</a>
                                                <ul class="dropdown">
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
                                                <a href="{{ route(getResourceFullLink('services')) }}">{{ __('Hizmetler') }}</a>
                                                <ul class="dropdown">
                                                    @foreach($allServices as $headerService)
                                                        <li>
                                                            <a href="{{ route(getResourceFullLink('services','show'),$headerService) }}">{{ $headerService->name }}</a>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </li>
                                            <li>
                                                <a href="#">{{ __('Bloglar') }}</a>
                                                <ul class="dropdown">
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
                                </div>
                            </div>
                            <div class="row d-block d-xl-none">
                                <div class="col-12">
                                    <nav id="top-primary-nav-clone" class="menuzord d-block d-xl-none default menuzord-color-default menuzord-border-boxed menuzord-responsive" data-effect="slide" data-animation="none" data-align="right">
                                        <ul id="main-nav-clone" class="menuzord-menu menuzord-right menuzord-indented scrollable"></ul>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
