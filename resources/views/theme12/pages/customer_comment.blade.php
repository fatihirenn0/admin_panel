@extends('theme12.pages.build')
@section('title',__('Müşteri Yorumları'))
@section('content')
    <div class="breadcumb-wrapper" data-bg-src="/theme12/img/bg/breadcrumb-bg.jpg" data-overlay="title" data-opacity="8">
        <div class="container">
            <div class="breadcumb-content">
                <h1 class="breadcumb-title">{{ __('Müşteri Yorumları') }}</h1>
                <ul class="breadcumb-menu">
                    <li><a href="{{ route('site.index') }}">{{ __('Anasayfa') }}</a></li>
                    <li>{{ __('Müşteri Yorumları') }}</li>
                </ul>
            </div>
        </div>
    </div>
    <section class="testi-card-area-1 overflow-hidden space-top" id="testi-sec">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="title-area text-center">
                        <span class="sub-title before-none">{{ __('Müşteri Yorumları') }}</span>
                        <h2 class="sec-title">{{ __('Müvekkillerimiz Ne Diyor?') }}</h2>
                    </div>
                </div>
            </div>
            <div class="row gy-4 justify-content-center">
                @foreach($customerComments as $customerComment)
                    <div class="col-lg-6">
                        <div class="testi-block inner bg-smoke2">
                            <div class="testi-icon-1-top static-image"><img src="/theme12/img/icon/testi-icon-1-top.svg" alt="{{ __('Müşteri Yorumlar İkon') }}" /></div>
                            <div class="testi-block-top">
                                <div class="box-img"><img src="/storage/{{ $customerComment->image }}" alt="{{ $customerComment->name }}" /></div>
                                <div class="content">
                                    <h3 class="box-title">{{ $customerComment->name }}</h3>
                                    <p class="box-desig">{{ $customerComment->job }}</p>
                                    <div class="box-review">
                                        <i class="fa-sharp fa-solid fa-star"></i><i class="fa-sharp fa-solid fa-star"></i><i class="fa-sharp fa-solid fa-star"></i><i class="fa-sharp fa-solid fa-star"></i>
                                        <i class="fa-sharp fa-solid fa-star"></i>
                                    </div>
                                </div>
                            </div>
                            <p class="box-text">
                                {{ $customerComment->comment }}
                            </p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
