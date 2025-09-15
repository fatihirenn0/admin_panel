@php $slider = $sliders->first(); @endphp @if($slider)
    <!-- Banner section -->
    <section id="banner" class="banner-3 position-relative space-header overflow-hidden">
        <div class="container">
            <div class="row banner-content">
                <div class="col-lg-8">
                    <h2 class="display-2 text-white mb-4">
                        {{ $slider->sub_text }}
                    </h2>
                    <p class="xl-text text-n20 pb-4 pb-lg-0">
                        {{ $slider->text }}
                    </p>
                </div>
                <div class="col-lg-4 d-flex justify-content-center justify-content-lg-end align-items-center">
                    <a href="{{ $slider->link }}" class="read-more-2 text-white">{{ $slider->link_text }} <i class="ti ti-arrow-up-right arrow-sm bg-primary text-dark"></i></a>
                </div>
            </div>
            <div class="row">
                <div class="col-12 px-0 position-relative">
                    <div class="banner3-swiper">
                        <div class="swiper-wrapper">
                            @foreach($sliders as $slider)
                                <div class="swiper-slide">
                                    <img src="/storage/{{ $slider->file_url }}" class="max-un" alt="{{ $slider->name }}" />
                                </div>
                            @endforeach
                        </div>
                        <div class="nav-btns-home-3">
                            <button class="banner3-prev">
                                <i class="ti ti-arrow-narrow-left"></i>
                            </button>
                            <button class="banner3-next">
                                <i class="ti ti-arrow-narrow-right"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endif
<!-- brand slider -->
<div class="brand-slider overflow-x-hidden">
    <div class="container-fluid">
        <div class="row g-4 align-items-center">
            <div class="col-lg-5 left-col">
                <p class="mb-0 ms-lg-2 px-3">
                    {{ __('Başarıyla Temsil Ettiklerimiz') }}
                </p>
            </div>
            <div class="col-lg-7">
                <div class="swiper brand-swiper">
                    <div class="swiper-wrapper">
                        @foreach($allReferences as $indexReference)
                            <div class="swiper-slide">
                                <img src="/storage/{{ $indexReference->image }}" alt="{{ $indexReference->name }}">
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
