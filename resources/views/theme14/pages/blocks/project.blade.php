<!-- Horizontal accordion area start here -->
<section class="hzAccordion-area pt-130 pb-130">
    <div class="container">
        <div class="section-header mb-60">
            <h2 class="wow splt-txt text-white" data-splitting>{{ __('Projelerimiz') }}</h2>
        </div>
        <div class="hzAccordion__wrp">
            @foreach($allProjects as $indexProject)
                <div class="hzAccordion__item {{ $loop->first ? 'active' : '' }} {{ $loop->first ? '' : 'last-child wow' }} wow fadeInLeft" data-wow-delay="00ms" data-wow-duration="1500ms">
                <div class="head">
                    <h3 class="head-title"><span class="title">{{ $indexProject->name }}</span> <span class="number">{{ $indexProject->id }}</span></h3>
                </div>
                <div class="content">
                    <div class="wrp">
                        <div class="content-wrp">
                            <p class="text">{!! $indexProject->description !!}</p>
                            <a class="arry-btn" href="{{ route(getResourceFullLink('projects','show'), $indexProject) }}"><i class="fa-thin fa-arrow-up-right"></i></a>
                        </div>
                        <div class="shape">
                            <img class="static-bg-image" src="/theme14/images/shape/hz-accordion-shape.png" alt="{{ __('Anasayfa Projeler Arka Plan Görseli') }}">
                        </div>
                        <div class="image">
                            <img src="/storage/{{ $indexProject->image }}" alt="{{ $indexProject->name }}">
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
<!-- Horizontal accordion area end here -->
