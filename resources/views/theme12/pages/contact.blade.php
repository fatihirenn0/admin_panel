@extends('theme12.pages.build')
@section('title',__('İletişim'))
@section('content')
<div class="breadcumb-wrapper static-image" data-bg-src="/theme12/img/bg/breadcrumb-bg.jpg" data-overlay="title" data-opacity="8" alt="{{ __('İletişim Sayfası Görseli') }}">
    <div class="container">
        <div class="breadcumb-content">
            <h1 class="breadcumb-title">{{ __('İletişim') }}</h1>
            <ul class="breadcumb-menu">
                <li><a href="{{ route('site.index') }}">{{ __('Ana Sayfa') }}</a></li>
                <li>{{ __('İletişim') }}</li>
            </ul>
        </div>
    </div>
</div>
<div class="contact-area-2 space-top" id="contact-sec">
    <div class="container">
        <div class="row gy-4 justify-content-center">
            <div class="contact-icon-wrap">
                <div class="info-box">
                    <div class="info-box_icon"><img class="static-image" src="/theme12/img/icon/contact-icon-1.svg" alt="{{ __('İletişim Sayfası 1.İkon') }}" /></div>
                    <div class="info-contnt">
                        <h4 class="footer-info-title">{{ __('Adres Bilgileri') }}</h4>
                        <p class="info-box_text">{{ $settings->get('address') }}</p>
                    </div>
                </div>
                <div class="info-box">
                    <div class="info-box_icon"><img class="static-image" src="/theme12/img/icon/contact-icon-2.svg" alt="{{ __('İletişim Sayfası 2.İkon') }}" /></div>
                    <div class="info-contnt">
                        <h4 class="footer-info-title">{{ __('Telefon Numarası') }}</h4>
                        <p class="info-box_text"><a href="tel:{{ $settings->get('telephone') }}" class="info-box_link">{{ $settings->get('telephone') }}</a></p>
                    </div>
                </div>
                <div class="info-box">
                    <div class="info-box_icon"><img class="static-image" src="/theme12/img/icon/contact-icon-3.svg" alt="{{ __('İletişim Sayfası 3.İkon') }}" /></div>
                    <div class="info-contnt">
                        <h4 class="footer-info-title">{{ __('E-Posta Adresi') }}</h4>
                        <p class="info-box_text"><a href="mailto:{{ $settings->get('email') }}" class="info-box_link">{{ $settings->get('email') }}</a></p>
                    </div>
                </div>
                <div class="info-box">
                    <div class="info-box_icon"><img class="static-image" src="/theme12/img/icon/contact-icon-4.svg" alt="{{ __('İletişim Sayfası 4.İkon') }}" /></div>
                    <div class="info-contnt">
                        <h4 class="footer-info-title">{{ __('Çalışma Saatleri') }}</h4>
                        <p class="info-box_text">{{ __('Pzt-Cuma 08.30 - 17.30') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="space-top">
    <div class="container">
        <div class="row gy-4">
            <div class="col-lg-7">
                <form action="{{ route('site.contact.message') }}" method="POST" class="contact-form style-4 ajax-contact">@csrf
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <h3 class="form-title text-start">{{ __('İletişim Formu') }}</h3>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <input name="name" class="form-control @error('name') is-invalid @enderror"
                                   value="{{ old('name') }}" type="text" placeholder="{{ __('Ad Soyad') }}" required>
                            @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <i class="fas fa-user"></i>
                        </div>
                        <div class="form-group col-md-6">
                            <input name="email" class="form-control @error('email') is-invalid @enderror"
                                   value="{{ old('email') }}" type="email" placeholder="{{ __('E-posta Adresi') }}" required>
                            @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <i class="fas fa-envelope"></i>
                        </div>
                        <div class="form-group col-6">
                            <input name="telephone" class="form-control @error('telephone') is-invalid @enderror"
                                   type="text" value="{{ old('telephone') }}" placeholder="{{ __('Telefon Numarası') }}" required>
                            @error('telephone')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <i class="fas fa-phone"></i>
                        </div>
                        <div class="form-group col-6">
                            <input name="subject" class="form-control @error('subject') is-invalid @enderror"
                                   type="text" value="{{ old('subject') }}" placeholder="{{ __('Konu') }}" required>
                            @error('subject')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <i class="fas fa-tag"></i>
                        </div>
                        <div class="form-group col-12">
                            <textarea name="message" class="form-control @error('message') is-invalid @enderror"
                                      rows="7" placeholder="{{ __('Mesaj') }}" required>{{ old('message') }}</textarea>
                            @error('message')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <i class="fas fa-pencil"></i>
                        </div>
                        <div class="form-btn col-12">
                            <button type="submit" class="th-btn style2">{{ __('Gönder') }} <i class="fa-regular fa-arrow-right-long"></i></button>
                        </div>
                    </div>
                    <p class="form-messages mb-0 mt-3"></p>
                </form>
            </div>
            <div class="col-lg-5">
                <div class="contact-page-thumb static-image"><img src="/theme12/img/contact/contact-right.png" alt="{{ __('İletişim Sayfası İletişim Formu Görseli') }}" /></div>
            </div>
        </div>
    </div>
</div>
@endsection
