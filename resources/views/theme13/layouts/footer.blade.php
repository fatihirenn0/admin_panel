<!-- Footer -->
<footer class="footer footer-three position-relative overflow-x-hidden">
    <div class="position-relative">
        <div class="container content">
            <div class="row g-3 g-lg-4">
                <div class="col-md-4 col-xl-3">
                    <div class="footer-card gap-3 gap-xl-5 h-100 d-flex flex-column align-content-between">
                        <div class="flex-grow-1">
                            <h3 class="text-dark pb-3">{{ __('İletişim Bilgileri') }}</h3>
                            <ul class="contact-two">
                                <li class="contact-item">
                                    <div class="contact-icon">
                                        <i class="ti ti-phone-call"></i>
                                    </div>
                                    <div class="d-flex flex-column gap-1">
                                        <a href="tel:{{ $settings->get('telephone') }}">{{ $settings->get('telephone') }}</a>
                                    </div>
                                </li>
                                <li class="contact-item">
                                    <div class="contact-icon">
                                        <i class="ti ti-mail"></i>
                                    </div>
                                    <div class="d-flex flex-column gap-1">
                                        <a href="mailto:{{ $settings->get('email') }}">{{ $settings->get('email') }}</a>
                                    </div>
                                </li>
                                <li class="contact-item">
                                    <div class="contact-icon">
                                        <i class="ti ti-map-pin-search"></i>
                                    </div>
                                    <div class="d-flex flex-column gap-1">
                                        <p class="mb-0">{{ $settings->get('address') }}</p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <a href="{{ route('site.index') }}" class="d-block logo">
                            <img src="/storage/{{ $settings->get('logo_dark') }}" class="img-fluid" alt="Logo" />
                        </a>
                    </div>
                </div>
                <div class="col-md-8 col-xl-9">
                    <div class="navigate-part row g-3">
                        <div class="col-lg-4 navigation">
                            <h4 class="text-white mb-4">{{ __('Kurumsal') }}</h4>
                            <ul class="navigation-links">
                                @foreach($allPages as $footerPage)
                                    <li><a href="{{ route(getResourceFullLink('pages','show'),$footerPage) }}">{{ $footerPage->name }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="col-lg-4 navigation">
                            <h4 class="text-white mb-4">{{ __('Hizmetler') }}</h4>
                            <ul class="navigation-links">
                                @foreach($allServices as $footerService)
                                    <li><a href="{{ route(getResourceFullLink('services','show'),$footerService) }}">{{ $footerService->name }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="col-lg-4 navigation">
                            <h4 class="text-white mb-4">{{ __('Site Haritası') }}</h4>
                            <ul class="navigation-links">
                                <li><a href="{{ route('site.index') }}">{{ __('Ana Sayfa') }}</a></li>
                                <li><a href="{{ route(getResourceFullLink('projects')) }}">{{ __('Projelerimiz') }}</a></li>
                                <li><a href="{{ route(getResourceFullLink('blogs')) }}">{{ __('Bloglar') }}</a></li>
                                <li><a href="{{ route(getOtherFullLink('contact')) }}">{{ __('İletişim') }}</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="copyright-two row">
                        <div class="col-md-4">
                            <span class="text-sm text-white mb-3 d-inline-block">Copyright</span>
                            <h5 class="text-white">
                                ©<span class="text-primary">İrensoft</span>
                                <span id="year"></span>
                            </h5>
                        </div>
                        <div class="col-md-4">
                            <span class="text-sm text-white mb-3 d-inline-block">{{ __('Pzt - Cuma') }}</span>
                            <h5 class="text-white">{{ __('08.30 - 17.30') }}</h5>
                        </div>
                        <div class="col-md-4">
                            <span class="text-sm text-white mb-3 d-inline-block">{{ __('Sosyal Medaya') }}</span>
                            <ul class="social-link">
                                @if($settings->get('twitter'))
                                    <li>
                                        <a href="{{ $settings->get('twitter') }}"><span class="ti ti-brand-twitter"></span></a>
                                    </li>
                                @endif @if($settings->get('facebook'))
                                    <li>
                                        <a href="{{ $settings->get('facebook') }}"><span class="ti ti-brand-facebook"></span></a>
                                    </li>
                                @endif @if($settings->get('linkedin'))
                                    <li>
                                        <a href="{{ $settings->get('linkedin') }}"><span class="ti ti-brand-linkedin"></span></a>
                                    </li>
                                @endif @if($settings->get('instagram'))
                                    <li>
                                        <a href="{{ $settings->get('instagram') }}"><span class="ti ti-brand-instagram"></span></a>
                                    </li>
                                @endif @if($settings->get('youtube'))
                                    <li>
                                        <a href="{{ $settings->get('youtube') }}"><span class="ti ti-brand-youtube"></span></a>
                                    </li>
                                @endif @if($settings->get('google_business'))
                                    <li>
                                        <a href="{{ $settings->get('google_business') }}"><span class="ti ti-brand-google_business"></span></a>
                                    </li>
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
