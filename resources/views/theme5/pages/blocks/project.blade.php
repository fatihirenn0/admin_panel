<!-- Case Studies Section -->
<section class="case-study-section bg-white">
    <div class="divider"></div>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8">
                <div class="section-heading text-center">
                    <div class="sub-title justify-content-center">
                        <img class="static-image" src="/theme5/img/core-img/hammer.png" alt="{{ __('Anasayfa Projeler İkon') }}">
                        {{ __('Projeler') }}
                    </div>
                    <h2>{{ __('Başarıyla Tamamlanan Hukuki Süreçler') }}</h2>
                </div>
            </div>
        </div>

        <div class="row justify-content-center g-4">
            @foreach($allProjects as $indexProject)
            <!-- Case Study Card -->
            <div class="col-12 col-sm-4">
                <div class="case-study-card">
                    <a href="{{ route(getResourceFullLink('projects','show'), $indexProject) }}">
                    <img src="/storage/{{ $indexProject->image }}" alt="{{ $indexProject->name }}">
                    </a>
                </div>
            </div>
            @endforeach

        </div>
    </div>
    <div class="divider"></div>
</section>
