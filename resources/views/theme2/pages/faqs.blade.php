@extends('theme2.pages.build')
@section('title',__('Sıkça Sorulan Sorular'))

@section('content')
    <!-- Breadcrumb Section Start -->
    <div class="breadcrumb-wrapper bg-cover static-bg-image" style="background-image: url('/theme2/img/breadcrumb-shape.png');" alt="{{__('Sıkça Sorulan Sorular Sayfası Arka Plan Görseli')}}">
        <div class="breadcrumb-shape">
            <img class="static-image" src="/theme2/img/breadcrumb-graph-shape.png" alt="{{__('Sıkça Sorulan Sorular Sayfası Görseli')}}">
        </div>
        <div class="container">
            <div class="page-heading">
                <div class="breadcrumb-sub-title">
                    <div class="icon wow fadeInUp" data-wow-delay=".3s">
                        <img class="static-image" src="/theme2/img/icon/bread-icon.png" alt="{{__('Sıkça Sorulan Sorular Sayfası 1.İkon')}}">
                    </div>
                    <h1 class="wow fadeInUp" data-wow-delay=".5s">{{ __('Sıkça Sorulan Sorular') }}</h1>
                    <ul class="breadcrumb-items wow fadeInUp" data-wow-delay=".7s">
                        <li><a href="{{ route('site.index') }}">{{ __('Anasayfa') }}</a></li>
                        <li><img class="static-image" src="/theme2/img/icon/arrow-bread-icon.svg" alt="{{__('Sıkça Sorulan Sorular Sayfası 2. İkon')}}"></li>
                        <li>{{ __('Sıkça Sorulan Sorular') }}</li>
                    </ul>
                </div>
                <div class="icon-box">
                    <div class="icon-circle">
                        <img class="static-image" src="/theme2/img/icon/icon-28.svg" alt="{{__('Sıkça Sorulan Sorular Sayfası 3. İkon')}}">
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="breadcrumb-image wow img-custom-anim-left">
                <img class="static-image" src="/theme2/img/breadcrumb/faq-breadcrumb.jpg" alt="{{__('Sıkça Sorulan Sorular Sayfası 2. Görseli')}}">
            </div>
        </div>
    </div>

    <!-- Faq Section Start -->
    <section class="faq-section-11 fix section-padding">
        <div class="container">
            <div class="details-faq mt-0">
                @if(count($faqCategories) > 0)
                    @foreach($faqCategories as $faqCategory)
                <h2 class="mb-4 text-white">{{ $faqCategory->name }}</h2>
                        <div class="accordion" id="accordionExample">
                            @foreach($faqCategory->faqs as $faq)
                            <div class="accordion-item {{ $loop->first ? 'active-block' : '' }}">
                                <h2 class="accordion-header" id="heading{{ $faq->id }}">
                                    <button class="accordion-button {{ $loop->first ? '' : 'collapsed' }}" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#collapse{{ $faq->id }}" aria-expanded="{{ $loop->first ? 'true' : 'false' }}" aria-controls="collapse{{ $faq->id }}">
                                        {{ $faq->question }}
                                    </button>
                                </h2>
                                <div id="collapse{{ $faq->id }}" class="accordion-collapse collapse {{ $loop->first ? 'show' : '' }}"
                                     aria-labelledby="heading{{ $faq->id }}" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <p>
                                            {!! $faq->answer !!}
                                        </p>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    @endforeach
                @else
                <div class="accordion" id="accordionExample">
                    @foreach($faqs as $faq)
                    <div class="accordion-item {{ $loop->first ? 'active-block' : '' }}">
                        <h2 class="accordion-header" id="heading{{ $faq->id }}">
                            <button class="accordion-button {{ $loop->first ? '' : 'collapsed' }}" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapse{{ $faq->id }}" aria-expanded="{{ $loop->first ? 'true' : 'false' }}" aria-controls="collapseOne">
                                {{ $faq->question }}
                            </button>
                        </h2>
                        <div id="collapse{{ $faq->id }}" class="accordion-collapse collapse {{ $loop->first ? 'show' : '' }}"
                             aria-labelledby="heading{{ $faq->id }}" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <p>
                                    {{ $faq->answer }}
                                </p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                @endif
            </div>
        </div>
    </section>

@endsection
