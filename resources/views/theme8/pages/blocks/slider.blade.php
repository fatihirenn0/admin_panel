<!-- Slider -->
<aside id="mcgill-hero" class="js-fullheight">
    @php $slider = $sliders->first(); @endphp @if($slider)
        <div class="flexslider js-fullheight">
            <ul class="slides">
                @foreach($sliders as $slider)
                    <li style="background-image: url(/storage/{{ $slider->file_url }});">
                        <div class="overlay"></div>
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-12 js-fullheight slider-text">
                                    <div class="slider-text-inner">
                                        <div class="desc">
                                            <h1>{{ $slider->title}}</h1>
                                            <p>{{ $slider->text }}</p>
                                            @if($slider->link)
                                                <div class="btn btn-contact"><a href="{{ $slider->link }}" target="_blank">{{ $slider->link_text }}</a></div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    @endif
</aside>
