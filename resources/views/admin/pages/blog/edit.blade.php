@extends('admin.pages.build')
@section('parent_menu', __('Bloglar'))
@section('parent_menu_link', route('admin.blogs.index'))
@section('title', __('Blog Düzenle'))
@push('css')

@endpush
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <form id="mainForm" method="post" action="{{ route('admin.blogs.update',$blog) }}" enctype="multipart/form-data">
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
                                                    'options' => $blogCategories->pluck('name','id')->toArray(),
                                                    'title' => __('Kategoriler'),
                                                    'multiple' => true,
                                                    'name' => 'blog_categories[]',
                                                    'loopIndex' => $loop->index,
                                                    'selected' => $blogCategoryIds
                                                ])
                                            </div>
                                        @endif
                                        <div class="col-md-12">
                                            @include('inputs.input',[
                                                'title'=>__('Blog Adı') . " ({$locale->language})",
                                                'name'=>"name[{$locale->locale}]",
                                                'required' => (bool)$loop->first,
                                                'value' => $blog->getTranslation('name',$locale->locale)
                                            ])
                                        </div>
                                        <div class="col-md-12 mt-2">
                                            @include('inputs.editor',[
                                                'title'=>__('Blog Açıklaması') . " ({$locale->language})",
                                                'name'=>"description[{$locale->locale}]",
                                                'loopIndex' => $loop->index,
                                                'id' => 'name_'.$locale->locale,
                                                'value' => $blog->getTranslation('description',$locale->locale)
                                            ])
                                        </div>
                                        @if($loop->first)
                                            <div class="col-md-12 mt-2">
                                                @include('inputs.input',[
                                                    'title'=>__('Gösterim Sırası'),
                                                    'type'=>'number',
                                                    'name'=>'rank',
                                                    'value' => $blog->rank
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
                                                'value' => '/storage/'.$blog->getTranslation('image',$locale->locale)
                                            ])
                                        </div>
                                        <div class="col-md-12 mt-2">
                                            <table class="table table-striped">
                                                <thead>
                                                <tr>
                                                    <td>Görsel</td>
                                                    <td>Gösterim Sırası</td>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @for($i = 0;$i < 10;$i++)
                                                    @php $blogImage = $blogImages->where('locale_id',$locale->id)->skip($i)->take(1)->first() @endphp
                                                    <tr class="{{ $blogImage ? '' : 'd-none' }} images-{{ $locale->locale }}">
                                                        <td>
                                                            @include('inputs.file',[
                                                               'title'=>__('Ek Görsel') . " ({$locale->language})",
                                                               'name'=>"images[{$locale->id}][{$i}]",
                                                               'cropWidth' => 1200,
                                                               'cropHeight' => 800,
                                                               'loopIndex' => $i + 1,
                                                               'dataHeight' => 100,
                                                               'value' => '/storage/'.$blogImage?->image_url
                                                           ])
                                                            @if($blogImage)
                                                                <input type="hidden" name="old_image_ids[{{ $locale->id }}][{{ $i }}]" value="{{ $blogImage->id }}">
                                                            @endif
                                                        </td>
                                                        <td>
                                                            <input type="number" class="form-control-sm form-control" min="0" name="image_ranks[{{ $locale->id }}][{{ $i }}]" value="{{ $blogImage ? $blogImage->rank : $i+1 }}">
                                                        </td>
                                                    </tr>
                                                @endfor
                                                </tbody>
                                                <tfoot>
                                                <tr>
                                                    <td colspan="2">
                                                        <button type="button" class="btn btn-sm btn-primary add-image-{{ $locale->locale }}" data-locale="{{ $locale->locale }}">Resim Ekle</button>
                                                    </td>
                                                </tr>
                                                </tfoot>
                                            </table>
                                        </div>
                                        <div class="col-md-12 mt-2">
                                            @include('inputs.textarea',[
                                                'title'=>__('Etiketler') . " ({$locale->language})",
                                                'name'=>"tags[{$locale->locale}]",
                                                'value' => $blog->getTranslation('tags',$locale->locale)
                                            ])
                                        </div>
                                        <div class="col-md-12 mt-2">
                                            @include('inputs.textarea',[
                                                'title'=>__('Meta Anahtar Kelimeler') . " ({$locale->language})",
                                                'name'=>"meta_keywords[{$locale->locale}]",
                                                'value' => $blog->getTranslation('meta_keywords',$locale->locale)
                                            ])
                                        </div>
                                        <div class="col-md-12 mt-2">
                                            @include('inputs.textarea',[
                                                'title'=>__('Meta Açıklamalar') . " ({$locale->language})",
                                                'name'=>"meta_description[{$locale->locale}]",
                                                'value' => $blog->getTranslation('meta_description',$locale->locale)
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
