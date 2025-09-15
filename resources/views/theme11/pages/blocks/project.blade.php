<!-- Practice Section -->
<section class="practice-section stataic-bg-image" style="background-image: url(/theme11//images/background/pattern-2.png);" alt="{{ __('Anasayfa Projeler Arka Plan Görseli') }}">
    <div class="auto-container">
        <!-- Sec Title -->
        <div class="sec-title centered">
            <h2>{{ __('Projeler') }}</h2>
        </div>
        <div class="inner-container">
            <div class="clearfix">
                @foreach($allProjects as $indexProject)
                    <!-- Practice Block -->
                    <div class="practice-block col-lg-3 col-md-6 col-sm-12">
                        <div class="inner-box">
                            <img src="/storage/{{ $indexProject->image }}" alt="{{ $indexProject->name }}" />
                            <h5><a href="{{ route(getResourceFullLink('projects','show'), $indexProject) }}">{{ $indexProject->name }}</a></h5>
                            <div class="text">{!! $indexProject->description !!}</div>
                            <a class="arrow flaticon-right-arrow-3" href="{{ route(getResourceFullLink('projects','show'), $indexProject) }}"></a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
<!-- End Practice Section -->
