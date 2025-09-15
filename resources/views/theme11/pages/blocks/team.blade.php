<!-- Team Section -->
<section class="team-section">
    <div class="auto-container">
        <!-- Sec Title -->
        <div class="sec-title centered">
            <h2>  {{ __('Alanında Uzman Takım Arkadaşlarımız') }}</h2>
        </div>
        <div class="row clearfix">
            @foreach($allTeams as $indexTeam)
                <!-- Team Block -->
                <div class="team-block col-lg-3 col-md-6 col-sm-12">
                <div class="inner-box wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
                    <div class="image">
                        <img src="/storage/{{ $indexTeam->image }}" alt="{{ $indexTeam->name }}">
                    </div>
                    <div class="lower-box">
                        <h5><a href="{{ route(getResourceFullLink('teams','show'), $indexTeam) }}">{{ $indexTeam->name }}</a></h5>
                        <div class="designation">{{ $indexTeam->job }}</div>
                        <a class="arrow flaticon-right-arrow-3" href="{{ route(getResourceFullLink('teams','show'), $indexTeam) }}"></a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
<!-- End Team Section -->
