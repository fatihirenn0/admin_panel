@php $slider = $sliders->first(); @endphp @if($slider)
    <!-- banner-section -->
    <section class="banner-section style-three">
        <!-- Social Nav -->
        <ul class="social-nav">
            @if($settings->get('twitter'))
                <li class="twitter">
                    <a href="{{ $settings->get('twitter') }}"><i class="fa fa-twitter"></i></a>
                </li>
            @endif @if($settings->get('facebook'))
                <li class="facebook">
                    <a href="{{ $settings->get('facebook') }}"><i class="fa fa-facebook"></i></a>
                </li>
            @endif @if($settings->get('linkedin'))
                <li class="linkedin">
                    <a href="{{ $settings->get('linkedin') }}"><i class="fa fa-linkedin"></i></a>
                </li>
            @endif @if($settings->get('instagram'))
                <li class="instagram">
                    <a href="{{ $settings->get('instagram') }}"><i class="fa fa-instagram"></i></a>
                </li>
            @endif @if($settings->get('youtube'))
                <li class="youtube">
                    <a href="{{ $settings->get('youtube') }}"><i class="fa fa-youtube"></i></a>
                </li>
            @endif @if($settings->get('google_business'))
                <li class="google_business">
                    <a href="{{ $settings->get('google_business') }}"><i class="fa fa-google"></i></a>
                </li>
            @endif
        </ul>
        <div class="banner-carousel owl-theme owl-carousel owl-dots-none">
            @foreach($sliders as $slider)
                <div class="slide-item">
                    <div class="image-layer" style="background-image:url(/storage/{{ $slider->file_url }})"></div>
                    <div class="pattern-layer">
                        <div class="pattern-3 static-image" style="background-image: url(/theme11/images/shape/pattern-28.png);" alt="{{ $slider->title }}"></div>
                        <div class="pattern-4 static-image" style="background-image: url(/theme11/images/shape/pattern-29.png);" alt="{{ $slider->title }}"></div>
                    </div>
                    <div class="auto-container">
                        <div class="row clearfix">
                            <div class="col-lg-10 col-md-12 col-sm-12 offset-lg-2 content-column">
                                <div class="inner-column">
                                    <div class="title">{{ $slider->title }}</div>
                                    <h1>{!! $slider->text !!}</h1>
                                    <div class="text">{!! $slider->sub_text !!}</div>
                                    <div class="btns-box">
                                        <a href="{{ $slider->link }}" class="theme-btn btn-style-one">
                                            <span class="txt">{{ $slider->link_text }}<i class="arrow flaticon-right"></i></span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
    <!-- banner-section end -->
@endif
