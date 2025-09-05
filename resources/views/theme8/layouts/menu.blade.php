<!-- Sidebar Section -->
<aside id="mcgill-aside">
    <!-- Logo -->
    <div class="mcgill-logo">
        <a href="{{ route('site.index') }}"><img src="/storage/{{ $settings->get('logo_dark') }}" alt="Logo"></a>
        <h1><a href="{{ route('site.index') }}">{{ $settings->get('title_tr') }}</a></h1>
    </div>
    <!-- Menu -->
    <nav id="mcgill-main-menu">
        <ul>
            <li class="active"><a href='{{ route('site.index') }}'><i class="fa fa-star"></i> {{ __('Ana Sayfa') }}</a></li>
            @foreach($allPages as $headerPage)
                <li><a href='{{ route(getResourceFullLink('pages','show'),$headerPage) }}'><i class="fa fa-star"></i> {{ $headerPage->name }}</a></li>
            @endforeach
            <li><a href='{{ route(getResourceFullLink('services')) }}'><i class="fa fa-star"></i> {{ __('Hizmetler') }}</a></li>
            <li><a href='{{ route(getResourceFullLink('projects')) }}'><i class="fa fa-star"></i> {{ __('Projeler') }}</a></li>
            <li><a href='{{ route(getResourceFullLink('faqs')) }}'><i class="fa fa-star"></i> {{ __('S.S.S') }}</a></li>
            <li><a href='{{ route(getResourceFullLink('blogs')) }}'><i class="fa fa-star"></i> {{ __('Bloglar') }}</a></li>
            <li><a href='{{ route('site.contact') }}'><i class="fa fa-star"></i> {{ __('İletişim') }}</a></li>
        </ul>
    </nav>
    <!-- Info -->
    <div class="mcgill-contact-info">
        <div class="feat-inner">
            <div class="feat-info">
                <h6>{{ ('Bize Ulaşın') }}</h6>
                <h5>{{ $settings->get('telephone') }}</h5>
            </div>
        </div>
    </div>
    <!-- Sidebar Footer -->
    <div class="mcgill-footer">
        <ul>
            @if($settings->get('twitter'))
                <li><a href="{{ $settings->get('twitter') }}"><i class="fab fa-twitter"></i></a></li>
            @endif @if($settings->get('facebook'))
                <li> <a href="{{ $settings->get('facebook') }}"><i class="fab fa-facebook-f"></i></a></li>
            @endif @if($settings->get('linkedin'))
                <li> <a href="{{ $settings->get('linkedin') }}"><i class="fab fa-linkedin-in"></i></a></li>
            @endif @if($settings->get('instagram'))
                <li> <a href="{{ $settings->get('instagram') }}"><i class="fab fa-instagram"></i></a></li>
            @endif @if($settings->get('youtube'))
                <li> <a href="{{ $settings->get('youtube') }}"><i class="fab fa-youtube"></i></a></li>
            @endif @if($settings->get('google_business'))
                <li> <a href="{{ $settings->get('google_business') }}"><i class="fab fa-google"></i></a></li>
            @endif
        </ul>
    </div>
    <div class="copyright text-center">
        <p>&copy; 2025 İRENSOFT</p>
    </div>
</aside>
