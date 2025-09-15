<section class="space overflow-hidden" id="contact-sec">
    <div class="shape-mockup jump d-none d-xl-block" data-top="15%" data-right="3%"><img class="static-image" src="/theme12/img/shape/contact-1-top.png" alt="{{ __('Anasayfa İletişim Formu 1.İkon') }}" /></div>
    <div class="shape-mockup jump-reverse d-none d-xl-block" data-bottom="17%" data-left="3%"><img class="static-image" src="/theme12/img/shape/about1-right-top.png" alt="{{ __('Anasayfa İletişim Formu 2.İkon') }}" /></div>
    <div class="container">
        <div class="contact-from-1-wrap">
            <div class="row gx-60 gy-40">
                <div class="col-xl-6">
                    <div class="contact-form">
                        <div class="title-area mb-35">
                            <span class="sub-title justify-content-center text-white">{{ __('İletişim') }}</span>
                            <h4 class="sec-title text-white">{{ __('Danışmak istediğiniz her konuda bize ulaşabilirsiniz. Sorularınız, çözüme açılan kapıdır.') }}</h4>
                        </div>
                        <form action="{{ route('site.contact.message') }}" method="post" class="quote-form ajax-contact">
                            @csrf @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul class="mb-0">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <div class="row">
                                <div class="form-group col-md-6">
                                    <input name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" type="text" placeholder="{{ __('Ad Soyad') }}" required />
                                    @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <i class="fas fa-user"></i>
                                </div>

                                <div class="form-group col-md-6">
                                    <input name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" type="email" placeholder="{{ __('E-posta Adresi') }}" required />
                                    @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <i class="fas fa-envelope"></i>
                                </div>

                                <div class="form-group col-md-6">
                                    <input name="telephone" class="form-control @error('telephone') is-invalid @enderror" type="text" value="{{ old('telephone') }}" placeholder="{{ __('Telefon Numarası') }}" required />
                                    @error('telephone')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <i class="fas fa-phone"></i>
                                </div>

                                <div class="form-group col-md-6">
                                    <input name="subject" class="form-control @error('subject') is-invalid @enderror" type="text" value="{{ old('subject') }}" placeholder="{{ __('Konu') }}" required />
                                    @error('subject')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <i class="fas fa-list"></i>
                                </div>

                                <div class="form-group col-12">
                                    <textarea name="message" class="form-control @error('message') is-invalid @enderror" rows="7" placeholder="{{ __('Mesaj') }}" required>{{ old('message') }}</textarea>
                                    @error('message')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <i class="fas fa-pencil"></i>
                                </div>

                                <div class="form-btn col-12 mt-2">
                                    <button class="th-btn bg-theme w-100">{{ __('Gönder') }} <i class="fa-regular fa-arrow-right-long ms-2"></i></button>
                                </div>
                            </div>

                            <p class="form-messages mb-0 mt-3"></p>
                        </form>
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="contact-icon-box-wrap">
                        <div class="info-box">
                            <div class="info-box_icon"><i class="fa-regular fa-location-dot"></i></div>
                            <div class="info-contnt">
                                <h4 class="footer-info-title">{{ __('Adres Bilgileri') }}</h4>
                                <p class="info-box_text">{{ $settings->get('address') }}</p>
                            </div>
                        </div>
                        <div class="info-box">
                            <div class="info-box_icon"><i class="fa-regular fa-phone"></i></div>
                            <div class="info-contnt">
                                <h4 class="footer-info-title">{{ __('Telefon Numarası') }}</h4>
                                <p class="info-box_text"><a href="tel:{{ $settings->get('telephone') }}" class="info-box_link">{{ $settings->get('telephone') }}</a></p>
                            </div>
                        </div>
                        <div class="info-box">
                            <div class="info-box_icon"><i class="fa-regular fa-envelope"></i></div>
                            <div class="info-contnt">
                                <h4 class="footer-info-title">{{ __('E-Posta Adresi') }}</h4>
                                <p class="info-box_text"><a href="mailto:{{ $settings->get('email') }}" class="info-box_link">{{ $settings->get('email') }}</a></p>
                            </div>
                        </div>
                    </div>
                    <div class="contact-img"><img class="static-image" src="/theme12/img/contact/contact_1.jpg" alt="{{ __('İletişim Formu 1. Görsel') }}" /></div>
                    <div class="shape-mockup contact_1-man"><img class="static-image" src="/theme12/img/contact/contact_1-man.png" alt="{{ __('İletişim Formu 2. Görsel') }}" /></div>
                </div>
            </div>
        </div>
    </div>
</section>
