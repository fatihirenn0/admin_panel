<!-- =============== Practice-area-section start  =============== -->

<div class="practice-area-section pb-120">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-7">
                <div class="section-title1 text-center">
                    <h2>{{ __('Hizmetler') }}</h2>
                    <p> {{ __('İhtiyacınıza Özel Profesyonel Hukuk Hizmetleri') }}</p>
                 </div>
            </div>
        </div>
        <div class="row justify-content-center g-4">
            @foreach($allServices as $indexService)
                <div class="col-lg-4 col-md-6 col-sm-10">
                <div class="practice-single wow animate fadeInDown" data-wow-duration="1.5s" data-wow-delay="0.2s">
                    <div class="header">
                        <div class="icon-area">
                            <img src="/storage/{{ $indexService->image }}" alt="{{ $indexService->name }}">
                            @foreach($allServiceCategories as $indexServiceCategory)
                                <a href="{{ route(getResourceFullLink('services','show'), $indexService) }}" class="eg-btn btn--primary btn--outline btn--sm capsule">{{ $indexServiceCategory->name }}</a>
                            @endforeach
                        </div>
                        <h4><a href="{{ route(getResourceFullLink('services','show'), $indexService) }}">{{ $indexService->name }}</a></h4>
                    </div>
                    <div class="body">
                        <p>{!! $indexService->short_description !!}</p>
                        <a href="{{ route(getResourceFullLink('services','show'), $indexService) }}" class="details-btn">{{ __('İncele') }}</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

<!-- =============== Practice-area-section end =============== -->
