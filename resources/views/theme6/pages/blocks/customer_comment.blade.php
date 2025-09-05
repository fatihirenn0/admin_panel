<!-- Testimonial Area -->
<section class="testimonial-area static-image" style="background-image: url(/theme6/img/bg/testimonial-bg.jpg);" alt="{{__('Anasayfa Müşteri Yorumları Arka Plan Görseli')}}">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-titleV1 wow fadeIn" data-wow-delay=".25s">
                    <h3>{{ __('Müşteri Yorumları') }}</h3>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="testimonial-wrapper wow fadeIn" data-wow-delay=".50s">
                    <div class="testimonial-carousel owl-carousel owl-theme">
                        @foreach($allComments as $indexComment)
                            <div class="item">
                            <div class="single-testimonial">
                                <div class="st-text">
                                    <p>“{{$indexComment->comment}}”</p>
                                    <h4>{{ $indexComment->name }}</h4>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- /Testimonial Area -->
