<!-- Section: Contact Form -->
<section class="layer-overlay overlay-theme-colored1-9" data-tm-bg-img="images/bg/as1.jpg">
    <div class="container">
        <div class="section-content">
            <div class="row">
                <div class="col-lg-6">
                    <div class="bg-white p-50 p-50">
                        <h5 class="tm-sc tm-sc-line-with-text mb-10 line-after-title"><span class="horizontal-text">{{ __('Bize Ulaşın') }}</span> <span class="horizontal-line bg-theme-colored1"></span></h5>
                        <h2>{{ __('Soru, görüş ve önerileriniz için') }} <span class="text-theme-colored2"> <br>{{ __('Lütfen bizimle iletişime geçin.') }}</span></h2>
                        <div role="form" class="wpcf7" id="wpcf7-f18676-p19314-o1" lang="en-US" dir="ltr">
                            <div class="screen-reader-response"></div>
                            <form class="wpcf7-form" action="{{ route('site.contact.message') }}" method="post">
                                @csrf @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                <div>
                                    <input type="hidden" name="_wpcf7" value="18676" />
                                    <input type="hidden" name="_wpcf7_version" value="5.1.4" />
                                    <input type="hidden" name="_wpcf7_locale" value="en_US" />
                                    <input type="hidden" name="_wpcf7_unit_tag" value="wpcf7-f18676-p19314-o1" />
                                    <input type="hidden" name="_wpcf7_container_post" value="19314" />
                                </div>
                                <div class="tm-contact-form-transparent pr-0">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <span class="wpcf7-form-control-wrap your-name">
                                                <input name="name" class="@error('name') is-invalid @enderror" value="{{ old('name') }}" type="text" placeholder="{{ __('Ad Soyad') }}" required />
                                                @error('name')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </span>
                                        </div>
                                        <div class="col-md-6">
                                            <span class="wpcf7-form-control-wrap your-email">
                                                <input name="email" class="@error('email') is-invalid @enderror" value="{{ old('email') }}" type="email" placeholder="{{ __('E-posta Adresi') }}" required />
                                                @error('email')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </span>
                                        </div>
                                        <div class="col-md-6">
                                            <span class="wpcf7-form-control-wrap your-phone">
                                              <input name="telephone" class="@error('telephone') is-invalid @enderror" value="{{ old('telephone') }}" type="text" placeholder="{{ __('Telefon') }}" required />
                                                @error('telephone')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </span>
                                        </div>
                                        <div class="col-md-6">
                                            <span class="wpcf7-form-control-wrap your-subject">
                                                <input name="subject" class="@error('subject') is-invalid @enderror" type="text" value="{{ old('subject') }}" placeholder="{{ __('Konu') }}" required />
                                                @error('subject')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </span>
                                        </div>
                                        <div class="col-md-12">
                                            <span class="wpcf7-form-control-wrap textarea">
                                                <textarea name="message" class="@error('message') is-invalid @enderror" rows="7" placeholder="{{ __('Mesaj') }}" required>{{ old('message') }}</textarea>
                                                @error('message')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </span>
                                        </div>
                                        <div class="col-md-12">
                                            <button type="submit" class="wpcf7-form-control wpcf7-submit btn btn-theme-colored2 btn-round">{{ __('Gönder') }}</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="wpcf7-response-output wpcf7-display-none"></div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-lg-6">
                    <div class="section-typo-light p-20 mt-50">
                        <h2 class="line-bottom mb-50">{{ __('Uzmanlık Alanlarımız') }}</h2>
                        <div class="tm-sc tm-sc-icon-box icon-box icon-left tm-iconbox-icontype-font-icon text-left iconbox-theme-colored2 icon-position-icon-left icon-box-animated-icon mb-40">
                            <div class="icon-box-wrapper">
                                <a class="icon icon-type-font-icon icon-default"> <i class="tm-flaticon-010-constructor font-size-54"></i> </a>
                                <div class="icon-text">
                                    <h4 class="icon-box-title mt-0 mb-10">{{ __('Hukuki Danışmanlık') }}</h4>
                                    <p>{{ __('Güncel yasa ve mevzuatlar çerçevesinde size özel danışmanlık çözümleri sunarız.') }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="tm-sc tm-sc-icon-box icon-box icon-left tm-iconbox-icontype-font-icon text-left iconbox-theme-colored2 icon-position-icon-left icon-box-animated-icon mb-40">
                            <div class="icon-box-wrapper">
                                <a class="icon icon-type-font-icon icon-default"> <i class="tm-flaticon-036-ruler-1 font-size-54"></i> </a>
                                <div class="icon-text">
                                    <h4 class="icon-box-title mt-0 mb-10">{{ __('Dava Öncesi Hukuki Değerlendirme') }}</h4>
                                    <p>{{ __('Sorununuzu birlikte analiz eder, en doğru hukuki yolu belirleriz.') }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="tm-sc tm-sc-icon-box icon-box icon-left tm-iconbox-icontype-font-icon text-left iconbox-theme-colored2 icon-position-icon-left icon-box-animated-icon mb-40">
                            <div class="icon-box-wrapper">
                                <a class="icon icon-type-font-icon icon-default"> <i class="tm-flaticon-018-driller font-size-54"></i> </a>
                                <div class="icon-text">
                                    <h4 class="icon-box-title mt-0 mb-10">{{ __('Uzman Avukat Kadrosu') }}</h4>
                                    <p>{{ __('Deneyimli ve alanında uzman avukatlarımızla her davada güçlü temsil.') }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="tm-sc tm-sc-icon-box icon-box icon-left tm-iconbox-icontype-font-icon text-left iconbox-theme-colored2 icon-position-icon-left icon-box-animated-icon mb-40">
                            <div class="icon-box-wrapper">
                                <a class="icon icon-type-font-icon icon-default"> <i class="tm-flaticon-036-ruler-1 font-size-54"></i> </a>
                                <div class="icon-text">
                                    <h4 class="icon-box-title mt-0 mb-10">{{ __('Çözüm Odaklı Yaklaşım') }}</h4>
                                    <p>{{ __('Her müvekkilimize özel ve uygulanabilir stratejiler geliştiririz.') }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Divider -->
