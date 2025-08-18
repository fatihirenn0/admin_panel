@extends('admin.pages.build')
@section('title',__('Ekip Düzenle'))
@push('css')

@endpush
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <form id="mainForm" method="post" action="{{ route('admin.teams.update',$team) }}" enctype="multipart/form-data">
            @csrf @method('put')
            <div class="row g-6">
                <div class="col-xxl-7 col-xl-6 col-sm-12">
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
                                                'title'=>__('Ad-Soyad') . " ({$locale->language})",
                                                'name'=>"name[{$locale->locale}]",
                                                'required' => (bool)$loop->first,
                                                'value' => $team->getTranslation('name',$locale->locale)
                                            ])
                                        </div>
                                        <div class="col-md-12 mt-2">
                                            @include('inputs.editor',[
                                                'title'=>__('Açıklaması') . " ({$locale->language})",
                                                'name'=>"description[{$locale->locale}]",
                                                'loopIndex' => $loop->index,
                                                'id' => 'name_'.$locale->locale,
                                                'value' => $team->getTranslation('description',$locale->locale)
                                            ])
                                        </div>
                                        @if($loop->first)
                                            <div class="col-md-12 mt-2">
                                                @include('inputs.input',[
                                                    'title'=>__('Gösterim Sırası'),
                                                    'type'=>'number',
                                                    'name'=>'rank',
                                                    'value' => $team->rank
                                                ])
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                            <button type="submit" class="btn btn-primary mt-3">{{ __('Kaydet') }}</button>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-5 col-xl-6 col-sm-12">
                    <div class="nav-align-top nav-tabs-shadow">
                        <ul class="nav nav-tabs" role="tablist">
                            @foreach($locales as $locale)
                                <li class="nav-item">
                                    <button
                                        type="button"
                                        class="nav-link {{ $loop->first ? 'active' : '' }}"
                                        role="tab"
                                        data-bs-toggle="tab"
                                        data-bs-target="#navs2-locale-{{ $locale->locale }}"
                                        aria-controls="navs2-locale-{{ $locale->locale }}"
                                        aria-selected="{{ $loop->first ? 'true' : 'false' }}">
                                        {{ $locale->language }}
                                    </button>
                                </li>
                            @endforeach
                        </ul>
                        <div class="tab-content">
                            @foreach($locales as $locale)
                                <div class="tab-pane fade {{ $loop->first ? 'show active' : '' }}" id="navs2-locale-{{ $locale->locale }}" role="tabpanel">
                                    <div class="row">
                                        <div class="col-md-12 mt-2">
                                            @include('inputs.file',[
                                                'title'=>__('Kapak Resmi') . " ({$locale->language})",
                                                'name'=>"image[{$locale->locale}]",
                                                'cropWidth' => 1200,
                                                'cropHeight' => 800,
                                                'loopIndex' => $loop->index,
                                                'value' => '/storage/'.$team->getTranslation('image',$locale->locale)
                                            ])
                                        </div>

                                        <div class="col-md-12 mt-2">
                                            @include('inputs.textarea',[
                                                'title'=>__('Facebook') . " ({$locale->language})",
                                                'type' => 'url',
                                                'name'=>"facebook[{$locale->locale}]",
                                                'value' => $team->getTranslation('facebook' , $locale->locale)
                                            ])
                                        </div>
                                        <div class="col-md-12 mt-2">
                                            @include('inputs.textarea',[
                                                'title'=>__('Twitter') . " ({$locale->language})",
                                                'type' => 'url',
                                                'name'=>"twitter[{$locale->locale}]",
                                                 'value' => $team->getTranslation('twitter' , $locale->locale)
                                            ])
                                        </div>
                                        <div class="col-md-12 mt-2">
                                            @include('inputs.textarea',[
                                                'title'=>__('İnstagram') . " ({$locale->language})",
                                                'type' => 'url',
                                                'name'=>"instagram[{$locale->locale}]",
                                                 'value' => $team->getTranslation('instagram' , $locale->locale)
                                            ])
                                        </div>
                                        <div class="col-md-12 mt-2">
                                            @include('inputs.textarea',[
                                                'title'=>__('Linkedin') . " ({$locale->language})",
                                                'type' => 'url',
                                                'name'=>"linkedin[{$locale->locale}]",
                                                 'value' => $team->getTranslation('linkedin' , $locale->locale)
                                            ])
                                        </div>
                                        <div class="col-md-12 mt-2">
                                            @include('inputs.textarea',[
                                                'title'=>__('Tiktok') . " ({$locale->language})",
                                                'type' => 'url',
                                                'name'=>"tiktok[{$locale->locale}]",
                                                 'value' => $team->getTranslation('tiktok' , $locale->locale)
                                            ])
                                        </div>
                                        <div class="col-md-12 mt-2">
                                            @include('inputs.textarea',[
                                                'title'=>__('Youtube') . " ({$locale->language})",
                                                'type' => 'url',
                                                'name'=>"youtube[{$locale->locale}]",
                                                 'value' => $team->getTranslation('youtube' , $locale->locale)
                                            ])
                                        </div>
                                        <div class="col-md-12 mt-2">
                                            @include('inputs.textarea',[
                                                'title'=>__('Github') . " ({$locale->language})",
                                                'type' => 'url',
                                                'name'=>"github[{$locale->locale}]",
                                                 'value' => $team->getTranslation('github' , $locale->locale)
                                            ])
                                        </div>
                                        <div class="col-md-12 mt-2">
                                            @include('inputs.textarea',[
                                                'title'=>__('Meta Anahtar Kelimeler') . " ({$locale->language})",
                                                'name'=>"meta_keywords[{$locale->locale}]",
                                                'value' => $team->getTranslation('meta_keywords',$locale->locale)
                                            ])
                                        </div>
                                        <div class="col-md-12 mt-2">
                                            @include('inputs.textarea',[
                                                'title'=>__('Meta Açıklamalar') . " ({$locale->language})",
                                                'name'=>"meta_description[{$locale->locale}]",
                                                'value' => $team->getTranslation('meta_description',$locale->locale)
                                            ])
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
@push('js')


@endpush
