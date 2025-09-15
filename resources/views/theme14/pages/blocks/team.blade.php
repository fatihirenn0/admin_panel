<!-- Team area start here -->
<section class="team-area pt-130">
    <div class="container">
        <div class="team__wrp">
            <div class="row g-5">
                <div class="col-xl-5">
                    <div class="team__left">
                        <div class="section-header">
                            <h2 class="wow splt-txt" data-splitting>{{ __('Ekibimiz') }}</h2>
                            <p class="wow fadeInUp" data-wow-delay="00ms" data-wow-duration="1500ms">{{ __('Alanında Uzman Takım Arkadaşlarımız') }}</p>
                        </div>
                        <a href="{{ route(getResourceFullLink('teams')) }}" class="btn-discover wow fadeInUp mt-50" data-wow-delay="200ms" data-wow-duration="1500ms" data-splitting data-text="{{ __('Tümü') }}">{{ __('Tümü') }}</a>
                    </div>
                </div>
                <div class="col-xl-7">
                    <div class="team__right">
                        <div class="row g-4 g-lg-5">
                            @foreach($allTeams as $indexTeam)
                                <div class="col-sm-6 wow fadeInLeft" data-wow-delay="00ms" data-wow-duration="1500ms">
                                    <div class="team__item have-margin">
                                        <div class="socials">
                                            <i class="fa-regular fa-plus"></i>
                                            <ul>
                                                @if($indexTeam->facebook)
                                                    <a href="{{ $indexTeam->facebook }}">
                                                        <i class="fa-brands fa-facebook"></i>
                                                    </a>
                                                @endif @if($indexTeam->twitter)
                                                    <a href="{{ $indexTeam->twitter }}">
                                                        <i class="fa-brands fa-x"></i>
                                                    </a>
                                                @endif @if($indexTeam->instagram)
                                                    <a href="{{ $indexTeam->instagram }}">
                                                        <i class="fa-brands fa-instagram"></i>
                                                    </a>
                                                @endif @if($indexTeam->youtube)
                                                    <a href="{{ $indexTeam->youtube }}">
                                                        <i class="fa-brands fa-youtube"></i>
                                                    </a>
                                                @endif @if($indexTeam->tiktok)
                                                    <a href="{{ $indexTeam->tiktok }}">
                                                        <i class="fa-brands fa-tiktok"></i>
                                                    </a>
                                                @endif @if($indexTeam->github)
                                                    <a href="{{ $indexTeam->github }}">
                                                        <i class="fa-brands fa-github"></i>
                                                    </a>
                                                @endif @if($indexTeam->linkedin)
                                                    <a href="{{ $indexTeam->linkedin }}">
                                                        <i class="fa-brands fa-linkedin"></i>
                                                    </a>
                                                @endif
                                            </ul>
                                        </div>
                                        <div class="team__image"><img src="/storage/{{ $indexTeam->image }}" alt="{{ $indexTeam->name }}" /></div>
                                        <h4><a class="hover-link" href="{{ route(getResourceFullLink('teams','show'), $indexTeam) }}">{{ $indexTeam->name }}</a></h4>
                                        <span>{{ $indexTeam->job }}</span>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Team area end here -->
