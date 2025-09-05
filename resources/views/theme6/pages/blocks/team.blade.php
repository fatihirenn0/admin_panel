<!-- Attorneys Area -->
<section class="attorneys-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-titleV1 wow fadeIn" data-wow-delay=".25s">
                    <h3>{{ __('Ekibimiz') }}</h3>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="attorney-wrapper wow fadeIn" data-wow-delay=".25s">
                    <div class="attorney-carousel owl-carousel owl-theme">
                        @foreach($allTeams as $indexTeam)
                            <div class="item">
                                <div class="single-attorney">
                                    <div class="sa-img">
                                        <img src="/storage/{{ $indexTeam->image }}" alt="{{ $indexTeam->name }}" />
                                    </div>
                                    <div class="sa-info">
                                        <h4><a href="{{ route(getResourceFullLink('teams','show'), $indexTeam) }}">{{ $indexTeam->name }}</a></h4>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- /Attorneys Area -->
