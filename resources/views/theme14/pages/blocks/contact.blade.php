<!-- Contact area start here -->
<section class="contact-area static-image" data-speed="0.5" data-parallax="scroll" data-image-src="/theme14/images/contact/contact-image.jpg" alt="{{ __('Anasayfa İletişim Formu Görseli') }}">
    <div class="contact__wrp">
        <div class="contact__form">
            <div class="section-header mb-50">
                <h2 class="wow splt-txt" data-splitting>{{ __('Sizlere Daha İyi Hizmet Verebilmek İçin Bizimle İletişime Geçin!') }}</h2>
            </div>
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
                <div class="row g-4">
                    <div class="col-sm-6">
                        <input name="name" class="@error('name') is-invalid @enderror" value="{{ old('name') }}" type="text" placeholder="{{ __('Ad Soyad') }}" required />
                        @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-sm-6">
                        <input name="email" class="@error('email') is-invalid @enderror" value="{{ old('email') }}" type="email" placeholder="{{ __('E-posta Adresi') }}" required />
                        @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-sm-6">
                        <input name="telephone" class="@error('telephone') is-invalid @enderror" type="tel" value="{{ old('telephone') }}" placeholder="{{ __('Telefon Numarası') }}" required />
                        @error('telephone')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-sm-6">
                        <input name="subject" class="@error('subject') is-invalid @enderror" type="text" value="{{ old('subject') }}" placeholder="{{ __('Konu') }}" required />
                        @error('subject')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-sm-12">
                        <textarea name="message" class="@error('message') is-invalid @enderror" rows="7" placeholder="{{ __('Mesaj') }}" required>{{ old('message') }}</textarea>
                        @error('message')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <button class="btn-discover mt-50" data-splitting data-text="{{ __('Gönder') }}">{{ __('Gönder') }}</button>
            </form>
        </div>
    </div>
</section>
<!-- Contact area end here -->
