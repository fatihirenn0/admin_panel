<!-- =============== casestudy-section start  =============== -->

<div class="casestudy-section pt-120 pb-120">
    <img src="/theme9/images/bg/section-bg1.svg" class="section-bg1 img-fluid static-image" alt="{{ __('Anasayfa Projeler Arka Plan 1. Görseli') }}" />
    <img src="/theme9/images/bg/section-bg2.svg" class="section-bg2 img-fluid static-image" alt="{{ __('Anasayfa Projeler Arka Plan 1. Görseli') }}" />
    <div class="container">
        <div class="row justify-content-center align-items-center">
            <div class="col-md-8">
                <div class="section-title1 text-start">
                    <h2>{{ __('Projeler') }}</h2>
                    <p>{{ __('Başarıyla Tamamlanan Hukuki Süreçler') }}</p>
                </div>
            </div>
            <div class="col-md-4 text-lg-end text-center">
                <div class="eg-btn btn--primary btn--lg d-lg-inline-block d-none">
                    <a href="{{ route(getResourceFullLink('projects')) }}"><i class="bi bi-dash-lg"></i>{{ __('Tümü') }}</a>
                </div>
            </div>
        </div>
        <div class="row justify-content-center g-4">
            @foreach($allProjects as $indexProject)
                <div class="col-lg-4 col-md-6 col-sm-10 wow fadeInDown" data-wow-duration="1.5s" data-wow-delay="0.2s">
                    <div class="casestudy-single">
                        <img src="/storage/{{ $indexProject->image }}" class="casestudy1" alt="{{ $indexProject->name }}" />
                        <a href="{{ route(getResourceFullLink('projects','show'), $indexProject) }}" class="read-more">
                            <span class="btn-text">{{ __('İncele') }}</span><span class="btn-arrow"><i class="bi bi-arrow-right"></i></span>
                        </a>
                        <div class="text">
                            @foreach($allProjectCategories as $indexProjectCategory)
                                <span>{{ $indexProjectCategory->name }}</span>
                            @endforeach
                            <h3><a href="{{ route(getResourceFullLink('projects','show'), $indexProject) }}">{{ $indexProject->name }}</a></h3>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>

<!-- =============== casestudy-section end  =============== -->
