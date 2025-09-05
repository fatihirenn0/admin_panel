<!-- Packages Section -->
<section class="packages-section-three pull-down">
    <div class="bg bg-image static-bg-image" style="background-image: url(/theme3/images/background/bg-packages3-1.jpg);" alt="{{__('Anasayfa Projeler Arka Plan Görseli')}}"></div>
    <div class="auto-container">
        <div class="carousel-outer">
            <div class="packages-carousel-three owl-carousel owl-theme default-dots">
                <div class="outer-box">
                    @foreach($allProjects as $indexProject)
                        <div class="package-block-three {{ $loop->first ? 'active' : '' }}">
                            <div class="inner-box">
                                <div class="image-box">
                                    <figure class="image"><img src="/storage/{{ $indexProject->image }}" alt="{{ $indexProject->name }}" /></figure>
                                </div>
                                <div class="content-box-hover">
                                    <div class="image-box-hover">
                                        <figure class="image"><img src="/storage/{{ $indexProject->image }}" alt="{{ $indexProject->name }}" /></figure>
                                    </div>
                                    <div class="content-box">
                                        <div class="inner-content-box">
                                            @foreach($allProjectCategories as $indexProjectCategory)
                                                <div class="price">{{ $indexProjectCategory->name }}</div>
                                            @endforeach
                                            <br />
                                            <h4 class="title"><a href="{{ route(getResourceFullLink('projects')) }}">{{ $indexProject->name }}</a></h4>
                                            <div class="text">{!! $indexProject->description !!}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
<!--End Packages Section -->-
<!-- Video Section -->
<section class="video-section-two">
    <div class="auto-container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="outer-box">
                    <h2 class="title words-slide-up text-split">{{ __('Tanıtım Filmi') }}</h2>
                    <a href="#" class="play-now" data-fancybox="gallery" data-caption=""> <i class="icon fas fa-play" aria-hidden="true"></i> <span class="ripple"></span> </a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Video Section -->
