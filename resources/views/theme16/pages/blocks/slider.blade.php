@php $slider = $sliders->first(); @endphp @if($slider)
    <section>
        <div class="swiper swiper_one">
            <!-- Additional required wrapper -->
            <div class="swiper-wrapper">
                @foreach($sliders as $slider)
                    <div class="swiper-slide">
                        <div class="swiper-bg-slide static-bg-image" style="background: url(/theme16/images/slider/background.jpg);" alt="{{ __('Anasayfa Slider Arka Plan Görseli') }}"></div>
                        <div class="slider">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="man_image">
                                            <img src="/storage/{{ $slider->image }}" alt="{{ $slider->title }}" />
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="slider_content heading heading_primary_color">
                                            <h6>{{ $slider->title }}</h6>
                                            <h2>{{ $slider->sub_text }}</h2>
                                            <p>{{ $slider->text }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

@endif
