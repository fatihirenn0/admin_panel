<!-- Team Section Start -->
<section class="team-section section-padding pt-0">
    <div class="container">
        <div class="section-title-area">
            <div class="section-title">
                        <span class="wow fadeInUp">
                            <img class="static-image" src="/theme2/img/icon/sub-title-icon.svg" alt="{{__('Ana Sayfa Ekibimiz Arkaplan 1.İkon')}}">
                           {{ __('Ekibimiz') }}
                        </span>
                <h2 class="text-white wow fadeInUp" data-wow-delay=".3s">
                    {{ __('Alanında Uzman Takım Arkadaşlarımız') }}
                </h2>
            </div>
            <a href="{{ route(getResourceFullLink('teams')) }}" class="theme-btn border-btn wow fadeInUp" data-wow-delay=".5s">
                {{ __('Tümü') }}
                <img class="static-image" src="/theme2/img/icon/arrow-right-btn.svg" alt="{{__('Ana Sayfa Ekibimiz Arkaplan 2.İkon')}}">
            </a>
        </div>
        <div class="row">
            @foreach($allTeams as $indexTeam)
                <div class="col-xl-4 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay=".3s">
                <div class="team-card-items">
                    <div class="team-image">
                        <img src="/storage/{{ $indexTeam->image }}" alt="{{ $indexTeam->name }}">
                        <div class="social-icon d-grid align-items-center">
                            @if($indexTeam->facebook)
                                <a href="{{ $indexTeam->facebook }}"><i class="fab fa-facebook"></i></a>
                            @endif
                            @if($indexTeam->twitter)
                                <a href="{{ $indexTeam->twitter }}"><i class="fab fa-twitter"></i></a>
                            @endif
                            @if($indexTeam->linkedin)
                                <a href="{{ $indexTeam->linkedin }}"><i class="fab fa-linkedin"></i></a>
                            @endif
                            @if($indexTeam->instagram)
                                <a href="{{ $indexTeam->instagram }}"><i class="fab fa-instagram"></i></a>
                            @endif
                            @if($indexTeam->tiktok)
                                <a href="{{ $indexTeam->tiktok }}"><i class="fab fa-tiktok"></i></a>
                            @endif
                            @if($indexTeam->youtube)
                                <a href="{{ $indexTeam->youtube }}"><i class="fab fa-youtube"></i></a>
                            @endif
                            @if($indexTeam->github)
                                <a href="{{ $indexTeam->github }}"><i class="fab fa-github"></i></a>
                            @endif
                        </div>
                    </div>
                    <div class="team-content">
                        <div class="content">
                            <h3><a href="{{ route(getResourceFullLink('teams','show'),$indexTeam) }}">{{ $indexTeam->name }}</a></h3>
                            <p>{{ $indexTeam->job }}</p>
                        </div>
                        <a href="{{ route(getResourceFullLink('teams','show'),$indexTeam) }}" class="icon">
                            <i class="fa-solid fa-plus"></i>
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
