<!-- Why Choose Us Section -->
<section class="why-choose-us-three">
    <div class="bg bg-image static-bg-image" style="background-image: url(/theme3/images/resource/choose3-1.jpg);" alt="{{__('Anasayfa Sorular Arka Plan Görseli')}}"></div>
    <div class="icon-big-legal-5 bounce-y"></div>
    <div class="auto-container">
        <div class="outer-box">
            <div class="row">
                <!-- Content Column -->
                <div class="content-column col-lg-7 offset-lg-5 order-lg-2 wow fadeInRight" data-wow-delay="300ms">
                    <div class="inner-column">
                        <div class="bg bg-image static-bg-image" style="background-image: url(/theme3/images/background/choose3-bg1.png);" alt="{{__('Anasayfa Sorular Görseli')}}"></div>
                        <div class="sec-title mb-0">
                            <h2 class="words-slide-up text-split">{{ __('Merak Ettiklerinizin Yanıtı Burada') }}</h2>
                        </div>
                        <ul class="accordion-box-three accordion-box">
                            @foreach($allFaqs as $indexFaq)
                                <li class="accordion block {{ $loop->first ? 'active-block' : '' }}">
                                    <div class="acc-btn {{ $loop->first ? 'active' : '' }}">{{ $indexFaq->question }} <i class="arrow fal fa-plus"></i></div>
                                    <div class="acc-content" style="{{ $loop->first ? 'display: block;' : 'display: none;' }}">
                                        <div class="content">
                                            <div class="text">{{ $indexFaq->answer }}</div>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End About Section -->
