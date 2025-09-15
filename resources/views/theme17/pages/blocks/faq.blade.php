<!-- FAQ Start -->
<section class="main-faq">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="faq-img-wp wow left-animation" data-wow-duration="0.8s" data-wow-delay="0.2s">
                    <div class="faq-img1 back-img static-image" style="background-image: url('/theme17/images/faq-img1.jpg');" alt="{{ __('Anasayfa Sıkça Sorulan Sorular 1.Görseli') }}"></div>
                    <div class="faq-img2 back-img static-image" style="background-image: url('/theme17/images/faq-img2.jpg');" alt="{{ __('Anasayfa Sıkça Sorulan Sorular 2.Görseli') }}"></div>
                    <a href="{{ route(getOtherFullLink('contact')) }}" class="link-btn" title="{{ __('Bize Ulaşın') }}"><span>{{ __('Bize Ulaşın') }}</span> <i class="fas fa-arrow-right" aria-hidden="true"></i></a>
                </div>
            </div>
            <div class="col-lg-6 align-self-center">
                <div class="faq-sec-content wow right-animation" data-wow-duration="0.8s" data-wow-delay="0.2s">
                    <span class="sub-title">{{ __('Sıkça Sorulan Sorular') }}</span>
                    <h2 class="h2-title">{{ __('Cevaplarınız Burada') }}</h2>
                    <div class="faq-accordion">
                        @foreach($allFaqs as $indexFaq)
                            <div class="faq-accordion-box">
                            <div class="faq-accordion-title">
                                <h4 class="h4-title">{{ $indexFaq->question }}</h4>
                                <span class="icon"><i class="fas fa-arrow-right" aria-hidden="true"></i></span>
                            </div>
                            <div class="faq-accordion-content">
                                <p>
                                    {{ $indexFaq->answer }}
                                </p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- FAQ End -->
