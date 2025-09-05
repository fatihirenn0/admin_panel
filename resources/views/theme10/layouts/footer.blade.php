<!--Main Footer-->
<footer class="main-footer">
    <div class="container">
        <!--Widgets Section-->
        <div class="widgets-section">
            <div class="row clearfix">
                <!--Column-->
                <div class="big-column col-lg-6 col-md-12 col-sm-12">
                    <div class="row clearfix">
                        <!--Footer Column-->
                        <div class="footer-column col-lg-7 col-md-6 col-sm-12">
                            <div class="footer-widget logo-widget">
                                <div class="logo">
                                    <a href="{{ route('site.index') }}"><img src="/storage/{{ $settings->get('logo_white') }}" alt="Logo" /></a>
                                </div>
                                <div class="text">{{ __('Deneyim ve uzmanlığımızla müvekkillerimize güvenilir, şeffaf ve etkili hukuki çözümler sunuyoruz.') }}</div>
                                <ul class="list-style-three">
                                    <li><span class="icon fa fa-phone"></span> {{ $settings->get('telephone') }}</li>
                                    <li><span class="icon fa fa-envelope"></span> {{ $settings->get('email') }}</li>
                                    <li><span class="icon fa fa-home"></span>{{ $settings->get('address') }}</li>
                                </ul>
                            </div>
                        </div>

                        <!--Footer Column-->
                        <div class="footer-column col-lg-5 col-md-6 col-sm-12">
                            <div class="footer-widget links-widget">
                                <h4>{{ __('Kurumsal') }}</h4>
                                <ul class="list-link">
                                    @foreach($allPages as $footerPage)
                                        <li><a href="{{ route(getResourceFullLink('pages','show'),$footerPage) }}">{{ $footerPage->name }}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <!--Column-->
                <div class="big-column col-lg-6 col-md-12 col-sm-12">
                    <div class="row clearfix">
                        <!--Footer Column-->
                        <div class="footer-column col-lg-6 col-md-6 col-sm-12">
                            <div class="footer-widget links-widget">
                                <h4>{{ __('Hizmetler') }}</h4>
                                <ul class="list-link">
                                    @foreach($allServices as $footerService)
                                        <li><a href="{{ route(getResourceFullLink('services','show'),$footerService) }}">{{ $footerService->name }}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>

                        <div class="footer-column col-lg-6 col-md-6 col-sm-12">
                            <div class="footer-widget links-widget">
                                <h4>{{ __('Site Haritası') }}</h4>
                                <ul class="list-link">
                                    <li><a href="{{ route('site.index') }}">{{ __('Ana Sayfa') }}</a></li>
                                    <li><a href="{{ route(getResourceFullLink('projects')) }}">{{ __('Projelerimiz') }}</a></li>
                                    <li><a href="{{ route(getResourceFullLink('blogs')) }}">{{ __('Bloglar') }}</a></li>
                                    <li><a href="{{ route(getOtherFullLink('contact')) }}">{{ __('İletişim') }}</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer Bottom -->
    <div class="footer-bottom">
        <div class="container">
            <div class="row clearfix">
                <!-- Copyright Column -->
                <div class="copyright-column col-lg-6 col-md-6 col-sm-12">
                    <div class="copyright">2025 &copy; <a href="#">İRENSOFT</a></div>
                </div>

                <!-- Social Column -->
                <div class="social-column col-lg-6 col-md-6 col-sm-12">
                    <ul>
                        <li class="follow">Follow us:</li>
                        @if($settings->get('twitter'))
                            <li>
                                <a href="{{ $settings->get('twitter') }}"><i class="fa fa-twitter"></i></a>
                            </li>
                        @endif @if($settings->get('facebook'))
                            <li>
                                <a href="{{ $settings->get('facebook') }}"><i class="fa fa-facebook"></i></a>
                            </li>
                        @endif @if($settings->get('linkedin'))
                            <li>
                                <a href="{{ $settings->get('linkedin') }}"><i class="fa fa-linkedin"></i></a>
                            </li>
                        @endif @if($settings->get('instagram'))
                            <li>
                                <a href="{{ $settings->get('instagram') }}"><i class="fa fa-instagram"></i></a>
                            </li>
                        @endif @if($settings->get('youtube'))
                            <li>
                                <a href="{{ $settings->get('youtube') }}"><i class="fa fa-youtube"></i></a>
                            </li>
                        @endif @if($settings->get('tiktok'))
                            <li>
                                <a href="{{ $settings->get('tiktok') }}"><i class="fa fa-tiktok"></i></a>
                            </li>
                        @endif @if($settings->get('google_business'))
                            <li>
                                <a href="{{ $settings->get('google_business') }}"><i class="fa fa-google"></i></a>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>
