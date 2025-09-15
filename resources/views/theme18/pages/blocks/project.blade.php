<!-- portfolio -->
<section class="portfolio-area ptb-100">
    <div class="container">
        <div class="section-title">
            <span>{{ __('Projeler') }}</span>
            <h2> {{ __('Başarıyla Tamamlanan Hukuki Süreçler') }}</h2>
        </div>
        <div class="row justify-content-center">
            @foreach($allProjects as $indexProject)
                <div class="col-sm-6 col-lg-4">
                <div class="portfolio-item">
                    <img src="/storage/{{ $indexProject->image }}" alt="{{ $indexProject->name }}">
                    <div class="portfolio-inner">
                        @foreach($allProjectCategories as $indexProjectCategory)
                        <span>{{ $indexProjectCategory->name }}</span>
                        @endforeach
                        <h3>
                            <a href="{{ route(getResourceFullLink('projects','show'), $indexProject) }}">{{ $indexProject->name }}</a>
                        </h3>
                        <p>{{ $indexProject->created_at->translatedFormat('d F Y') }}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="text-center">
            <a class="cmn-btn" href="{{ route(getResourceFullLink('projects')) }}">{{ __('Tüm Projeler') }}</a>
        </div>
    </div>
</section>
<!-- End portfolio -->
