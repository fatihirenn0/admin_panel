<!-- legal solutions -->
<section id="legal-solution" class="legal-solution-3 overflow-x-hidden position-relative">
    <div class="container">
        <div class="row g-4 align-items-center">
            <div class="col-xl-7 col-xxl-6">
                <div class="row g-4">
                    @foreach($allServices as $indexService)
                        <div class="col-sm-6">
                            <a href="{{ route(getResourceFullLink('services','show'), $indexService) }}" class="legal-card">
                                <img src="/storage/{{ $indexService->image }}" class="mb-5" alt="{{ $indexService->name }}" />
                                @foreach($allServiceCategories as $indexServiceCategory)
                                    <p class="mb-2 pt-2">{{ $indexServiceCategory->name }}</p>
                                @endforeach
                                <h3>{{ $indexService->name }}</h3>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="col-xl-5 offset-xxl-1">
                <h2 class="text-white mb-3">{{ __('Hizmetlerimiz') }}</h2>
                <p class="pb-2 pb-lg-5 text-white">{{ __('İhtiyacınıza Özel Profesyonel Hukuk Hizmetleri') }}</p>
                <a href="{{ route(getResourceFullLink('services')) }}" class="read-more-2 d-inline-flex text-white">{{ __('Tüm Hizmetler') }} <i class="ti ti-arrow-up-right arrow-sm bg-primary text-dark"></i></a>
            </div>
        </div>
    </div>
</section>
