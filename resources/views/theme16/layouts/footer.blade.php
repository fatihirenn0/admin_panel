<!-- Footer 1 -->
<footer class="footer">
    <div class="footer_above">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="footer_widget footer_widget_padding">
                        <div class="logo">
                            <a href="{{ route('site.index') }}"><img src="/storage/{{ $settings->get('logo_white') }}" alt="Logo" /></a>
                        </div>
                        <p>{{ __('Deneyim ve uzmanlığımızla müvekkillerimize güvenilir, şeffaf ve etkili hukuki çözümler sunuyoruz.') }}</p>
                        <div class="side_footer_social">
                            <ul class="bottom_social">
                                <li class="facebook">
                                    <a href="#"><i class="ion-social-facebook"></i></a>
                                </li>
                                <li class="twitter">
                                    <a href="#"><i class="ion-social-twitter"></i></a>
                                </li>
                                <li class="dribbble">
                                    <a href="#"><i class="ion-social-dribbble-outline"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-6 col-sm-12">
                    <div class="footer_widget footer_links">
                        <h4 class="widget_title">
                            {{ __('Kurumsal') }}
                        </h4>
                        <div class="footer_nav">
                            <ul class="footer_menu">
                                @foreach($allPages as $footerPage)
                                    <li class="menu-item"><a href="{{ route(getResourceFullLink('pages','show'),$footerPage) }}">{{ $footerPage->name }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-6 col-sm-12">
                    <div class="footer_widget footer_links">
                        <h4 class="widget_title">
                            {{ __('Hizmetler') }}
                        </h4>
                        <div class="footer_nav">
                            <ul class="footer_menu">
                                @foreach($allPages as $footerPage)
                                    <li class="menu-item"><a href="{{ route(getResourceFullLink('pages','show'),$footerPage) }}">{{ $footerPage->name }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="footer_widget">
                        <h4 class="widget_title">
                            {{ __('İletişim Bilgileri') }}
                        </h4>
                        <ul>
                            <li><i class="fa fa-map-marker" aria-hidden="true"></i><span>{{ $settings->get('address') }}</span></li>
                            <li><i class="fa fa-envelope" aria-hidden="true"></i><span>{{ $settings->get('email') }}</span></li>
                            <li><i class="fa fa-phone" aria-hidden="true"></i><span>{{ $settings->get('telephone') }}</span></li>
                            <li><i class="fa fa-clock-o" aria-hidden="true"></i><span>{{ __('Pzt-Cum 08.30 - 17.30') }}</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer_bottom">
        <div class="container">
            <div class="footer_bottom_inner">
                <div class="copyright">
                    <p>&copy;2025 İrensoft</p>
                </div>
                <div class="footer_nav_bottom">
                    <ul>
                        <li><a href="#">{{ __('Gizlilik Politikası') }}</a></li>
                        <li><a href="#">{{ __('Aydınlatma Metni') }}</a></li>
                    </ul>
                </div>
                <div class="totop">
                    <a href="#"><i class="ion-ios-arrow-up"></i></a>
                </div>
            </div>
        </div>
    </div>
</footer>

<div class="slide_navi">
    <div class="side_footer_social">
        <ul class="bottom_social">
            @if($settings->get('twitter'))
                <li class="twitter">
                    <a href="{{ $settings->get('twitter') }}"><i class="ion-social-twitter"></i></a>
                </li>
            @endif @if($settings->get('facebook'))
                <li class="facebook">
                    <a href="{{ $settings->get('facebook') }}"><i class="ion-social-facebook-f"></i></a>
                </li>
            @endif @if($settings->get('linkedin'))
                <li class="linkedin">
                    <a href="{{ $settings->get('linkedin') }}"><i class="ion-social-linkedin"></i></a>
                </li>
            @endif @if($settings->get('instagram'))
                <li class="instagram">
                    <a href="{{ $settings->get('instagram') }}"><i class="ion-social-instagram"></i></a>
                </li>
            @endif @if($settings->get('youtube'))
                <li class="youtube">
                    <a href="{{ $settings->get('youtube') }}"><i class="ion-social-youtube"></i></a>
                </li>
            @endif @if($settings->get('google_business'))
                <li class="google_business">
                    <a href="{{ $settings->get('google_business') }}"><i class="ion-social-google_business"></i></a>
                </li>
            @endif
        </ul>
    </div>
</div>
