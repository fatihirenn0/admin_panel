<section class="team-area-1 space overflow-hidden static-bg-image" data-overlay="title" data-opacity="8" data-bg-src="/theme12/img/bg/team-1-bg.jpg" alt="{{ __('Anasayfa Ekibimiz Arka Plan Görseli') }}">
    <div class="container">
        <div class="row gx-60">
            <div class="col-xl-4">
                <div class="team-1-sec-title">
                    <div class="title-area">
                        <span class="sub-title">{{ __('Ekibimiz') }}</span>
                        <h2 class="sec-title text-white">{{ __('Alanında Uzman Takım Arkadaşlarımız') }}</h2>
                        <div class="button-wrapper">
                            <a href="{{ route(getResourceFullLink('teams')) }}" class="th-btn star-btn">{{ __('Tümü') }}<i class="fa-regular fa-arrow-right-long"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-8">
                <div class="team-1-card-wrap">
                    <div
                        class="swiper has-shadow th-slider"
                        id="teamSlider111"
                        data-slider-options='{"breakpoints":{"0":{"slidesPerView":1},"576":{"slidesPerView":"2"},"768":{"slidesPerView":"2"},"992":{"slidesPerView":"4"},"1200":{"slidesPerView":"4"}}}'
                    >
                        <div class="swiper-wrapper">
                            @foreach($allTeams as $indexTeam)
                                <div class="swiper-slide">
                                    <div class="team-card">
                                        <div class="team-img"><img src="/storage/{{ $indexTeam->image }}" alt="{{ $indexTeam->name }}" /></div>
                                        <div class="team-content">
                                            <h3 class="box-title"><a href="{{ route(getResourceFullLink('teams','show'), $indexTeam) }}">{{ $indexTeam->name }}</a></h3>
                                            <span class="team-desig">{{ $indexTeam->job }}</span>
                                        </div>
                                        <div class="team-content-hover-wrap">
                                            <div class="team-content-hover">
                                                <div class="team-img"><img src="/storage/{{ $indexTeam->image }}" alt="{{ $indexTeam->name }}" /></div>
                                                <div class="hover-inner">
                                                    <h3 class="box-title"><a href="{{ route(getResourceFullLink('teams','show'), $indexTeam) }}">{{ $indexTeam->name }}</a></h3>
                                                    <span class="team-desig">{{ $indexTeam->job }}</span>
                                                    <div class="team-social">
                                                        <div class="th-social">
                                                            @if($indexTeam->facebook)
                                                                <a href="{{ $indexTeam->facebook }}">
                                                                    <i class="fab fa-facebook-f"></i>
                                                                    <span class="sr-only">Facebook</span>
                                                                </a>
                                                            @endif @if($indexTeam->twitter)
                                                                <li>
                                                                    <a href="{{ $indexTeam->twitter }}">
                                                                        <i class="fab fa-twitter"></i>
                                                                        <span class="sr-only">Twitter</span>
                                                                    </a>
                                                                </li>
                                                            @endif @if($indexTeam->instagram)
                                                                <li>
                                                                    <a href="{{ $indexTeam->instagram }}">
                                                                        <i class="fab fa-instagram"></i>
                                                                        <span class="sr-only">İnstagram</span>
                                                                    </a>
                                                                </li>
                                                            @endif @if($indexTeam->youtube)
                                                                <li>
                                                                    <a href="{{ $indexTeam->youtube }}">
                                                                        <i class="fab fa-youtube"></i>
                                                                        <span class="sr-only">Youtube</span>
                                                                    </a>
                                                                </li>
                                                            @endif @if($indexTeam->github)
                                                                <li>
                                                                    <a href="{{ $indexTeam->github }}">
                                                                        <i class="fab fa-github"></i>
                                                                        <span class="sr-only">Github</span>
                                                                    </a>
                                                                </li>
                                                            @endif @if($indexTeam->linkedin)
                                                                <li>
                                                                    <a href="{{ $indexTeam->linkedin }}">
                                                                        <i class="fab fa-linkedin"></i>
                                                                        <span class="sr-only">Linkedin</span>
                                                                    </a>
                                                                </li>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    @php
                        $previousTeam =\App\Models\Team::where('id','<',$indexTeam->id)->first();
                        $nextTeam = \App\Models\Team::where('id','>',$indexTeam->id)->first();
                    @endphp
                    @if($previousTeam)
                    <button data-slider-prev="#teamSlider111" class="slider-arrow slider-prev"><i class="far fa-arrow-left"></i></button>
                    @endif
                    @if($nextTeam)
                    <button data-slider-next="#teamSlider111" class="slider-arrow slider-next"><i class="far fa-arrow-right"></i></button>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
