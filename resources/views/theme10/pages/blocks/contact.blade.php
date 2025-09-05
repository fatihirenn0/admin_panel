<!-- Form Section -->
<section class="form-section static-image" style="background-image: url(/theme10/images/background/2.jpg);" alt="{{ __('Anasayfa İletişim Form Görseli') }}">
    <div class="container">
        <!-- Upper Content -->
        <div class="upper-content">
            <div class="row clearfix">
                <!-- Title Column -->
                <div class="title-column col-lg-5 col-md-12 col-sm-12">
                    <div class="inner-column">
                        <!-- Sec Title -->
                        <div class="section-title light">
                            <div class="title">{{ __('İletişim Formu') }}</div>
                            <h3>{{ __('Bize Ulaşın') }}</h3>
                        </div>
                    </div>
                </div>

                <!-- Info Column -->
                <div class="info-column col-lg-7 col-md-12 col-sm-12">
                    <div class="inner-column">
                        <div class="row clearfix">
                            <!-- Column -->
                            <div class="column col-lg-6 col-md-6 col-sm-12">
                                <ul class="list-style-two">
                                    <li><span class="icon flaticon-placeholder-1"></span>{{ $settings->get('address') }}</li>
                                </ul>
                            </div>
                            <!-- Column -->
                            <div class="column col-lg-6 col-md-6 col-sm-12">
                                <ul class="list-style-two">
                                    <li><span class="icon flaticon-phone-call"></span>{{ $settings->get('telephone') }}</li>
                                    <li><span class="icon flaticon-chat"></span>{{ $settings->get('email') }}</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Lower Content -->
        <div class="lower-content">
            <!-- Default Form -->
            <div class="default-form">
                <form method="post" action="{{ route('site.contact.message') }}">
                    @csrf @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="row clearfix">
                        <div class="form-group col-lg-4 col-md-6 col-sm-12">
                            <input name="name" class="contact-form @error('name') is-invalid @enderror" value="{{ old('name') }}" type="text" placeholder="{{ __('Ad Soyad') }}" required />
                            @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group col-lg-4 col-md-6 col-sm-12">
                            <input name="email" class="contact-form @error('email') is-invalid @enderror" value="{{ old('email') }}" type="email" placeholder="{{ __('E-posta Adresi') }}" required />
                            @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group col-lg-4 col-md-12 col-sm-12">
                            <input name="telephone" class="contact-form @error('telephone') is-invalid @enderror" type="text" value="{{ old('telephone') }}" placeholder="{{ __('Telefon Numarası') }}" required />
                            @error('telephone')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group col-lg-12 col-md-12 col-sm-12">
                            <input name="subject" class="g-input @error('subject') is-invalid @enderror" type="text" value="{{ old('subject') }}" placeholder="{{ __('Konu') }}" required />
                            @error('subject')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group col-lg-12 col-md-12 col-sm-12">
                            <textarea name="message" class="contact-form @error('message') is-invalid @enderror" rows="7" placeholder="{{ __('Mesaj') }}" required>{{ old('message') }}</textarea>
                            @error('message')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group col-lg-12 col-md-12 col-sm-12">
                            <button type="submit" class="theme-btn btn-style-one">{{ __('Gönder') }}</button>
                        </div>
                    </div>
                </form>
            </div>
            <!--End Default Form-->
        </div>
    </div>
</section>
<!-- End Form Section -->
