@extends('admin.pages.build')
@section('title',__('Soru Kategori Ekle'))
@push('css')
    <link rel="stylesheet" href="/panel/assets/css/dropify.min.css" />
@endpush
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">

        <div class="row g-6">
            <form id="mainForm" method="post" action="{{ route('admin.faq-categories.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="col-xxl-7 col-xl-9 col-sm-12">
                    <div class="nav-align-top nav-tabs-shadow">
                        <ul class="nav nav-tabs" role="tablist">
                            @foreach($locales as $locale)
                                <li class="nav-item">
                                    <button
                                        type="button"
                                        class="nav-link {{ $loop->first ? 'active' : '' }}"
                                        role="tab"
                                        data-bs-toggle="tab"
                                        data-bs-target="#navs-locale-{{ $locale->locale }}"
                                        aria-controls="navs-locale-{{ $locale->locale }}"
                                        aria-selected="{{ $loop->first ? 'true' : 'false' }}">
                                        {{ $locale->language }}
                                    </button>
                                </li>
                            @endforeach
                        </ul>
                        <div class="tab-content">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            @foreach($locales as $locale)
                                <div class="tab-pane fade {{ $loop->first ? 'show active' : '' }}" id="navs-locale-{{ $locale->locale }}" role="tabpanel">
                                    <div class="row">
                                        <div class="col-md-12">
                                            @include('inputs.input',[
                                                'title'=>__('Soru Kategori Adı') . " ({$locale->language})",
                                                'name'=>"name[{$locale->locale}]",
                                                'required' => (bool)$loop->first,
                                            ])
                                        </div>
                                        @if($loop->first)
                                            <div class="col-md-12 mt-2">
                                                @include('inputs.input',[
                                                    'title'=>__('Gösterim Sırası'),
                                                    'type'=>'number',
                                                    'name'=>'rank'
                                                ])
                                            </div>
                                        @endif
                                        <div class="col-md-12 mt-2">
                                            @include('inputs.textarea',[
                                                'title'=>__('Meta Anahtar Kelimeler') . " ({$locale->language})",
                                                'name'=>"meta_keywords[{$locale->locale}]",
                                            ])
                                        </div>
                                        <div class="col-md-12 mt-2">
                                            @include('inputs.textarea',[
                                                'title'=>__('Meta Açıklamalar') . " ({$locale->language})",
                                                'name'=>"meta_description[{$locale->locale}]"
                                            ])
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            <button type="submit" class="btn btn-primary mt-3">{{ __('Kaydet') }}</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
