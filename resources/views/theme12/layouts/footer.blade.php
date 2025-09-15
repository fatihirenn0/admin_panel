<footer class="footer-wrapper footer-layout1">
    <div class="widget-area bg-footer-color">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-md-6 col-xl-auto footer-border-right">
                    <div class="widget widget_nav_menu footer-widget">
                        <h3 class="widget_title">{{ __('Kurumsal') }}</h3>
                        <div class="menu-all-pages-container">
                            <ul class="menu">
                                @foreach($allPages as $footerPage)
                                    <li><a href="{{ route(getResourceFullLink('pages','show'),$footerPage) }}">{{ $footerPage->name }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-auto footer-border-right">
                    <div class="widget widget_nav_menu footer-widget">
                        <h3 class="widget_title">{{ __('Hizmetler') }}</h3>
                        <div class="menu-all-pages-container">
                            <ul class="menu">
                                @foreach($allServices as $footerService)
                                    <li><a href="{{ route(getResourceFullLink('services','show'),$footerService) }}">{{ $footerService->name }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-4 footer-border-right">
                    <div class="widget footer-widget text-xl-center text-start">
                        <div class="th-widget-about">
                            <div class="about-logo">
                                <a href="{{ route('site.index') }}"><img src="/storage/{{ $settings->get('logo_white') }}" alt="Logo" /></a>
                            </div>
                            <p class="about-text">{{ __('Deneyim ve uzmanlığımızla müvekkillerimize güvenilir, şeffaf ve etkili hukuki çözümler sunuyoruz.') }}</p>
                            <div class="th-social">
                                @if($settings->get('twitter'))
                                   <a href="{{ $settings->get('twitter') }}"><span class="fab fa-twitter"></span></a>
                                @endif @if($settings->get('facebook'))
                                   <a href="{{ $settings->get('facebook') }}"><span class="fab fa-facebook-f"></span></a>
                                @endif @if($settings->get('linkedin'))
                                   <a href="{{ $settings->get('linkedin') }}"><span class="fab fa-linkedin"></span></a>
                                @endif @if($settings->get('instagram'))
                                   <a href="{{ $settings->get('instagram') }}"><span class="fab fa-instagram"></span></a>
                                @endif @if($settings->get('youtube'))
                                   <a href="{{ $settings->get('youtube') }}"><span class="fab fa-youtube"></span></a>
                                @endif @if($settings->get('google_business'))
                                   <a href="{{ $settings->get('google_business') }}"><span class="fab fa-google_business"></span></a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-auto footer-border-right">
                    <div class="widget footer-widget">
                        <div class="th-widget-contact">
                            <div class="info-box">
                                <div class="info-box_icon"><i class="fa-regular fa-location-dot"></i></div>
                                <div class="info-contnt">
                                    <h4 class="footer-info-title">{{ __('Adres Bilgileri') }}</h4>
                                    <p class="info-box_text"> {{ $settings->get('address') }}</p>
                                </div>
                            </div>
                            <div class="info-box">
                                <div class="info-box_icon"><i class="fa-regular fa-phone"></i></div>
                                <div class="info-contnt">
                                    <h4 class="footer-info-title">{{ __('Telefon Numarası')  }}</h4>
                                    <p class="info-box_text"><a href="tel:{{ $settings->get('telephone') }}" class="info-box_link">{{ $settings->get('telephone') }}</a></p>
                                </div>
                            </div>
                            <div class="info-box">
                                <div class="info-box_icon"><i class="fa-regular fa-envelope"></i></div>
                                <div class="info-contnt">
                                    <h4 class="footer-info-title">{{ __('E-Posta Adresi') }}</h4>
                                    <p class="info-box_text"><a href="mailto:{{ $settings->get('email') }}" class="info-box_link">{{ $settings->get('email') }}</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="copyright-wrap">
        <div class="container">
            <div class="row gy-2 align-items-center">
                <div class="col-md-12">
                    <p class="copyright-text text-center">Copyright <i class="fal fa-copyright"></i> 2025 <a href="{{ route('site.index') }}">İrensoft</a></p>
                </div>
            </div>
        </div>
    </div>
</footer>
