<!-- client Section -->
<section class="clients-section-two">
    <div class="auto-container">
        <div class="fact-counter">
            <div class="row">
                <!-- Counter block-->
                <div class="counter-block-two col-lg-3 col-sm-6 wow fadeInUp">
                    <div class="inner-box">
                        <div class="content-box">
                            <div class="count-box"><span class="count-text" data-speed="3000" data-stop="30">0</span>+</div>
                            <div class="counter-title">{{__('Başarıyla Sonuçlanan Dava')}}</div>
                        </div>
                    </div>
                </div>
                <!-- Counter block-->
                <div class="counter-block-two col-lg-3 col-sm-6 wow fadeInUp">
                    <div class="inner-box">
                        <div class="content-box">
                            <div class="count-box">0<span class="count-text" data-speed="3000" data-stop="5">0</span>+</div>
                            <div class="counter-title">{{__('Yıllık Hukuki Tecrübe')}}</div>
                        </div>
                    </div>
                </div>
                <!-- Counter block-->
                <div class="counter-block-two col-lg-3 col-sm-6 wow fadeInUp">
                    <div class="inner-box">
                        <div class="content-box">
                            <div class="count-box"><span class="count-text" data-speed="3000" data-stop="10">0</span>+</div>
                            <div class="counter-title">{{__('Alanında Uzman Ekip')}}</div>
                        </div>
                    </div>
                </div>
                <!-- Counter block-->
                <div class="counter-block-two col-lg-3 col-sm-6 wow fadeInUp">
                    <div class="inner-box">
                        <div class="content-box">
                            <div class="count-box">0<span class="count-text" data-speed="3000" data-stop="3">0</span></div>
                            <div class="counter-title">{{__('Ulusal ve Uluslararası Ödül')}}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End client Section -->
<!-- Contact Section -->
<section class="contact-section-three">
    <div class="bg bg-image static-bg-image" style="background-image: url(/theme3/images/background/bg-contact3-1.jpg);" alt="{{__('Anasayfa İletişim Formu 1. Arka Plan Görseli')}}"></div>
    <div class="bg bg-image-2 static-bg-image" style="background-image: url(/theme3/images/background/bg-contact1-3.jpg);" alt="{{__('Anasayfa İletişim Formu 2. Arka Plan Görseli')}}"></div>
    <div class="auto-container">
        <div class="outer-box">
            <div class="row">
                <!-- Form Column -->
                <div class="form-column col-lg-8 offset-lg-4 col-md-12 col-sm-12">
                    <div class="inner-column">
                        <!-- Contact Form -->
                        <div class="contact-form-three wow fadeInLeft">
                            <div class="icon-wheel-5"></div>
                            <div class="sec-title">
                                <span class="sub-title">{{ __('Bize Ulaşın') }}</span>
                                <h2 class="words-slide-up text-split">{{ __('İletişim Formu') }}</h2>
                            </div>
                            <!--Contact Form-->
                            <form name="contact_form" action="{{ route('site.contact.message') }}" method="post">
                                @csrf
                                <div class="row">
                                    <div class="form-group col-lg-6 col-md-6">
                                        <input name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" type="text" placeholder="{{ __('Ad Soyad') }}" required />
                                        @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-lg-6 col-md-6">
                                        <input name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" type="email" placeholder="{{ __('E-posta Adresi') }}" required />
                                        @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-lg-6 col-md-6">
                                        <input name="subject" class="form-control @error('subject') is-invalid @enderror" type="text" value="{{ old('subject') }}" placeholder="{{ __('Konu') }}" required />
                                        @error('subject')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-lg-6 col-md-6">
                                        <input name="telephone" class="form-control @error('telephone') is-invalid @enderror" type="tel" value="{{ old('telephone') }}" placeholder="{{ __('Telefon Numarası') }}" required />
                                        @error('telephone')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-lg-12">
                                        <textarea name="message" class="form-control @error('message') is-invalid @enderror" rows="7" placeholder="{{ __('Mesaj') }}" required>{{ old('message') }}</textarea>
                                        @error('message')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-lg-12">
                                        <input name="form_botcheck" class="form-control" type="hidden" value="" />
                                        <button type="submit" class="theme-btn btn-style-two mb-3 mb-sm-0"><span class="btn-title">{{ __('Gönder') }}</span></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!--End Contact Form -->
                        <div class="contact-block-three">
                            <div class="inner-box wow fadeInRight">
                                <div class="content-box">
                                    <img class="mb-10 static-image" src="/theme3/images/icons/customer-service1.png" alt="{{__('Anasayfa İletişim Formu İkon')}}" /> <span class="text">{{ __('Bize Ulaşın') }}</span>
                                    <a class="text-two" href="tel:{{ $settings->get('telephone') }}">{{ $settings->get('telephone') }}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Contact Section -->
