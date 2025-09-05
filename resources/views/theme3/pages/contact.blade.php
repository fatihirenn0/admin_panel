@extends('theme3.pages.build') @section('title',__('İletişim')) @section('content')
    <!-- Start main-content -->
    <section class="page-title static-image" style="background-image: url(/theme3/images/background/page-title-bg.jpg);" alt="{{__('İletişim Sayfası Arka Plan Görseli')}}">
        <div class="auto-container">
            <div class="title-outer text-center">
                <h1 class="title">{{ __('İletişim') }}</h1>
                <ul class="page-breadcrumb">
                    <li><a href="{{ route('site.index') }}">{{ __('Anasayfa') }}</a></li>
                    <li>{{ __('İletişim') }}</li>
                </ul>
            </div>
        </div>
    </section>
    <!-- end main-content -->

    <!--Contact Details Start-->
    <section class="contact-details">
        <div class="container">
            <div class="row">
                <div class="col-xl-7 col-lg-6">
                    <div class="sec-title">
                        <span class="sub-title">{{ __('Bize Ulaşın') }}</span>
                        <h2>{{ __('İletişim Formu') }}</h2>
                    </div>
                    <!-- Contact Form -->
                    <form name="contact_form" action="{{ route('site.contact.message') }}" method="post">@csrf
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
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <input name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" type="text" placeholder="{{ __('Ad Soyad') }}" required />
                                    @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <input name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" type="email" placeholder="{{ __('E-posta Adresi') }}" required />
                                    @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <input name="subject" class="form-control @error('subject') is-invalid @enderror" type="text" value="{{ old('subject') }}" placeholder="{{ __('Konu') }}" required />
                                    @error('subject')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <input name="telephone" class="form-control @error('telephone') is-invalid @enderror" type="tel" value="{{ old('telephone') }}" placeholder="{{ __('Telefon Numarası') }}" required />
                                    @error('telephone')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <textarea name="message" class="form-control @error('message') is-invalid @enderror" rows="7" placeholder="{{ __('Mesaj') }}" required>{{ old('message') }}</textarea>
                            @error('message')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-5">
                            <button type="submit" class="theme-btn btn-style-two mb-3 mb-sm-0"><span class="btn-title">{{ __('Gönder') }}</span></button>
                        </div>
                    </form>
                    <!-- Contact Form Validation-->
                </div>
                <div class="col-xl-5 col-lg-6">
                    <div class="contact-details__right">
                        <div class="sec-title">
                            <span class="sub-title">{{ __('Haklarınız Önemli') }}</span>
                            <h2 style="font-size: 30px;">{{ __('Konuşalım, Çözüm Bulalım') }}</h2>
                            <div class="text">
                                {{ __('Haklarınızı korumak ve ihtiyaç duyduğunuz profesyonel desteği almak için bizimle iletişim kurabilirsiniz. Alanında uzman avukatlarımız, sorularınızı yanıtlamaya ve sürecin her adımında yanınızda olmaya
                                hazırdır.') }}
                            </div>
                        </div>
                        <ul class="list-unstyled contact-details__info">
                            <li class="d-block d-sm-flex align-items-sm-center">
                                <div class="icon">
                                    <span class="far fa-phone-plus"></span>
                                </div>
                                <div class="text ml-xs--0 mt-xs-10">
                                    <h6>{{ __('Telefon Numarası') }}</h6>
                                    <a href="tel:{{ $settings->get('telephone') }}">{{ $settings->get('telephone') }}</a>
                                </div>
                            </li>
                            <li class="d-block d-sm-flex align-items-sm-center">
                                <div class="icon">
                                    <span class="far fa-envelope fa-fw"></span>
                                </div>
                                <div class="text ml-xs--0 mt-xs-10">
                                    <h6>{{ __('E-Posta Adresi') }}</h6>
                                    <a href="mailto:{{ $settings->get('email') }}"><span class="__cf_email__">{{ $settings->get('email') }}</span></a>
                                </div>
                            </li>
                            <li class="d-block d-sm-flex align-items-sm-center">
                                <div class="icon">
                                    <span class="far fa-location-dot fa-fw"></span>
                                </div>
                                <div class="text ml-xs--0 mt-xs-10">
                                    <h6>{{ __('Adres') }}</h6>
                                    <span>{{ $settings->get('address') }}</span>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Contact Details End-->

    <!-- Map Section-->
    <section class="map-section">
        @if($settings->get('google_map_link'))
            <div style="width: 100% !important;" class="map w-100">{!! $settings->get('google_map_link') !!}</div>
        @endif
    </section>
    <!--End Map Section-->
@endsection
