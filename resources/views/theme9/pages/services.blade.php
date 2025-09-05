@extends('theme9.pages.build')
@if(isset($serviceCategory))
    @section('title',$serviceCategory->name)
    @section('meta_keywords',$serviceCategory->meta_keywords)
    @section('meta_description',$serviceCategory->meta_description)
@else
    @section('title',__('Hizmetler'))
@endif
@section('content')
    <!-- ========== breadcrumb start============= -->

    <div class="breadcrumb-section">
        <div class="container">
            <div class="row d-flex justify-content-center align-items-center text-center">
                <div class="col-lg-6">
                    <h2 class="breadcrumb-title wow fadeInLeft" data-wow-duration="1.5s" data-wow-delay=".2s">{{ __('Hizmetler') }}</h2>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb d-flex justify-content-center">
                            <li class="breadcrumb-item"><a href="{{ route('site.index') }}">{{ __('Ana Sayfa') }}</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{ __('Hizmetler') }}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <!-- ========== breadcrumb start============= -->

    <!-- =============== Practice-area-section start  =============== -->

    <div class="practice-area-section pt-120 pb-120">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-7">
                    <div class="section-title1 text-center">
                        <h2>{{ __('Hizmetler') }}</h2>
                        <p>{{ __('İhtiyacınıza Özel Profesyonel Hukuk Hizmetleri') }}</p>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center g-4">
                @foreach($services as $service)
                    <div class="col-lg-4 col-md-6 col-sm-10">
                        <div class="practice-single wow fadeInDown" data-wow-duration="1.5s" data-wow-delay="0.2s">
                            <div class="header">
                                <div class="icon-area">
                                    <img src="/storage/{{ $service->image }}" alt="{{ $service->name }}" />
                                </div>
                                <h4><a href="{{ route(getResourceFullLink('services','show'),$service) }}">{{ $service->name }}</a></h4>
                            </div>
                            <div class="body">
                                <p>{!! $service->short_description !!}</p>
                                <a href="{{ route(getResourceFullLink('services','show'),$service) }}" class="details-btn">{{ __('İncele') }}</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- =============== Practice-area-section end =============== -->
@endsection
