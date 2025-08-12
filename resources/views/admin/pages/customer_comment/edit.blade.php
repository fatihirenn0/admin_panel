@extends('admin.pages.build')
@section('title',__('Müşteri Yorum Düzenle'))
@push('css')

@endpush
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <form id="mainForm" method="post" action="{{ route('admin.customer-comments.update',$customerComment) }}" enctype="multipart/form-data">
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
                                                'title'=>__('Müşteri Adı') . " ({$locale->language})",
                                                'name'=>"name[{$locale->locale}]",
                                                'required' => (bool)$loop->first,
                                                'value' => $customerComment->getTranslation('name',$locale->locale)
                                            ])
                                        </div>
                                        <div class="col-md-12 mt-2">
                                            @include('inputs.textarea',[
                                                'title'=>__('Müşteri Yorumu') . " ({$locale->language})",
                                                'name'=>"comment[{$locale->locale}]",
                                                'required' => (bool)$loop->first,
                                                'value' => $customerComment->getTranslation('comment',$locale->locale)
                                            ])
                                        </div>
                                        <div class="col-md-12 mt-2">
                                            @include('inputs.input',[
                                                'title'=>__('Müşteri Meslek') . " ({$locale->language})",
                                                'name'=>"job[{$locale->locale}]",
                                                'required' => (bool)$loop->first,
                                                'value' => $customerComment->getTranslation('job',$locale->locale)
                                            ])
                                        </div>
                                        @if($loop->first)
                                            <div class="col-md-12 mt-2">
                                                @include('inputs.input',[
                                                    'title'=>__('Gösterim Sırası'),
                                                    'type'=>'number',
                                                    'name'=>'rank',
                                                    'value' => $customerComment->rank
                                                ])
                                            </div>
                                            <div class="col-md-12 mt-2">
                                                @include('inputs.file',[
                                                    'title'=>__('Müşteri Resmi') . " ({$locale->language})",
                                                    'name'=>"image[{$locale->locale}]",
                                                    'cropWidth' => 1200,
                                                    'cropHeight' => 800,
                                                    'loopIndex' => $loop->index,
                                                    'value' => '/storage/'.$customerComment->getTranslation('image',$locale->locale)
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
            </div>
        </form>
    </div>
@endsection
@push('js')


@endpush
