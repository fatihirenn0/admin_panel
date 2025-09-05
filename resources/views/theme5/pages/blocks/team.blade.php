<!-- Team Members Section -->
<section class="lawyers-team-section bg-white">
    <div class="divider"></div>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8 col-lg-7 col-xl-6">
                <div class="section-heading text-center">
                    <div class="sub-title justify-content-center">
                        <img class="static-image" src="/theme5/img/core-img/hammer.png" alt="{{ __('Anasayfa Ekibimiz İkon') }}">
                        {{ __('Ekibimiz') }}
                    </div>
                    <h2>{{ __('Alanında Uzman Takım Arkadaşlarımız') }}</h2>
                </div>
            </div>
        </div>

        <div class="row justify-content-center g-4">
            @foreach($allTeams as $indexTeam)
            <!-- Laywer Card -->
            <div class="col-12 col-sm-6 col-md-4">
                <div class="laywer-card">
                    <img src="/storage/{{ $indexTeam->image }}" alt="{{ $indexTeam->name }}">

                    <!-- Laywer Info -->
                    <div class="laywer-info text-center">
                        <div class="laywer-name">{{ $indexTeam->name }}</div>
                        <div class="laywer-position">{{ $indexTeam->job }}</div>
                    </div>

                    <!-- Hover:: Laywer Info -->
                    <div class="hover-laywer-info text-center">
                        <div class="laywer-name">{{ $indexTeam->name }}</div>
                        <div class="laywer-position">{{ $indexTeam->job }}</div>
                        <!-- Social Nav -->
                        <div class="social-nav">
                            @if($indexTeam->facebook)
                                <a href="{{ $indexTeam->facebook }}">
                                    <i class="ti ti-brand-facebook"></i>
                                </a>
                            @endif
                            @if($indexTeam->twitter)
                                <a href="{{ $indexTeam->twitter }}">
                                    <i class="ti ti-brand-x"></i>
                                </a>
                            @endif
                            @if($indexTeam->instagram)
                                <a href="{{ $indexTeam->instagram }}">
                                    <i class="ti ti-brand-instagram"></i>
                                </a>
                            @endif
                            @if($indexTeam->youtube)
                                <a href="{{ $indexTeam->youtube }}">
                                    <i class="ti ti-brand-youtube"></i>
                                </a>
                            @endif
                            @if($indexTeam->tiktok)
                                <a href="{{ $indexTeam->tiktok }}">
                                    <i class="ti ti-brand-tiktok"></i>
                                </a>
                            @endif
                            @if($indexTeam->github)
                                <a href="{{ $indexTeam->github }}">
                                    <i class="ti ti-brand-github"></i>
                                </a>
                            @endif
                            @if($indexTeam->linkedin)
                                <a href="{{ $indexTeam->linkedin }}">
                                    <i class="ti ti-brand-linkedin"></i>
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <div class="divider"></div>
</section>
