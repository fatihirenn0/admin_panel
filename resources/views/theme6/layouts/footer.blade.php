<!-- Footer Area -->
<footer class="footer-area">
    <div class="footer-widget-area">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="f-widget footer-logo-text">
                        <img src="/storage/{{ $settings->get('logo_white') }}" alt="Logo" />
                        <p>
                            {{ __('Avukatlık, kişilerin ya da kurumların hak ve menfaatlerini korumak, hukuki sorunlarına çözüm üretmek ve yargı mercileri ile resmi kurumlarda onları temsil etmek amacıyla yapılan meslektir. Avukat, hukuki
                            bilgi ve deneyimiyle müvekkiline yol gösterir, dava açar veya açılan davada savunma yapar, gerekli dilekçe ve belgeleri hazırlar. Bunun yanında sözleşme düzenleme, hukuki danışmanlık sağlama, icra ve noter
                            işlemlerinde müvekkil adına hareket etme gibi görevleri vardır.') }}
                        </p>
                        <ul class="footer-social">
                            @if($settings->get('twitter'))
                                <li>
                                    <a href="{{ $settings->get('twitter') }}"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                                </li>
                            @endif @if($settings->get('facebook'))
                                <li>
                                    <a href="{{ $settings->get('facebook') }}"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                </li>
                            @endif @if($settings->get('linkedin'))
                                <li>
                                    <a href="{{ $settings->get('linkedin') }}"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                                </li>
                            @endif @if($settings->get('instagram'))
                                <li>
                                    <a href="{{ $settings->get('instagram') }}"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                                </li>
                            @endif @if($settings->get('youtube'))
                                <li>
                                    <a href="{{ $settings->get('youtube') }}"><i class="fa fa-youtube" aria-hidden="true"></i></a>
                                </li>
                            @endif @if($settings->get('tiktok'))
                                <li>
                                    <a href="{{ $settings->get('tiktok') }}"><i class="fa fa-tiktok" aria-hidden="true"></i></a>
                                </li>
                            @endif @if($settings->get('google_business'))
                                <li>
                                    <a href="{{ $settings->get('google_business') }}"><i class="fa fa-google" aria-hidden="true"></i></a>
                                </li>
                            @endif
                        </ul>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="f-widget">
                                <h4>{{ __('Kurumsal') }}</h4>
                                <ul class="fw-links">
                                    @foreach($allPages as $footerPage)
                                        <li><a href="{{ route(getResourceFullLink('pages','show'),$footerPage) }}">{{ $footerPage->name }}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="f-widget">
                                <h4>{{ __('Hizmetler') }}</h4>
                                <ul class="fw-links">
                                    @foreach($allServices as $footerService)
                                        <li><a href="{{ route(getResourceFullLink('services','show'),$footerService) }}">{{ $footerService->name }}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="f-widget">
                                <h4>{{ __('İletişim Bilgileri') }}</h4>
                                <div class="fw-contact">
                                    <p>{{ $settings->get('address') }}</p>
                                    <h5>Phone:</h5>
                                    <a href="tel:{{ $settings->get('telephone') }}">{{ $settings->get('telephone') }}</a>
                                    <h5>Email:</h5>
                                    <a href="mailto:{{ $settings->get('email') }}"><span class="__cf_email__">{{ $settings->get('email') }}</span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-copyright-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="copyright-text">
                        <p>Copyright © 2025 İrensoft</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- /Footer Area -->
