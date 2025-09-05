@extends('theme10.pages.build') @section('title',__('İletişim')) @section('content')
    <!--Page Title-->
    <section class="page-title static-image" style="background-image: url(/theme10/images/background/4.jpg);" alt="{{ __('İletişim Sayfası 1. Görseli') }}">
        <div class="container">
            <div class="content">
                <h1>{{ __('İletişim') }}</h1>
                <ul class="page-breadcrumb">
                    <li><a href="{{ route('site.index') }}">{{ __('İletişim') }}</a></li>
                    <li>{{ __('İletişim') }}</li>
                </ul>
            </div>
        </div>
    </section>
    <!--End Page Title-->

    <!-- Contact Page Section -->
    <section class="contact-page-section">
        <div class="map-section">
            <!--Map Outer-->
            <div class="map-outer">
                <!--Map Canvas-->
                <div
                    class="map-canvas"
                    data-zoom="12"
                    data-lat="-37.817085"
                    data-lng="144.955631"
                    data-type="roadmap"
                    data-hue="#ffc400"
                    data-title="Envato"
                    data-icon-path="/theme10/images/icons/map-marker.png"
                    data-content="Melbourne VIC 3000, Australia<br><a href='mailto:{{ $settings->get('email') }}'>{{ $settings->get('email') }}</a>"
                ></div>
            </div>
        </div>
        <div class="container">
            <div class="inner-container">
                <h2>
                    {{ __('Hukuki Destek Almak veya') }} <br> {{ __(' Randevu Oluşturmak İçin') }} <span>{{ __('Bizimle İletişime Geçin') }}</span>
                </h2>
                <div class="row clearfix">
                    <!-- Info Column -->
                    <div class="info-column col-lg-7 col-md-12 col-sm-12">
                        <div class="inner-column">
                            <div class="text">{{ __('Aşağıdaki iletişim bilgilerini kullanarak bize ulaşabilirsiniz. Hukuki danışmanlık, randevu talepleri veya diğer sorularınız için memnuniyetle yardımcı oluruz.') }}</div>
                            <ul class="list-style-six">
                                <li><span class="icon fa fa-building"></span> {{ $settings->get('address') }}</li>
                                <li><span class="icon fa fa-fax"></span> {{ $settings->get('email') }}</li>
                                <li><span class="icon fa fa-envelope-o"></span>{{ $settings->get('telephone') }}</li>
                            </ul>
                        </div>
                    </div>

                    <!-- Form Column -->
                    <div class="form-column col-lg-5 col-md-12 col-sm-12">
                        <div class="inner-column">
                            <!--Contact Form-->
                            <div class="contact-form">
                                <form method="post" action="{{ route('site.contact.message') }}">
                                    @csrf @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                    <div class="form-group">
                                        <input name="name" class="@error('name') is-invalid @enderror" value="{{ old('name') }}" type="text" placeholder="{{ __('Ad Soyad') }}" required />
                                        @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <input name="email" class="@error('email') is-invalid @enderror" value="{{ old('email') }}" type="email" placeholder="{{ __('E-posta Adresi') }}" required />
                                        @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <input name="subject" class="@error('subject') is-invalid @enderror" type="text" value="{{ old('subject') }}" placeholder="{{ __('Konu') }}" required />
                                        @error('subject')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <input name="telephone" class="@error('telephone') is-invalid @enderror" type="text" value="{{ old('telephone') }}" placeholder="{{ __('Telefon Numarası') }}" required />
                                        @error('telephone')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <textarea name="message" class="@error('message') is-invalid @enderror" rows="7" placeholder="{{ __('Mesaj') }}" required>{{ old('message') }}</textarea>
                                        @error('message')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <button type="submit" class="theme-btn btn-style-one">{{ __('Gönder') }}</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Team Page Section -->

    <!-- Contact Info Section -->
    <section class="contact-info-section static-image" style="background-image: url(/theme10/images/background/5.jpg);" alt="{{ __('İletişim Sayfası 2. Görseli') }}">
        <div class="container">
            <div class="row clearfix">
                <div class="column col-lg-4 col-md-6 col-sm-12">
                    <h4>{{ __('Adres Bilgileri') }}</h4>
                    <ul class="list-style-seven">
                        <li><span class="icon flaticon-map-1"></span> {{ $settings->get('address') }}</li>
                    </ul>
                </div>
                <div class="column col-lg-4 col-md-6 col-sm-12">
                    <h4>{{ __('Telefon Numarası') }}</h4>
                    <ul class="list-style-seven">
                        <li><span class="icon flaticon-call-answer"></span> {{ $settings->get('telephone') }}</li>
                    </ul>
                </div>
                <div class="column col-lg-4 col-md-6 col-sm-12">
                    <h4>{{ __('E-Posta Adresi') }}</h4>
                    <ul class="list-style-seven">
                        <li><span class="icon fa fa-envelope-o"></span>{{ $settings->get('email') }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!-- End Contact Info Section -->
@endsection
