@php $slider = $sliders->first(); @endphp @if($slider)

    <!-- Banner Start -->
    <section class="main-banner">
        <div class="container">
            <div class="row align-items-center">
                @foreach($sliders as $slider)
                    <div class="col-lg-6">
                        <div class="banner-content">
                            <span class="sub-title wow fadeup-animation">{{ $slider->title }}</span>
                            <h1 class="h1-title wow fadeup-animation" data-wow-duration="0.8s" data-wow-delay="0.2s">
                                {{ $slider->sub_text }}
                            </h1>
                            <p class="wow fadeup-animation" data-wow-duration="0.8s" data-wow-delay="0.3s">
                                {{ $slider->text }}
                            </p>
                            <a href="{{ $slider->link }}" class="sec-btn wow fadeup-animation" data-wow-duration="0.8s" data-wow-delay="0.4s" title="Discover More"><span>{{ $slider->link_text }}</span></a>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="banner-img wow right-animation" data-wow-duration="0.8s" data-wow-delay="0.2s">
                            <img src="/storage/{{ $slider->image }}" width="636" height="694" alt="{{ $slider->name }}" />
                            <span class="overlay"></span>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <span class="bg-text">{{ $settings->get('title') }}</span>
        <span class="bg-icon"></span>
    </section>
    <!-- Banner End -->
@endif
<!-- Features Start -->
<section class="main-features">
    <div class="features-list">
        <div class="feature-box wow fadeup-animation" data-wow-duration="0.8s" data-wow-delay="0.2s">
            <div class="icon">
                <img class="static-image" src="/theme17/images/Lawyer-Advice.svg" width="60" height="60" alt="{{ __('Anasayfa Banner 1.İkon') }}">
            </div>
            <div class="text">
                <h4 class="h4-title">{{ __('Afet Sigortası ve Tazminat Davaları') }}</h4>
            </div>
        </div>
        <div class="feature-box wow fadeup-animation" data-wow-duration="0.8s" data-wow-delay="0.3s">
            <div class="icon">
                <img class="static-image" src="/theme17/images/Legal-Counsel.svg" width="60" height="60" alt="{{ __('Anasayfa Banner 2.İkon') }}">
            </div>
            <div class="text">
                <h4 class="h4-title">{{ __('Rüşvet ve Yolsuzluk Suçları') }}</h4>
            </div>
        </div>
        <div class="feature-box wow fadeup-animation" data-wow-duration="0.8s" data-wow-delay="0.4s">
            <div class="icon">
                <img class="static-image" src="/theme17/images/Court-Performance.svg" width="60" height="60" alt="{{ __('Anasayfa Banner 3.İkon') }}">
            </div>
            <div class="text">
                <h4 class="h4-title">{{ __('Döviz Mevzuatı ve Kripto Hukuku') }}</h4>
            </div>
        </div>
        <div class="feature-box wow fadeup-animation" data-wow-duration="0.8s" data-wow-delay="0.5s">
            <div class="icon">
                <img class="static-image" src="/theme17/images/Global-Lawyer.svg" width="60" height="60" alt="{{ __('Anasayfa Banner 4.İkon') }}">
            </div>
            <div class="text">
                <h4 class="h4-title">{{ __('Yapay Zeka Destekli Siber Suçlar') }}</h4>
            </div>
        </div>
    </div>
</section>
<!-- Features End -->
