@extends('theme7.pages.build')
@section('title', __('Sıkça Sorulan Sorular'))
@section('content')

    <!-- Title Bar -->
    <div class="pbmit-title-bar-wrapper">
        <div class="container">
            <div class="pbmit-title-bar-content">
                <div class="pbmit-title-bar-content-inner">
                    <div class="pbmit-tbar">
                        <div class="pbmit-tbar-inner container">
                            <h1 class="pbmit-tbar-title">{{ __('Sıkça Sorulan Sorular') }}</h1>
                        </div>
                    </div>
                    <div class="pbmit-breadcrumb">
                        <div class="pbmit-breadcrumb-inner">
                        <span>
                            <a title="" href="{{ route('site.index') }}" class="home">
                                <span>{{ __('Anasayfa') }}</span>
                            </a>
                        </span>
                            <span class="sep"><i class="pbmit-base-icon-right-small"></i></span>
                            <span>
                            <span class="post-root post post-post current-item">
                                {{ __('Sıkça Sorulan Sorular') }}
                            </span>
                        </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Ortalama kapsayıcısı -->
    <div class="d-flex justify-content-center align-items-center min-vh-100">
        <div class="container" style="max-width: 1000px;">

            <!-- Başlık -->
            <div class="text-center mb-5">
                <h4>{{ __('Hukuki Sorularınız mı Var?') }}</h4>
                <p>{{ __('Cevaplarınız Biz De!') }}</p>
            </div>

            @if(!empty($faqCategories) && count($faqCategories) > 0)
                @foreach($faqCategories as $faqCategory)
                    @php
                        $accordionId = 'accordion-' . $faqCategory->id;
                    @endphp

                    <div class="accordion" id="{{ $accordionId }}">
                        @foreach($faqCategory->faqs as $faq)
                            @php
                                $headingId = 'heading-' . $faq->id;
                                $collapseId = 'faq-' . $faq->id;
                                $isFirst = $loop->first;
                            @endphp

                            <div class="accordion-item {{ $isFirst ? 'active' : '' }}">
                                <h2 class="accordion-header" id="{{ $headingId }}">
                                    <button
                                        class="accordion-button {{ $isFirst ? '' : 'collapsed' }}"
                                        type="button"
                                        data-bs-toggle="collapse"
                                        data-bs-target="#{{ $collapseId }}"
                                        aria-expanded="{{ $isFirst ? 'true' : 'false' }}"
                                        aria-controls="{{ $collapseId }}"
                                    >
                                        <span>{{ $faq->id }}</span> {{ $faq->question }}
                                    </button>
                                </h2>
                                <div
                                    id="{{ $collapseId }}"
                                    class="accordion-collapse collapse {{ $isFirst ? 'show' : '' }}"
                                    aria-labelledby="{{ $headingId }}"
                                    data-bs-parent="#{{ $accordionId }}"
                                >
                                    <div class="accordion-body">
                                        {{ $faq->answer }}
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endforeach
            @else
                @php
                    $accordionId = 'accordion-all';
                @endphp

                <div class="accordion" id="{{ $accordionId }}">
                    @foreach($faqs as $faq)
                        @php
                            $headingId = 'heading-' . $faq->id;
                            $collapseId = 'faq-' . $faq->id;
                            $isFirst = $loop->first;
                        @endphp

                        <div class="accordion-item {{ $isFirst ? 'active' : '' }}">
                            <h2 class="accordion-header" id="{{ $headingId }}">
                                <button
                                    class="accordion-button {{ $isFirst ? '' : 'collapsed' }}"
                                    type="button"
                                    data-bs-toggle="collapse"
                                    data-bs-target="#{{ $collapseId }}"
                                    aria-expanded="{{ $isFirst ? 'true' : 'false' }}"
                                    aria-controls="{{ $collapseId }}"
                                >
                                    <span>{{ $faq->id }}</span> {{ $faq->question }}
                                </button>
                            </h2>
                            <div
                                id="{{ $collapseId }}"
                                class="accordion-collapse collapse {{ $isFirst ? 'show' : '' }}"
                                aria-labelledby="{{ $headingId }}"
                                data-bs-parent="#{{ $accordionId }}"
                            >
                                <div class="accordion-body">
                                    {{ $faq->answer }}
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif

        </div>
    </div>

@endsection
