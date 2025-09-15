<!-- Case Study Start -->
<section class="main-case-study">
    <div class="case-study-slider swiper">
        <div class="swiper-wrapper">
            @foreach($allProjects as $indexProject)
                <div class="swiper-slide">
                    <div class="case-study-box">
                        <img src="/storage/{{ $indexProject->image }}" width="480" height="610" alt="{{ $indexProject->name }}" />
                        <div class="case-study-box-content">
                            <h4 class="h4-title">
                                <a href="{{ route(getResourceFullLink('projects','show'), $indexProject) }}" title="{{ $indexProject->name }}">{{ $indexProject->name }}</a>
                            </h4>
                            <div class="case-study-box-text">
                                <p>{!! $indexProject->description !!}</p>
                                <a href="{{ route(getResourceFullLink('projects','show'), $indexProject) }}" class="arrow-btn" title="{{ $indexProject->name }}"><i class="fas fa-arrow-right" aria-hidden="true"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
<!-- Case Study End -->
