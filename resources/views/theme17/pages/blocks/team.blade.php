<!-- Special Team Start -->
<section class="main-special-team">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-xl-3 col-12">
                <div class="special-team-content">
                    <span class="sub-title">{{ __('Ekibimiz') }}</span>
                    <h2 class="h2-title">{{ __('Alanında Uzman Takım Arkadaşlarımız') }}</h2>
                    <a href="{{ route(getResourceFullLink('teams')) }}" class="link-btn" title="Discover More Lawyers"><span>{{ __('Tümü') }}</span> <i class="fas fa-arrow-right" aria-hidden="true"></i></a>
                </div>
            </div>
            <div class="col-xl-9 col-12">
                <div class="special-team-list">
                    <div class="team-slider swiper">
                        <div class="swiper-wrapper">
                            @foreach($allTeams as $indexTeam)
                                <div class="swiper-slide">
                                    <div class="team-box">
                                        <div class="team-img-wp">
                                            <div class="team-img">
                                                <img src="/storage/{{ $indexTeam->image }}" width="317" height="368" alt="{{ $indexTeam->name }}" />
                                            </div>
                                            <div class="team-social">
                                                <div class="team-social-share">
                                                    <img class="static-image" src="/theme17/images/share-icon.svg" width="15" height="17" alt="{{ __('Anasayfa Ekibimiz 1.İkon') }}" />
                                                </div>
                                                <ul>
                                                    @if($indexTeam->facebook)
                                                        <li>
                                                            <a href="{{ $indexTeam->facebook }}"><i class="fab fa-facebook-f"></i></a>
                                                        </li>
                                                    @endif @if($indexTeam->twitter)
                                                        <li>
                                                            <a href="{{ $indexTeam->twitter }}"><i class="fab fa-twitter"></i></a>
                                                        </li>
                                                    @endif @if($indexTeam->linkedin)
                                                        <li>
                                                            <a href="{{ $indexTeam->linkedin }}"><i class="fab fa-linkedin"></i></a>
                                                        </li>
                                                    @endif @if($indexTeam->instagram)
                                                        <li>
                                                            <a href="{{ $indexTeam->instagram }}"><i class="fab fa-instagram"></i></a>
                                                        </li>
                                                    @endif @if($indexTeam->youtube)
                                                        <li>
                                                            <a href="{{ $indexTeam->youtube }}"><i class="fab fa-youtube"></i></a>
                                                        </li>
                                                    @endif @if($indexTeam->github)
                                                        <li>
                                                            <a href="{{ $indexTeam->github }}"><i class="fab fa-github"></i></a>
                                                        </li>
                                                    @endif @if($indexTeam->tiktok)
                                                        <li>
                                                            <a href="{{ $indexTeam->tiktok }}"><i class="fab fa-tiktok"></i></a>
                                                        </li>
                                                    @endif
                                                </ul>
                                            </div>
                                        </div>
                                        <p>{{ $indexTeam->job }}</p>
                                        <h4 class="h4-title">
                                            <a href="{{ route(getResourceFullLink('teams','show'), $indexTeam) }}" title="{{ $indexTeam->name }}">{{ $indexTeam->name }}</a>
                                        </h4>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="swiper-pagination"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Special Team End -->
