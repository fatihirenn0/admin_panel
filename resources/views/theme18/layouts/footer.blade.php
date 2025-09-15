<!-- Footer -->
<footer>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-6 col-lg-4">
                <div class="footer-item">
                    <div class="footer-logo">
                        <a href="{{ route('site.index') }}">
                            <img src="/storage/{{ $settings->get('logo_white') }}" alt="Logo" />
                        </a>
                        <p>{{ __('Deneyim ve uzmanlığımızla müvekkillerimize güvenilir, şeffaf ve etkili hukuki çözümler sunuyoruz.') }}</p>
                        <ul>
                            @if($settings->get('twitter'))
                                <li>
                                    <a href="{{ $settings->get('twitter') }}"> <i class="icofont-twitter"></i></a>
                                </li>
                            @endif @if($settings->get('facebook'))
                                <li>
                                    <a href="{{ $settings->get('facebook') }}"> <i class="icofont-facebook"></i></a>
                                </li>
                            @endif @if($settings->get('linkedin'))
                                <li>
                                    <a href="{{ $settings->get('linkedin') }}"> <i class="icofont-linkedin"></i></a>
                                </li>
                            @endif @if($settings->get('instagram'))
                                <li>
                                    <a href="{{ $settings->get('instagram') }}"> <i class="icofont-instagram"></i></a>
                                </li>
                            @endif @if($settings->get('youtube'))
                                <li>
                                    <a href="{{ $settings->get('youtube') }}"> <i class="icofont-youtube"></i></a>
                                </li>
                            @endif @if($settings->get('google_business'))
                                <li>
                                    <a href="{{ $settings->get('google_business') }}"> <i class="icofont-google_business"></i></a>
                                </li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3">
                <div class="footer-item">
                    <div class="footer-service">
                        <h3>{{ __('Kurumsal') }}</h3>
                        <ul>
                            @foreach($allPages as $footerPage)
                                <li>
                                    <a href="{{ route(getResourceFullLink('pages','show'),$footerPage) }}"><i class="icofont-simple-right"></i>{{ $footerPage->name }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-2">
                <div class="footer-item">
                    <div class="footer-service">
                        <h3>{{ __('Hizmetler') }}</h3>
                        <ul>
                            @foreach($allServices as $footerService)
                                <li>
                                    <a href="{{ route(getResourceFullLink('services','show'),$footerService) }}"><i class="icofont-simple-right"></i>{{ $footerService->name }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3">
                <div class="footer-item">
                    <div class="footer-find">
                        <h3>{{ __('İletişim Bilgileri') }}</h3>
                        <ul>
                            <li>
                                <i class="icofont-location-pin"></i>
                                {{ $settings->get('address') }}
                            </li>
                            <li>
                                <i class="icofont-ui-call"></i>
                                <a href="tel:{{ $settings->get('telephone') }}">{{ $settings->get('telephone') }}</a>
                            </li>
                            <li>
                                <i class="icofont-at"></i>
                                <a href="mailto:{{ $settings->get('email') }}"><span class="__cf_email__">{{ $settings->get('email') }}</span></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="copyright-area">
            <div class="row justify-content-center">
                <div class="col-sm-7 col-lg-6">
                    <div class="copyright-item">
                        <p>© 2025 İrensoft</p>
                    </div>
                </div>
                <div class="col-sm-5 col-lg-6">
                    <div class="copyright-item copyright-right">
                        <a href="#" target="_blank">{{ __('Şartlar ve Koşullar') }}</a> <span>-</span>
                        <a href="#" target="_blank">{{ __('Gizlilik Politikası') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- End Footer -->
