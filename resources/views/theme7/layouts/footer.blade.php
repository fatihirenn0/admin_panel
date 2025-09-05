<!-- footer -->
<footer class="footer site-footer">
    <div class="footer-wrap pbmit-footer-big-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="pbmit-footer-logo">
                        <img src="/storage/{{ $settings->get('logo_dark') }}" alt="Logo">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="pbmit-footer-widget-area">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-lg-3">
                    <div class="widget pbmit-two-column-menu">
                        <h2 class="widget-title">{{ __('Kurumsal') }}</h2>
                        <div class="textwidget">
                            <ul>
                                @foreach($allPages as $footerPage)
                                    <li><a href="{{ route(getResourceFullLink('pages','show'),$footerPage) }}">{{ $footerPage->name }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="pbmit-two-widget">
                        <div class="widget">
                            <h3 class="widget-title">{{ __('Hizmetler') }}</h3>
                            <div class="textwidget">
                                <ul>
                                    @foreach($allServices as $footerService)
                                        <li><a href="{{ route(getResourceFullLink('services','show'),$footerService) }}">{{ $footerService->name }}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="pbmit-two-widget">
                        <div class="widget">
                            <h3 class="widget-title">{{ __('Site Haritası') }}</h3>
                            <div class="textwidget">
                                <ul>
                                    <li><a href="{{ route('site.index') }}">{{ __('Ana Sayfa') }}</a></li>
                                    <li><a href="{{ route(getResourceFullLink('projects')) }}">{{ __('Projelerimiz') }}</a></li>
                                    <li><a href="{{ route(getResourceFullLink('blogs')) }}">{{ __('Bloglar') }}</a></li>
                                    <li><a href="{{ route(getOtherFullLink('contact')) }}">{{ __('İletişim') }}</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="widget">
                        <h3 class="widget-title">{{ __('İletişim Bilgileri') }}</h3>
                        <div class="pbmit-contact-widget-lines">
                            <div class="pbmit-contact-widget-line widget-address">{{ $settings->get('address') }}</div>
                            <div class="pbmit-contact-widget-line widget-address"><a href="mailto:{{ $settings->get('email') }}" class="__cf_email__">{{ $settings->get('email') }}</a></div>
                            <div class="pbmit-contact-widget-line widget-phone">{{ $settings->get('telephone') }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="pbmit-footer-section">
        <div class="container">
            <div class="pbmit-footer-text-inner">
                <div class="row">
                    <div class="col-md-12">
                        <div class="pbmit-footer-copyright-text-area"> Copyright © 2025
                            <a href="#">İRENSOFT</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- footer End -->
