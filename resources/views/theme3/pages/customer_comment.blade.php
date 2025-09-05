@extends('theme3.pages.build')
@section('title',__('Müşteri Yorumları'))
@section('content')
    <!-- Start main-content -->
    <section class="page-title static-image" style="background-image: url(/theme3/images/background/page-title-bg.jpg);" alt="{{__('Müşteri Yorumlar Sayfası Arka Plan Görseli')}}">
        <div class="auto-container">
            <div class="title-outer text-center">
                <h1 class="title">{{ __('Müşteri Yorumları') }}</h1>
                <ul class="page-breadcrumb">
                    <li><a href="{{ route('site.index') }}">{{ __('Anasayfa') }}</a></li>
                    <li>{{ __('Müşteri Yorumları') }}</li>
                </ul>
            </div>
        </div>
    </section>
    <!-- end main-content -->

    <!-- Testimonial Section -->
    <section class="testimonial-section-home2 pt-120 pb-110">
        <div class="auto-container">
            <div class="row">
                @foreach($customerComments as $customerComment)
                    <!-- Testimonial Column -->
                    <div class="col-lg-4 col-md-6">
                        <div class="testimonial-block">
                            <div class="inner-box">
                                <div class="text">{{ $customerComment->comment }}</div>
                                <div class="info-box">
                                    <figure class="thumb"><img src="/storage/{{ $customerComment->image }}" alt="{{ $customerComment->name }}" /></figure>
                                    <div class="info-box-content">
                                        <h6 class="name">{{ $customerComment->name }}</h6>
                                        <span class="designation">{{ $customerComment->job }}</span>
                                    </div>
                                </div>
                                <div class="icon-quote"></div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- End Testimonial Section -->
@endsection
