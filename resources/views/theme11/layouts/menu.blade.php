<!-- Main Header-->
<header class="main-header header-style-one">
    <!--Header-Upper-->
    <div class="header-upper">
        <div class="auto-container clearfix">
            <div class="pull-left logo-box">
                <div class="logo">
                    <a href="{{ route('site.index') }}"><img src="/storage/{{ $settings->get('logo_dark') }}" alt="Logo" title="" /></a>
                </div>
            </div>

            <div class="nav-outer clearfix">
                <!-- Mobile Navigation Toggler -->
                <div class="mobile-nav-toggler"><span class="icon flaticon-menu"></span></div>
                <!-- Main Menu -->
                <nav class="main-menu navbar-expand-md">
                    <div class="navbar-header">
                        <!-- Toggle Button -->
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>

                    <div class="navbar-collapse collapse clearfix" id="navbarSupportedContent">
                        <ul class="navigation clearfix">
                            <li class="current"><a href="{{ route('site.index') }}">{{ ('Anasayfa') }}</a></li>
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
                </nav>

                <!-- Main Menu End-->
                <div class="outer-box clearfix">
                    <!-- Btn Box -->
                    <div class="btn-box">
                        <a href="{{ route(getOtherFullLink('contact')) }}" class="theme-btn btn-style-one"><span class="txt">{{ __('Bize Ulaşın') }}</span></a>
                    </div>

                    <!-- Phone Box -->
                    <div class="phone-box">
                        <div class="box-inner">
                            <span class="icon flaticon-smartphone-1"></span>
                            {{ __('Telefon Numarası') }}
                            <strong>{{ $settings->get('telephone') }}</strong>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--End Header Upper-->

    <!-- Sticky Header  -->
    <div class="sticky-header">
        <div class="auto-container clearfix">
            <!--Logo-->
            <div class="logo pull-left">
                <a href="{{ route('site.index') }}"><img src="/storage/{{ $settings->get('logo_white') }}" alt="Logo" title="" /></a>
            </div>
            <!--Right Col-->
            <div class="pull-right">
                <!-- Main Menu -->
                <nav class="main-menu">
                    <!--Keep This Empty / Menu will come through Javascript-->
                </nav>
                <!-- Main Menu End-->

                <!-- Main Menu End-->
                <div class="outer-box clearfix">
                    <!-- Btn Box -->
                    <div class="btn-box">
                        <a href="{{ route(getOtherFullLink('contact')) }}" class="theme-btn btn-style-one"><span class="txt">{{ __('Bize Ulaşın') }}</span></a>
                    </div>

                    <!-- Mobile Navigation Toggler -->
                    <div class="mobile-nav-toggler"><span class="icon flaticon-menu"></span></div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Sticky Menu -->

    <!-- Mobile Menu  -->
    <div class="mobile-menu">
        <div class="menu-backdrop"></div>
        <div class="close-btn"><span class="icon flaticon-multiply"></span></div>

        <nav class="menu-box">
            <div class="nav-logo">
                <a href="{{ route('site.index') }}"><img src="/storage/{{ $settings->get('logo_white') }}" alt="Logo" title="" /></a>
            </div>
            <div class="menu-outer"><!--Here Menu Will Come Automatically Via Javascript / Same Menu as in Header--></div>
        </nav>
    </div>
    <!-- End Mobile Menu -->
</header>
<!-- End Main Header -->
