@extends('theme16.pages.build')
@section('title',$page->name)
@section('meta_keywords',$page->meta_keywords)
@section('meta_description',$page->meta_description)
@section('content')

    <!-- Page Header -->
    <div class="page_header">
        <div class="page_header_content">
            <div class="container">
                <h2 class="heading">{{ $page->name }}</h2>
                <ul class="breadcrumb">
                    <li><a href="{{ route('site.index') }}">{{ __('Ana Sayfa') }}</a></li>
                    <li class="active">{{ $page->name }}</li>
                </ul>
            </div>
        </div>
    </div>

    <section class="about_inner">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="about_inner_heading">
                        <h3>{{ __('Adaletin sesi olan bir ekip, yalnızca davaları değil, güveni de kazanır.”') }}</h3>
                        <h6>{{ $page->name }}</h6>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="about_inner_content">
                        <div class="about_image">
                            <img class="static-image" src="/theme16/images/inner/about_1.png" alt="{{ __('Kurumsal Sayfa Görsel') }}" />
                            <div class="about_content">
                                <h4>{{ __('Misyonumuz') }}</h4>
                                <i class="ion-ios-book-outline"></i>
                            </div>
                            <div class="hover_about_content">
                                <div class="about_content_info">
                                    <h4>{{ __('Misyonumuz') }}</h4>
                                    <p>{{ __('Alanında uzman hukukçularımız ve danışmanlarımızla, her bir müvekkilin hakkını koruma sorumluluğunu taşıyoruz.') }}</p>
                                    <div class="about_list">
                                        <ul>
                                            <li>
                                                <i class="ion-android-done" aria-hidden="true"></i>
                                                <p>{{ __('Müvekkillerimize güçlü ve stratejik hukuki rehberlik sunuyoruz.') }}</p>
                                            </li>
                                            <li>
                                                <i class="ion-android-done" aria-hidden="true"></i>
                                                <p>{{ __('Sigorta, tazminat ve ceza hukuku başta olmak üzere birçok alanda aktif hizmet veriyoruz.') }}</p>
                                            </li>
                                            <li>
                                                <i class="ion-android-done" aria-hidden="true"></i>
                                                <p>{{ __('Her dava için titizlikle çalışıyor, adalete ulaşma sürecini güvenle yönetiyoruz.') }}</p>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="about_inner_content">
                        <div class="about_image">
                            <img src="/storage/{{ $page->image }}" alt="{{ $page->name }}" />
                            <div class="about_content">
                                <h4>{{ $page->name }}</h4>
                                <i class="ion-ios-book-outline"></i>
                            </div>
                            <div class="hover_about_content">
                                <div class="about_content_info">
                                    <h4>{{ $page->name }}</h4>
                                    <p>{!! $page->description !!}</p>
                                    <div class="about_list">
                                        <ul>
                                            <li>
                                                <i class="ion-android-done" aria-hidden="true"></i>
                                                <p>{{ __('Hukuki süreçlerde şeffaf, hızlı ve etkili çözümler geliştiriyoruz.') }}</p>
                                            </li>
                                            <li>
                                                <i class="ion-android-done" aria-hidden="true"></i>
                                                <p>{{ __('Her adımda müvekkil memnuniyetini merkeze alıyoruz.') }}</p>
                                            </li>
                                            <li>
                                                <i class="ion-android-done" aria-hidden="true"></i>
                                                <p>{{ __('Teknolojik gelişmeleri yakından takip ederek akıllı hukuk çözümleri sunuyoruz.') }}</p>
                                            </li>
                                        </ul>
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
