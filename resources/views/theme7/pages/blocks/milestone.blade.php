<!-- Experience Start -->
<section class="experience-section-home1 section-lgb">
    <div class="container">
        <div class="pbmit-heading  text-center animation-style2">
            <h2 class="pbmit-title">{{ __('Yılların deneyimiyle şekillenen hukuk yolculuğumuz.') }}</h2>
        </div>
    </div>
    <div class="contianer" data-cursor-text="Drag">
        <div class="pbmit-timeline">
            <ol>
                @foreach($allMilestones as $indexMilestone)
                    <li>
                    <div class="pbmit-content">
                        <div class="pbmit-content-inner">
                            <div class="pbmit-hover-img">
                                <img src="/storage/{{ $indexMilestone->image }}" alt="{{ $indexMilestone->name }}">
                            </div>
                            <div class="time">{{ $indexMilestone->date }}</div>
                            <p class="simple-text">{{ $indexMilestone->name }}</p>
                        </div>
                    </div>
                </li>
                @endforeach
            </ol>
            <div class="pbmit-hide">
                <div class="arrows">
                    <button class="arrow arrow__prev disabled" disabled>
                        <i class="pbmit-base-icon-arrow-left"></i>
                    </button>
                    <button class="arrow arrow__next">
                        <i class="pbmit-base-icon-arrow-right"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Experience End -->
