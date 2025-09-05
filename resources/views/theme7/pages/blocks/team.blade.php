<!-- Marquee Start -->
<section class="pbmit-bg-color-global marquee-section-home1">
    <div class="container-fluid">
        <div class="swiper-slider marquee">
            <div class="swiper-wrapper">
                @foreach($allReferences as $indexReference)
                    <div class="swiper-slide">
                        <article class="pbmit-marquee-effect pbmit-marquee-effect-style-1">
                            <div class="pbmit-tag-wrapper">
                                <h2 class="pbmit-element-title">{{ $indexReference->name }}</h2>
                            </div>
                        </article>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
<!-- Marquee End -->
<!-- Team Start -->
<section class="pbmit-element-team-style-2" data-cursor="global-color">
    <div class="container-fluid">
        <div class="swiper-slider" data-autoplay="false" data-dots="false" data-arrows="false" data-columns="4" data-margin="30" data-effect="slide">
            <div class="swiper-wrapper">
                @foreach($allTeams as $indexTeam)
                    <div class="swiper-slide">
                        <!-- Slide1 -->
                        <article class="pbmit-team-style-2">
                            <div class="pbminfotech-post-item">
                                <div class="pbminfotech-team-image-box">
                                    <div class="pbminfotech-box-social-links">
                                        <ul class="pbmit-social-links pbmit-team-social-links">
                                            @if($indexTeam->facebook)
                                                <li class="pbmit-social-li pbmit-social-facebook">
                                                    <a href="{{ $indexTeam->facebook }}" title="Facebook" target="_blank">
                                                        <span><i class="pbmit-base-icon-facebook-squared"></i></span>
                                                    </a>
                                                    @endif @if($indexTeam->twitter)
                                                </li>

                                                <li class="pbmit-social-li pbmit-social-twitter">
                                                    <a href="{{ $indexTeam->twitter }}" title="Twitter" target="_blank">
                                                        <span><i class="pbmit-base-icon-twitter"></i></span>
                                                    </a>
                                                </li>
                                            @endif @if($indexTeam->instagram)
                                                <li class="pbmit-social-li pbmit-social-instagram">
                                                    <a href="{{ $indexTeam->instagram }}" title="Instagram" target="_blank">
                                                        <span><i class="pbmit-base-icon-instagram"></i></span>
                                                    </a>
                                                </li>
                                            @endif @if($indexTeam->youtube)
                                                <li class="pbmit-social-li pbmit-social-youtube">
                                                    <a href="{{ $indexTeam->youtube }}" title="Youtube" target="_blank">
                                                        <span><i class="pbmit-base-icon-youtube-play"></i></span>
                                                    </a>
                                                </li>
                                            @endif
                                        </ul>
                                    </div>
                                    <div class="pbmit-featured-img-wrapper">
                                        <div class="pbmit-featured-wrapper">
                                            <img src="/storage/{{ $indexTeam->image }}" class="img-fluid" alt="{{ $indexTeam->name }}" />
                                        </div>
                                    </div>
                                </div>
                                <div class="pbminfotech-box-content">
                                    <div class="pbminfotech-box-content-inner">
                                        <h3 class="pbmit-team-title">
                                            <a href="{{ route(getResourceFullLink('teams','show'),$indexTeam) }}">{{ $indexTeam->name }}</a>
                                        </h3>
                                        <div class="pbminfotech-team-position">
                                            <div class="pbminfotech-box-team-position">{{ $indexTeam->job }}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </article>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
<!-- Team End -->
