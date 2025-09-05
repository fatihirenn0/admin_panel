<!-- Testiominals -->
<div class="mcgill-testimonial testimonials bg-img bg-fixed static-bg-image" style="background-image: url('/theme8/images/banner.jpg');" alt="{{ __('Anasayfa Müşteri Yorumları Arka Plan Görseli') }}">
    <div class="container-fluid">
        <div class="row">
            <div class="section-head col-md-4">
                <h4>{{ __('Müşteri Yorumları') }}</h4>
                <p>{{ __('Birlikte Yazdığımız Başarı Hikâyeleri') }}</p>
            </div>
            <div class="owl-carousel owl-theme col-md-8">
                @foreach($allComments as $indexComment)
                    <div class="item-box">
                        <span class="quote"> <img class="static-image" src="theme8/images/quot.png" alt="{{ __('Anasayfa Müşteri Yorumları Yorum Görseli') }}" /> </span>
                        <p>{{$indexComment->comment}}</p>
                        <div class="info">
                            <div class="author-img"><img src="/storage/{{ $indexComment->image }}" alt="{{ $indexComment->name }}" /></div>
                            <div class="cont">
                                <h6>{{ $indexComment->name }}</h6>
                                <span>{{ $indexComment->job }} </span>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
