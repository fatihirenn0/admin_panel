<!-- Portfolio Section -->
<section class="portfolio-section">
    <div class="container">
        <!-- Sec Title -->
        <div class="section-title centered">
            <div class="title">{{ __('Projeler') }}</div>
            <h3>{{ __('Başarıyla Tamamlanan Hukuki Süreçler') }}</h3>
        </div>
    </div>

    <!-- Outer Container -->
    <div class="outer-container">
        <div class="portfolio-carousel owl-carousel owl-theme">
            @foreach($allProjects as $indexProject)
                <!-- Portfolio Block -->
                <div class="portfolio-block">
                    <div class="inner-box">
                        <div class="image">
                            <img src="/storage/{{ $indexProject->image }}" alt="{{ $indexProject->name }}" />
                            <div class="overlay-box">
                                <div class="overlay-inner">
                                    <div class="content">
                                        @foreach($allProjectCategories as $indexProjectCategory)
                                            <div class="title">{{ $indexProjectCategory->name }}</div>
                                        @endforeach
                                        <h3>{{ $indexProject->name }}</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="overlay-link">
                                <a href="/storage/{{ $indexProject->image }}" data-fancybox="gallery-1" data-caption="" class="plus flaticon-plus"></a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
<!-- End Portfolio Section -->
