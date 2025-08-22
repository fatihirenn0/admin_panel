<section class="contact-area">
    <div class="contact__shape">
        <img class="static-image" src="/theme1/images/shape/contact-shape.png" alt="{{__('Ana Sayfa İletişim Formu Arka Plan Görseli')}}">
    </div>
    <div class="col-lg-7">
        <div class="contact__image">
            <figure class="gsap__parallax">
                <img class="static-image" src="/theme1/images/contact/contact-image.jpg" alt="{{__('Ana Sayfa İletişim Formu Görseli')}}">
            </figure>
        </div>
    </div>
    <div class="contact__wrp">
        <div class="contact__form">
            <div class="section-header mb-30">
                <h4 class="wow fadeInUp" data-wow-delay="00ms" data-wow-duration="1500ms">{{ __('İletişim Formu') }}</h4>
                <h2 class="wow splt-txt" data-splitting>{{ __('Bizimle İletişime Geçin') }}</h2>
            </div>
            <form name="contact_form" action="{{ route('site.contact.message') }}" method="post">
                @csrf
                <div class="row g-3">
                    <div class="col-sm-6">
                        <input name="name" class="form-control @error('name') is-invalid @enderror"
                               value="{{ old('name') }}" type="text" placeholder="{{ __('Ad Soyad') }}" required>
                        @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-sm-6">
                        <input name="email" class="form-control @error('email') is-invalid @enderror"
                               value="{{ old('email') }}" type="email" placeholder="{{ __('E-posta Adresi') }}" required>
                        @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-sm-6">
                        <input name="subject" class="form-control @error('subject') is-invalid @enderror"
                               type="text" value="{{ old('subject') }}" placeholder="{{ __('Konu') }}" required>
                        @error('subject')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-sm-6">
                        <input name="telephone" class="form-control @error('telephone') is-invalid @enderror"
                               type="text" value="{{ old('telephone') }}" placeholder="{{ __('Telefon Numarası') }}" required>
                        @error('telephone')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-sm-12">
                     <textarea name="message" class="form-control @error('message') is-invalid @enderror"
                               rows="7" placeholder="{{ __('Mesaj') }}" required>{{ old('message') }}</textarea>
                        @error('message')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="mt-5">
                    <input name="form_botcheck" class="form-control" type="hidden">
                    <button type="submit" class="theme-btn btn-two mb-3 mb-sm-0 me-2">{{ __('Gönder') }}</button>
                </div>
            </form>
        </div>
        <div class="contact__item">
            <div class="inner-box">
                <div class="icon mb-20">
                    <img class="static-image" src="/theme1/images/icon/contact-icon1.png" alt="{{__('Ana Sayfa İletişim Formu 1. İkon')}}">
                </div>
                <div class="icon-two">
                    <img class="static-image" src="/theme1/images/icon/contact-icon2.png" alt="{{__('Ana Sayfa İletişim Formu 2. İkon')}}">
                </div>
                <div class="info">
                    <h6 class="mb-1">{{ __('Adalet Herkese Lazım!') }}</h6>
                    <h3><a style="color: white" href="tel:{{ $settings->get('telephone') }}"> {{ $settings->get('telephone') }}</a></h3>
                </div>
            </div>
        </div>
    </div>
</section>
