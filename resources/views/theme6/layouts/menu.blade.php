<!-- Header Area -->
<header class="header-area grerbin-header">
    <div class="grerbin-top-header">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="gth-content gth-left">
                        <a href="mailto:{{ $settings->get('email') }}"><span class="__cf_email__">{{ $settings->get('email') }}</span></a>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="gth-content gth-right">
                        <p>{{ __('Bize Ulaşın') }} <a href="tel:{{ $settings->get('telephone') }}">{{ $settings->get('telephone') }}</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="grerbin-header-box">
        <div class="container">
            <div class="row">
                <div class="col-3 col-md-3">
                    <div class="logo-wrapper">
                        <a href="{{ route('site.index') }}">
                            <img src="/storage/{{ $settings->get('logo_white') }}" alt="Logo">
                        </a>
                    </div>
                </div>
                <div class="col-9 col-md-9">
                    <div class="gm-box">
                        <div class="grerbin-menu-wrapper">
                            <!-- Mobile menu toggle button (hamburger/x icon) -->
                            <input id="grerbinMenu-state" type="checkbox">
                            <label class="grerbinMenu-btn" for="grerbinMenu-state">
                                <span class="grerbinMenu-btn-icon"></span>
                            </label>
                            <ul id="grerbinMenu" class="sm sm-simple grerbin-menu">
                                <li><a href="{{ route('site.index') }}">Anasayfa</a></li>
                                <li>
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
                                <li>
                                    <a href="{{ route(getResourceFullLink('services')) }}">{{ __('Hizmetler') }}</a>
                                    <ul>
                                        @foreach($allServices as $headerService)
                                             <li>
                                                 <a href="{{ route(getResourceFullLink('services','show'),$headerService) }}">{{ $headerService->name }}</a>
                                             </li>
                                        @endforeach
                                    </ul>
                                </li>
                                <li>
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
                        <div class="mt-icons">
                            <ul class="mti-list">
                                <li><label for="search-terms" id="search-label"><i class="fa fa-search" aria-hidden="true"></i></label></li>

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</header>
