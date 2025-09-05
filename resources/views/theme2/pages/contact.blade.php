@extends('theme2.pages.build')
@section('title',__('İletişim'))
@section('content')
<!-- Breadcrumb Section Start -->
<div class="breadcrumb-wrapper bg-cover static-bg-image" style="background-image: url('/theme2/img/breadcrumb-shape.png');" alt="{{__('İletişim Sayfası Arka Plan Görseli')}}">
    <div class="breadcrumb-shape">
        <img class="static-image" src="/theme2/img/breadcrumb-graph-shape.png" alt="{{__('İletişim Sayfası Görseli')}}">
    </div>
    <div class="container">
        <div class="page-heading">
            <div class="breadcrumb-sub-title">
                <div class="icon wow fadeInUp" data-wow-delay=".3s">
                    <img class="static-image" src="/theme2/img/icon/bread-icon.png" alt="{{__('İletişim Sayfası 1.İkon')}}">
                </div>
                <h1 class="wow fadeInUp" data-wow-delay=".5s">{{ __('İletişim') }}</h1>
                <ul class="breadcrumb-items wow fadeInUp" data-wow-delay=".7s">
                    <li>
                        <a href="{{ route('site.index') }}">
                            {{ __('Ana Sayfa') }}
                        </a>
                    </li>
                    <li>
                        <img class="static-image" src="/theme2/img/icon/arrow-bread-icon.svg" alt="{{__('İletişim Sayfası 2. İkon')}}">
                    </li>
                    <li>
                        {{ __('İletişim') }}
                    </li>
                </ul>
            </div>
            <div class="icon-box">
                <div class="icon-circle">
                    <img class="static-image" src="/theme2/img/icon/icon-28.svg" alt="{{__('İletişim Sayfası 3. İkon')}}">
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="breadcrumb-image wow img-custom-anim-left">
                @if($settings->get('google_map_link'))
                    <div class="googpemap">{!! $settings->get('google_map_link') !!}</div>
                @endif
        </div>
    </div>
</div>

<!-- Contact Section Start -->
<section class="contact-section-33 fix section-padding">
    <div class="container">
        <div class="contact-wrapper-33">
            <div class="row g-4">
                <div class="col-lg-6">
                    <div class="contact-info-box">
                        <ul>
                            <li>
                                <div class="icon">
                                    <img class="static-image" src="/theme2/img/icon/call-icon-5.svg" alt="{{__('İletişim Sayfası İletişim Bilgileri 1. İkon')}}">
                                </div>
                                <div class="content">
                                    <span>{{ __('Telefon Numarası') }}</span>
                                    <h3><a href="tel:{{ $settings->get('telephone') }}">{{ $settings->get('telephone') }}</a></h3>
                                </div>
                            </li>
                            <li>
                                <div class="icon">
                                    <img class="static-image" src="/theme2/img/icon/email-icon-5.svg" alt="{{ __('İletişim Sayfası İletişim Bilgileri 2. İkon') }}">
                                </div>
                                <div class="content">
                                    <span>{{ __('E-Posta Adresi') }}</span>
                                    <h3><a href="mailto:{{ $settings->get('email') }}" class="link">{{ $settings->get('email') }}</a></h3>
                                </div>
                            </li>
                            <li>
                                <div class="icon">
                                    <img class="static-image" src="/theme2/img/icon/time-5.svg" alt="{{ __('İletişim Sayfası İletişim Bilgileri 3. İkon') }}">
                                </div>
                                <div class="content">
                                    <span>{{ __('Çalışma Saatleri') }}</span>
                                    <h3>{{ __('Pzt - Cmt: 09.00 - 17.30') }}</h3>
                                </div>
                            </li>
                            <li>
                                <div class="icon">
                                    <img class="static-image" src="/theme2/img/icon/location-5.svg" alt="{{ __('İletişim Sayfası İletişim Bilgileri 4. İkon') }}">
                                </div>
                                <div class="content">
                                    <span>{{ __('Adres') }}</span>
                                    <h3>{{ $settings->get('address') }}</h3>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="comment-form-wrap">
                        <h3>{{ __('İletişim Formu') }}</h3>
                        <form action="{{ route('site.contact.message') }}" method="POST" class="contact-form-items">@csrf
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <div class="row g-4">
                                <div class="col-lg-6">
                                    <div class="form-clt">
                                        <input name="name" class="form-control @error('name') is-invalid @enderror"
                                               value="{{ old('name') }}" type="text" placeholder="{{ __('Ad Soyad') }}" required>
                                        @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                        <div class="icon">
                                            <img class="static-image" src="/theme2/img/icon/user-icon-4.svg" alt="{{ __('İletişim Sayfası İletişim Formu 1. İkon') }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-clt">
                                        <input name="email" class="form-control @error('email') is-invalid @enderror"
                                               value="{{ old('email') }}" type="email" placeholder="{{ __('E-posta Adresi') }}" required>
                                        @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                        <div class="icon">
                                            <img class="static-image" src="/theme2/img/icon/email-icon-4.svg" alt="{{ __('İletişim Sayfası İletişim Formu 2. İkon') }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-clt">
                                        <input name="telephone" class="form-control @error('telephone') is-invalid @enderror"
                                               type="text" value="{{ old('telephone') }}" placeholder="{{ __('Telefon Numarası') }}" required>
                                        @error('telephone')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                        <div class="icon">
                                            <img class="static-image" src="/theme2/img/icon/call-icon-4.svg" alt="{{ __('İletişim Sayfası İletişim Formu 3. İkon') }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-clt">
                                        <input name="subject" class="form-control @error('subject') is-invalid @enderror"
                                               type="text" value="{{ old('subject') }}" placeholder="{{ __('Konu') }}" required>
                                        @error('subject')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                        <div class="icon">
                                            <img class="static-image" src="/theme2/img/icon/subject.svg" alt="{{ __('İletişim Sayfası İletişim Formu 4. İkon') }}"></div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-clt">
                                        <textarea name="message" class="form-control @error('message') is-invalid @enderror"
                                                  rows="7" placeholder="{{ __('Mesaj') }}" required>{{ old('message') }}</textarea>
                                        @error('message')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                        <div class="icon">
                                            <img class="static-image" src="/theme2/img/icon/pencil-icon.svg" alt="{{ __('İletişim Sayfası İletişim Formu 5. İkon') }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                        <button type="submit" class="theme-btn w-100" >{{ __('Gönder') }}</button>
                                        <img class="static-image" src="/theme2/img/head-arrow.svg" alt="{{ __('İletişim Sayfası İletişim Formu 6. İkon') }}">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
