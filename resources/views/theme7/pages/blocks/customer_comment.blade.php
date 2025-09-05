<!-- Testimonial Start -->
<section class="testimonail-section-home1" data-cursor="white-color">
    <div class="container">
        <div class="swiper-slider pbmit-element-testimonial-style-1" data-loop="true" data-autoplay="false" data-dots="false" data-arrows="true" data-columns="1" data-margin="30" data-effect="slide">
            <div class="swiper-wrapper">
                @foreach($allComments as $indexComment)
                    <div class="swiper-slide">
                        <!-- Slide1 -->
                        <article class="pbmit-testimonial-style-1">
                            <div class="pbminfotech-post-item">
                                <div class="pbmit-featured-wrapper">
                                    <img src="/storage/{{ $indexComment->image }}" class="img-fluid" alt="{{ $indexComment->name }}" />
                                </div>
                                <div class="pbminfotech-box-content">
                                    <div class="pbminfotech-box-desc">
                                        <blockquote class="pbminfotech-testimonial-text">
                                            <div class="at-above-post-homepage addthis_tool"></div>
                                            <p>“{{ $indexComment->comment }}”</p>
                                            <div class="at-below-post-homepage addthis_tool"></div>
                                        </blockquote>
                                    </div>
                                    <div class="pbminfotech-box-author">
                                        <h3 class="pbminfotech-box-title">{{ $indexComment->name }}</h3>
                                        <div class="pbminfotech-testimonial-detail">{{ $indexComment->job }}</div>
                                    </div>
                                </div>
                            </div>
                        </article>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
<!-- Testimonial End -->
