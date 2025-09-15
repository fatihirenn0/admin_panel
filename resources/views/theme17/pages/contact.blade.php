@extends('theme17.pages.build')
@section('title',__('İletişim'))
@section('content')
<!-- Banner Start -->
<section class="main-inner-banner">
    <span class="bg-icon"></span>
    <div class="inner-banner-shape"></div>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="inner-banner-content">
                    <h1 class="h1-title">{{ __('İletişim') }}</h1>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Banner End -->

<!-- Breadcrumb Start -->
<div class="breadcrumb-box">
    <ul>
        <li>
            <a href="{{ route('site.index') }}" title="HOME">{{ __('Anasayfa') }}</a>
        </li>
        <li>{{ __('İletişim') }}</li>
    </ul>
</div>
<!-- Breadcrumb End -->

<!-- Contact Us Start -->
<section class="page-contact-us">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 order-lg-1 order-2">
                <div class="contact-us-content wow left-animation" data-wow-duration="0.8s"
                     data-wow-delay="0.2s">
                    <span class="sub-title">{{ __('İletişim') }}</span>
                    <h2 class="h2-title">{{ __('Bize Ulaşın') }}</h2>
                    <div class="contact-link-list">
                        <div class="contact-link-box">
                            <div class="icon">
                                <img class="static-image" src="/theme17/images/location-icon.svg" width="35" height="40"
                                     alt="{{ __('İletişim Sayfası 1.İkon') }}">
                            </div>
                            <div class="text">
                                <h4 class="h4-title">{{ __('Adres Bilgileri') }}</h4>
                                <p>{{ $settings->get('address') }}</p>
                            </div>
                        </div>
                        <div class="contact-link-box">
                            <div class="icon">
                                <img class="static-image" src="/theme17/images/email-icon.svg" width="38" height="28"
                                     alt="{{ __('İletişim Sayfası 2.İkon') }}">
                            </div>
                            <div class="text">
                                <h4 class="h4-title">{{ __('E-Posta Adresi') }}</h4>
                                <p>
                                    <a href="mailto:{{ $settings->get('email') }}" title="Mail on support@lawace.com"><span class="__cf_email__">{{ $settings->get('email') }}</span></a>
                                </p>
                            </div>
                        </div>
                        <div class="contact-link-box">
                            <div class="icon">
                                <img class="static-image"  src="/theme17/images/phone-icon.svg" width="35" height="35"
                                     alt="{{ __('İletişim Sayfası 3.İkon') }}">
                            </div>
                            <div class="text">
                                <h4 class="h4-title">{{ __('Telefon Numarası') }}</h4>
                                <p>
                                    <a href="tel:{{ $settings->get('telephone') }}" title="Call on +91 987 9874 987">{{ $settings->get('telephone') }}</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 order-lg-2 order-1">
                <div class="contact-us-form wow right-animation" data-wow-duration="0.8s" data-wow-delay="0.2s">
                    <div class="contact-form">
                        <form action="{{ route('site.contact.message') }}" method="post">@csrf
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-box">
                                        <input name="name" class="form-input @error('name') is-invalid @enderror" value="{{ old('name') }}" type="text" placeholder="{{ __('Ad Soyad') }}" required />
                                        @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-box">
                                        <input name="email" class="form-input @error('email') is-invalid @enderror" value="{{ old('email') }}" type="email" placeholder="{{ __('E-posta Adresi') }}" required />
                                        @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-box">
                                        <input name="telephone" class="form-input @error('telephone') is-invalid @enderror" type="tel" value="{{ old('telephone') }}" placeholder="{{ __('Telefon Numarası') }}" required />
                                        @error('telephone')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-box">
                                        <input name="subject" class="form-input @error('subject') is-invalid @enderror" type="text" value="{{ old('subject') }}" placeholder="{{ __('Konu') }}" required />
                                        @error('subject')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-box">
                                        <textarea name="message" class="form-input @error('message') is-invalid @enderror" rows="7" placeholder="{{ __('Mesaj') }}" required>{{ old('message') }}</textarea>
                                        @error('message')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-box mb-0">
                                        <button type="submit" class="sec-btn">
                                            <span>{{ __('Gönder') }}</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Contact Us End -->

<!-- Google Map Start -->
<div class="google-map">
    @if($settings->get('google_map_link'))
        <div style="width: 100% !important;" class="map w-100">{!! $settings->get('google_map_link') !!}</div>
    @endif
</div>
<!-- Google Map End -->
@endsection
