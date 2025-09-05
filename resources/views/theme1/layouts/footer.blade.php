<footer class="footer-three-area">
    <div class="footer-three__shape-left">
        <img class="animation__arryUpDown static-image" src="/theme1/images/shape/footer-three-shape-left.png" alt="{{__('Ana Sayfa Footer 1. Arka Plan Görseli')}}">
    </div>
    <div class="footer-three__shape-right">
        <img class="animation__arryUpDown static-image" src="/theme1/images/shape/footer-three-shape-right.png" alt="{{__('Ana Sayfa Footer 2. Arka Plan Görseli')}}">
    </div>
    <div class="container">
        <div class="footer-three__wrp pt-60 pb-60">
            <a href="{{ route('site.index') }}" class="logo">
                <img src="/storage/{{ $settings->get('footer_logo') }}" alt="Footer Logo">
            </a>
        </div>
        <div class="footer-three__right">
                <div class="footer-three__item-wrp">
                    <div class="footer-three__item">
                        <h4 class="title">{{ __('Kurumsal') }}</h4>
                        <ul>
                            @foreach($allPages as $footerPage)
                                <li>
                                    <a href="{{ route(getResourceFullLink('pages','show'),$footerPage) }}">{{ $footerPage->name }}</a>
                                </li>
                            @endforeach
                            <li><a href="{{ route(getResourceFullLink('teams')) }}">{{ __('Ekibimiz') }}</a></li>
                            <li><a href="{{ route(getResourceFullLink('customer_comments')) }}">{{ __('Müşteri Yorumları') }}</a></li>
                            <li><a href="{{ route(getResourceFullLink('faqs')) }}">{{ __('Sıkça Sorulan Sorular') }}</a></li>

                        </ul>
                    </div>
                    <div class="footer-three__item">
                        <h4 class="title">{{ __('Hizmetler') }}</h4>
                        <ul>
                            @foreach($allServices as $footerService)
                                <li><a href="{{ route(getResourceFullLink('services','show'),$footerService) }}">{{ $footerService->name }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="footer-three__item">
                        <h4 class="title">{{ __('Site Haritası') }}</h4>
                        <ul>
                            <li><a href="{{ route('site.index') }}">{{ __('Ana Sayfa') }}</a></li>
                            <li><a href="{{ route(getResourceFullLink('projects')) }}">{{ __('Projelerimiz') }}</a></li>
                            <li><a href="{{ route(getResourceFullLink('blogs')) }}">{{ __('Bloglar') }}</a></li>
                            <li><a href="{{ route(getOtherFullLink('contact')) }}">{{ __('İletişim') }}</a></li>

                        </ul>
                    </div>

                    <div class="footer-three__item last">
                        <h4 class="title">{{ __('İletişim Bilgileri') }}</h4>
                        <ul>
                            <li><a href="tel:{{ $settings->get('telephone') }}">{{ $settings->get('telephone') }}</a></li>
                            <li><a href="mailto:{{ $settings->get('email') }}">{{ $settings->get('email') }}</a></li>
                            <li><a href="{{ route(getOtherFullLink('contact')) }}">{{ $settings->get('address') }}</a></li>
                        </ul>
                        <div class="socials">
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
    <div class="footer-three__copyright">
        <p>Copyright &copy; 2025 <a href="https://irensoft.com">IRENSOFT</a></p>
    </div>
</footer>
