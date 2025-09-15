<div class="overflow-hidden space gallery-sec-3" id="case-study-sec">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-9 col-lg-10">
                <div class="title-area text-center">
                    <span class="sub-title justify-content-center">{{ __('Projeler') }}</span>
                    <h2 class="sec-title">{{ __('Başarıyla Tamamlanan Hukuki Süreçler') }}</h2>
                </div>
            </div>
        </div>
        <div class="row gy-4 masonary-active">
            @foreach($allProjects as $indexProject)
                <div class="col-md-6 col-lg-6 col-xl-6 col-xxl-3 filter-item">
                    <div class="gallery-card">
                        <div class="gallery-img">
                            <img src="/storage/{{ $indexProject->image }}" alt="{{ $indexProject->name }}" />
                            <div class="gallery-content">
                                <a href="/storage/{{ $indexProject->image }}" class="popup-icon popup-image"><i class="fa-solid fa-eye"></i></a>
                                <h2 class="box-title"><a href="{{ route(getResourceFullLink('projects','show'), $indexProject) }}">{{ $indexProject->name }}</a></h2>
                                @foreach($allProjectCategories as $indexProjectCategory)
                                    <p class="box-text">{{ $indexProjectCategory->name }}</p>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
