@extends('theme12.pages.build')
@section('title', __('Sıkça Sorulan Sorular'))
@section('content')
    <div class="breadcumb-wrapper static-image" data-bg-src="/theme12/img/bg/breadcrumb-bg.jpg" data-overlay="title" data-opacity="8" alt="{{ __('Sıkça Sorulan Sorular Görseli') }}">
        <div class="container">
            <div class="breadcumb-content">
                <h1 class="breadcumb-title">{{ __('Sıkça Sorulan Sorular') }}</h1>
                <ul class="breadcumb-menu">
                    <li><a href="{{ route('site.index') }}">{{ __('Anasayfa') }}</a></li>
                    <li>{{ __('Sıkça Sorulan Sorular') }}</li>
                </ul>
            </div>
        </div>
    </div>

    <section class="th-blog-wrapper blog-details space">
        <div class="container">
            <div class="row g-4">
                <div class="col-xxl-4 col-lg-5">
                    <aside class="sidebar-area">
                        <div class="widget widget_categories">
                            <h3 class="widget_title">{{ __('Kategoriler') }}</h3>
                            <ul>
                                @foreach($faqCategories as $faqCategory)
                                    <li>
                                    <a href="#">{{ $faqCategory->name }}</a> <span><i class="fa-sharp fa-light fa-arrow-right"></i></span>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </aside>
                </div>

                <div class="col-xxl-8 col-lg-7">
                    @if(count($faqCategories) > 0) @foreach($faqCategories as $faqCategory)
                        <div class="th-faq-wrapper mb-40">
                            <div class="title-area">
                                <span class="sub-title before-none">{{ $faqCategory->name }}</span>
                            </div>

                            {{-- Kategoriye özel parent id --}}
                            <div class="accordion" id="faqAccordion-{{ $faqCategory->id }}">
                                @foreach($faqCategory->faqs as $faq)
                                    <div class="accordion-card">
                                        <div class="accordion-header" id="collapse-item-{{ $faqCategory->id }}-{{ $faq->id }}">
                                            <button
                                                class="accordion-button"
                                                type="button"
                                                data-bs-toggle="collapse"
                                                data-bs-target="#collapse-{{ $faqCategory->id }}-{{ $faq->id }}"
                                                aria-expanded="{{ $loop->first ? 'true' : 'false' }}"
                                                aria-controls="collapse-{{ $faqCategory->id }}-{{ $faq->id }}"
                                            >
                                                {{ $faq->question }}
                                            </button>
                                        </div>
                                        <div
                                            id="collapse-{{ $faqCategory->id }}-{{ $faq->id }}"
                                            class="accordion-collapse collapse {{ $loop->first ? 'show' : '' }}"
                                            aria-labelledby="collapse-item-{{ $faqCategory->id }}-{{ $faq->id }}"
                                            data-bs-parent="#faqAccordion-{{ $faqCategory->id }}"
                                        >
                                            <div class="accordion-body">
                                                <p class="faq-text">{{ $faq->answer }}</p>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endforeach @else
                        <div class="th-faq-wrapper">
                            <div class="accordion" id="faqAccordion">
                                @foreach($faqs as $faq)
                                    <div class="accordion-card">
                                        <div class="accordion-header" id="collapse-item-{{ $faq->id }}">
                                            <button
                                                class="accordion-button"
                                                type="button"
                                                data-bs-toggle="collapse"
                                                data-bs-target="#collapse-{{ $faq->id }}"
                                                aria-expanded="{{ $loop->first ? 'true' : 'false' }}"
                                                aria-controls="collapse-{{ $faq->id }}"
                                            >
                                                {{ $faq->question }}
                                            </button>
                                        </div>
                                        <div id="collapse-{{ $faq->id }}" class="accordion-collapse collapse {{ $loop->first ? 'show' : '' }}" aria-labelledby="collapse-item-{{ $faq->id }}" data-bs-parent="#faqAccordion">
                                            <div class="accordion-body">
                                                <p class="faq-text">{{ $faq->answer }}</p>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
@endsection
