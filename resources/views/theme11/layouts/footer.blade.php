<!-- Main Footer -->
<footer class="main-footer">
    <div class="auto-container">
        <!-- Widgets Section -->
        <div class="widgets-section">
            <!-- Scroll To Top -->
            <div class="scroll-to-top scroll-to-target" data-target="html"><span class="fa fa-angle-up"></span></div>
            <div class="row clearfix">

                <!-- Big Column -->
                <div class="big-column col-lg-6 col-md-12 col-sm-12">
                    <div class="row clearfix">

                        <!--Footer Column-->
                        <div class="footer-column col-lg-7 col-md-6 col-sm-12">
                            <div class="footer-widget logo-widget">
                                <div class="logo">
                                    <a href="{{ route('site.index') }}"><img src="/storage/{{ $settings->get('logo_white') }}" alt="Logo"></a>
                                </div>
                                <div class="text">{{ __('Deneyim ve uzmanlığımızla müvekkillerimize güvenilir, şeffaf ve etkili hukuki çözümler sunuyoruz.') }}</div>
                                <!-- Social Nav -->
                                <ul class="social-nav">
                                    @if($settings->get('twitter'))
                                        <li><a href="{{ $settings->get('twitter') }}"><span class="fa fa-twitter"></span></a></li>
                                    @endif @if($settings->get('facebook'))
                                            <li><a href="{{ $settings->get('facebook') }}"><span class="fa fa-facebook-f"></span></a></li>
                                    @endif @if($settings->get('linkedin'))
                                            <li><a href="{{ $settings->get('linkedin') }}"><span class="fa fa-linkedin"></span></a></li>
                                    @endif @if($settings->get('instagram'))
                                            <li><a href="{{ $settings->get('instagram') }}"><span class="fa fa-instagram"></span></a></li>
                                    @endif @if($settings->get('youtube'))
                                            <li><a href="{{ $settings->get('youtube') }}"><span class="fa fa-youtube"></span></a></li>
                                    @endif @if($settings->get('google_business'))
                                            <li><a href="{{ $settings->get('google_business') }}"><span class="fa fa-google_business"></span></a></li>
                                    @endif
                                </ul>
                            </div>
                        </div>

                        <!--Footer Column-->
                        <div class="footer-column col-lg-5 col-md-6 col-sm-12">
                            <div class="footer-widget links-widget">
                                <h5>{{ __('Kurumsal') }}</h5>
                                <ul class="footer-list">
                                    @foreach($allPages as $footerPage)
                                        <li><a href="{{ route(getResourceFullLink('pages','show'),$footerPage) }}">{{ $footerPage->name }}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>

                    </div>
                </div>

                <!-- Big Column -->
                <div class="big-column col-lg-6 col-md-12 col-sm-12">
                    <div class="row clearfix">

                        <!-- Footer Column -->
                        <div class="footer-column col-lg-6 col-md-6 col-sm-12">
                            <div class="footer-widget contact-widget">
                                <h5>{{ __('Hizmetler') }}</h5>
                                <ul class="footer-list">
                                    @foreach($allServices as $footerService)
                                        <li><a href="{{ route(getResourceFullLink('services','show'),$footerService) }}">{{ $footerService->name }}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>

                        <!-- Footer Column -->
                        <div class="footer-column col-lg-6 col-md-6 col-sm-12">
                            <div class="footer-widget contact-widget">
                                <h5>{{ __('İletişim Bilgileri') }}</h5>
                                <ul>
                                    <li>
                                        <span class="icon flaticon-call-1"></span>
                                        <a href="tel:{{ $settings->get('telephone') }}">{{ $settings->get('telephone') }}</a>
                                    </li>
                                    <li>
                                        <span class="icon flaticon-email-2"></span>
                                        <a href="mailto:{{ $settings->get('email') }}"><span class="__cf_email__">{{ $settings->get('email') }}</span></a>
                                    </li>
                                    <li>
                                        <span class="icon flaticon-maps-and-flags"></span>
                                        {{ $settings->get('address') }}
                                    </li>
                                </ul>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="auto-container">
            <div class="copyright">Copyright 2025, İrensoft</div>
        </div>
    </div>
</footer>
