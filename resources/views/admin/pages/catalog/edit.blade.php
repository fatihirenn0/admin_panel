@extends('admin.pages.build')
@section('parent_menu', __('Kataloglar'))
@section('parent_menu_link', route('admin.catalogs.index'))
@section('title',__('Katalog Düzenle'))
@push('css')

@endpush
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <form id="mainForm" method="post" action="{{ route('admin.catalogs.update',$catalog) }}" enctype="multipart/form-data">
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
                                        @if($loop->first)
                                            <div class="col-md-12">
                                                @include('inputs.select',[
                                                    'options' =>['' => 'Kategori Seçilmedi'] + $catalogCategories->pluck('name', 'id')->toArray(),
                                                    'title' => __('Kategoriler'),
                                                    'name' => 'catalog_category_id',
                                                    'loopIndex' => $loop->index,
                                                    'selected'=> old('catalog_category_id', $catalog->catalog_category_id ?? null),
                                                ])
                                            </div>
                                        @endif
                                        <div class="col-md-12">
                                            @include('inputs.input',[
                                                'title'=>__('Katalog Adı') . " ({$locale->language})",
                                                'name'=>"name[{$locale->locale}]",
                                                'required' => (bool)$loop->first,
                                                'value' => $catalog->getTranslation('name',$locale->locale)
                                            ])
                                        </div>
                                        <div class="col-md-12 mt-2">
                                            @include('inputs.editor',[
                                                'title'=>__('Katalog Açıklaması') . " ({$locale->language})",
                                                'name'=>"description[{$locale->locale}]",
                                                'loopIndex' => $loop->index,
                                                'id' => 'name_'.$locale->locale,
                                                'value' => $catalog->getTranslation('description',$locale->locale)
                                            ])
                                        </div>
                                        @if($loop->first)
                                            <div class="col-md-12 mt-2">
                                                @include('inputs.input',[
                                                    'title'=>__('Gösterim Sırası'),
                                                    'type'=>'number',
                                                    'name'=>'rank',
                                                    'value' => $catalog->rank
                                                ])
                                            </div>
                                            <div class="col-md-12 mt-2">
                                                @include('inputs.input',[
                                                    'title'=>__('Dış Bağlantı Link'),
                                                    'name'=>'url',
                                                    'value' => $catalog->url
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
                                                'name'=>"cover[{$locale->locale}]",
                                                'cropWidth' => 1200,
                                                'cropHeight' => 800,
                                                'loopIndex' => $loop->index,
                                                'value' => '/storage/'.$catalog->getTranslation('cover',$locale->locale)
                                            ])
                                        </div>
                                        <div class="col-md-12 mt-2">
                                            @include('inputs.file',[
                                                'title'=>__('Dosya') . " ({$locale->language})",
                                                'name'=>"file[{$locale->locale}]",
                                                'loopIndex' => $loop->index,
                                                'value' => '/storage/'.$catalog->getTranslation('file',$locale->locale)
                                            ])
                                        </div>
                                        <div class="col-md-12 mt-2">
                                            @include('inputs.textarea',[
                                                'title'=>__('Meta Anahtar Kelimeler') . " ({$locale->language})",
                                                'name'=>"meta_keywords[{$locale->locale}]",
                                                'value' => $catalog->getTranslation('meta_keywords',$locale->locale)
                                            ])
                                        </div>
                                        <div class="col-md-12 mt-2">
                                            @include('inputs.textarea',[
                                                'title'=>__('Meta Açıklamalar') . " ({$locale->language})",
                                                'name'=>"meta_description[{$locale->locale}]",
                                                'value' => $catalog->getTranslation('meta_description',$locale->locale)
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
