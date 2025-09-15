@extends('theme19.pages.build') @section('title',__('İletişim')) @section('content')
    <div class="contact-us-wrapper">
        <!-- Contact Area -->
        <section class="contact-area">
            <div class="container">
                <div class="row">
                    <div class="contact-us-banner">
                        <div class="contact-us-title">
                            <h3>{{ __('Bize Ulaşın') }}</h3>
                            <h4>{{ __('Soru, görüş ve önerileriniz için lütfen bizimle iletişime geçin.') }}</h4>
                            <img class="static-image" src="/theme19/image/home/contact-banner.jpg" alt="{{ __('İletişim Sayfası 1.Görseli') }}" />
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- contact form -->
        <section class="contact-form-v2">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="contact-form-left">
                            <h3>
                                {{ __('İletişim') }} <br />
                                {{ __('Formu') }}<img class="static-image" src="/theme19/icons/arrow-1.png" alt="{{ __('İletişim Sayfası 1.İkon') }}" />
                            </h3>

                            <p class="feel-free-message">{{ __('Lütfen bize ulaşın ve merhaba deyin!') }}</p>

                            <div class="contact-details">
                                <h6><span>{{ __('Telefon Numarası') }}:</span> <a href="tel:{{ $settings->get('telephone') }}"> {{ $settings->get('telephone') }}</a></h6>
                                <h6><span>{{ __('E-Posta Adresi') }}:</span> <a href="mailto:{{ $settings->get('email') }}"> {{ $settings->get('email') }}</a></h6>
                                <h6><span>{{ __('Adres Bilgileri') }}:</span> {{ $settings->get('address') }}</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="contact-form-right contact-form-right-v2">
                            <p>
                                At JurisPro, we are dedicated to providing exceptional legal services. Whether you have a question, need legal advice, or wish to schedule a consultation, our team is here to assist you. Contact us today and
                                let’s discuss how we can support your legal needs
                            </p>
                            <form action="{{ route('site.contact.message') }}" method="post">
                                @csrf @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="name">{{ __('Ad Soyad') }}</label>
                                        <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" placeholder="{{ __('Ad Soyad') }}" required />
                                        @error('name')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="email">{{ __('E-Posta') }}</label>
                                        <input type="email" id="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" placeholder="{{ __('E-Posta') }}" required />
                                        @error('email')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="subject">{{ __('Konu') }}</label>
                                        <input type="text" id="subject" name="subject" class="form-control @error('subject') is-invalid @enderror" value="{{ old('subject') }}" placeholder="{{ __('Konu') }}" required />
                                        @error('subject')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="telephone">{{ __('Telefon Numarası') }}</label>
                                        <input type="text" id="telephone" name="telephone" class="form-control @error('telephone') is-invalid @enderror" value="{{ old('telephone') }}" placeholder="{{ __('Telefon Numarası') }}" required />
                                        @error('telephone')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-12 mb-3">
                                        <label for="message">{{ __('Mesaj') }}</label>
                                        <textarea id="message" name="message" rows="6" class="form-control @error('message') is-invalid @enderror" placeholder="{{ __('Mesaj') }}" required>{{ old('message') }}</textarea>
                                        @error('message')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-12">
                                        <button type="submit" class="btn btn-primary w-100">{{ __('Gönder') }}</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
