@extends('theme14.pages.build')
@section('title', __('Sıkça Sorulan Sorular'))
@section('content')
    <!-- Breadcrumb area start here -->
    <section class="breadcrumb-area static-image" data-background="/theme14/images/banner/banner-inner.jpg" alt="{{ __('Sıkça Sorulan Sorular Sayfası Görseli') }}">
        <div class="container">
            <div class="breadcrumb__wrp">
                <div class="breadcrumb__item">
                    <h1 class="title">{{ __('Sıkça Sorulan Sorular') }}</h1>
                    <ul>
                        <li><a href="{{ route('site.index') }}">{{ __('Anasayfa') }}</a></li>
                        <li><i class="fa-light fa-angle-right"></i></li>
                        <li>{{ __('Sıkça Sorulan Sorular') }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb area end here -->

    <!-- FAQ area start here -->
    <section class="faq-one-area pt-130 pb-0">
        <div class="container-lg">
            <div class="faq-one__wrp">
                <div class="row justify-content-between">
                    @if($faqCategories->count() > 0 )
                        <div class="col-lg-6">
                            <div class="faq-one__accordion">
                                @foreach($faqCategories as $faqCategory)
                                    <div class="section-header mb-30">
                                        <h3>{{ $faqCategory->name }}</h3>
                                    </div>

                                    <div class="accordion" id="accordionExample-{{ $faqCategory->id }}">
                                        @foreach($faqCategory->faqs as $faq)
                                            <div class="accordion-item">
                                                <h2 class="accordion-header" id="heading-{{ $faqCategory->id }}-{{ $faq->id }}">
                                                    <button
                                                        class="accordion-button {{ $loop->first ? '' : 'collapsed' }}"
                                                        type="button"
                                                        data-bs-toggle="collapse"
                                                        data-bs-target="#collapse-{{ $faqCategory->id }}-{{ $faq->id }}"
                                                        aria-expanded="{{ $loop->first ? 'true' : 'false' }}"
                                                        aria-controls="collapse-{{ $faqCategory->id }}-{{ $faq->id }}"
                                                    >
                                                        {{ $faq->question }}
                                                    </button>
                                                </h2>
                                                <div
                                                    id="collapse-{{ $faqCategory->id }}-{{ $faq->id }}"
                                                    class="accordion-collapse collapse {{ $loop->first ? 'show' : '' }}"
                                                    aria-labelledby="heading-{{ $faqCategory->id }}-{{ $faq->id }}"
                                                    data-bs-parent="#accordionExample-{{ $faqCategory->id }}"
                                                >
                                                    <div class="accordion-body">
                                                        <p class="mb-0">{{ $faq->answer }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @else
                        <div class="col-lg-6">
                            <div class="faq-one__accordion">
                                <div class="section-header mb-30">
                                    <h3>{{ __('Sıkça Sorulan Sorular') }}</h3>
                                </div>
                                <div class="accordion" id="accordionExampleTwo">
                                    @foreach($faqs as $faq)
                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="heading-{{ $faq->id }}">
                                                <button
                                                    class="accordion-button {{ $loop->first ? '' : 'collapsed' }}"
                                                    type="button"
                                                    data-bs-toggle="collapse"
                                                    data-bs-target="#collapse-{{ $faq->id }}"
                                                    aria-expanded="{{ $loop->first ? 'true' : 'false' }}"
                                                    aria-controls="collapse-{{ $faq->id }}"
                                                >
                                                    {{ $faq->question }}
                                                </button>
                                            </h2>
                                            <div id="collapse-{{ $faq->id }}" class="accordion-collapse collapse {{ $loop->first ? 'show' : '' }}" aria-labelledby="heading-{{ $faq->id }}" data-bs-parent="#accordionExampleTwo">
                                                <div class="accordion-body">
                                                    <p>{{ $faq->answer }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
    <!-- FAQ area end here -->
@endsection
