<!-- Area Of Practice -->
<section class="area-of-practice">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-titleV1 wow fadeIn" data-wow-delay=".25s">
                    <h3>{{ __('Hizmetlerimiz') }}</h3>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach($allServices as $indexService)
                <div class="col-md-4">
                    <div class="single-practice wow fadeIn" data-wow-delay=".25s">
                        <div class="sp-icon">
                            <img src="/storage/{{ $indexService->image }}" alt="{{ $indexService->name }}" />
                        </div>
                        <div class="sp-text">
                            <h4>{{ $indexService->name }}</h4>
                            <p>{!! $indexService->short_description !!}</p>
                            <a href="{{ route(getResourceFullLink('services','show'), $indexService) }}">{{ __('İncele') }}<i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
                        </div>
                    </div>
                </div>
            @endforeach
            <div class="col-md-12">
                <div class="view-all-practice-btn wow fadeIn" data-wow-delay=".25s">
                    <a href="{{ route(getResourceFullLink('services','index')) }}" class="btn-style-a">{{ __('Tüm Hizmetler') }}</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- /Area Of Practice -->
