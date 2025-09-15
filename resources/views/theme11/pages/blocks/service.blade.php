<!-- Services Section -->
<section class="services-section">
    <div class="auto-container">
        <div class="inner-container">
            <div class="row clearfix">
                @foreach($allServices as $indexService)
                    <!-- Services Block -->
                    <div class="services-block col-lg-6 col-md-12 col-sm-12">
                        <div class="inner-box wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
                            <div class="content">
                                <img src="/storage/{{ $indexService->image }}" alt="{{ $indexService->name }}" />
                                <h4><a href="{{ route(getResourceFullLink('services')) }}">{{ $indexService->name }}</a></h4>
                                <div class="text">{!! $indexService->short_description !!}</div>
                            </div>
                            <a href="{{ route(getResourceFullLink('services')) }}" class="arrow flaticon-right"></a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
<!-- End Services Section -->
