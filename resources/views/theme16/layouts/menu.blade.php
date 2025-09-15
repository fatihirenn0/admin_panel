<header class="header">
    <div class="header_inner">
        <div class="header_logo">
            <a href="{{ route('site.index') }}"><img src="/storage/{{ $settings->get('logo_dark') }}" alt="logo"></a>
        </div>
        <div class="header_right_content">
            <div class="header_top_content">
                <div class="header_top_left_info">
                    <div class="header_top_info">
                        <i class="fa fa-envelope-o"></i>
                        <a href="mailto:{{ $settings->get('email') }}">{{ $settings->get('email') }}</a>
                    </div>
                    <div class="header_top_info">
                        <i class="fa fa-phone"></i>
                        <a href="tel:{{ $settings->get('telephone') }}">{{ $settings->get('telephone') }}</a>
                    </div>
                    <div class="header_top_info">
                        <i class="fa fa-map-marker"></i>
                        <span>{{ $settings->get('address') }}</span>
                    </div>
                </div>
                <div class="header_top_info_right">
                    <div class="social_icon">
                        @if($settings->get('twitter'))
                            <a href="{{ $settings->get('twitter') }}"><i class="fa fa-twitter"></i></a>
                        @endif @if($settings->get('facebook'))
                            <a href="{{ $settings->get('facebook') }}"><i class="fa fa-facebook"></i></a>
                        @endif @if($settings->get('linkedin'))
                            <a href="{{ $settings->get('linkedin') }}"><i class="fa fa-linkedin"></i></a>
                        @endif @if($settings->get('instagram'))
                            <a href="{{ $settings->get('instagram') }}"><i class="fa fa-instagram"></i></a>
                        @endif @if($settings->get('youtube'))
                            <a href="{{ $settings->get('youtube') }}"><i class="fa fa-youtube"></i></a>
                        @endif @if($settings->get('google_business'))
                            <a href="{{ $settings->get('google_business') }}"><i class="fa fa-google"></i></a>
                        @endif
                    </div>
                </div>
            </div>
            <div class="header_bottom_content">
                <div class="mainnav">
                    <ul class="main_menu">
                        <li class="menu-item">
                            <a href="{{ route('site.index') }}">{{ ('Anasayfa') }}</a>
                        </li>
                        <li class="menu-item-has-children">
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
                        <li class="menu-item-has-children">
                            <a href="{{ route(getResourceFullLink('services')) }}">{{ __('Hizmetler') }}</a>
                            <ul class="sub-menu">
                                @foreach($allServices as $headerService)
                                    <li>
                                        <a href="{{ route(getResourceFullLink('services','show'),$headerService) }}">{{ $headerService->name }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </li>
                        <li class="menu-item-has-children">
                            <a href="#">{{ __('Bloglar') }}</a>
                            <ul class="sub-menu">
                                @foreach($allBlogCategories as $headerBlogCategory)
                                    <li>
                                        <a href="{{ route(getResourceFullLink('blog_categories','show'),$headerBlogCategory) }}">{{ $headerBlogCategory->name }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </li>
                        <li class="menu-item"><a href="{{ route(getOtherFullLink('contact')) }}">{{ __('İletişim') }}</a></li>
                    </ul>
                </div>
                <div class="free_contact">
                    <a href="{{ route(getOtherFullLink('contact')) }}" class="btn"><span>{{ __('Bize Ulaşın') }}</span></a>
                </div>
                <button class="ma5menu__toggle" type="button">
                    <i class="ion-android-menu"></i>
                </button>
            </div>
        </div>
    </div>
</header>
