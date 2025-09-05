@extends('theme8.pages.build')
@section('title',$project->name)
@section('meta_keywords',$project->meta_keywords)
@section('meta_description',$project->meta_description)
@section('content')
    <!-- Case Page -->
    <div class="mcgill-cases">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8 animate-box" data-animate-effect="fadeInLeft">
                    <div class="mb-30">
                        <img src="/storage/{{ $project->image }}" class="img-fluid mb-30" alt="{{ $project->name }}" />
                        <h3>{{ $project->name }}</h3>
                        <p>{!! $project->description !!}</p>
                    </div>
                    <!-- Gallery -->
                    <div class="row mb-30">
                        @foreach($projectImages as $projectImage)
                            <div class="col-md-4 gallery-item">
                                <a href="/storage/{{ $projectImage->image_url }}" class="img-zoom">
                                    <div class="gallery-box">
                                        <div class="gallery-img"><img src="/storage/{{ $projectImage->image_url }}" class="img-fluid mx-auto d-block rounded" alt="{{ $project->name  }}" /></div>
                                        <div class="gallery-detail text-center"></div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
                <!-- Sidebar -->
                <div class="col-md-4 animate-box" data-animate-effect="fadeInLeft">
                    <div class="mcgill-sidebar-part">
                        <div class="mcgill-sidebar-block mcgill-sidebar-block-categories">
                            <div class="mcgill-sidebar-block-title">{{ __('Kategoriler') }}</div>
                            <div class="mcgill-sidebar-block-content">
                                <ul class="ul1">
                                    @foreach(\App\Models\ProjectCategory::orderBy('rank')->get() as $projectCategory)
                                        <li>
                                            <a href="{{ route(getResourceFullLink('project_categories','show'),$projectCategory) }}"><span class="fi flaticon-mace"></span>{{ $projectCategory->name }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
