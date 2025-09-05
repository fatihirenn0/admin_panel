@extends('theme9.pages.build')
@section('title',$project->name)
@section('meta_keywords',$project->meta_keywords)
@section('meta_description',$project->meta_description) @section('content')
    <!-- ========== breadcrumb start============= -->

    <div class="breadcrumb-section">
        <div class="container">
            <div class="row d-flex justify-content-center align-items-center text-center">
                <div class="col-lg-6">
                    <h2 class="breadcrumb-title wow fadeInLeft" data-wow-duration="1.5s" data-wow-delay=".2s">{{ $project->name }}</h2>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb d-flex justify-content-center">
                            <li class="breadcrumb-item"><a href="{{ route('site.index') }}">{{ __('Ana Sayfa') }}</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{ $project->name }}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <!-- ========== breadcrumb start============= -->

    <!-- ========== case-study-section start============= -->

    <div class="casestudy-details pt-120 pb-120">
        <div class="container">
            <div class="row gy-5">
                <div class="col-lg-8">
                    <div class="case-details-single">
                        <img src="/storage/{{ $project->image }}" alt="{{ $project->name }}" class="img-fluid" />
                        <h2>{{ $project->name }}</h2>
                        <p class="para mb-30">{!! $project->description !!}</p>
                        <div class="row details-img-grp g-4">
                            @foreach($projectImages as $projectImage)
                                <div class="col-md-6">
                                    <img src="/storage/{{ $projectImage->image_url }}" alt="{{ $project->name }}" class="img-fluid" />
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="case-sidebar-area">
                        <div class="casestudy-card">
                            <div class="header">
                                <h4>{{ __('Kategoriler') }}</h4>
                            </div>
                            <ul class="casestudy-list">
                                @foreach(\App\Models\ProjectCategory::orderBy('rank')->get() as $projectCategory)
                                    <li>
                                        <span><a href="{{ route(getResourceFullLink('project_categories','show'),$projectCategory) }}">{{ $projectCategory->name }}</a></span>
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
        </div>
    </div>

    <!-- ========== case-study-section end============= -->
@endsection
