@if( \Illuminate\Support\Facades\Route::currentRouteName() == "site.index" )
    @php $slider = $sliders->first(); @endphp @if($slider)
        <div class="pbmit-slider-area pbmit-slider-one">
            <div class="swiper-slider" data-autoplay="true" data-loop="true" data-dots="true" data-arrows="false" data-columns="1" data-margin="0" data-effect="fade">
                <div class="swiper-wrapper">
                    <!-- Slide1 -->
                    @foreach($sliders as $slider)
                        <div class="swiper-slide slide1">
                            <div class="pbmit-slider-item">
                                <div class="pbmit-slider-bg static-bg-image" style="background-image: url(/theme7/images/banner-slider-img/attorly-s1-bg.png);" alt="{{ __('Anasayfa Slider Arka Plan Görseli') }}"></div>
                                <div class="container">
                                    <div class="row align-items-center">
                                        <div class="col-md-6">
                                            <div class="slider-img-01 transform-center">
                                                <img src="/storage/{{ $slider->file_url }}" class="img-fluid" alt="">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="pbmit-slider-content">
                                                <h5 class="pbmit-sub-title transform-right transform-delay-1">{{ $slider->title}}</h5>
                                                <h2 class="pbmit-title transform-right transform-delay-2">{{ $slider->text }}</h2>
                                                <div class="pbmit-button d-flex">
                                                    @if($slider->link)
                                                        <div class="transform-bottom transform-delay-5 d-none d-lg-block">
                                                            <a href="{{ $slider->link }}" class="pbmit-btn pbmit-btn-inline">
                                                                <span>{{ $slider->link_text }}</span>
                                                            </a>
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endif
@endif
