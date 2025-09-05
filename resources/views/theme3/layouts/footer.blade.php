<!-- Main Footer -->
<footer class="main-footer footer-style-one">
    <div class="icon-pattern1"></div>
    <div class="icon-pattern2"></div>
    <!-- Widgets Section -->
    <div class="widgets-section">
        <div class="auto-container">
            <div class="row">
                <!-- Footer Column -->
                <div class="footer-column col-xl-3 col-sm-6">
                    <div class="footer-widget about-widget">
                        <h5 class="widget-title">{{ __('Adres') }}</h5>
                        <div class="text">{{ $settings->get('address') }}</div>
                    </div>
                </div>
                <!-- Footer Column -->
                <div class="footer-column footer-column-style-two col-xl-3 col-sm-6">
                    <div class="footer-widget links-widget">
                        <h5 class="widget-title">{{ __('Kurumsal') }}</h5>
                        <div class="widget-content">
                            <ul class="user-links">
                                @foreach($allPages as $footerPage)
                                    <li><a href="{{ route(getResourceFullLink('pages','show'),$footerPage) }}">{{ $footerPage->name }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- Footer COlumn -->
                <div class="footer-column col-xl-3 col-sm-6">
                    <div class="footer-widget links-widget">
                        <h5 class="widget-title widget-title-style-two">{{ __('Hizmetler') }}</h5>
                        <div class="widget-content">
                            <ul class="user-links">
                                @foreach($allServices as $footerService)
                                    <li><i class="icon fal fa-chevron-right"></i><a href="{{ route(getResourceFullLink('services','show'),$footerService) }}">{{ $footerService->name }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="footer-column col-xl-3 col-sm-6">
                    <div class="footer-widget links-widget">
                        <h5 class="widget-title widget-title-style-two">{{ __('İletişim Bilgileri') }}</h5>
                        <div class="widget-content">
                            <ul class="user-links">
                                <li>
                                    <a href="mailto:{{ $settings->get('email') }}">{{ $settings->get('email') }}</a>
                                </li>
                                <li>
                                    <a href="tel:{{ $settings->get('telephone') }}">{{ $settings->get('telephone') }}</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--  Footer Bottom -->
    <div class="footer-bottom">
        <div class="auto-container">
            <div class="inner-container">
                <div class="copyright-text">© Copyright 2025 IRENSOFT</div>
                <ul class="social-icon-two">
                    @if($settings->get('twitter'))
                        <a href="{{ $settings->get('twitter') }}"><i class="fa-brands fa-twitter"></i></a>
                    @endif @if($settings->get('facebook'))
                        <a href="{{ $settings->get('facebook') }}"><i class="fa-brands fa-facebook-f"></i></a>
                    @endif @if($settings->get('linkedin'))
                        <a href="{{ $settings->get('linkedin') }}"><i class="fa-brands fa-linkedin-in"></i></a>
                    @endif @if($settings->get('instagram'))
                        <a href="{{ $settings->get('instagram') }}"><i class="fa-brands fa-instagram"></i></a>
                    @endif @if($settings->get('youtube'))
                        <a href="{{ $settings->get('youtube') }}"><i class="fa-brands fa-youtube"></i></a>
                    @endif @if($settings->get('tiktok'))
                        <a href="{{ $settings->get('tiktok') }}"><i class="fa-brands fa-tiktok"></i></a>
                    @endif @if($settings->get('google_business'))
                        <a href="{{ $settings->get('google_business') }}"><i class="fa-brands fa-google"></i></a>
                    @endif
                </ul>
            </div>
        </div>
    </div>
</footer>
<!--End Main Footer -->
