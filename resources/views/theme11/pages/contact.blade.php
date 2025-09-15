@extends('theme11.pages.build')
@section('title',__('İletişim'))
@section('content')
    <!-- Page Title -->
    <section class="page-title static-image" style="background-image: url(/theme11/images/background/1.jpg);" alt="{{ __('İletişim Sayfası Görseli') }}">
        <div class="auto-container">
            <h1>{{ __('İletişim') }}</h1>
            <ul class="page-breadcrumb">
                <li><a href="{{ route('site.index') }}">{{ __('Ana Sayfa') }}</a></li>
                <li>{{ __('İletişim') }}</li>
            </ul>
        </div>
    </section>
    <!-- End Page Title -->

    <!-- Map Section -->
    <section class="map-section">
        <div class="auto-container">
            <div class="inner-container">
                <!-- Map Boxed -->
                <div class="map-boxed">
                    <!-- Map Outer -->
                    <div class="map-outer">
                        @if($settings->get('google_map_link'))
                            <div style="width: 100% !important;" class="map w-100">{!! $settings->get('google_map_link') !!}</div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Map Section -->

    <!-- Contact Form Section -->
    <section class="contact-form-section">
        <div class="auto-container">
            <!-- Sec Title -->
            <div class="sec-title centered">
                <h2>{{ __('Bize Ulaşın') }}</h2>
            </div>
            <!-- Contact Form -->
            <div class="contact-form">
                <!--Contact Form-->
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
                    <div class="row clearfix">
                        <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                            <input name="name" class="@error('name') is-invalid @enderror" value="{{ old('name') }}" type="text" placeholder="{{ __('Ad Soyad') }}" required />
                            @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                            <input name="email" class="@error('email') is-invalid @enderror" value="{{ old('email') }}" type="email" placeholder="{{ __('E-posta Adresi') }}" required />
                            @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-lg-6 col-md-12 col-sm-12 form-group">
                            <input name="telephone" class="@error('telephone') is-invalid @enderror" type="text" value="{{ old('telephone') }}" placeholder="{{ __('Telefon Numarası') }}" required />
                            @error('telephone')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-lg-6 col-md-12 col-sm-12 form-group">
                            <input name="subject" class="g-input @error('subject') is-invalid @enderror" type="text" value="{{ old('subject') }}" placeholder="{{ __('Konu') }}" required />
                            @error('subject')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                            <textarea name="message" class="@error('message') is-invalid @enderror" rows="7" placeholder="{{ __('Mesaj') }}" required>{{ old('message') }}</textarea>
                            @error('message')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-lg-12 col-md-12 col-sm-12 form-group text-center">
                            <button class="theme-btn btn-style-two" type="submit" name="submit-form">
                                <span class="txt">{{ __('Gönder') }}<i class="arrow flaticon-right"></i></span>
                            </button>
                        </div>
                    </div>
                </form>

                <!-- End Contact Form -->
            </div>
        </div>
    </section>
    <!-- End Contact Form Section -->

    <!-- Contact Info Section -->
    <section class="contact-info-section">
        <div class="auto-container">
            <!-- Sec Title -->
            <div class="sec-title centered">
                <h2>{{ __('İletişim Bilgileri') }}</h2>
            </div>
            <div class="row clearfix">
                <!-- Info Block -->
                <div class="info-block col-lg-4 col-md-6 col-sm-12">
                    <div class="inner-box">
                        <div class="icon flaticon-location-pin"></div>
                        <h5>{{ __('Adres Bilgileri') }}</h5>
                        <div class="text">{{ $settings->get('address') }}</div>
                    </div>
                </div>

                <!-- Info Block -->
                <div class="info-block col-lg-4 col-md-6 col-sm-12">
                    <div class="inner-box">
                        <div class="icon flaticon-smartphone"></div>
                        <h5>{{ __('Telefon Numarası') }}</h5>
                        <ul class="info-list">
                            <li><a href="tel:{{ $settings->get('telephone') }}">{{ $settings->get('telephone') }}</a></li>
                        </ul>
                    </div>
                </div>

                <!-- Info Block -->
                <div class="info-block col-lg-4 col-md-6 col-sm-12">
                    <div class="inner-box">
                        <div class="icon flaticon-email-3"></div>
                        <h5>{{ __('E-Posta Adresi') }}</h5>
                        <ul class="info-list">
                            <li><a href="mailto:{{ $settings->get('email') }}">{{ $settings->get('email') }}</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Contact Info Section -->

    <!-- Clients Section -->
    <section class="clients-section style-two">
        <div class="auto-container">
            <!-- Sec Title -->
            <div class="sec-title centered">
                <h2>{{ __('Referanslarımız') }}</h2>
                <div class="text">{{ __('Güvenin inşa edildiği her yerde biz vardık. İşte birlikte çalışmaktan onur duyduğumuz bazı kurumlar.') }}</div>
            </div>
            <div class="inner-container">
                <div class="sponsors-outer">
                    <!--Sponsors Carousel-->
                    <ul class="sponsors-carousel owl-carousel owl-theme">
                        @foreach($allReferences as $indexReference)
                            <li class="slide-item">
                                <figure class="image-box">
                                    <a href="#"><img src="/storage/{{ $indexReference->image }}" alt="{{ $indexReference->name }}" /></a>
                                </figure>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!-- End Clients Section -->
@endsection
