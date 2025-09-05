<!-- About Section -->
<section class="about-section bg-secondary">
    <div class="divider"></div>

    <div class="container">
        <div class="row g-5 align-items-center">
            <!-- About Thumbnail -->
            <div class="col-12 col-lg-6">
                <div class="about-thumbnail">
                    <div class="row g-4 align-items-end">
                        <div class="col-12 col-sm-6">
                            <img  src="/theme5/img/bg-img/3.jpg" alt="{{ __('Anasayfa Hakkımızda 1. Görsel') }}" class="wow fadeInUp w-100 static-image" data-wow-duration="1000ms" data-wow-delay="600ms">
                            <!-- Experience Card -->
                            <div class="experience-card mt-4 wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="800ms">
                                <h2><span class="counter">{{ __('20') }}</span><span>+</span></h2>
                                <p class="mb-0">{{ __('Yıllık Tecrübe') }}</p>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6">
                            <img src="/theme5/img/bg-img/4.jpg" alt="{{ __('Anasayfa Hakkımızda 2. Görsel') }}" class="wow fadeInUp w-100 static-image" data-wow-duration="1000ms" data-wow-delay="1000ms">
                        </div>
                    </div>
                </div>
            </div>

            <!-- About Content -->
            <div class="col-12 col-lg-6">
                <div class="about-content ps-md-4">
                    <div class="section-heading">
                        <div class="sub-title">
                            <img class="static-image" src="/theme5/img/core-img/hammer.png" alt="{{ __('Anasayfa Hakkımızda İkon') }}">
                            {{ __('Hakkımızda') }}
                        </div>
                        <h2 class="mb-4">{{ __('Güven, Tecrübe ve Çözüm Odaklı Hukuk Hizmetleri') }}</h2>
                        <p class="mb-5">{{ __('Her davada kapsamlı analiz ve etkili stratejilerle en uygun hukuki çözümleri üretiyoruz.') }}</p>
                        <a class="btn btn-primary mb-5" href="{{ route(getOtherFullLink('contact')) }}">
                            <span>{{ __('İletişim') }} <i class="ti ti-arrow-up-right"></i></span>
                            <span>{{ __('İletişim') }} <i class="ti ti-arrow-up-right"></i></span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="divider"></div>
</section>
