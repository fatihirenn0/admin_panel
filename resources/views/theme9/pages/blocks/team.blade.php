<!-- ===============  Attorneys-section   start =============== -->

<div class="attorneys-section pb-120">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-7">
                <div class="section-title1 text-center">
                    <h2>{{ __('Ekibimiz') }}</h2>
                    <p>{{ __('Alanında Uzman Takım Arkadaşlarımız') }}</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="swiper attorney-slider pb-65">
                    <div class="swiper-wrapper">
                        @foreach($allTeams as $indexTeam)
                            <div class="swiper-slide wow fadeInDown" data-wow-duration="1.5s" data-wow-delay="0.2s">
                            <div class="attorney-single">
                                <img src="/storage/{{ $indexTeam->image }}" class="casestudy1" alt="{{ $indexTeam-> name }}">
                                <div class="content">
                                    <h4><a href="{{ route(getResourceFullLink('teams','show'), $indexTeam) }}">{{ $indexTeam->name }}</a></h4>
                                    <p>{{ $indexTeam->job }}</p>
                                    <ul class="social-list gap-3">
                                        @if($indexTeam->facebook)
                                            <a href="{{ $indexTeam->facebook }}">
                                                <i class="bx bxl-facebook"></i>
                                            </a>
                                        @endif
                                        @if($indexTeam->twitter)
                                            <a href="{{ $indexTeam->twitter }}">
                                                <i class="bx bxl-twitter"></i>
                                            </a>
                                        @endif
                                        @if($indexTeam->instagram)
                                            <a href="{{ $indexTeam->instagram }}">
                                                <i class="bx bxl-instagram"></i>
                                            </a>
                                        @endif
                                        @if($indexTeam->youtube)
                                            <a href="{{ $indexTeam->youtube }}">
                                                <i class="bx bxl-youtube"></i>
                                            </a>
                                        @endif
                                        @if($indexTeam->tiktok)
                                            <a href="{{ $indexTeam->tiktok }}">
                                                <i class="bx bxl-tiktok"></i>
                                            </a>
                                        @endif
                                        @if($indexTeam->github)
                                            <a href="{{ $indexTeam->github }}">
                                                <i class="bx bxl-github"></i>
                                            </a>
                                        @endif
                                        @if($indexTeam->linkedin)
                                            <a href="{{ $indexTeam->linkedin }}">
                                                <i class="bx bxl-linkedin"></i>
                                            </a>
                                        @endif
                                    </ul>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div class="swiper-pagination d-flex align-items-center justify-content-center"></div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- =============== Attorneys-section end  =============== -->
