<!-- Contact Form -->
<div class="contact-form pb-100">
    <!-- Location -->
    <div class="loaction-area">
        <div class="container">
            <div class="row location-bg">
                <div class="col-sm-6 col-lg-4">
                    <div class="location-item">
                        <div class="location-icon">
                            <i class="flaticon-pin"></i>
                            <img class="static-image" src="/theme18/img/home-one/12.png" alt="{{ __('Anasayfa İletişim İkon Arka Plan 1.Görseli') }}" />
                        </div>
                        <h3>{{ __('Adres Bilgileri') }}</h3>
                        <ul>
                            <li>{{ $settings->get('address') }}</li>
                        </ul>
                    </div>
                </div>

                <div class="col-sm-6 col-lg-4">
                    <div class="location-item">
                        <div class="location-icon">
                            <i class="flaticon-email"></i>
                            <img class="static-image" src="/theme18/img/home-one/12.png" alt="{{ __('Anasayfa İletişim İkon Arka Plan 2.Görseli') }}" />
                        </div>
                        <h3>{{ __('E-Posta Adresi') }}</h3>
                        <ul>
                            <li>
                                <a href="mailto:{{ $settings->get('email') }}"><span class="__cf_email__">{{ $settings->get('email') }}</span></a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4">
                    <div class="location-item">
                        <div class="location-icon">
                            <i class="flaticon-call"></i>
                            <img class="static-image" src="/theme18/img/home-one/12.png" alt="{{ __('Anasayfa İletişim İkon Arka Plan 3.Görseli') }}" />
                        </div>
                        <h3>{{ __('Telefon Numarası') }}</h3>
                        <ul>
                            <li>
                                <a href="tel:{{ $settings->get('telephone') }}">{{ $settings->get('telephone') }}</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Location -->

    <div class="container-fluid">
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
            <div class="row contact-wrap">
                <div class="col-sm-6 col-lg-6">
                    <div class="form-group">
                        <input name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" type="text" placeholder="{{ __('Ad Soyad') }}" required />
                        @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-sm-6 col-lg-6">
                    <div class="form-group">
                        <input name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" type="email" placeholder="{{ __('E-posta Adresi') }}" required />
                        @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-sm-6 col-lg-6">
                    <div class="form-group">
                        <input name="subject" class="form-control @error('subject') is-invalid @enderror" type="text" value="{{ old('subject') }}" placeholder="{{ __('Konu') }}" required />
                        @error('subject')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-sm-6 col-lg-6">
                    <div class="form-group">
                        <input name="telephone" class="form-control @error('telephone') is-invalid @enderror" type="text" value="{{ old('telephone') }}" placeholder="{{ __('Telefon Numarası') }}" required />
                        @error('telephone')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-md-12 col-lg-12">
                    <div class="form-group">
                        <textarea name="message" class="form-control @error('message') is-invalid @enderror" rows="7" placeholder="{{ __('Mesaj') }}" required>{{ old('message') }}</textarea>
                        @error('message')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-md-12 col-lg-12">
                    <div class="text-center">
                        <button type="submit" class="contact-btn">{{ __('Gönder') }}</button>
                    </div>
                    <div id="msgSubmit" class="h3 text-center hidden"></div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- End Contact Form -->
