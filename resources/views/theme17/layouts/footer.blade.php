<!-- Footer Start -->
<footer class="site-footer">
    <span class="bg-icon"></span>
    <span class="footer-bg-shape"><img class="static-image" src="/theme17/images/testimonial-bg-shape.svg" width="405" height="641" alt="{{ __('Footer Arka Plan Görseli') }}" /></span>

    <div class="container">
        <div class="footer-top">
            <div class="row">
                <div class="col-lg-3">
                    <div class="footer-info">
                        <h4 class="h4-title footer-title">{{ __('Hakkımızda') }}</h4>
                        <p>{{ __('Deneyim ve uzmanlığımızla müvekkillerimize güvenilir, şeffaf ve etkili hukuki çözümler sunuyoruz.') }}</p>
                        <div class="social-media">
                            @if($settings->get('twitter'))
                                <a href="{{ $settings->get('twitter') }}"><span class="fa fa-twitter"></span></a>
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
                <div class="col-lg-3 col-sm-6 col-md-3">
                    <div class="footer-link-wp">
                        <div class="footer-link">
                            <h4 class="h4-title footer-title">{{ __('Kurumsal') }}</h4>
                            <ul>
                                @foreach($allPages as $footerPage)
                                    <li><a href="{{ route(getResourceFullLink('pages','show'),$footerPage) }}">{{ $footerPage->name }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 col-md-4">
                    <div class="footer-link-wp">
                        <div class="footer-link">
                            <h4 class="h4-title footer-title">{{ __('Hizmetler') }}</h4>
                            <ul>
                                @foreach($allServices as $footerService)
                                    <li><a href="{{ route(getResourceFullLink('services','show'),$footerService) }}">{{ $footerService->name }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-5">
                    <div class="footer-contact">
                        <h4 class="h4-title footer-title">{{ __('İletişim Bilgileri') }}</h4>
                        <ul>
                            <li>
                                <span class="icon"><i class="fas fa-map-marker-alt"></i></span>
                                <div class="text">
                                    <div>{{ $settings->get('address') }}</div>
                                </div>
                            </li>
                            <li>
                                <span class="icon"><i class="fas fa-envelope"></i></span>
                                <div class="text">
                                    <div>
                                        <a href="mailto:{{ $settings->get('email') }}" title="{{ $settings->get('email') }}"><span class="__cf_email__">{{ $settings->get('email') }}</span></a>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <span class="icon"><i class="fas fa-phone-alt"></i></span>
                                <div class="text">
                                    <div>
                                        <a href="tel:{{ $settings->get('telephone') }}" title="{{ $settings->get('telephone') }}">{{ $settings->get('telephone') }}</a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="footer-logo">
                <a href="{{ route('site.index') }}" title="Logo"><img src="/storage/{{ $settings->get('logo_white') }}" width="164" height="47" alt="Logo" /></a>
            </div>
            <div class="copy-right">
                <p>Copyright © <span id="copy-right-year">2025 </span> İrensoft</p>
            </div>
        </div>
    </div>
</footer>
<!-- Footer End -->
