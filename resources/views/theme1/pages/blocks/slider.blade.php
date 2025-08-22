<section class="banner-section">
    <!-- Slide Item -->
    @php $slider = $sliders->first(); @endphp
    @if($slider)
        <div class="slide-item">
            @if($slider->isImage())
                <div class="bg-image-six" style="background-image: url(/storage/{{ $slider->file_url }});"></div>
            @else
                <video class="bg-image parallaxScaleScroll" autoplay muted loop>
                    <source src="/storage/{{ $slider->file_url }}" type="video/mp4">
                </video>
            @endif

            <div class="auto-container">
                <div class="content-box">
                    <span class="sub-title animate-1">{{ $slider->title }}</span>
                    <h1 class="title animate-2">{!! $slider->text !!}</h1>
                    <div class="text">{!! $slider->sub_text !!}</div>
                    @if($slider->link)
                        <div class="btn-box animate-3">
                            <a href="{{ $slider->link }}" class="theme-btn btn-style-one wow fadeInDown" data-wow-delay="200ms" data-wow-duration="1500ms">{{ $slider->link_text }}</a>
                        </div>
                    @endif

                </div>
            </div>
        </div>
    @endif
</section>
