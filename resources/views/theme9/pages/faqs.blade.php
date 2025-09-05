@extends('theme9.pages.build')
@section('title', __('Sıkça Sorulan Sorular'))
@section('content')
    <!-- ========== breadcrumb start============= -->

    <div class="breadcrumb-section">
        <div class="container">
            <div class="row d-flex justify-content-center align-items-center text-center">
                <div class="col-lg-6">
                    <h2 class="breadcrumb-title wow fadeInLeft" data-wow-duration="1.5s" data-wow-delay=".2s">{{ __('Sıkça Sorulan Sorular') }}</h2>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb d-flex justify-content-center">
                            <li class="breadcrumb-item"><a href="{{ route('site.index') }}">{{ __('Anasayfa') }}</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{ __('Sıkça Sorulan Sorular') }}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <!-- ========== breadcrumb start============= -->

    <!-- ========== faq-section start============= -->

    <div class="faq-section pt-120 pb-120">
        <div class="container">
            <div class="row gy-5">
                <div class="col-lg-4 order-lg-1 order-2">
                    <div class="nav flex-column nav-pills gap-4 wow fadeInUp" data-wow-duration="1.5s" data-wow-delay=".2s" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                        @if($faqCategories->count() > 0 ) @foreach($faqCategories as $faqCategory)
                            <button
                                class="nav-link {{ $loop->first ? 'active' : '' }} nav-btn-style mx-auto  mb-20"
                                id="cat{{ $faqCategory->id }}-tab"
                                data-bs-toggle="pill"
                                data-bs-target="#cat{{ $faqCategory->id }}"
                                type="button"
                                role="tab"
                                aria-controls="cat{{ $faqCategory->id }}"
                                aria-selected="{{ $loop->first ? 'true' : 'false' }}"
                            >
                                {{ $faqCategory->name }}
                            </button>
                        @endforeach @else
                            <button class="nav-link active nav-btn-style mx-auto mb-20" id="v-pills-profile-tab" data-bs-toggle="pill" data-bs-target="#v-pills-profile" type="button" role="tab" aria-controls="v-pills-profile" aria-selected="true">
                                <i class="lar la-user"></i>{{ __('Sorular') }}
                            </button>
                        @endif
                    </div>
                </div>
                <div class="col-lg-8 order-lg-2 order-1">
                    <div class="tab-content" id="v-pills-tabContent">
                        @if($faqCategories->count() > 0 ) @foreach($faqCategories as $faqCategory)
                            <div class="tab-pane fade {{ $loop->first ? 'show active' : '' }}" id="cat{{ $faqCategory->id }}" role="tabpanel" aria-labelledby="cat{{ $faqCategory->id }}-tab">
                                <div class="faq-wrap">
                                    @foreach($faqCategory->faqs as $faq)
                                        <div class="faq-item hover-btn">
                                            <span></span>
                                            <h5 id="heading{{ $faq->id }}" class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#collapse{{ $faq->id }}" aria-controls="collapse{{ $faq->id }}">
                                                {{ $faq->question }}
                                            </h5>
                                            <div id="collapse{{ $faq->id }}" class="accordion-collapse collapse" aria-labelledby="heading{{ $faq->id }}">
                                                <div class="faq-body">
                                                    {{ $faq->answer }}
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endforeach @else
                            <div class="tab-pane fade show active" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                                <div class="faq-wrap">
                                    @foreach($faqs as $faq)
                                        <div class="faq-item hover-btn">
                                            <span></span>
                                            <h5 id="heading{{ $faq->id }}" class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#collapse{{ $faq->id }}" aria-controls="collapse{{ $faq->id }}">
                                                {{ $faq->question }}
                                            </h5>
                                            <div id="collapse{{ $faq->id }}" class="accordion-collapse collapse" aria-labelledby="heading{{ $faq->id }}">
                                                <div class="faq-body">
                                                    {{ $faq->answer }}
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
        </div>
    </div>

    <!-- ========== faq-section end============= -->
@endsection
