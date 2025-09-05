@extends('theme8.pages.build')
@if(isset($serviceCategory))
    @section('title', $serviceCategory->name)
    @section('meta_keywords', $serviceCategory->meta_keywords)
    @section('meta_description', $serviceCategory->meta_description)
@else
    @section('title', __('Hizmetler'))
@endif
@section('content')
    <!-- Services -->
    <div class="mcgill-services back-gray">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 mb-40 animate-box" data-animate-effect="fadeInLeft">
                    <span class="heading-meta">{{ __('Hizmetler') }}</span>
                    <h2 class="mcgill-heading">{{ __('İhtiyacınıza Özel Profesyonel Hukuk Hizmetleri') }}</h2>
                </div>
            </div>
            <div class="row">
                @foreach($services as $service)
                    <div class="col-md-4 animate-box" data-animate-effect="fadeInLeft">
                        <div class="mcgill-services-container">
                            <div class="mcgill-services-img-area"><img src="/storage/{{ $service->image }}" alt="{{ $service->name }}" /></div>
                            <div class="mcgill-services-text-area">
                                <h4 class="mcgill-services-heading">{{ $service->name }}</h4>
                                <p>{!! $service->short_description !!}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
