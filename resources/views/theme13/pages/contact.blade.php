@extends('theme13.pages.build')
@section('title',__('İletişim'))
@section('content')
    <!-- Banner section -->
    <section class="about-banner position-relative space-header">
        <div class="line d-none d-xl-block"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-xxl-7 col-3xl-6 z-2 banner-content">
                    <h2 class="display-4 text-white mb-3">{{ __('İletişim') }}</h2>
                    <ul class="list-unstyled d-flex align-items-center gap-2">
                        <li><a href="{{ route('site.index') }}" class="text-white">{{ __('Ana Sayfa') }}</a></li>
                        <li><i class="ti ti-chevron-right text-white"></i></li>
                        <li><a href="#">{{ __('İletişim') }}</a></li>
                    </ul>
                </div>
                <div class="col-lg-4 col-xxl-5 col-3xl-6 d-none d-lg-block position-relative">
                    <div class="about-line-2"></div>
                    <div class="about-line-3"></div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact us -->
    <section class="contact-page">
        <div class="container">
            <div class="row justify-content-center g-4">
                <div class="col-lg-10 py-5 col-xl-8 contact-form">
                    <div class="contact-title">
                        <h3>{{ __('İletişim Formu') }}</h3>
                        <p class="pb-lg-3">{{ __('Soru, görüş ve önerileriniz için lütfen bizimle iletişime geçin.') }}</p>
                    </div>
                    <form action="{{ route('site.contact.message') }}" method="POST">
                        @csrf @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="row g-3 g-lg-4">
                            <div class="col-md-6">
                                <input name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" type="text" placeholder="{{ __('Ad Soyad') }}" required />
                                @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <input name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" type="email" placeholder="{{ __('E-posta Adresi') }}" required />
                                @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <input name="telephone" class="form-control @error('telephone') is-invalid @enderror" type="text" value="{{ old('telephone') }}" placeholder="{{ __('Telefon Numarası') }}" required />
                                @error('telephone')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <input name="subject" class="form-control @error('subject') is-invalid @enderror" type="text" value="{{ old('subject') }}" placeholder="{{ __('Konu') }}" required />
                                @error('subject')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-12">
                                <textarea name="message" class="form-control @error('message') is-invalid @enderror" rows="7" placeholder="{{ __('Mesaj') }}" required>{{ old('message') }}</textarea>
                                @error('message')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-12 d-flex justify-content-center pt-lg-3">
                                <button type="submit" class="black-btn" id="submit-btn">{{ __('Gönder') }}<i class="ti ti-arrow-up-right"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- need more help -->
    <section class="more-help">
        <div class="container">
            <div class="row justify-content-center text-center">
                <div class="col-lg-8 col-xl-6">
                    <h2 class="text-white">{{ __('Aklınıza takılan bir şey mi var?') }}</h2>
                    <p class="text-n20">{{ __('Hemen bizimle iletişime geçin.') }}</p>
                </div>
            </div>
            <div class="row g-4">
                <div class="col-md-6 col-lg-4">
                    <div class="help-card">
                        <i class="ti ti-phone-call"></i>
                        <h4 class="text-white mb-2">{{ __('Telefon Numarası') }}</h4>
                        <div class="d-flex flex-column gap-1">
                            <a class="text-white" href="tel:{{ $settings->get('telephone') }}">{{ $settings->get('telephone') }}</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="help-card">
                        <i class="ti ti-mail-opened"></i>
                        <h4 class="text-white mb-2">{{ __('E-Posta Adresi') }}</h4>
                        <div class="d-flex flex-column gap-1">
                            <a class="text-white" href="mailto:{{ $settings->get('email') }}">{{ $settings->get('email') }}</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="help-card">
                        <i class="ti ti-map-pin-pin"></i>
                        <h4 class="text-white mb-2">{{ __('Adres Bilgileri') }}</h4>
                        <div class="d-flex flex-column gap-1">
                            <span class="text-white">{{ $settings->get('address') }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
