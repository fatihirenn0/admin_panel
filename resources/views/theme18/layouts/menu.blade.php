<!-- Navbar -->
<div class="navbar-area fixed-top">
    <!-- Menu For Mobile Device -->
    <div class="mobile-nav">
        <a href="{{ route('site.index') }}" class="logo">
            <img src="/storage/{{ $settings->get('logo_white') }}" alt="Logo" />
        </a>
    </div>

    <!-- Menu For Desktop Device -->
    <div class="main-nav">
        <div class="container">
            <nav class="navbar navbar-expand-md navbar-light">
                <a class="navbar-brand" href="{{ route('site.index') }}">
                    <img src="/storage/{{ $settings->get('logo_white') }}" alt="Logo" />
                </a>
                <div class="collapse navbar-collapse mean-menu" id="navbarSupportedContent">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a href="{{ route('site.index') }}" class="nav-link">{{ __('Anasayfa') }}</a>
                        </li>
                        <li class="nav-item">
                            <a href="about.html" class="nav-link">About</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link dropdown-toggle">{{ __('Kurumsal') }}</a>
                            <ul class="dropdown-menu">
                                @foreach($allPages as $headerPage)
                                    <li class="nav-item">
                                        <a href="{{ route(getResourceFullLink('pages','show'),$headerPage) }}" class="nav-link">{{ $headerPage->name }}</a>
                                    </li>
                                @endforeach
                                <li class="nav-item">
                                    <a href="{{ route(getResourceFullLink('teams')) }}" class="nav-link">{{ __('Ekibimiz') }}</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route(getResourceFullLink('customer_comments')) }}" class="nav-link">{{ __('Müşteri Yorumları') }}</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route(getResourceFullLink('faqs')) }}" class="nav-link">{{ __('Sıkça Sorulan Sorular') }}</a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route(getResourceFullLink('services')) }}" class="nav-link dropdown-toggle">{{ __('Hizmetler') }}</a>
                            <ul class="dropdown-menu">
                                @foreach($allServices as $headerService)
                                    <li class="nav-item">
                                        <a href="{{ route(getResourceFullLink('services','show'),$headerService) }}" class="nav-link">{{ $headerService->name }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route(getOtherFullLink('contact')) }}" class="nav-link">{{ __('İletişim') }}</a>
                        </li>
                    </ul>
                    <div class="side-nav">
                        <a href="{{ route(getOtherFullLink('contact')) }}">{{ __('Bize Ulaşın') }}</a>
                    </div>
                </div>
            </nav>
        </div>
    </div>
</div>
<!-- End Navbar -->
<!-- Navbar -->
<div class="navbar-area fixed-top">
    <!-- Menu For Mobile Device -->
    <div class="mobile-nav">
        <a href="{{ route('site.index') }}" class="logo">
            <img src="/storage/{{ $settings->get('logo_white') }}" alt="Logo" />
        </a>
    </div>

    <!-- Menu For Desktop Device -->
    <div class="main-nav">
        <div class="container">
            <nav class="navbar navbar-expand-md navbar-light">
                <a class="navbar-brand" href="{{ route('site.index') }}">
                    <img src="/storage/{{ $settings->get('logo_white') }}" alt="Logo" />
                </a>
                <div class="collapse navbar-collapse mean-menu" id="navbarSupportedContent">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a href="{{ route('site.index') }}" class="nav-link">{{ __('Anasayfa') }}</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link dropdown-toggle">{{ __('Kurumsal') }}</a>
                            <ul class="dropdown-menu">
                                @foreach($allPages as $headerPage)
                                    <li class="nav-item">
                                        <a href="{{ route(getResourceFullLink('pages','show'),$headerPage) }}" class="nav-link">{{ $headerPage->name }}</a>
                                    </li>
                                @endforeach
                                <li class="nav-item">
                                    <a href="{{ route(getResourceFullLink('teams')) }}" class="nav-link">{{ __('Ekibimiz') }}</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route(getResourceFullLink('customer_comments')) }}" class="nav-link">{{ __('Müşteri Yorumları') }}</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route(getResourceFullLink('faqs')) }}" class="nav-link">{{ __('Sıkça Sorulan Sorular') }}</a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route(getResourceFullLink('services')) }}" class="nav-link dropdown-toggle">{{ __('Hizmetler') }}</a>
                            <ul class="dropdown-menu">
                                @foreach($allServices as $headerService)
                                    <li class="nav-item">
                                        <a href="{{ route(getResourceFullLink('services','show'),$headerService) }}" class="nav-link">{{ $headerService->name }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link dropdown-toggle">{{ __('Bloglar') }}</a>
                            <ul class="dropdown-menu">
                                @foreach($allBlogCategories as $headerBlogCategory)
                                    <li class="nav-item">
                                        <a href="{{ route(getResourceFullLink('blog_categories','show'),$headerBlogCategory) }}" class="nav-link">{{ $headerBlogCategory->name }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route(getOtherFullLink('contact')) }}" class="nav-link">{{ __('İletişim') }}</a>
                        </li>
                    </ul>
                    <div class="side-nav">
                        <a href="{{ route(getOtherFullLink('contact')) }}">{{ __('Bize Ulaşın') }}</a>
                    </div>
                </div>
            </nav>
        </div>
    </div>
</div>
<!-- End Navbar -->
