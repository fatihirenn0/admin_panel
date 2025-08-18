@extends('admin.pages.build')
@section('parent_menu', __('Ekipler'))
@section('parent_menu_link', route('admin.teams.index'))
@section('title',__('Ekip Düzenle'))
@push('css')
    <link rel="stylesheet" href="/panel/assets/css/dropify.min.css" />
@endpush
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">

        <div class="row g-6">
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
                                            @if($loop->first)
                                                <div class="col-md-12">
                                                    @include('inputs.select',[
                                                        'options' =>[''=>'Lütfen Seçiniz']+$teamCategories->pluck('name','id')->toArray(),
                                                        'title' => __('Kategoriler'),
                                                        'multiple' => true,
                                                        'name' => 'team_categories[]',
                                                        'loopIndex' => $loop->index,
                                                        'selected' => $teamTeamCategories
                                                    ])
                                                </div>
                                                <div class="col-md-12">
                                                    @include('inputs.input',[
                                                        'title'=>__('Ad-Soyad'),
                                                        'name'=>"name",
                                                        'required' => true,
                                                        'value' => $team->name
                                                    ])
                                                </div>
                                            @endif

                                            <div class="col-md-12 mt-2">
                                                @include('inputs.input',[
                                                    'title'=>__('Meslek') . " ({$locale->language})",
                                                    'name'=>"job[{$locale->locale}]",
                                                    'loopIndex' => $loop->index,
                                                    'value' => $team->getTranslation('job',$locale->locale)
                                                ])
                                            </div>
                                            @if($loop->first)
                                                <div class="col-md-12 mt-2">
                                                    @include('inputs.input',[
                                                        'title'=>__('E-Posta'),
                                                        'name'=>"email",
                                                        'type' => 'email',
                                                        'loopIndex' => $loop->index,
                                                        'value' => $team->email
                                                    ])
                                                </div>
                                            @endif
                                            <div class="col-md-12 mt-2">
                                                @include('inputs.editor',[
                                                    'title'=>__('Açıklama') . " ({$locale->language})",
                                                    'name'=>"description[{$locale->locale}]",
                                                    'loopIndex' => $loop->index,
                                                    'id' => 'description_'.$locale->locale,
                                                    'value' => $team->getTranslation('description',$locale->locale)
                                                ])
                                            </div>
                                            <div class="col-md-12 mt-2">
                                                @include('inputs.input',[
                                                    'title'=>__('Eğitim') . " ({$locale->language})",
                                                    'name'=>"education[{$locale->locale}]",
                                                    'loopIndex' => $loop->index,
                                                    'value' => $team->getTranslation('education',$locale->locale)
                                                ])
                                            </div>
                                            <div class="col-md-12 mt-2">
                                                @include('inputs.input',[
                                                    'title'=>__('Tecrübe') . " ({$locale->language})",
                                                    'name'=>"work_experience[{$locale->locale}]",
                                                    'loopIndex' => $loop->index,
                                                    'value' => $team->getTranslation('work_experience',$locale->locale)
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
                                                    'value' => '/storage/'. $team->getTranslation('image',$locale->locale)
                                                ])
                                            </div>
                                            @if($loop->first)
                                                <div class="col-md-12 mt-2">
                                                    @include('inputs.input',[
                                                        'title'=>__('Facebook'),
                                                        'type' => 'url',
                                                        'name'=>"facebook",
                                                        'value' => $team->facebook
                                                    ])
                                                </div>
                                                <div class="col-md-12 mt-2">
                                                    @include('inputs.input',[
                                                        'title'=>__('Twitter'),
                                                        'type' => 'url',
                                                        'name'=>"twitter",
                                                        'value' => $team->twitter
                                                    ])
                                                </div>
                                                <div class="col-md-12 mt-2">
                                                    @include('inputs.input',[
                                                        'title'=>__('İnstagram'),
                                                        'type' => 'url',
                                                        'name'=>"instagram",
                                                        'value' => $team->instagram
                                                    ])
                                                </div>
                                                <div class="col-md-12 mt-2">
                                                    @include('inputs.input',[
                                                        'title'=>__('Linkedin'),
                                                        'type' => 'url',
                                                        'name'=>"linkedin",
                                                        'value' => $team->linkedin
                                                    ])
                                                </div>
                                                <div class="col-md-12 mt-2">
                                                    @include('inputs.input',[
                                                        'title'=>__('Tiktok'),
                                                        'type' => 'url',
                                                        'name'=>"tiktok",
                                                        'value' => $team->tiktok
                                                    ])
                                                </div>
                                                <div class="col-md-12 mt-2">
                                                    @include('inputs.input',[
                                                        'title'=>__('Youtube'),
                                                        'type' => 'url',
                                                        'name'=>"youtube",
                                                        'value' => $team->youtube
                                                    ])
                                                </div>
                                                <div class="col-md-12 mt-2">
                                                    @include('inputs.input',[
                                                        'title'=>__('Github'),
                                                        'type' => 'url',
                                                        'name'=>"github",
                                                        'value' => $team->github
                                                    ])
                                                </div>
                                            @endif
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
    </div>
@endsection
@push('js')
    <script src="/panel/assets/js/dropify.min.js"></script>
    <script>
        $('.dropify').dropify({
            messages: {
                'default': '{{__('Dosya Sürükle veya Tıkla')}}',
                'replace': '{{ __('Dosya Sürükle veya Tıkla') }}',
                'remove':  '{{ __('Kaldır') }}',
                'error':   '{{ __('Bir Hata Ortaya Çıktı') }}'
            }
        });
    </script>
@endpush
