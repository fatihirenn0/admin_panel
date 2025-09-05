<!-- Portfolio Start -->
<section class="portfolio-section-home1">
    <div class="container-fluid">
        <div class="swiper-slider slider-tooltip" data-loop="true" data-autoplay="false" data-dots="false" data-arrows="false" data-columns="5" data-margin="30" data-effect="slide">
            <div class="swiper-wrapper">
                @foreach($allProjects as $indexProject)
                    <div class="swiper-slide">
                        <!-- Slide1 -->
                        <div class="pbmit-portfolio-style-3">
                            <div class="pbminfotech-post-content" data-cursor-tooltip="">
                                <div class="pbmit-featured-wrapper">
                                    <img src="/storage/{{ $indexProject->image }}" class="img-fluid" alt="{{ $indexProject->name }}" />
                                </div>
                                <div class="pbminfotech-box-content">
                                    @foreach($allProjectCategories as $indexProjectCategory)
                                        <div class="pbmit-port-cat">
                                            <a href="#">{{ $indexProjectCategory->name }}</a>
                                        </div>
                                    @endforeach
                                    <h3 class="pbmit-title">{{ $indexProject->name }}</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
<!-- Portfolio End -->
