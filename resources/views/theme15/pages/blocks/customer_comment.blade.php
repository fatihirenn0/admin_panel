<!-- Section: Testimonial -->
<section data-tm-bg-img="images/bg/div-bg1.jpg">
    <div class="container pt-90 pb-80">
        <div class="section-title">
            <div class="row justify-content-md-center">
                <div class="col-md-8">
                    <div class="text-center mb-60">
                        <div class="tm-sc tm-sc-section-title section-title section-title-style1 text-center bg-img-center bg-no-repeat">
                            <div class="title-wrapper">
                                <h2 class="title text-white">{{ __('Birlikte Yazdığımız Başarı Hikâyeleri') }}</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="section-content">
            <div class="row">
                @foreach($allComments as $indexComment)
                    <div class="col-md-6 col-lg-6 col-xl-4">
                        <div class="tm-sc tm-sc-testimonials testimonial-style7-current-theme mb-md-30">
                            <div class="tm-testimonial testimonials type-testimonials">
                                <div class="testimonial-inner">
                                    <div class="testimonial-author-details">
                                        <div class="testimonial-header">
                                            <div class="author-text">{{ $indexComment->comment }}</div>
                                            <div class="star-rating"><span data-tm-width="90%"></span></div>
                                        </div>
                                        <div class="testimonial-footer">
                                            <div class="testimonial-image-holder">
                                                <div class="author-thumb"><img width="85" height="85" src="/storage/{{ $indexComment->image }}" class="img-fullwidth rounded-circle wp-post-image" alt="{{ $indexComment->name }}" /></div>
                                            </div>
                                            <div class="author-info">
                                                <h5 class="name">{{ $indexComment->name }}</h5>
                                                <span class="job-position">{{ $indexComment->job }}</span>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
<!-- End Divider -->
