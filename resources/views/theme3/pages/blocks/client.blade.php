<!-- client Section -->
<section class="clients-section">
    <div class="auto-container">
        <div class="clients-carousel owl-carousel owl-theme">
            <!-- client block -->
            @foreach($references as $reference)
                <div class="client-block">
                    <div class="inner-box">
                        <div class="image-box">
                            <figure class="image">
                                <a href="/storage/{{ $reference->image }}"><img src="/storage/{{ $reference->image }}" alt="{{ $reference->name }}" /></a>
                            </figure>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
<!-- End client Section -->
