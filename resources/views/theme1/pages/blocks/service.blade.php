<section class="project-three-area pt-120 pb-120">
    <div class="project-content">
        <div class="project-shape">
            <img class="animation__arryUpDown static-image" src="/theme1/images/project/project-shape-image.png" alt="{{__('Ana Sayfa Hizmetlerimiz 1.Arkaplan Görseli')}}">
        </div>
        <div class="project-shape2">
            <img class="animation__arryUpDown static-image" src="/theme1/images/project/project-shape-image1.png" alt="{{__('Ana Sayfa Hizmetlerimiz 2.Arkaplan Görseli')}}">
        </div>
    </div>
    <div class="container">
        <div class="project-two__wrp">
            <div class="section-header text-center mb-50">
                <h4 class="wow fadeInUp" data-wow-delay="00ms" data-wow-duration="1500ms">{{ __('Faaliyet Alanlarımız') }}
                </h4>
                <h2 class="wow title">{{ __('Hizmet Sunduğumuz Alanlar') }}</h2>
            </div>
            <div class="row g-4 align-items-center">
                @foreach($allServices as $indexService)
                    <div class="col-lg-6">
                        <div class="project-two__item">
                            <div class="project-two__image">
                                <a href="{{ route(getResourceFullLink('services','show'),$indexService) }}" class="wow imageUpToDown"><img src="/storage/{{ $indexService->image }}" alt="{{ $indexService->name }}"></a>
                            </div>
                            <div class="project-two__content mt-25">
                                <h5><a href="{{ route(getResourceFullLink('services','show'),$indexService) }}">{{ $indexService->name }}</a></h5>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
