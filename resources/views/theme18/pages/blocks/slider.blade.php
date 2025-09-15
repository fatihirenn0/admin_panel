@php $slider = $sliders->first(); @endphp @if($slider)

    <!-- Banner -->
    <div class="banner-area banner-img-one">
        <div class="d-table">
            <div class="d-table-cell">
                <div class="container">
                    @foreach($sliders as $slider)
                        <div class="row align-items-center justify-content-center">
                            <div class="col-lg-6">
                                <div class="banner-item">
                                    <div class="banner-left">
                                        <h1>{{ $slider->title }}</h1>
                                        <p>{{ $slider->text }}</p>
                                        <a href="{{ $slider->link }}">
                                            {{ $slider->link_text }}
                                            <i class="icofont-arrow-right"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="banner-item">
                                    <div class="banner-right">
                                        <img class="banner-animation" src="/storage/{{ $slider->image}}" alt="{{ $slider->name}}" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <!-- End Banner -->

@endif
