@extends('theme9.pages.build')
@section('title',$service->name)
@section('meta_keywords',$service->meta_keywords)
@section('meta_description',$service->meta_description)
@section('content')
    <!-- ========== breadcrumb start============= -->

    <div class="breadcrumb-section">
        <div class="container">
            <div class="row d-flex justify-content-center align-items-center text-center">
                <div class="col-lg-6">
                    <h2 class="breadcrumb-title wow fadeInLeft" data-wow-duration="1.5s" data-wow-delay=".2s">{{ $service->name }}</h2>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb d-flex justify-content-center">
                            <li class="breadcrumb-item"><a href="{{ route('site.index') }}">{{ __('Ana Sayfa') }}</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{ $service->name }}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <!-- ========== breadcrumb start============= -->

    <!-- ========== service-details-section start============= -->

    <div class="service-details pt-120 pb-80">
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-8 wow fadeInLeft" data-wow-duration="1.5s" data-wow-delay="0.2s">
                    <div class="service-details-text">
                        <div class="col-md-12 wow fadeInRight" data-wow-duration="1.5s" data-wow-delay="0.2s">
                            <img src="/storage/{{ $service->image }}" alt="{{ $service->name }}" class="img-fluid mb-0" />
                        </div>
                        <h2>{{ $service->name }}</h2>
                        <p class="para">{!! $service->long_description !!}</p>
                    </div>
                </div>
                <div class="col-lg-4 wow fadeInRight" data-wow-duration="1.5s" data-wow-delay="0.2s">
                    <ul class="service-list">
                        @foreach(\App\Models\ServiceCategory::orderBy('rank')->get() as $serviceCategory)
                            <li>
                                <a href="{{ route(getResourceFullLink('service_categories','show'),$serviceCategory) }}">{{ $serviceCategory->name }}</a>
                                <span>
                            <svg width="18" height="15" viewBox="0 0 22 13" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M21.9805 6.64708C21.955 6.74302 20.6834 7.78829 18.0766 9.85862C13.9311 13.156 14.0201 13.0954 13.5751 12.949C13.1809 12.8177 13.0219 12.5097 13.1809 12.1814C13.2127 12.1057 14.6369 10.9342 16.3408 9.5809L19.4309 7.11669V5.90479L16.3091 3.41534C14.23 1.75907 13.1682 0.885493 13.1427 0.789551C13.041 0.466377 13.2635 0.143203 13.6577 0.0472607C13.7595 0.0270623 13.8485 0.00181433 13.8612 0.00181433C14.0201 -0.0385824 14.8467 0.582518 18.1148 3.18306C20.6898 5.23824 21.955 6.27846 21.9805 6.36935C22.0059 6.45015 22.0059 6.57134 21.9805 6.64708Z"
                                    fill="white"
                                ></path>
                                <path
                                    d="M17.4313 5.90479V7.11669L2.71236 7.10659C2.27365 7.10608 1.84766 7.10558 1.43438 7.10507C1.19278 7.10507 0.954985 7.10457 0.721643 7.10457C0.320448 7.09396 0 6.83189 0 6.51074C0 6.34662 0.0839268 6.19817 0.218718 6.09061C0.349695 5.98659 0.528993 5.92044 0.728001 5.9169L1.23283 5.9164L2.706 5.91488L17.4313 5.90479Z"
                                    fill="white"
                                ></path>
                            </svg>
                        </span>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- ========== service-details-section end============= -->
@endsection
