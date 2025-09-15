@extends('theme13.pages.build')
@section('title', __('Sıkça Sorulan Sorular'))
@section('content')
    <section class="about-banner position-relative space-header">
        <div class="line d-none d-xl-block"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-xxl-7 col-3xl-6 z-2 banner-content">
                    <h2 class="display-4 text-white mb-3">{{ __('Sıkça Sorulan Sorular') }}</h2>
                    <ul class="list-unstyled d-flex align-items-center gap-2">
                        <li><a href="{{ route('site.index') }}" class="text-white">{{ __('Anasayfa') }}</a></li>
                        <li><i class="ti ti-chevron-right text-white"></i></li>
                        <li><a href="#">{{ __('Sıkça Sorulan Sorular') }}</a></li>
                    </ul>
                </div>
                <div class="col-lg-4 col-xxl-5 col-3xl-6 d-none d-lg-block position-relative">
                    <div class="about-line-2"></div>
                    <div class="about-line-3"></div>
                </div>
            </div>
        </div>
    </section>

    <!-- faqs -->
    <section class="impactful-project bg-transparent pt-0 project-page faqs-page">
        <div class="container bg-white">
            <div class="row g-4 mb-4 mb-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-6 text-center">
                    <h2 class="mb-3">{{ __('Hukuki Sorularınız mı Var?') }}</h2>
                    <p class="mb-lg-2">{{ __('Cevaplarınız Biz De!') }}</p>
                </div>
            </div>
            <div class="row g-4">
                @if(count($faqCategories) > 0)
                    <div class="col-lg-6">
                        <div class="accordion d-flex flex-column gap-3 gap-lg-4" id="accordionExample">
                            @foreach($faqCategories as $faqCategory)
                                @foreach($faqCategory->faqs as $faq)
                                <div class="accordion-item">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $faq->id }}" aria-expanded="false" aria-controls="collapse{{ $faq->id }}">
                                            {{ $faq->question }}
                                        </button>
                                    </h2>
                                    <div id="collapse{{ $faq->id }}" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            <p class="mb-0">{{ $faq->answer }}</p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach @endforeach
                        </div>
                    </div>
                @else
                    <div class="col-lg-6">
                        <div class="accordion d-flex flex-column gap-3 gap-lg-4" id="accordionExample2">
                            @foreach($faqs as $faq)
                                <div class="accordion-item">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $faq->id }}" aria-expanded="false" aria-controls="collapse{{ $faq->id }}">
                                            {{ $faq->question }}
                                        </button>
                                    </h2>
                                    <div id="collapse{{ $faq->id }}" class="accordion-collapse collapse" data-bs-parent="#accordionExample2">
                                        <div class="accordion-body">
                                            <p>{{ $faq->answer }}</p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </section>
@endsection
