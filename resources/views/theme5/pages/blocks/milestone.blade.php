<!-- Work Process Section -->
<section class="work-process-section bg-dark">
    <div class="divider"></div>

    <div class="container">
        <div class="row g-5">
            <div class="col-12 col-md-5 col-xl-6">
                <div class="section-heading">
                    <div class="sub-title text-white">
                        <img class="static-image" src="/theme5/img/core-img/hammer.png" alt="{{ __('Anasayfa Tarihçe İkon') }}">
                        {{ __('Tarihçe') }}
                    </div>
                    <h2 class="mb-5 text-white">{{ __('Yılların deneyimiyle şekillenen hukuk yolculuğumuz.') }}</h2>
                </div>
            </div>

            <div class="col-md-7 col-xl-6">
                <div class="work-process">

                    @foreach($allMilestones as $indexMilestone)
                    <!-- Work Process Card -->
                    <div class="process-card wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="{{ ($loop->index + 1) * 100 }}ms">
                        <div class="number">{{ $indexMilestone->id }}</div>
                        <div class="process-text">
                            <div class="process-title">{{ $indexMilestone->name }}</div>
                            <p class="mb-0">{!! $indexMilestone->description !!}</p>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <div class="divider"></div>
</section>
