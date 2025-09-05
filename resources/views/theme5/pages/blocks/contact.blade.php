
<!-- Contact Section -->
<section class="contact-section bg-dark">
    <div class="divider"></div>

    <div class="container">
        <div class="row g-5 align-items-center">
            <div class="col-12 col-md-6">
                <div class="section-heading pe-lg-5">
                    <div class="sub-title text-white">
                        <img class="static-image" src="/theme5/img/core-img/hammer.png" alt="{{ __('Anasayfa İletişim İkon') }}">
                        {{ __('Bize Ulaşın') }}
                    </div>
                    <h2 class="text-white mb-4">{{ __('Size Yardımcı Olmak İçin Buradayız') }}</h2>
                    <p class="text-white mb-5">{{ __('Danışmak istediğiniz her konuda bize ulaşabilirsiniz. Sorularınız, çözüme açılan kapıdır.') }}</p>
                </div>

                <!-- Contact Info Card -->
                <div class="contact-info-card pe-lg-5 mb-4">
                    <div class="icon-wrapper">
                        <svg width="44" height="44" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M14.3308 15.9402L15.6608 14.6101C15.8655 14.403 16.1092 14.2384 16.3778 14.1262C16.6465 14.014 16.9347 13.9563 17.2258 13.9563C17.517 13.9563 17.8052 14.014 18.0739 14.1262C18.3425 14.2384 18.5862 14.403 18.7908 14.6101L20.3508 16.1702C20.5579 16.3748 20.7224 16.6183 20.8346 16.887C20.9468 17.1556 21.0046 17.444 21.0046 17.7351C21.0046 18.0263 20.9468 18.3146 20.8346 18.5833C20.7224 18.8519 20.5579 19.0954 20.3508 19.3L19.6408 20.02C19.1516 20.514 18.5189 20.841 17.8329 20.9541C17.1469 21.0672 16.4427 20.9609 15.8208 20.6501C10.4691 17.8952 6.11008 13.5396 3.35083 8.19019C3.03976 7.56761 2.93414 6.86242 3.04914 6.17603C3.16414 5.48963 3.49384 4.85731 3.99085 4.37012L4.70081 3.65015C5.11674 3.23673 5.67937 3.00464 6.26581 3.00464C6.85225 3.00464 7.41488 3.23673 7.83081 3.65015L9.40082 5.22021C9.81424 5.63615 10.0463 6.19871 10.0463 6.78516C10.0463 7.3716 9.81424 7.93416 9.40082 8.3501L8.0708 9.68018C8.95021 10.8697 9.91617 11.9926 10.9608 13.04C11.9994 14.0804 13.116 15.04 14.3008 15.9102L14.3308 15.9402Z" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M18.2109 8.84009C18.0578 8.09677 17.6931 7.41362 17.1609 6.87256C16.6288 6.33149 15.9516 5.95549 15.2109 5.79004" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M22 7.51001C21.6283 6.19924 20.928 5.00529 19.9655 4.04102C19.003 3.07674 17.8101 2.37408 16.5 2" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg>
                    </div>
                    <div>
                        <p class="mb-1">{{ __('Telefon Numarası') }}</p>
                        <p class="mb-0">{{ $settings->get('telephone') }}</p>
                    </div>
                </div>

                <!-- Contact Info Card -->
                <div class="contact-info-card pt-3 pe-5">
                    <div class="icon-wrapper">
                        <svg width="44" height="44" viewBox="0 -2.5 20 20" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <title>email [#1573]</title> <desc>Created with Sketch.</desc> <defs> </defs> <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"> <g id="Dribbble-Light-Preview" transform="translate(-300.000000, -922.000000)" fill="#000000"> <g id="icons" transform="translate(56.000000, 160.000000)"> <path d="M262,764.291 L254,771.318 L246,764.281 L246,764 L262,764 L262,764.291 Z M246,775 L246,766.945 L254,773.98 L262,766.953 L262,775 L246,775 Z M244,777 L264,777 L264,762 L244,762 L244,777 Z" id="email-[#1573]"> </path> </g> </g> </g> </g></svg>
                    </div>
                    <div>
                        <p class="mb-1">{{ __('E-Posta Adresi') }}</p>
                        <p class="mb-0">{{ $settings->get('email') }}</p>
                    </div>
                </div>

            </div>

            <!-- Contact Form -->
            <div class="col-12 col-md-6">
                <div class="contact-form bg-primary wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="600ms">
                    <div class="mb-4 contact-title">{{ __('İletişim Formu') }}</div>
                    <form action="{{ route('site.contact.message') }}" method="post">@csrf
                        <div class="row g-4">
                            <div class="col-12 col-lg-6">
                                <input name="name" class="form-control @error('name') is-invalid @enderror"
                                       value="{{ old('name') }}" type="text" placeholder="{{ __('Ad Soyad') }}" required>
                                @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-12 col-lg-6">
                                <input name="email" class="form-control @error('email') is-invalid @enderror"
                                       value="{{ old('email') }}" type="email" placeholder="{{ __('E-posta Adresi') }}" required>
                                @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-12 col-lg-6">
                                <input name="telephone" class="form-control @error('telephone') is-invalid @enderror"
                                       type="text" value="{{ old('telephone') }}" placeholder="{{ __('Telefon Numarası') }}" required>
                                @error('telephone')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-12 col-lg-6">
                                <input name="subject" class="form-control @error('subject') is-invalid @enderror"
                                       type="text" value="{{ old('subject') }}" placeholder="{{ __('Konu') }}" required>
                                @error('subject')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-12">
                                <textarea name="message" class="form-control @error('message') is-invalid @enderror"
                                          rows="7" placeholder="{{ __('Mesaj') }}" required>{{ old('message') }}</textarea>
                                @error('message')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-12">
                                <button class="btn btn-dark" type="submit">
                                    <span>{{ __('Gönder') }} <i class="ti ti-arrow-up-right"></i></span>
                                    <span>{{ __('Gönder') }} <i class="ti ti-arrow-up-right"></i></span>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="divider"></div>
</section>
