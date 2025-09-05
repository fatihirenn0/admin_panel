<!-- Hero Section Start -->
<section class="hero-section hero-1">
    @php $slider = $sliders->first(); @endphp
    @if($slider)
    <div class="hero-bg-shape">
        <img class="static-bg-image" src="/theme2/img/hero/hero-bg-shape.png"alt="{{__('Anasayfa Slider Arka Plan 1.Görsel')}}">
    </div>
    <div class="graph-shape float-bob-x">
        <img class="static-image" src="/theme2/img/hero/graph-shape.png" alt="{{__('Anasayfa Slider 1.İkon')}}">
    </div>
    <div class="line-shape">
        <img class="static-image" src="/theme2/img/hero/line-shape.png" alt="{{__('Anasayfa Slider Arka Plan 2.Görsel')}}">
    </div>
    <div class="law-shape">
        <img class="static-image" src="/theme2/img/hero/law-shape.png" alt="{{__('Anasayfa Slider 4.İkon')}}">
    </div>
    <div class="container-fluid">
        <div class="hero-items section-padding">
            <div class="row g-4 align-items-center Justify-content-between">
                <div class="col-xl-8">
                    <div class="hero-content">
                        <h1 class="wow fadeInUp" data-wow-delay=".3s">
                            {{ $slider->title }}
                        </h1>
                        <p class="wow fadeInUp" data-wow-delay=".5s">
                            {!! $slider->text !!}
                        </p>
                    </div>
                </div>
                <div class="col-xl-4">
                    <div class="help-text">
                        @if($slider->link)
                            <a href="{{ $slider->link }}" class="icon">
                                <img class="static-image" src="/theme2/img/icon/big-arrow-bottom.svg" alt="{{__('Anasayfa Slider Link İkon')}}">
                            </a>
                            <span>{{ $slider->link_text }}</span>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="hero-image wow img-custom-anim-right" data-wow-duration="1.5s" data-wow-delay="0.3s">
            <img src="/storage/{{ $slider->file_url }}" alt="{{ $slider->file_url }}">
        </div>
    </div>
    @endif
</section>
