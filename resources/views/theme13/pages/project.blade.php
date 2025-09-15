@extends('theme13.pages.build')
@section('title',$project->name)
@section('meta_keywords',$project->meta_keywords)
@section('meta_description',$project->meta_description)
@section('content')
    <!-- Banner section -->
    <section class="service-banner position-relative space-header">
        <div class="line d-none d-xl-block"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-xxl-7 col-3xl-6 z-2 banner-content">
                    <h2 class="display-4 text-white mb-3">{{ $project->name }}</h2>
                    <ul class="list-unstyled d-flex align-items-center gap-2">
                        <li><a href="{{ route('site.index') }}" class="text-white">{{ __('Ana Sayfa') }}</a></li>
                        <li><i class="ti ti-chevron-right text-white"></i></li>
                        <li><a href="#">{{ $project->name }}</a></li>
                    </ul>
                </div>
                <div class="col-lg-4 col-xxl-5 col-3xl-6 d-none d-lg-block position-relative">
                    <div class="about-line-2"></div>
                    <div class="about-line-3"></div>
                </div>
            </div>
        </div>
    </section>

    <!-- service details -->
    <section class="project-details z-3 position-relative">
        <div class="container">
            <div class="row g-4 position-relative">
                <div class="col-lg-8 z-3">
                    <div class="details-left">
                        <img src="/storage/{{ $project->image }}" alt="{{ $project->name }}" class="img-fluid w-100" />
                        <div class="details-content">
                            <h2 class="my-3">{{ $project->name }}</h2>
                            <p>{!! $project->description !!}</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 details-right z-3">
                    <div class="details-search">
                        <h4>{{ __('Proje Bilgileri') }}</h4>
                        <table class="w-100">
                            <tr>
                                <td class="text-primary">{{ __('Müşteri') }}</td>
                                <td class="text-primary">:</td>
                                <td class="text-white">{{ $project->client }}</td>
                            </tr>
                            <tr>
                                <td class="text-primary">{{ __('Şehir') }}</td>
                                <td class="text-primary">:</td>
                                <td class="text-white">{{ $project->city }}</td>
                            </tr>
                            <tr>
                                <td class="text-primary">{{ __('Tarih') }}</td>
                                <td class="text-primary">:</td>
                                <td class="text-white">{{ \Carbon\Carbon::parse($project->created_at)->translatedFormat('d F Y') }}</td>
                            </tr>
                        </table>
                    </div>
                    <div class="details-search">
                        <h4>{{ __('Son Projeler') }}</h4>
                        <ul class="more-projects">
                            @foreach(\App\Models\Project::where('id' , '!=' , $project->id)->inRandomOrder()->take(6)->get() as $otherProject)
                                <li class="pt-0">
                                    <a href="{{ route(getResourceFullLink('projects','show'),$otherProject) }}">
                                        <img width="100" height="100" src="/storage/{{ $otherProject->image }}" alt="{{ $otherProject->name }}" />
                                        <div>
                                            <span class="fw-medium text-white mb-1 d-block">{{ $otherProject->name }} </span>
                                            <span class="text-primary">{{ \Carbon\Carbon::parse($otherProject->created_at)->translatedFormat('d F Y') }}</span>
                                        </div>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
