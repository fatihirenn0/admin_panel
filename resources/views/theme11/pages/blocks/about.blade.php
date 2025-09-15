<!-- Welcome Section -->
<section class="welcome-section static-bg-image" style="background-image: url(/theme11/images/background/pattern-1.png);" alt="{{ __('Anasayfa Hakkımızda Arka Plan Görseli') }}">
    <div class="auto-container">
        <div class="inner-container">
            <div class="clearfix">
                <!-- Image Column -->
                <div class="image-column col-lg-6 col-md-12 col-sm-12">
                    <div class="inner-column">
                        <div class="image titlt" data-tilt="" data-tilt-max="2">
                            <img class="static-image" src="/theme11/images/resource/welcome.jpg" alt="{{ __('Anasayfa Hakkımızda Görseli') }}" />
                        </div>
                        <div class="case-box wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
                            1500<sup>+</sup>
                            <span>{{ __('Başarılı Dosya') }}</span>
                        </div>
                    </div>
                </div>

                <!-- Content Column -->
                <div class="content-column col-lg-6 col-md-12 col-sm-12">
                    <div class="inner-column">
                        <!-- Sec Title -->
                        <div class="sec-title">
                            <h2>{{ __('Hakkımızda') }}</h2>
                            <div class="text">{{ __('Her davada kapsamlı analiz ve etkili stratejilerle en uygun hukuki çözümleri üretiyoruz.') }}</div>
                        </div>
                        <ul class="list-style-one">
                            <li>{{ __('Evrak ve Süreç Yönetimi') }}</li>
                            <li>{{ __('Güvenilir Hukuki Ağ') }}</li>
                            <li>{{ __('Kişiye Özel Stratejiler')}}</li>
                            <li>{{ __('Memnun Müvekkil') }}.</li>
                        </ul>
                        <div class="btns-box">
                            <a href="{{ route(getOtherFullLink('contact')) }}" class="theme-btn btn-style-two">
                                <span class="txt">{{ __('Bize Ulaşın') }} <i class="arrow flaticon-right"></i></span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Welcome Section -->
