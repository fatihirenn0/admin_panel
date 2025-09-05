@extends('theme6.pages.build')
@section('title',__('İletişim'))
@section('content')
<!-- Breadcrumb Area -->
<section class="breadcrumb-area">
    <img class="static-image" src="/theme6/img/bg/practice-breadcrumb-bg.jpg" alt="{{ __('İletişim Sayfası Görseli') }}">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="grerbin-breadcrumb">
                    <h3>{{ __('İletişim') }}</h3>
                    <ul class="bc-list">
                        <li><a href="{{ route('site.index') }}">{{ __('Ana Sayfa') }}</a></li>
                        <li>{{ __('İletişim') }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- /Breadcrumb Area -->

<!-- Contact Area -->
<section class="contact-area">
    <div class="container">
        <div class="get-in-touch-box">
            <div class="row">
                <div class="col-md-12">
                    <div class="gtb-title">
                        <h3>{{ __('Bize Ulaşın') }}</h3>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="single-contact-info">
                        <h4>{{ __('Adres Bilgileri') }}:</h4>
                        <p>{{ $settings->get('address') }}</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="single-contact-info">
                        <h4>{{ __('Telefon Numarası') }}:</h4>
                        <p><a href="tel:{{ $settings->get('telephone') }}" style="font-size: 16px; color: #9d9d9d !important; ">{{ $settings->get('telephone') }}</p></a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="single-contact-info">
                        <h4>{{ __('E-Posta Adresi') }}:</h4>
                        <p><a href="mailto:{{ $settings->get('email') }}" class="__cf_email__" style="font-size: 16px; color: #9d9d9d !important; ">{{ $settings->get('email') }}</a></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="contact-form">
            <h4>{{ __('İletişim Formu') }}</h4>
            <div class="contact-box">
                <form class="cf cform"  action="{{ route('site.contact.message') }}" method="post">@csrf
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <input name="name" class="g-input @error('name') is-invalid @enderror"
                           value="{{ old('name') }}" type="text" placeholder="{{ __('Ad Soyad') }}" required>
                    @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror

                    <input name="email" class="g-input @error('email') is-invalid @enderror"
                           value="{{ old('email') }}" type="email" placeholder="{{ __('E-posta Adresi') }}" required>
                    @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    <input name="telephone" class="g-input @error('telephone') is-invalid @enderror"
                           type="text" value="{{ old('telephone') }}" placeholder="{{ __('Telefon Numarası') }}" required>
                    @error('telephone')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    <input name="subject" class="g-input @error('subject') is-invalid @enderror"
                           type="text" value="{{ old('subject') }}" placeholder="{{ __('Konu') }}" required>
                    @error('subject')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    <textarea name="message" class="g-input @error('message') is-invalid @enderror"
                              rows="7" placeholder="{{ __('Mesaj') }}" required>{{ old('message') }}</textarea>
                    @error('message')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    <button style="font-size: 16px; background-color: #878a95;  border: 1px solid #878a95; line-height: 22px; color: #fff; padding: 18px 37px; cursor: pointer" type="submit" class="btn-primary" >{{ __('Gönder') }}</button>
                </form>
            </div>
        </div>
    </div>
    <div class="contact-map">
        @if($settings->get('google_map_link'))
            <div style="width: 100% !important;" class="map w-100">{!! $settings->get('google_map_link') !!}</div>
        @endif
    </div>
</section>
<!-- /Contact Area -->
@endsection
