@extends('theme16.pages.build')
@section('title',$project->name)
@section('meta_keywords',$project->meta_keywords)
@section('meta_description',$project->meta_description)
@section('content')

    <!-- Page Header -->
    <div class="page_header">
        <div class="page_header_content">
            <div class="container">
                <h2 class="heading">{{ $project->name }}</h2>
                <ul class="breadcrumb">
                    <li><a href="{{ route('site.index') }}">{{ __('Anasayfa') }}</a></li>
                    <li class="active">{{ $project->name }}</li>
                </ul>
            </div>
        </div>
    </div>

    <section class="case_details blog_inner">
        <div class="container">
            <div class="blog_details">
                <div class="row">
                    <div class="col-lg-8 col-md-12">
                        <div class="blog_details_inner">
                            <div class="post_content">
                                <div class="post_header">
                                    <img src="/storage/{{ $project->image }}" alt="{{ $project->name }}" />
                                    <h3 class="post_title">{{ $project->name }}</h3>
                                </div>
                                <div class="fulltext">
                                    <p>{!! $project->description !!}</p>

                                    <div class="post_gallery">
                                        <div class="row">
                                            @foreach($projectImages as $projectImage)
                                                <div class="col-lg-6 col-sm-6">
                                                    <div class="anim_box" data-aos="overlay-right">
                                                        <img src="/storage/{{ $projectImage->image_url }}" alt="{{ $projectImage->image_url }}" />
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                @php $previousProject = \App\Models\Project::where('id','<',$project->id)->first(); $nextProject = \App\Models\Project::where('id','>',$project->id)->first(); @endphp
                                <div class="inner_posts">
                                    @if($previousProject)
                                        <div class="inner-post prev_post">
                                            <i class="ion-ios-arrow-left"></i>
                                            <div class="post_block">
                                                <a class="link_to" href="{{ route(getResourceFullLink('projects','show'),$previousProject) }}">{{ __('Önceki') }}</a>
                                            </div>
                                        </div>
                                    @endif
                                    <div class="inner-post">
                                        ......
                                    </div>
                                    @if($nextProject)
                                        <div class="inner-post prev_post">
                                            <i class="ion-ios-arrow-right"></i>
                                            <div class="post_block">
                                                <a class="link_to" href="{{ route(getResourceFullLink('projects','show'),$nextProject) }}">{{ __('Sonraki') }}</a>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-12">
                        <div class="sidebar">
                            <div class="project_info">
                                <div class="project_info_bg">
                                    <div class="project_info_header">
                                        <h4 class="widget_title">{{ __('Proje Bilgileri') }}</h4>
                                    </div>
                                    <div class="project_info_details_bg">
                                        <div class="project_info_details">
                                            <h5>{{ __('Müvekkil Adı') }}</h5>
                                            <p>{{ $project->client }}</p>
                                        </div>
                                        <div class="project_info_details">
                                            <h5>{{ __('Şehir') }}</h5>
                                            <p>{{ $project->city }}</p>
                                        </div>
                                        <div class="project_info_details">
                                            <h5>{{ __('Başlangıç Tarihi') }}</h5>
                                            <p>{{ \Carbon\Carbon::parse($project->start_date)->translatedFormat('d F Y') }}</p>
                                        </div>
                                        <div class="project_info_details">
                                            <h5>{{ __('Bitiş Tarihi') }}</h5>
                                            <p>{{ \Carbon\Carbon::parse($project->end_date)->translatedFormat('d F Y') }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
