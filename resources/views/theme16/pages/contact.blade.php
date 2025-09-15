@extends('theme16.pages.build')
@section('title',__('İletişim'))
@section('content')
    <!-- Page Header -->
    <div class="page_header">
        <div class="page_header_content">
            <div class="container">
                <h2 class="heading">{{ __('İletişim') }}</h2>
                <ul class="breadcrumb">
                    <li><a href="{{ route('site.index') }}">{{ __('Ana Sayfa') }}</a></li>
                    <li class="active">{{ __('İletişim') }}</li>
                </ul>
            </div>
        </div>
    </div>

    <section class="contact_inner service_bg" style="background: #faf7f6;">
        <div class="service_another_bg">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="contact_box" data-aos="fade-up">
                            <div class="service_inner">
                                <div class="image">
                                    <img src="/theme16/images/inner/icon-2.png" alt="{{ __('İletişim Sayfası 1.İkon') }}" />
                                </div>
                                <div class="content">
                                    <h4>{{ __('Adres Bilgileri') }}</h4>
                                    <p>{{ $settings->get('address') }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="contact_box" data-aos="fade-up">
                            <div class="service_inner">
                                <div class="image">
                                    <img src="/theme16/images/inner/icon.png" alt="{{ __('İletişim Sayfası 2.İkon') }}" />
                                </div>
                                <div class="content">
                                    <h4>{{ __('Telefon Numarası') }}</h4>
                                    <p>{{ $settings->get('telephone') }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="contact_box" data-aos="fade-up">
                            <div class="service_inner">
                                <div class="image">
                                    <img src="/theme16/images/inner/icon-1.png" alt="{{ __('İletişim Sayfası 3.İkon') }}" />
                                </div>
                                <div class="content">
                                    <h4>{{ __('E-Posta Adresi') }}</h4>
                                    <p>{{ $settings->get('email') }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form contact_form_page">
                    <form class="contact_form" data-aos="fade-up" action="{{ route('site.contact.message') }}" method="post">
                        @csrf @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="form-container">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="heading_common text-center" data-aos="fade-up">
                                        <h5>{{ __('İletişim Formu') }}</h5>
                                        <h3>{{ __('Bize Ulaşın') }}</h3>
                                    </div>
                                </div>
                                <div class="col-md-12 col-lg-8 offset-lg-2">
                                    <div class="row">
                                        <div class="col-md-12 col-lg-6">
                                            <div class="form-group" data-aos="fade-up">
                                                <input name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" type="text" placeholder="{{ __('Ad Soyad') }}" required />
                                                @error('name')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-lg-6">
                                            <div class="form-group" data-aos="fade-up">
                                                <input name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" type="email" placeholder="{{ __('E-posta Adresi') }}" required />
                                                @error('email')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-lg-6">
                                            <div class="form-group" data-aos="fade-up">
                                                <input name="telephone" class="form-control @error('telephone') is-invalid @enderror" type="tel" value="{{ old('telephone') }}" placeholder="{{ __('Telefon Numarası') }}" required />
                                                @error('telephone')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-lg-6">
                                            <div class="form-group" data-aos="fade-up">
                                                <input name="subject" class="form-control @error('subject') is-invalid @enderror" type="text" value="{{ old('subject') }}" placeholder="{{ __('Konu') }}" required />
                                                @error('subject')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-lg-12">
                                            <div class="form-group" data-aos="fade-up">
                                                <textarea name="message" class="form-control @error('message') is-invalid @enderror" rows="7" placeholder="{{ __('Mesaj') }}" required>{{ old('message') }}</textarea>
                                                @error('message')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-lg-12 mt-4">
                                            <div class="form-group text-center" data-aos="fade-up">
                                                <button type="submit" class="btn_one btn">{{ __('Gönder') }}</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Google Map -->
    <section class="gmapbox" data-aos="zoom-in">
        @if($settings->get('google_map_link'))
            <div style="width: 100% !important;" class="map w-100">{!! $settings->get('google_map_link') !!}</div>
        @endif
    </section>
@endsection
