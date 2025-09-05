<!-- Header Area-->
<header class="header-area">
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <!-- Navbar Brand -->
            <a class="navbar-brand" href="{{ route('site.index') }}">
                <img src="/storage/{{ $settings->get('logo_white') }}" alt="Logo">
            </a>

            <!-- Navbar Toggler -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#lawgisNav" aria-controls="lawgisNav" aria-expanded="false" aria-label="Toggle navigation">
                <i class="ti ti-category"></i>
            </button>

            <!-- Navbar Nav -->
            <div class="collapse navbar-collapse justify-content-end" id="lawgisNav">
                <ul class="navbar-nav navbar-nav-scroll">
                    <li class="lawgis-dd">
                        <a href="{{ route('site.index') }}" class="magnet-link">{{ __('Ana Sayfa') }}</a>
                    </li>
                    <li class="lawgis-dd">
                        <a class="magnet-link" href="#">{{ __('Kurumsal') }} <i class="ti ti-chevron-down"></i></a>
                        <ul class="lawgis-dd-menu">
                            @foreach($allPages as $headerPage)
                            <li class="lawgis-dd">
                                <a class="magnet-link" href="{{ route(getResourceFullLink('pages','show'),$headerPage) }}">{{ $headerPage->name }}</a>
                            </li>
                            @endforeach
                            <li><a class="magnet-link" href="{{ route(getResourceFullLink('teams')) }}">{{ __('Ekibimiz') }}</a></li>
                            <li><a class="magnet-link" href="{{ route(getResourceFullLink('customer_comments')) }}">{{ __('Müşteri Yorumları') }}</a></li>
                            <li><a class="magnet-link" href="{{ route(getResourceFullLink('faqs')) }}">{{ __('Sıkça Sorulan Sorular') }}</a></li>
                        </ul>
                    </li>
                    <li class="lawgis-dd">
                        <a class="magnet-link" href="{{ route(getResourceFullLink('services')) }}">{{ __('Hizmetler') }} <i class="ti ti-chevron-down"></i></a>
                        <ul class="lawgis-dd-menu">
                            @foreach($allServices as $headerService)
                            <li>
                                <a class="magnet-link" href="{{ route(getResourceFullLink('services','show'),$headerService) }}">{{ $headerService->name }}</a>
                            </li>
                            @endforeach
                        </ul>
                    </li>
                    <li class="lawgis-dd">
                        <a class="magnet-link" href="#">{{ __('Bloglar') }} <i class="ti ti-chevron-down"></i></a>
                        <ul class="lawgis-dd-menu">
                            @foreach($allBlogCategories as $headerBlogCategory)
                            <li>
                                <a class="magnet-link" href="{{ route(getResourceFullLink('blog_categories','show'),$headerBlogCategory) }}">{{ $headerBlogCategory->name }}</a>
                            </li>
                            @endforeach
                        </ul>
                    </li>
                    <li class="lawgis-dd">
                        <a href="{{ route(getOtherFullLink('contact')) }}" class="magnet-link">{{ __('İletişim') }}</a>
                    </li>
                </ul>

                <div class="d-flex align-items-center">
                    <!-- Search Button -->
                    <div class="header-search-btn" id="searchButton">
                        <button class="btn">
                            <i class="ti ti-search"></i>
                        </button>
                    </div>

                    <!-- Login Button -->
                    <a class="btn btn-primary" href="{{ route(getOtherFullLink('contact')) }}">
                        <span>{{ __('Bize Ulaşın') }} <i class="ti ti-arrow-up-right"></i></span>
                        <span>{{ __('Bize Ulaşın') }} <i class="ti ti-arrow-up-right"></i></span>
                    </a>
                </div>
            </div>
        </div>
    </nav>
</header>
