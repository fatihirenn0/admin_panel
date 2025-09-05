<!-- Banner Section -->
<section class="banner-section-two">
    @php $slider = $sliders->first(); @endphp @if($slider)
        <div class="bg bg-image" style="background-image: url('/storage/{{ $slider->file_url }}')"></div>
        <div class="auto-container">
            <div class="row">
                <!-- Content Column -->
                <div class="content-column col-xl-12">
                    <div class="inner-column text-center">
                        <div class="icon-box wow fadeInUp" data-wow-delay="200ms"><i class="icon flaticon-law-libra"></i></div>
                        <h1 class="title wow fadeInUp" data-wow-delay="300ms">{{ $slider->title }}</h1>
                        <div class="text wow fadeInUp" data-wow-delay="400ms">{!! $slider->text !!}</div>
                        @if($slider->link)
                            <a href="{{ $slider->link }}" class="theme-btn btn-style-two wow fadeInUp" data-wow-delay="500ms"><span class="btn-title">{{ $slider->link_text }}</span></a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    @endif
</section>
<!-- End Banner Section -->
