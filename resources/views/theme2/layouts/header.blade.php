<div class="fix-area">
    <div class="offcanvas__info">
        <div class="offcanvas__wrapper">
            <div class="offcanvas__content">
                <div class="offcanvas__top mb-5 d-flex justify-content-between align-items-center">
                    <div class="offcanvas__logo">
                        <a href="{{ route('site.index') }}">
                            <img src="/storage/{{ $settings->get('logo_white') }}" alt="logo">
                        </a>
                    </div>
                    <div class="offcanvas__close">
                        <button>
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
                <p class="text d-none d-xl-block">
                    {{ __('Hukuki süreçler karmaşık ve yorucu olabilir. Biz, tüm bu süreçlerde sizin yanınızda durarak haklarınızı korumanıza, doğru adımlar atmanıza ve en iyi sonuca ulaşmanıza yardımcı oluyoruz. Güven ve şeffaflık, çalışma anlayışımızın temelini oluşturur.”') }}
                </p>
                <div class="mobile-menu fix mb-3"></div>
                <div class="offcanvas__contact">
                    <h4>{{ __('İletişim Bilgileri') }}</h4>
                    <ul>
                        <li class="d-flex align-items-center">
                            <div class="offcanvas__contact-icon">
                                <i class="fal fa-map-marker-alt"></i>
                            </div>
                            <div class="offcanvas__contact-text">
                                <a href="#">{{ $settings->get('address') }}</a>
                            </div>
                        </li>
                        <li class="d-flex align-items-center">
                            <div class="offcanvas__contact-icon mr-15">
                                <i class="fal fa-envelope"></i>
                            </div>
                            <div class="offcanvas__contact-text">
                                <a href="mailto:{{ $settings->get('email') }}"><span class="mailto:info@example.com">{{ $settings->get('email') }}</span></a>
                            </div>
                        </li>
                        <li class="d-flex align-items-center">
                            <div class="offcanvas__contact-icon mr-15">
                                <i class="fal fa-clock"></i>
                            </div>
                            <div class="offcanvas__contact-text">
                                <a href="#">{{ __('Pzt - Cmt: 09.00 - 17.30') }}</a>
                            </div>
                        </li>
                        <li class="d-flex align-items-center">
                            <div class="offcanvas__contact-icon mr-15">
                                <i class="far fa-phone"></i>
                            </div>
                            <div class="offcanvas__contact-text">
                                <a href="tel:{{ $settings->get('telephone') }}">+{{ $settings->get('telephone') }}</a>
                            </div>
                        </li>
                    </ul>
                    <div class="header-button mt-4">
                        <a href="{{ route(getOtherFullLink('contact')) }}" class="theme-btn">
                            {{ __('Bize Ulaşın') }} <img class="static-image" src="/theme2/img/head-arrow.svg" alt="{{__('Ana Sayfa Header 1. İkon')}}">
                        </a>
                    </div>
                    <div class="social-icon d-flex align-items-center">
                        @if($settings->get('twitter'))
                            <a href="{{ $settings->get('twitter') }}"><i class="fa-brands fa-twitter"></i></a>
                        @endif
                        @if($settings->get('facebook'))
                            <a href="{{ $settings->get('facebook') }}"><i class="fa-brands fa-facebook-f"></i></a>
                        @endif
                        @if($settings->get('linkedin'))
                            <a href="{{ $settings->get('linkedin') }}"><i class="fa-brands fa-linkedin-in"></i></a>
                        @endif
                        @if($settings->get('instagram'))
                            <a href="{{ $settings->get('instagram') }}"><i class="fa-brands fa-instagram"></i></a>
                        @endif
                        @if($settings->get('youtube'))
                            <a href="{{ $settings->get('youtube') }}"><i class="fa-brands fa-youtube"></i></a>
                        @endif
                        @if($settings->get('tiktok'))
                            <a href="{{ $settings->get('tiktok') }}"><i class="fa-brands fa-tiktok"></i></a>
                        @endif
                        @if($settings->get('google_business'))
                            <a href="{{ $settings->get('google_business') }}"><i class="fa-brands fa-google"></i></a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="offcanvas__overlay"></div>
