@extends('theme7.pages.build')
@section('title',__('İletişim'))
@section('content')

    <!-- Title Bar -->
    <div class="pbmit-title-bar-wrapper">
        <div class="container">
            <div class="pbmit-title-bar-content">
                <div class="pbmit-title-bar-content-inner">
                    <div class="pbmit-tbar">
                        <div class="pbmit-tbar-inner container">
                            <h1 class="pbmit-tbar-title">{{ __('İletişim') }}</h1>
                        </div>
                    </div>
                    <div class="pbmit-breadcrumb">
                        <div class="pbmit-breadcrumb-inner">
                            <span><a title="" href="{{ route('site.index') }}" class="home"><span>{{ __('Ana Sayfa') }}</span></a></span>
                            <span class="sep"><i class="pbmit-base-icon-right-small"></i></span>
                            <span><span class="post-root post post-post current-item">{{ __('İletişim') }}</span></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Title Bar End-->

    <!-- Contact -->
    <section class="contact-section-main">
        <div class="container">
            <div class="row g-0">
                <div class="col-xl-4 col-md-12">
                    <div class="contacticon-box">
                        <p>{{ __('Telefon Numarası') }}</p>
                        <a href="tel:{{ $settings->get('telephone') }}"><h2>{{ $settings->get('telephone') }}</h2></a>
                    </div>
                </div>
                <div class="col-xl-4 col-md-12">
                    <div class="contacticon-box  icon-box-one">
                        <div>
                            <p>{{ __('E-Posta Adresi') }}</p>
                            <h2><a href="mailto:{{ $settings->get('email') }}" class="__cf_email__">{{ $settings->get('email') }}</a></h2>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-12">
                    <div class="contacticon-box icon-box-two">
                        <p>{{ __('Adres Bilgileri') }}</p>
                        <h2>{{ $settings->get('address') }} </h2>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section-lgb contact-section">
        <div class="container">
            <div class="row g-0">
                <div class="col-md-5">
                    <div class="pbmit-heading animation-style2">
                        <h2 class="pbmit-title">{{ __('Soru, görüş ve önerileriniz için lütfen bizimle iletişime geçin.') }}</h2>
                    </div>
                    <form class="contact-form" action="{{ route('site.contact.message') }}" method="post">@csrf
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
                            <div class="col-md-12">
                                <input name="name" class="form-control @error('name') is-invalid @enderror"
                                       value="{{ old('name') }}" type="text" placeholder="{{ __('Ad Soyad') }}" required>
                                @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-12">
                                <input name="email" class="form-control @error('email') is-invalid @enderror"
                                       value="{{ old('email') }}" type="email" placeholder="{{ __('E-posta Adresi') }}" required>
                                @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-12">
                                <input name="telephone" class="form-control @error('telephone') is-invalid @enderror"
                                       type="text" value="{{ old('telephone') }}" placeholder="{{ __('Telefon Numarası') }}" required>
                                @error('telephone')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-12">
                                <input name="subject" class="form-control @error('subject') is-invalid @enderror"
                                       type="text" value="{{ old('subject') }}" placeholder="{{ __('Konu') }}" required>
                                @error('subject')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-lg-12">
                                <textarea name="message" class="form-control @error('message') is-invalid @enderror"
                                          rows="7" placeholder="{{ __('Mesaj') }}" required>{{ old('message') }}</textarea>
                                @error('message')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-lg-12">
                                <button class="pbmit-btn">
                                    <i class="form-btn-loader fa fa-circle-o-notch fa-spin fa-fw margin-bottom d-none"></i>
                                    <span>{{ __('Gönder') }}</span>
                                </button>
                            </div>
                            <div class="col-md-12 col-lg-12 message-status"></div>
                        </div>
                    </form>
                </div>
                <div class="col-md-7">
                    <div class="pbmit-sticky pbmit-animation-style2">
                        <img class="static-image" src="/theme7/images/pcmit-contact-single.jpg" class="img-fluid" alt="{{ __('İletişim Sayfası Görseli') }}">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="contact-section-map">
        @if($settings->get('google_map_link'))
            <div style="width: 100% !important;" class="map w-100">{!! $settings->get('google_map_link') !!}</div>
        @endif
    </section>
    <!-- Contact End -->
@endsection
