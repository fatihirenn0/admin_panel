<!-- Start  Divider -->
<section class="bg-theme-colored1">
    <div class="container pt-60 pb-60">
        <div class="section-content">
            <div class="row">
                <div class="col-sm-12">
                    <div class="tm-sc tm-sc-clients tm-sc-clients-carousel owl-dots-light-skin owl-dots-center clients-animation-zoom">
                        <div class="owl-carousel owl-theme tm-owl-carousel-6col" data-autoplay="true" data-loop="true" data-duration="6000" data-smartspeed="300" data-margin="30" data-stagepadding="0" data-laptop="2">
                            @foreach($allReferences as $indexReference)
                                <div class="item"> <a target="_blank" href="#"> <img src='/storage/{{ $indexReference->image }}' alt='{{ $indexReference->name }}' /> </a></div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Divider -->
