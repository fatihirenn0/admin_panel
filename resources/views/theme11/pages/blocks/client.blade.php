<!-- Clients Section -->
<section class="clients-section">
    <div class="auto-container">
        <!-- Sec Title -->
        <div class="sec-title centered">
            <h2>{{ __('Referanslarımız') }}</h2>
         </div>
        <div class="inner-container">
            <div class="sponsors-outer">
                <!--Sponsors Carousel-->
                <ul class="sponsors-carousel owl-carousel owl-theme">
                    @foreach($allReferences as $indexReference)
                    <li class="slide-item"><figure class="image-box"><a href="#"><img src="/storage/{{ $indexReference->image }}" alt=""></a></figure></li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</section>
<!-- End Clients Section -->
