<!-- Main Header-->
<header class="main-header">
    <!--Header-Upper-->
    <div class="header-upper">
        <div class="container">
            <div class="clearfix">
                <!-- Logo Box -->
                <div class="pull-left logo-box">
                    <div class="logo"><a href="{{ route('site.index') }}"><img src="/storage/{{ $settings->get('logo_white') }}" alt="Logo" title=""></a></div>
                </div>
                <div class="nav-outer clearfix">
                    <!-- Main Menu -->
                    <nav class="main-menu navbar-expand-md">
                        <div class="navbar-header">
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
                        </div>
                        <div class="navbar-collapse collapse clearfix" id="navbarSupportedContent">
                            <ul class="navigation clearfix">
                                <li class="current"><a href="{{ route('site.index') }}">{{ ('Anasayfa') }}</a>
                                </li>
                                <li class="dropdown"><a href="#">{{ __('Kurumsal') }}</a>
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
                                <li class="dropdown"><a href="{{ route(getResourceFullLink('services')) }}">{{ __('Hizmetler') }}</a>
                                    <ul>
                                        @foreach($allServices as $headerService)
                                            <li>
                                                <a href="{{ route(getResourceFullLink('services','show'),$headerService) }}">{{ $headerService->name }}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </li>
                                <li class="dropdown"><a href="#">{{ __('Bloglar') }}</a>
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

                    <div class="outer-box">
                        <!--Search Box--><div class="search-box-outer">
                            <div class="dropdown">
                                <button class="search-box-btn dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="fa fa-search"></span></button>
                                <ul class="dropdown-menu pull-right search-panel" aria-labelledby="dropdownMenu1">
                                    <li class="panel-outer">
                                        <div class="form-container">
                                            <form method="post" action="#">
                                                <div class="form-group"><input type="search" name="field-name" value="" placeholder="Search Here" required><button type="submit" class="search-btn"><span class="fa fa-search"></span></button></div>
                                            </form>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!--Nav Toggler-->
                        <div class="nav-toggler"><div class="nav-btn hidden-bar-opener"><span class="flaticon-menu"></span></div></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--End Header Upper-->
    <!--Sticky Header-->
    <div class="sticky-header">
        <div class="container clearfix">
            <!--Logo-->
            <div class="logo pull-left">
                <a href="{{ route('site.index') }}" class="img-responsive"><img src="/storage/{{ $settings->get('logo_white') }}" alt="Logo" title=""></a>
            </div>
            <!--Right Col-->
            <div class="right-col pull-right">
                <!-- Main Menu -->
                <nav class="main-menu navbar-expand-md">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent1" aria-controls="navbarSupportedContent1" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <div class="navbar-collapse collapse clearfix" id="navbarSupportedContent1">
                        <ul class="navigation clearfix">
                            <li class="current"><a href="{{ route('site.index') }}">{{ ('Anasayfa') }}</a>
                            </li>
                            <li class="dropdown"><a href="#">{{ __('Kurumsal') }}</a>
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
                            <li class="dropdown"><a href="{{ route(getResourceFullLink('services')) }}">{{ __('Hizmetler') }}</a>
                                <ul>
                                    @foreach($allServices as $headerService)
                                        <li>
                                            <a href="{{ route(getResourceFullLink('services','show'),$headerService) }}">{{ $headerService->name }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </li>
                            <li class="dropdown"><a href="#">{{ __('Bloglar') }}</a>
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
                </nav><!-- Main Menu End-->
            </div>

        </div>
    </div>
    <!--End Sticky Header-->
</header>
<!--End Main Header -->

<!--Form Back Drop-->
<div class="form-back-drop"></div>

<!-- Hidden Navigation Bar -->
<section class="hidden-bar right-align">
    <div class="hidden-bar-closer">
        <button><span class="fa fa-remove"></span></button>
    </div>
    <!-- Hidden Bar Wrapper -->
    <div class="hidden-bar-wrapper">
        <div class="inner-box">
            <div class="logo">
                <a href="{{ route('site.index') }}"><img src="/storage/{{ $settings->get('logo_dark') }}" alt="Logo" title=""></a>
            </div>
            <div class="text">{{ __('Deneyim ve uzmanlığımızla müvekkillerimize güvenilir, şeffaf ve etkili hukuki çözümler sunuyoruz.') }}</div>
            <!-- List Style Four -->
            <ul class="list-style-four">
                <li><span class="icon flaticon-house"></span> <strong>{{ __('Adres Bilgileri') }}</strong>{{ $settings->get('address') }}</li>
                <li><span class="icon flaticon-phone-call"></span> <strong>{{ __('Telefon Numarası') }}</strong>{{ $settings->get('telephone') }}</li>
                <li><span class="icon flaticon-talk"></span><strong>{{ __('E-Posta Adresi') }}</strong>{{ $settings->get('email') }}</li>
            </ul>
            <div class="lower-box">
                <!-- Social Icons -->
                <ul class="social-icons">
                    <li class="follow">{{ __('Sosyal Medya') }}:</li>
                    @if($settings->get('twitter'))
                        <li class="twitter">
                            <a href="{{ $settings->get('twitter') }}"><i class="fa fa-twitter"></i></a>
                        </li>
                    @endif @if($settings->get('facebook'))
                        <li class="facebook">
                            <a href="{{ $settings->get('facebook') }}"><i class="fa fa-facebook"></i></a>
                        </li>
                    @endif @if($settings->get('linkedin'))
                        <li class="linkedin">
                            <a href="{{ $settings->get('linkedin') }}"><i class="fa fa-linkedin"></i></a>
                        </li>
                    @endif @if($settings->get('instagram'))
                        <li class="instagram">
                            <a href="{{ $settings->get('instagram') }}"><i class="fa fa-instagram"></i></a>
                        </li>
                    @endif @if($settings->get('youtube'))
                        <li class="youtube">
                            <a href="{{ $settings->get('youtube') }}"><i class="fa fa-youtube"></i></a>
                        </li>
                    @endif @if($settings->get('google_business'))
                        <li class="google_business">
                            <a href="{{ $settings->get('google_business') }}"><i class="fa fa-google"></i></a>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </div><!-- / Hidden Bar Wrapper -->
</section>
<!-- End / Hidden Bar -->
