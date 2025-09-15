<!-- Section: Services -->
<section class="bg-white-f5" data-tm-bg-img="images/bg/1c9.png">
    <div class="container pt-90 pb-50">
        <div class="section-title">
            <div class="row justify-content-md-center">
                <div class="col-md-8">
                    <div class="text-center mb-60">
                        <div class="tm-sc tm-sc-section-title section-title section-title-style1 text-center bg-img-center bg-no-repeat line-bottom-style3-bordered-line">
                            <div class="title-wrapper">
                                <h2 class="title"> {{ __('Hizmetlerimiz') }}</h2>
                                <div class="title-seperator-line"></div>
                                <div class="paragraph">
                                    <p>{{ __('İhtiyacınıza Özel Profesyonel Hukuk Hizmetleri') }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="section-content">
            <div class="row">
                @foreach($allServices as $indexService)
                    <div class="col-md-6 col-lg-6 col-xl-4">
                    <div class="service-style1">
                        <div class="item-thumb">
                            <img src="/storage/{{ $indexService->image }}" alt="{{ $indexService->name }}">
                        </div>
                        <div class="item-content">
                            <h3>{{ $indexService->name }}</h3>
                            <p>{!! $indexService->short_description !!}</p>
                            <a href="{{ route(getResourceFullLink('services','show'), $indexService) }}" class="btn btn-outline-theme-colored2 btn-outline mt-20">{{ __('İncele') }}</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
<!-- End Divider -->
