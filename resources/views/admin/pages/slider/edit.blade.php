@extends('admin.pages.build')
@section('parent_menu', __('Sliderlar'))
@section('parent_menu_link', route('admin.sliders.index'))
@section('title',__('Slider Düzenle'))
@push('css')

@endpush
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <form id="mainForm" method="post" action="{{ route('admin.sliders.update',$slider) }}" enctype="multipart/form-data">
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
                                        <div class="col-md-12 mt-3">
                                            @include('inputs.input',[
                                                'title'=>__('Slider Başlık') . " ({$locale->language})",
                                                'name'=>"title[{$locale->locale}]",
                                                'value' => $slider->getTranslation('title',$locale->locale)
                                            ])
                                        </div>
                                        <div class="col-md-12 mt-3">
                                            @include('inputs.textarea',[
                                                'title'=>__('Slider Metin') . " ({$locale->language})",
                                                'name'=>"text[{$locale->locale}]",
                                                              'value' => $slider->getTranslation('text',$locale->locale)
                                            ])
                                        </div>
                                        <div class="col-md-12 mt-3">
                                            @include('inputs.textarea',[
                                                'title'=>__('Slider Alt Metin') . " ({$locale->language})",
                                                'name'=>"sub_text[{$locale->locale}]",
                                                              'value' => $slider->getTranslation('sub_text',$locale->locale)
                                            ])
                                        </div>
                                        <div class="col-md-12 mt-3">
                                            @include('inputs.input',[
                                                'title'=>__('Slider Buton Başlık') . " ({$locale->language})",
                                                'name'=>"link_text[{$locale->locale}]",
                                                              'value' => $slider->getTranslation('link_text',$locale->locale)
                                            ])
                                        </div>
                                        <div class="col-md-12 mt-3">
                                            @include('inputs.input',[
                                                'title'=>__('Slider Buton Link') . " ({$locale->language})",
                                                'name'=>"link[{$locale->locale}]",
                                                              'value' => $slider->getTranslation('link',$locale->locale)
                                            ])
                                        </div>
                                        @if($loop->first)
                                            <div class="col-md-12 mt-2">
                                                @include('inputs.input',[
                                                    'title'=>__('Gösterim Sırası'),
                                                    'type'=>'number',
                                                    'name'=>'rank',
                                                                  'value' => $slider->rank
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
                                                'title'=>__('Görsel/Video') . " ({$locale->language})",
                                                'name'=>"file_url[{$locale->locale}]",
                                                'cropWidth' => 1200,
                                                'cropHeight' => 800,
                                                'loopIndex' => $loop->index,
                                              'value' => '/storage/'.$slider->getTranslation('file_url',$locale->locale)
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
    <script>
        @foreach($locales as $locale)
        $('.add-image-{{ $locale->locale }}').on('click',function (){
            let newImage = $('.images-{{ $locale->locale }}.d-none');
            if (newImage.length){
                newImage[0].classList.remove('d-none');
            }else{
                window.notyf.open({
                    type: 'error',
                    message: `{{ __('En fazla 10 adet resim eklenebilir.') }}`,
                    duration: 3000,
                    dismissible: true,
                    ripple: true,
                    position: { x: 'top', y: 'right' }
                });
            }
        });
        @endforeach
    </script>
@endpush
