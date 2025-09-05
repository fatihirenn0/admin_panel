<!-- Hero Section -->
<section class="hero-section static-bg-image" style="background-image: url('/theme5/img/bg-img/1.jpg');" alt="{{ __('Ansayfa Slider Arka Plan Görseli') }}">
    <div class="divider"></div>
    @php $slider = $sliders->first(); @endphp
    @if($slider)
        <!-- Left Side Text -->
        <div class="left-side-text wow fadeIn" data-wow-duration="1000ms" data-wow-delay="1200ms"></div>

        <!-- Right Side Image -->
        <div class="right-side-image wow fadeIn" data-wow-duration="1000ms" data-wow-delay="800ms">
            <img src="/storage/{{ $slider->file_url }}" alt="{{ $slider->name }}" />
        </div>
        <div class="container">
            <div class="row">
                @foreach($sliders as $slider)
                    <div class="col-12 col-md-9 col-lg-7 col-xxl-6">
                        <!-- Hero Content -->
                        <div class="hero-content">
                            <h2 class="mb-4 wow fadeInUp text-white" data-wow-duration="1000ms" data-wow-delay="400ms">{{ $slider->title}}</h2>
                            <p class="text-white wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="600ms">{{ $slider->text }}</p>
                            <div class="d-flex flex-wrap align-items-center gap-4">
                                <!-- Button -->
                                @if($slider->link)
                                    <a class="btn btn-primary wow fadeInUp" href="{{ $slider->link }}" data-wow-duration="1000ms" data-wow-delay="800ms">
                                        <span>{{ $slider->link_text }} <i class="ti ti-arrow-up-right"></i></span>
                                        <span>{{ $slider->link_text }} <i class="ti ti-arrow-up-right"></i></span>
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="divider"></div>
    @endif
</section>
