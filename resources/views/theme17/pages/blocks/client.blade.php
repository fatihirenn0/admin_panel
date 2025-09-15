<!-- Clients We Serve Start -->
<section class="main-clients">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="clients-title">
                    <h4 class="h4-title">{{ __('Referanslarımız') }}</h4>
                </div>
                <div class="clients-slider swiper">
                    <div class="swiper-wrapper">
                        @foreach($allReferences as $indexReference)
                            <div class="swiper-slide">
                            <div class="client-box">
                                <img src="/storage/{{ $indexReference->image }}" width="169" height="44" alt="{{ $indexReference->name }}">
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Clients We Serve End -->
