@extends('theme1.pages.build')
@section('title',__('İletişim'))
@section('content')
    <section class="page-title" style="background-image: url(/theme1/images/background/page-title-bg.jpg);">
        <div class="auto-container">
            <div class="title-outer text-center position-relative">
                <h1 class="title">{{ __('İletişim') }}</h1>
                <ul class="page-breadcrumb">
                    <li><a href="{{ route('site.index') }}">{{ __('Ana Sayfa') }}</a></li>
                    <li>{{ __('İletişim') }}</li>
                </ul>
            </div>
        </div>
    </section>
    <!-- end main-content -->

    <!--Contact Details Start-->
    <section class="contact-details">
        <div class="container pt-120 pb-120">
            <div class="funfact__wrp">
                <div class="row">
                    <div class="col-xl-7 col-lg-6">
                        <div class="sec-title">
                            <span class="sub-title">{{ __('İletişim Formu') }}</span>
                            <h2>{{ __('Soru, görüş ve önerileriniz için lütfen bizimle iletişime geçin.') }}</h2>
                        </div>
                        <!-- Contact Form -->
                        <form name="contact_form" action="{{ route('site.contact.message') }}" method="post">
                            @csrf
                            <div class="row mt-3">
                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        <input name="name" class="form-control @error('name') is-invalid @enderror"
                                               value="{{ old('name') }}" type="text" placeholder="{{ __('Ad Soyad') }}" required>
                                        @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        <input name="email" class="form-control @error('email') is-invalid @enderror"
                                               value="{{ old('email') }}" type="email" placeholder="{{ __('E-posta Adresi') }}" required>
                                        @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        <input name="subject" class="form-control @error('subject') is-invalid @enderror"
                                               type="text" value="{{ old('subject') }}" placeholder="{{ __('Konu') }}" required>
                                        @error('subject')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        <input name="telephone" class="form-control @error('telephone') is-invalid @enderror"
                                               type="text" value="{{ old('telephone') }}" placeholder="{{ __('Telefon Numarası') }}" required>
                                        @error('telephone')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
        <textarea name="message" class="form-control @error('message') is-invalid @enderror"
                  rows="7" placeholder="{{ __('Mesaj') }}" required>{{ old('message') }}</textarea>
                                @error('message')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-5">
                                <input name="form_botcheck" class="form-control" type="hidden">
                                <button type="submit" class="theme-btn btn-two mb-3 mb-sm-0 me-2">{{ __('Gönder') }}</button>
                            </div>
                        </form>

                        <!-- Contact Form Validation-->
                    </div>
                    <div class="col-xl-5 col-lg-6">
                        <div class="contact-details__right">
                            <div class="sec-title">
                                <span class="sub-title">{{ __('Aklınıza takılan bir şey mi var?') }}</span>
                                <h2>{{ __('Hemen bizimle iletişime geçin.') }}</h2>
                            </div>
                            <ul class="list-unstyled contact-details__info">
                                @if($settings->get('telephone'))
                                    <li class="d-block d-sm-flex align-items-sm-center ">
                                        <div class="icon">
                                            <span class="far fa-phone-plus"></span>
                                        </div>
                                        <div class="text ms-0 ms-sm-4">
                                            <h6>{{ __('Telefon Numarası') }}</h6>
                                            <a href="tel:{{ $settings->get('telephone') }}"> {{ $settings->get('telephone') }}</a>
                                        </div>
                                    </li>
                                @endif
                                @if($settings->get('email'))
                                    <li class="d-block d-sm-flex align-items-sm-center ">
                                        <div class="icon">
                                            <span class="far fa-envelope fa-fw"></span>
                                        </div>
                                        <div class="text ms-0 ms-sm-4">
                                            <h6>{{ __('E-posta Adresi') }}</h6>
                                            <a href="mailto:{{ $settings->get('email') }}">{{ $settings->get('email') }}</a>
                                        </div>
                                    </li>
                                @endif
                                @if($settings->get('address'))
                                    <li class="d-block d-sm-flex align-items-sm-center ">
                                        <div class="icon">
                                            <span class="far fa-location-dot fa-fw"></span>
                                        </div>
                                        <div class="text ms-0 ms-sm-4">
                                            <h6>{{ __('Adres') }}</h6>
                                            <span>{{ $settings->get('address') }}</span>
                                        </div>
                                    </li>
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Contact Details End-->

    <!-- Map Section-->
    @if($settings->get('google_map_link'))
        <section class="map-section">{!! $settings->get('google_map_link') !!}</section>
    @endif
@endsection
