<!--Banner Section-->
@php $slider = $sliders->first(); @endphp @if($slider)
<section class="banner-section">
    <div class="main-slider-carousel owl-carousel owl-theme">
        <!-- Slide -->
        <div class="slide" style="background-image:url('/storage/{{ $slider->file_url }}')" alt="{{ $slider->name }}">
            <div class="container">
                <div class="content">
                    <div class="title">{{ $slider->title}}</div>
                    <h1>    {{ $slider->text }}</span></h1>
                    @if($slider->link)
                        <a href="{{ $slider->link }}" class="theme-btn btn-style-one">{{ $slider->link_text }}</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
@endif
<!--End Banner Section-->
