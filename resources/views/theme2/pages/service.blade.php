@extends('theme2.pages.build')
@section('title',$service->name)
@section('meta_keywords',$service->meta_keywords)
@section('meta_description',$service->meta_description)
@section('content')
    <!-- Breadcrumb Section Start -->
    <div class="breadcrumb-wrapper bg-cover static-bg-image" style="background-image: url('/theme2/img/breadcrumb-shape.png');" alt="{{__('Hizmet Detay Sayfası Arka Plan Görseli')}}">
        <div class="breadcrumb-shape">
            <img class="static-image" src="/theme2/img/breadcrumb-graph-shape.png" alt="{{__('Hizmet Sayfası Görseli')}}">
        </div>
        <div class="container">
            <div class="page-heading">
                <div class="breadcrumb-sub-title">
                    <div class="icon wow fadeInUp" data-wow-delay=".3s">
                        <img class="static-image" src="/theme2/img/icon/bread-icon.png" alt="{{__('Hizmet Sayfası 1.İkon')}}">
                    </div>
                    <h1 class="wow fadeInUp" data-wow-delay=".5s">{{ $service->name }}</h1>
                    <ul class="breadcrumb-items wow fadeInUp" data-wow-delay=".7s">
                        <li>
                            <a href="{{ route('site.index') }}">
                                {{ __('Ana Sayfa') }}
                            </a>
                        </li>
                        <li>
                            <img class="static-image" src="/theme2/img/icon/arrow-bread-icon.svg" alt="{{__('Hizmet Sayfası 2.İkon')}}">
                        </li>
                        <li>
                            {{ $service->name }}
                        </li>
                    </ul>
                </div>
                <div class="icon-box">
                    <div class="icon-circle">
                        <img class="static-image" src="/theme2/img/icon/icon-28.svg" alt="{{__('Hizmet Sayfası 3.İkon')}}">
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="breadcrumb-image wow img-custom-anim-left">
                <img src="/storage/{{ $service->image }}" alt="{{ $service->image }}">
            </div>
        </div>
    </div>

    <!-- Service Details Section Start -->
    <section class="service-details-section fix section-padding">
        <div class="container">
            <div class="service-details-wrapper">
                <div class="details-content">
                    <h2>{{ $service->name }}</h2>
                    <p class="mt-4">
                        {!! $service->long_description !!}
                    </p>
                    <div class="row g-4 mt-4 mb-4">
                        @foreach($serviceImages as $serviceImage)
                        <div class="col-lg-6">
                            <div class="details-thumb-3">
                                <img src="/storage/{{ $serviceImage->image_url }}" alt="{{ $serviceImage->name }}">
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                @php
                    $previousService = \App\Models\Service::where('id','<',$service->id)->first();
                    $nextService = \App\Models\Service::where('id','>',$service->id)->first();
                @endphp
                <div class="details-prev-button">
                    @if($previousService)
                        <a href="{{ route(getResourceFullLink('services','show'),$previousService) }}" class="circle-box">
                                <span>
                                   {{ __('Önceki') }}
                                </span>
                        </a>
                    @endif
                    @if($nextService)
                        <a href="{{ route(getResourceFullLink('services','show'),$nextService) }}" class="circle-box style-2">
                                <span>
                                   {{ __('Sonraki') }}
                                </span>
                        </a>
                    @endif
                </div>
            </div>
        </div>
    </section>

@endsection
