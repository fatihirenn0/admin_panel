<footer class="main-footer">
    <div class="main-footer__bg static-bg-image" style="background-image: url(/theme4/images/backgrounds/footer-bg.png);" alt="{{ __('Footer Arka Plan Görseli') }}"></div>
    <div class="main-footer__top">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-xl-4 wow fadeInUp" data-wow-delay="00ms">
                    <div class="footer-widget footer-widget--about">
                        <a href="{{ route('site.index') }}" class="footer-widget__logo">
                            <img src="/storage/{{ $settings->get('logo_white') }}" width="160" alt="Logo">
                        </a>
                        <p class="footer-widget__text">
                            {{ __('Deneyim ve uzmanlığımızla müvekkillerimize güvenilir, şeffaf ve etkili hukuki çözümler sunuyoruz.') }}
                        </p>
                    </div><!-- /.footer-widget -->
                </div><!-- /.col-md-6 -->
                <div class="col-md-6 col-xl-2 wow fadeInUp" data-wow-delay="100ms">
                    <div class="footer-widget footer-widget--links">
                        <h2 class="footer-widget__title">{{ __('Kurumsal') }}</h2><!-- /.footer-widget__title -->
                        <ul class="list-unstyled footer-widget__links">
                            @foreach($allPages as $footerPage)
                             <li><a href="{{ route(getResourceFullLink('pages','show'),$footerPage) }}">{{ $footerPage->name }}</a></li>
                            @endforeach
                        </ul><!-- /.list-unstyled footer-widget__links -->
                    </div><!-- /.footer-widget -->
                </div><!-- /.col-md-6 -->
                <div class="col-md-6 col-xl-2 wow fadeInUp" data-wow-delay="200ms">
                    <div class="footer-widget footer-widget--links">
                        <h2 class="footer-widget__title">{{ __('Hizmetler') }}</h2><!-- /.footer-widget__title -->
                        <ul class="list-unstyled footer-widget__links">
                            @foreach($allServices as $footerService)
                            <li><a href="{{ route(getResourceFullLink('services','show'),$footerService) }}">{{ $footerService->name }}</a></li>
                            @endforeach
                        </ul><!-- /.list-unstyled footer-widget__links -->
                    </div><!-- /.footer-widget -->
                </div><!-- /.col-md-6 -->
                <div class="col-md-6 col-xl-2 wow fadeInUp" data-wow-delay="200ms">
                    <div class="footer-widget footer-widget--links">
                        <h2 class="footer-widget__title">{{ __('İletişim Bilgileri') }}</h2><!-- /.footer-widget__title -->
                        <ul class="list-unstyled footer-widget__links">
                            <li>   <a href="mailto:{{ $settings->get('email') }}">{{ $settings->get('email') }}</a></li>
                            <li><a href="tel:{{ $settings->get('telephone') }}">{{ $settings->get('telephone') }}</a></li>
                        </ul><!-- /.list-unstyled footer-widget__links -->
                    </div><!-- /.footer-widget -->
                </div><!-- /.col-md-6 -->
            </div><!-- /.row -->
            <div class="main-footer__info">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="main-footer__info__inner">
                            <div class="main-footer__info__pin">
                                <i class="icon-pin"></i>
                            </div>
                            <div class="main-footer__info__location">
                                {{ $settings->get('address') }}
                            </div>
                            <ul class="list-unstyled main-footer__info__list">
                                <li class="main-footer__info__item">
                                    <div class="main-footer__info__icon">
                                        <i class="icon-telephone-call-1"></i>
                                    </div>
                                    <div class="main-footer__info__content">
                                        <p class="main-footer__info__text">
                                            <a href="tel:{{ $settings->get('telephone') }}">{{ $settings->get('telephone') }}</a>
                                        </p><!-- /.contact-one__info__text -->
                                    </div>
                                </li>
                                <li class="main-footer__info__item">
                                    <div class="main-footer__info__icon">
                                        <i class="icon-mail"></i>
                                    </div>
                                    <div class="main-footer__info__content">
                                        <p class="main-footer__info__text">
                                            <a href="mailto:{{ $settings->get('email') }}">{{ $settings->get('email') }}</a>
                                        </p><!-- /.contact-one__info__text -->
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="main-footer__info__social">
                            @if($settings->get('twitter'))
                                <a href="{{ $settings->get('twitter') }}"><i class="fab fa-facebook-f"></i></a>
                            @endif @if($settings->get('facebook'))
                                <a href="{{ $settings->get('facebook') }}"><i class="fab fa-twitter"></i></a>
                            @endif @if($settings->get('linkedin'))
                                <a href="{{ $settings->get('linkedin') }}"><i class="fab fa-instagram"></i></a>
                            @endif @if($settings->get('instagram'))
                                <a href="{{ $settings->get('instagram') }}"><i class="fab fa-youtube"></i></a>
                            @endif @if($settings->get('youtube'))
                                <a href="{{ $settings->get('youtube') }}"><i class="fab fa-tiktok"></i></a>
                            @endif @if($settings->get('tiktok'))
                                <a href="{{ $settings->get('tiktok') }}"><i class="fab fa-github"></i></a>
                            @endif @if($settings->get('google_business'))
                                <a href="{{ $settings->get('google_business') }}"><i class="fab fa-google"></i></a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- /.container -->
    </div><!-- /.main-footer__top -->
    <div class="main-footer__bottom  wow fadeInUp" data-wow-delay="00ms">
        <div class="container">
            <div class="main-footer__bottom__inner">
                <p class="main-footer__copyright">
                    &copy; Copyright <span class="dynamic-year"></span> İRENSOFT
                </p>
            </div><!-- /.main-footer__inner -->
        </div><!-- /.container -->
    </div><!-- /.main-footer__bottom -->
</footer><!-- /.main-footer -->
