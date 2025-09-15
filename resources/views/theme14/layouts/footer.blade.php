  <!-- Footer area start here -->
    <footer class="footer-area">
        <div class="footer__shape-left">
            <img class="static-bg-image" src="/theme14/images/shape/footer-shape-left.png" alt="{{ __('Footer Arka Plan Görseli') }}">
        </div>
        <div class="container">
            <div class="footer__wrp pt-130 pb-130">
                <div class="footer__left">
                    <a href="{{ route('site.index') }}" class="logo">
                        <img src="/storage/{{ $settings->get('logo_white') }}" alt="Logo">
                    </a>
                    <p class="mt-30">{{ __('Deneyim ve uzmanlığımızla müvekkillerimize güvenilir, şeffaf ve etkili hukuki çözümler sunuyoruz.') }}</p>
                </div>
                <div class="footer__right">
                    <div class="footer__item-wrp">
                        <div class="footer__item">
                            <h4 class="title">{{ __('Kurumsal') }}</h4>
                            <ul>
                                @foreach($allPages as $footerPage)
                                    <li><a href="{{ route(getResourceFullLink('pages','show'),$footerPage) }}">{{ $footerPage->name }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="footer__item">
                            <h4 class="title">{{ __('Hizmetler') }}</h4>
                            <ul>
                                @foreach($allServices as $footerService)
                                    <li><a href="{{ route(getResourceFullLink('services','show'),$footerService) }}">{{ $footerService->name }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="footer__item">
                            <h4 class="title">{{ __('Site Haritası') }}</h4>
                            <ul>
                                <li><a href="{{ route('site.index') }}">{{ __('Ana Sayfa') }}</a></li>
                                <li><a href="{{ route(getResourceFullLink('projects')) }}">{{ __('Projelerimiz') }}</a></li>
                                <li><a href="{{ route(getResourceFullLink('blogs')) }}">{{ __('Bloglar') }}</a></li>
                                <li><a href="{{ route(getOtherFullLink('contact')) }}">{{ __('İletişim') }}</a></li>
                            </ul>
                        </div>
                        <div class="footer__item">
                            <h4 class="title">{{ __('İletişim Bilgileri') }}</h4>
                            <ul>
                                <li><a href="mailto:{{ $settings->get('email') }}">{{ $settings->get('email') }}</a></li>
                                <li><a href="tel:{{ $settings->get('telephone') }}">{{ $settings->get('telephone') }} </a></li>
                                <li style="color:#b8bfc5">{{ $settings->get('address') }}</li>
                            </ul>
                        </div>
                        <div class="footer__item">
                            <h4 class="title">Follow Us</h4>
                            <div class="socials">
                                @if($settings->get('twitter'))
                                    <a href="{{ $settings->get('twitter') }}"><span class="fa fa-x"></span></a>
                                @endif @if($settings->get('facebook'))
                                    <a href="{{ $settings->get('facebook') }}"><span class="fa-brands fa-facebook-f"></span></a>
                                @endif @if($settings->get('linkedin'))
                                    <a href="{{ $settings->get('linkedin') }}"><span class="fa-brands fa-linkedin"></span></a>
                                @endif @if($settings->get('instagram'))
                                    <a href="{{ $settings->get('instagram') }}"><span class="fa-brands fa-instagram"></span></a>
                                @endif @if($settings->get('youtube'))
                                    <a href="{{ $settings->get('youtube') }}"><span class="fa-brands fa-youtube"></span></a>
                                @endif @if($settings->get('google_business'))
                                    <a href="{{ $settings->get('google_business') }}"><span class="fa-brands fa-google_business"></span></a>
                                @endif
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="footer__copyright">
            <div class="container">
                <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-between gap-1 gap-sm-4">
                    <p>&copy; 2025 İrensoft</p>
                </div>
            </div>
        </div>
    </footer>
