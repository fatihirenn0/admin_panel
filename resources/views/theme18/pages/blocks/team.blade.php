<!-- Team -->
<section class="team-area">
    <div class="container">
        <div class="section-title">
            <span>{{ __('Ekibimiz') }}</span>
            <h2>{{ __('Alanında Uzman Takım Arkadaşlarımız') }}</h2>
        </div>
        <div class="row justify-content-center">
            @foreach($allTeams as $indexTeam)
             <div class="col-sm-6 col-lg-3">
                <div class="team-item">
                    <img src="/storage/{{ $indexTeam->image }}" alt="{{ $indexTeam->name }}">
                    <div class="team-inner">
                        <ul>
                            @if($indexTeam->facebook)
                                <li>
                                    <a href="{{ $indexTeam->facebook }}"><i class="icofont-facebook"></i></a>
                                </li>
                            @endif @if($indexTeam->twitter)
                                <li>
                                    <a href="{{ $indexTeam->twitter }}"><i class="icofont-twitter"></i></a>
                                </li>
                            @endif @if($indexTeam->linkedin)
                                <li>
                                    <a href="{{ $indexTeam->linkedin }}"><i class="icofont-linkedin"></i></a>
                                </li>
                            @endif @if($indexTeam->instagram)
                                <li>
                                    <a href="{{ $indexTeam->instagram }}"><i class="icofont-instagram"></i></a>
                                </li>
                            @endif @if($indexTeam->tiktok)
                                <li>
                                    <a href="{{ $indexTeam->tiktok }}"><i class="icofont-tiktok"></i></a>
                                </li>
                            @endif @if($indexTeam->youtube)
                                <li>
                                    <a href="{{ $indexTeam->youtube }}"><i class="icofont-youtube"></i></a>
                                </li>
                            @endif @if($indexTeam->github)
                                <li>
                                    <a href="{{ $indexTeam->github }}"><i class="icofont-github"></i></a>
                                </li>
                            @endif
                        </ul>
                        <h3>
                            <a href="{{ route(getResourceFullLink('teams','show'), $indexTeam) }}">{{ $indexTeam->name }}</a>
                        </h3>
                        <span>{{ $indexTeam->job }}</span>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
<!-- End Team -->
