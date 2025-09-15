<!-- triumph section -->
<section class="services overflow-x-hidden" id="services">
    <div class="container">
        <div class="row align-items-end g-4 section-title">
            <div class="col-lg-6 px-xl-0">
                <h2 class="mb-3">{{ __('Projeler') }}</h2>
                <p>
                    {{ __('Başarıyla Tamamlanan Hukuki Süreçler') }}
                </p>
            </div>
            <div class="col-lg-6 d-flex justify-content-end">
                <div class="btns">
                    <button class="service-prev">
                        <i class="ti ti-arrow-narrow-left"></i>
                    </button>
                    <button class="service-next">
                        <i class="ti ti-arrow-narrow-right"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 left-col">
                <div class="swiper triumph-swiper">
                    <div class="swiper-wrapper">
                        @foreach($allProjects as $indexProject)
                            <div class="swiper-slide">
                                <div class="triumph-card">
                                    <img src="/storage/{{ $indexProject->image }}" class="w-100 h-100" alt="{{ $indexProject->name }}" />
                                    <div class="card-content">
                                        <h3>{{ $indexProject->name }}</h3>
                                        <p>
                                            {!! $indexProject->description !!}
                                        </p>
                                        <a href="{{ route(getResourceFullLink('projects','show'), $indexProject) }}" class="arrow-sm">
                                            <i class="ti ti-arrow-up-right"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
