<!-- Header Main Area -->
<header class="site-header header-style-1">
    <div class="site-header-menu">
        <div class="container-fluid g-0">
            <div class="row g-0">
                <div class="col-md-12">
                    <div class="d-flex align-items-center justify-content-between">
                        <div class="d-flex align-items-center justify-content-between header-content">
                            <div class="site-branding pbmit-logo-area">
                                <h1 class="site-title">
                                    <a href="{{ route('site.index') }}">
                                        <img class="logo-img" src="/storage/{{ $settings->get('logo_white') }}" alt="Logo" />
                                    </a>
                                </h1>
                            </div>
                            <div class="site-navigation">
                                <nav class="main-menu navbar-expand-xl navbar-light">
                                    <div class="navbar-header">
                                        <!-- Toggle Button -->
                                        <button class="navbar-toggler" type="button">
                                            <i class="pbmit-base-icon-menu-1"></i>
                                        </button>
                                    </div>
                                    <div class="pbmit-mobile-menu-bg"></div>
                                    <div class="collapse navbar-collapse clearfix show" id="pbmit-menu">
                                        <div class="pbmit-menu-wrap">
                                            <span class="closepanel">
                                                <i class="pbmit-base-icon-close-circular-button-symbol"></i>
                                            </span>
                                            <ul class="navigation clearfix">
                                                <li>
                                                    <a href="{{ route('site.index') }}">{{ ('Anasayfa') }}</a>
                                                </li>
                                                <li class="dropdown">
                                                    <a href="#">{{ __('Kurumsal') }}</a>
                                                    <ul>
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
                                                <li class="dropdown">
                                                    <a href="{{ route(getResourceFullLink('services')) }}">{{ __('Hizmetler') }}</a>
                                                    <ul>
                                                        @foreach($allServices as $headerService)
                                                            <li>
                                                                <a href="{{ route(getResourceFullLink('services','show'),$headerService) }}">{{ $headerService->name }}</a>
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                </li>
                                                <li class="dropdown">
                                                    <a href="#">{{ __('Bloglar') }}</a>
                                                    <ul>
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
                                </nav>
                            </div>
                        </div>
                        <div class="pbmit-right-box">
                            <div class="pbmit-header-search-btn">
                                <a href="#"><i class="pbmit-base-icon-search-1"></i></a>
                            </div>
                            <div class="menu-right-box d-flex align-items-center">
                                <div class="pbmit-button">
                                    <a href="{{ route(getOtherFullLink('contact')) }}" class="pbmit-btn">
                                        <span class="pbmit-header-button-text-1">{{ __('Bize Ulaşın') }}</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('theme7.pages.blocks.slider')
</header>
<!-- Header Main Area End Here -->
