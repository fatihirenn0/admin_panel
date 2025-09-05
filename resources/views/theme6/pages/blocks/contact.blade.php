<!-- Free Case Evaluation Area -->
<section id="consult" class="free-case-evaluation-area">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="fcea-text">
                    <h3 class="wow fadeIn" data-wow-delay=".25s">{{ __('Bize Ulaşın') }}</h3>
                    <div class="fce-form-wrapper wow fadeIn" data-wow-delay=".50s">
                        <form class="fce-form" action="{{ route('site.contact.message') }}" method="post">@csrf
                            <input name="name" class="grerbin-input @error('name') is-invalid @enderror"
                                   value="{{ old('name') }}" type="text" placeholder="{{ __('Ad Soyad') }}" required>
                            @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <input name="email" class="grerbin-input @error('email') is-invalid @enderror"
                                   value="{{ old('email') }}" type="email" placeholder="{{ __('E-posta Adresi') }}" required>
                            @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <input name="telephone" class="grerbin-input @error('telephone') is-invalid @enderror"
                                   type="text" value="{{ old('telephone') }}" placeholder="{{ __('Telefon Numarası') }}" required>
                            @error('telephone')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <input name="subject" class="grerbin-input @error('subject') is-invalid @enderror"
                                   type="text" value="{{ old('subject') }}" placeholder="{{ __('Konu') }}" required>
                            @error('subject')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <textarea name="message" class="grerbin-input @error('message') is-invalid @enderror"
                                      rows="7" placeholder="{{ __('Mesaj') }}" required>{{ old('message') }}</textarea>
                            @error('message')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <button type="submit" class="grerbin-input-btn">
                                    {{ __('Gönder') }}
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="fce-img wow fadeIn" data-wow-delay=".25s">
                    <img class="static-image" src="/theme6/img/section-img/free-case.jpg" alt="{{ __('Anasayfa İletişim Formu Görseli') }}">
                </div>
            </div>
        </div>
    </div>
</section>
<!-- /Free Case Evaluation Area -->
