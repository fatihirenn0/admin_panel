<!-- Footer -->
<footer id="footer" class="footer">
    <div class="footer-widget-area">
        <div class="container pt-90 pb-60">
            <div class="row">
                <div class="col-md-6 col-lg-6 col-xl-3">
                    <div id="tm_widget_contact_info-1" class="split-nav-menu clearfix widget widget-contact-info clearfix mb-20">
                        <div class="tm-widget tm-widget-contact-info contact-info contact-info-style1 contact-icon-theme-colored1">
                            <div class="thumb">
                                <img alt="Logo" src="/storage/{{ $settings->get('logo_white') }}" />
                            </div>
                            <div class="description">{{ __('Deneyim ve uzmanlığımızla müvekkillerimize güvenilir, şeffaf ve etkili hukuki çözümler sunuyoruz.') }}</div>
                        </div>
                    </div>
                    <div id="tm_widget_social_list_custom-1" class="split-nav-menu clearfix widget widget-social-list-custom clearfix">
                        <ul class="tm-widget tm-widget-social-list tm-widget-social-list-custom styled-icons icon-dark icon-rounded icon-theme-colored1 mt-20">
                            @if($settings->get('twitter'))
                                <li>
                                    <a class="social-link" href="{{ $settings->get('twitter') }}"><span class="fa fa-twitter"></span></a>
                                </li>
                            @endif @if($settings->get('facebook'))
                                <li>
                                    <a class="social-link" href="{{ $settings->get('facebook') }}"><span class="fa fa-facebook-f"></span></a>
                                </li>
                            @endif @if($settings->get('linkedin'))
                                <li>
                                    <a class="social-link" href="{{ $settings->get('linkedin') }}"><span class="fa fa-linkedin"></span></a>
                                </li>
                            @endif @if($settings->get('instagram'))
                                <li>
                                    <a class="social-link" href="{{ $settings->get('instagram') }}"><span class="fa fa-instagram"></span></a>
                                </li>
                            @endif @if($settings->get('youtube'))
                                <li>
                                    <a class="social-link" href="{{ $settings->get('youtube') }}"><span class="fa fa-youtube"></span></a>
                                </li>
                            @endif @if($settings->get('google_business'))
                                <li>
                                    <a class="social-link" href="{{ $settings->get('google_business') }}"><span class="fa fa-google_business"></span></a>
                                </li>
                            @endif
                        </ul>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-xl-3">
                    <div id="nav_menu-1" class="widget widget_nav_menu">
                        <h4 class="widget-title widget-title-line-bottom line-bottom-footer-widget line-bottom-theme-colored2">
                            {{ __('Kurumsal') }}
                        </h4>
                        <div class="menu-service-nav-menu-container">
                            <ul id="menu-service-nav-menu" class="menu">
                                @foreach($allPages as $footerPage)
                                    <li class="menu-item menu-item-type-post_type menu-item-object-services menu-item-20545"><a href="{{ route(getResourceFullLink('pages','show'),$footerPage) }}">{{ $footerPage->name }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-xl-3">
                    <div id="nav_menu-1" class="widget widget_nav_menu">
                        <h4 class="widget-title widget-title-line-bottom line-bottom-footer-widget line-bottom-theme-colored2">
                            {{ __('Hizmetler') }}
                        </h4>
                        <div class="menu-service-nav-menu-container">
                            <ul id="menu-service-nav-menu" class="menu">
                                @foreach($allServices as $footerService)
                                    <li class="menu-item menu-item-type-post_type menu-item-object-services menu-item-20545"><a href="{{ route(getResourceFullLink('services','show'),$footerService) }}">{{ $footerService->name }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-xl-3">
                    <div id="tm_widget_opening_hours_compressed-1" class="split-nav-menu clearfix widget widget-opening-hours-compressed clearfix">
                        <h4 class="widget-title widget-title-line-bottom line-bottom-footer-widget line-bottom-theme-colored2">
                            {{ __('Site Haritası') }}
                        </h4>
                        <ul class="tm-widget tm-widget-opening-hours tm-widget-opening-hours-compressed opening-hours border-dark">
                            <li class="menu-item menu-item-type-post_type menu-item-object-services menu-item-20545"><a href="{{ route('site.index') }}">{{ __('Ana Sayfa') }}</a></li>
                            <li class="menu-item menu-item-type-post_type menu-item-object-services menu-item-20545"><a href="{{ route(getResourceFullLink('projects')) }}">{{ __('Projelerimiz') }}</a></li>
                            <li class="menu-item menu-item-type-post_type menu-item-object-services menu-item-20545"><a href="{{ route(getResourceFullLink('blogs')) }}">{{ __('Bloglar') }}</a></li>
                            <li class="menu-item menu-item-type-post_type menu-item-object-services menu-item-20545"><a href="{{ route(getOtherFullLink('contact')) }}">{{ __('İletişim') }}</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom" data-tm-bg-color="#2A2A2A">
            <div class="container">
                <div class="row pt-20 pb-20">
                    <div class="col-sm-6">
                        <div class="footer-paragraph">
                            © 2025 İrensoft
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<a class="scrollToTop" href="#"><i class="fa fa-angle-up"></i></a>
