@extends('theme15.pages.build')
@section('title',__('Müşteri Yorumları'))
@section('content')
    <!-- Section: inner-header -->
    <section class="page-title divider layer-overlay overlay-dark-8 section-typo-light bg-img-center static-image" data-tm-bg-img="/theme15/images/bg/as02.jpg" alt="{{ __('Müşteri Yorumlar Sayfası Görseli') }}">
        <div class="container pt-90 pb-90">
            <!-- Section Content -->
            <div class="section-content">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <h2 class="title text-white">{{ __('Müşteri Yorumları') }}</h2>
                        <nav role="navigation" class="breadcrumb-trail breadcrumbs">
                            <div class="breadcrumbs">
                            <span class="trail-item trail-begin">
                                <a href="{{ route('site.index') }}"><span>{{ __('Anasayfa') }}</span></a>
                            </span>
                                <span><i class="fa fa-angle-right"></i></span>
                                <span class="trail-item trail-end text-theme-colored2">{{ __('Müşteri Yorumları') }}</span>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Section: Testimonials -->
    <section class="bg-white-f5">
        <div class="container">
            <div class="section-content">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="tm-sc tm-sc-services tm-sc-services-carousel services-style7-fullwidth-gallery owl-dots-light-skin owl-dots-center">
                            <!-- Isotope Gallery Grid -->
                            <div class="owl-carousel owl-theme tm-owl-carousel-3col" data-autoplay="true" data-loop="true">
                                @foreach($customerComments as $customerComment)
                                    <!-- the loop -->
                                    <div class="tm-carousel-item">
                                        <div class="tm-sc tm-sc-testimonials testimonial-style7-current-theme">
                                            <div class="tm-testimonial testimonials type-testimonials">
                                                <div class="testimonial-inner">
                                                    <div class="testimonial-author-details">
                                                        <div class="testimonial-header">
                                                            <div class="author-text">{{ $customerComment->comment }}</div>
                                                            <div class="star-rating"><span data-tm-width="90%"></span></div>
                                                        </div>
                                                        <div class="testimonial-footer">
                                                            <div class="testimonial-image-holder">
                                                                <div class="author-thumb">
                                                                    <img width="85" height="85" src="/storage/{{ $customerComment->image }}" class="img-fullwidth rounded-circle wp-post-image" alt="{{ $customerComment->name }}" />
                                                                </div>
                                                            </div>
                                                            <div class="author-info">
                                                                <h5 class="name">{{ $customerComment->name }}</h5>
                                                                <span class="job-position">{{ $customerComment->job }}</span> <a class="company-url" href="#"></a>
                                                            </div>
                                                            <div class="clearfix"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end of the loop -->
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Divider -->
@endsection
