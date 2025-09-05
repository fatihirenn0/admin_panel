@extends('theme8.pages.build') @section('title',__('İletişim')) @section('content')
    <!-- Contact -->
    <div class="mcgill-contact">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 mb-40 animate-box" data-animate-effect="fadeInLeft">
                    <span class="heading-meta">{{ __('Bize Ulaşın') }}</span>
                    <h2 class="mcgill-heading">{{ __('İletişim') }}</h2>
                </div>
            </div>
            <!-- Map Section-->
            <div class="map-section animate-box" data-animate-effect="fadeInLeft">
                <div class="row">
                    <div class="col-md-12">
                        @if($settings->get('google_map_link'))
                            <div style="width: 100% !important;" class="map w-100">{!! $settings->get('google_map_link') !!}</div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="row">
                <!-- Contact Info -->
                <div class="col-md-5 mb-30 animate-box" data-animate-effect="fadeInLeft">
                    <div class="mcgill-contact-info2">
                        <div class="feat-inner2">
                            <span class="icon fi flaticon-support"></span>
                            <div class="feat-info2">
                                <h5>{{ __('Telefon Numarası') }}</h5>
                                <h6>{{ $settings->get('telephone') }}</h6>
                            </div>
                        </div>
                    </div>
                    <div class="mcgill-contact-info2">
                        <div class="feat-inner2">
                            <span class="icon fi flaticon-home-3"></span>
                            <div class="feat-info2">
                                <h5>{{ __('Adres') }}</h5>
                                <h6>{{ $settings->get('address') }}</h6>
                            </div>
                        </div>
                    </div>
                    <div class="mcgill-contact-info2">
                        <div class="feat-inner2">
                            <span class="icon fi flaticon-email"></span>
                            <div class="feat-info2">
                                <h5>{{ __('E-Posta Adresi') }}</h5>
                                <h6>{{ $settings->get('email') }}</h6>
                            </div>
                        </div>
                    </div>
                    <div class="mcgill-contact-info2">
                        <div class="feat-inner2">
                            <span class="icon fi flaticon-clock"></span>
                            <div class="feat-info2">
                                <h5>{{ __('Çalışma Saatleri') }}</h5>
                                <h6>{{ __('Pzt - Cuma 08.30 - 17.30') }}</h6>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Contact Form -->
                <div class="col-md-7 animate-box" data-animate-effect="fadeInLeft">
                    <h4>{{ __('İletişim Formu') }}</h4>
                    <form method="post" class="contact__form" action="{{ route('site.contact.message') }}">@csrf
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <!-- Form elements -->
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <input name="name" class="@error('name') is-invalid @enderror" value="{{ old('name') }}" type="text" placeholder="{{ __('Ad Soyad') }}" required />
                                @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 form-group">
                                <input name="email" class="@error('email') is-invalid @enderror" value="{{ old('email') }}" type="email" placeholder="{{ __('E-posta Adresi') }}" required />
                                @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 form-group">
                                <input name="telephone" class="@error('telephone') is-invalid @enderror" type="text" value="{{ old('telephone') }}" placeholder="{{ __('Telefon Numarası') }}" required />
                                @error('telephone')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 form-group">
                                <input name="subject" class="@error('subject') is-invalid @enderror" type="text" value="{{ old('subject') }}" placeholder="{{ __('Konu') }}" required />
                                @error('subject')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-12 form-group">
                                <textarea name="message" class="@error('message') is-invalid @enderror" rows="7" placeholder="{{ __('Mesaj') }}" required>{{ old('message') }}</textarea>
                                @error('message')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-12">
                                <button
                                    style="
                                    text-shadow: none;
                                    padding: 12px 27px;
                                    -webkit-box-shadow: none;
                                    box-shadow: none;
                                    border: none;
                                    color: #fff;
                                    -webkit-transition: background-color 0.15s ease-out;
                                    transition: background-color 0.15s ease-out;
                                    background: #c29032;
                                    margin-top: 0px;
                                    border-radius: 50px;
                                    font-family: 'Mukta', sans-serif;
                                    font-size: 12px;
                                    letter-spacing: 3px;
                                    text-transform: uppercase;
                                "
                                    class="btn btn-primary"
                                    type="submit"
                                >
                                    {{ __('Gönder') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
