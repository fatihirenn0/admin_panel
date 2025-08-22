@extends('theme1.pages.build')
@section('title',__('Arama Sonuçları'))
@section('content')
    <section class="page-title" style="background-image: url(/theme1/images/background/page-title-bg.jpg);">
        <div class="auto-container">
            <div class="title-outer text-center position-relative">
                <h1 class="title">{{ __('Arama Sonuçları') }}</h1>
                <ul class="page-breadcrumb">
                    <li><a href="{{ route('site.index') }}">{{ __('Ana Sayfa') }}</a></li>
                    <li>{{ __('Arama Sonuçları') }}</li>
                </ul>
            </div>
        </div>
    </section>
    <!-- end main-content -->

    <!--checkout Start-->
    <section>
        <div class="container pt-30 pb-120">
            <div class="team-five__wrp">
                @if(count($pages) > 0 || count($services) > 0 || count($projects) > 0 || count($blogs))
                    <h3 class="mb-30">"{{ $_GET['q'] }}" {{__(' için bulunan sonuçlar.')}}</h3>
                @else
                    <h3 class="mb-30">"{{ $_GET['q'] }}" {{__(' için sonuç bulunamadı.')}}</h3>
                @endif

                <div class="section-content">
                    <div class="row mt-30">
                        @if(count($pages))
                            <div class="col-md-12 mt-30">
                                <h3 class="mb-3">{{ __('Kurumsal Sayfalar') }}</h3>
                                <table class="table table-striped table-bordered tbl-shopping-cart">
                                    <tbody>
                                    @foreach($pages as $page)
                                        <tr>
                                            <td class="product-name">
                                                <a href="{{ route(getResourceFullLink('pages','show'),$page) }}">
                                                    {{ $page->name }} <i class="fa fa-arrow-right"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @endif
                        @if(count($services))
                                <div class="col-md-12 mt-30">
                                    <h3 class="mb-3">{{ __('Hizmetler') }}</h3>
                                    <table class="table table-striped table-bordered tbl-shopping-cart">
                                        <tbody>
                                        @foreach($services as $service)
                                            <tr>
                                                <td class="product-name">
                                                    <a href="{{ route(getResourceFullLink('services','show'),$service) }}">
                                                        {{ $service->name }} <i class="fa fa-arrow-right"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                        @endif
                        @if(count($projects))
                            <div class="col-md-12 mt-30">
                                <h3 class="mb-3">{{ __('Projeler') }}</h3>
                                <table class="table table-striped table-bordered tbl-shopping-cart">
                                    <tbody>
                                    @foreach($projects as $project)
                                        <tr>
                                            <td class="product-name">
                                                <a href="{{ route(getResourceFullLink('projects','show'),$project) }}">
                                                    {{ $project->name }} <i class="fa fa-arrow-right"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @endif
                        @if(count($blogs))
                                <div class="col-md-12 mt-30">
                                    <h3 class="mb-3">{{ __('Bloglar') }}</h3>
                                    <table class="table table-striped table-bordered tbl-shopping-cart">
                                        <tbody>
                                        @foreach($blogs as $blog)
                                            <tr>
                                                <td class="product-name">
                                                    <a href="{{ route(getResourceFullLink('blogs','show'),$blog) }}">
                                                        {{ $blog->name }} <i class="fa fa-arrow-right"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
