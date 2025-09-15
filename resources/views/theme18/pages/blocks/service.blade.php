<!-- Practice -->
<section class="practice-area pt-100 pb-70">
    <div class="container">
        <div class="section-title">
            <span> {{ __('Faaliyet Alanlarımız') }}</span>
            <h2>{{ __('Hizmet Sunduğumuz Alanlar') }}</h2>
        </div>
        <div class="row justify-content-center">
            @foreach($allServices as $indexService)
                <div class="col-sm-6 col-lg-4">
                    <div class="practice-item">
                        <div class="practice-icon">
                            <i class="flaticon-law"></i>
                        </div>
                        <h3>{{ $indexService->name }}</h3>
                        <p>{!! $indexService->short_description !!}</p>
                        <a href="{{ route(getResourceFullLink('services','show'),$indexService) }}">{{ __('İncele') }}</a>
                        <img class="practice-shape-one" src="/storage/{{ $indexService->image }}" alt="{{ $indexService->name }}" />
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
<!-- End Practice -->
