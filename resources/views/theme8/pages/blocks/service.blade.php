<!-- Services -->
<div class="mcgill-cases back-gray">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 mb-40 animate-box" data-animate-effect="fadeInLeft">
                <span class="heading-meta">{{ __('Hizmetlerimiz') }}</span>
                <h2 class="mcgill-heading">{{ __('İhtiyacınıza Özel Profesyonel Hukuk Hizmetleri') }}</h2>
            </div>
        </div>
        <div class="row">
            @foreach($allServices as $indexService)
                <div class="col-md-4 animate-box" data-animate-effect="fadeInLeft">
                    <div class="mcgill-services-container">
                        <div class="mcgill-services-img-area"><img src="/storage/{{ $indexService->image }}" alt="{{ $indexService->name }}" /></div>
                        <div class="mcgill-services-text-area">
                            <h4 class="mcgill-services-heading">{{ $indexService->name }}</h4>
                            <p>{!! $indexService->short_description !!}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
