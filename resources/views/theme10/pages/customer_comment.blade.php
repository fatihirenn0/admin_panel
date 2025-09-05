@extends('theme10.pages.build')
@section('title',__('Müşteri Yorumları'))
@section('content')
    <!--Page Title-->
    <section class="page-title static-image" style="background-image: url(/theme10/images/background/4.jpg);" alt="{{ __('Müşteri Yorum Sayfası Görseli') }}">
        <div class="container">
            <div class="content">
                <h1>{{ __('Müşteri Yorumları') }}</h1>
                <ul class="page-breadcrumb">
                    <li><a href="{{ route('site.index') }}">{{ __('Anasayfa') }}</a></li>
                    <li>{{ __('Müşteri Yorumları') }}</li>
                </ul>
            </div>
        </div>
    </section>
    <!--End Page Title-->

    <!-- Testimonial Page Section -->
    <section class="testimonial-page-section">
        <div class="container">
            <!-- Sec Title -->
            <div class="section-title centered">
                <div class="title">{{ __('Müşteri Yorumları') }}</div>
                <h3>{{ __('Müvekkillerimiz Ne Diyor?') }}</h3>
            </div>

            <div class="row clearfix">
                @foreach($customerComments as $customerComment)
                    <!-- Testimonial Block Three -->
                    <div class="testimonial-block-three col-lg-6 col-md-6 col-sm-12">
                        <div class="inner-box">
                            <div class="quote-icon flaticon-two-quotes"></div>
                            <div class="image-outer">
                                <div class="image">
                                    <img src="/storage/{{ $customerComment->image }}" alt="{{ $customerComment->name }}" />
                                </div>
                            </div>
                            <div class="text">{{ $customerComment->comment }}</div>
                            <h5>{{ $customerComment->name }}</h5>
                            <div class="designation">{{ $customerComment->job }}</div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- End Testimonial Page Section -->
@endsection
