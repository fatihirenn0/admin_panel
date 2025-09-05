<!-- Hero Area -->
<section class="hero-area heroV1">
    @php $slider = $sliders->first(); @endphp @if($slider)
        <div class="hero-slider">
            @foreach($sliders as $slider)
                <div class="slide">
                    <img src="/storage/{{ $slider->file_url }}" alt="{{ $slider->name }}"/>
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="hero-content">
                                    <div class="hero-text">
                                        <h2 data-animation="fadeInUp" data-delay="0.5s">{{ $slider->title}}</h2>
                                        @if($slider->link)
                                            <a href="{{ $slider->link }}" class="btn-style-a smoothscroll" data-animation="fadeInUp" data-delay="0.85s">{{ $slider->link_text }}</a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</section>
<!-- /Hero Area -->
<!-- Counter Area -->
<section class="counter-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="counter-box">
                    <ul>
                        <li>
                            <div class="single-counter">
                                <h4><span class="counter-up">1200</span>+</h4>
                                <p>{{ __('Müşteri Memnuniyeti') }}</p>
                            </div>
                        </li>
                        <li>
                            <div class="single-counter">
                                <h4><span class="counter-up">98</span>%</h4>
                                <p>{{ __('Kazanılmış Dosya') }}</p>
                            </div>
                        </li>
                        <li>
                            <div class="single-counter">
                                <h4><span class="counter-up">18</span>%</h4>
                                <p>{{ __('Başarılı Dosya') }}</p>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- /Counter Area -->
