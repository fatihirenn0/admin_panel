<!-- Section: Case Studies -->
<section class="bg-white-f5" data-tm-bg-img="images/bg/1c9.png">
    <div class="container pt-90 pb-90">
        <div class="section-title">
            <div class="row justify-content-md-center">
                <div class="col-md-8">
                    <div class="text-center mb-60">
                        <div class="tm-sc tm-sc-section-title section-title section-title-style1 text-center bg-img-center bg-no-repeat line-bottom-style3-bordered-line">
                            <div class="title-wrapper">
                                <h2 class="title">{{ __('Projeler') }}</h2>
                                <div class="title-seperator-line"></div>
                                <div class="paragraph">
                                    <p>  {{ __('Başarıyla Tamamlanan Hukuki Süreçler') }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="section-content">
            <div class="row">
                <div class="col-lg-12">
                    <div class="tm-sc tm-sc-services tm-sc-services-carousel services-style7-fullwidth-gallery owl-dots-light-skin owl-dots-center">
                        <!-- Isotope Gallery Grid -->
                        <div class="owl-carousel owl-theme tm-owl-carousel-3col" data-nav="true" data-autoplay="false" data-loop="false">
                           @foreach($allProjects as $indexProject)
                            <!-- the loop -->
                            <div class="tm-carousel-item">
                                <div class="project-style1 tm-service">
                                    <div class="image-thumb">
                                        <div class="thumb">
                                            <img src="/storage/{{ $indexProject->image }}" alt="{{ $indexProject->name }}">
                                        </div>
                                        <div class="title-holder overlay text-center">
                                            <h3><a href="{{ route(getResourceFullLink('projects','show'), $indexProject) }}">{{ $indexProject->name }}</a></h3>
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
