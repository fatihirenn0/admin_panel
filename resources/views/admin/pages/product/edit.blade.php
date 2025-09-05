@extends('admin.pages.build')
@section('parent_menu', __('Ürünler'))
@section('parent_menu_link', route('admin.products.index'))
@section('title',__('Ürün Düzenle'))
@push('css')

@endpush
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <form id="mainForm" method="post" action="{{ route('admin.products.update',$product) }}" enctype="multipart/form-data">
            @csrf @method('put')
            <div class="row g-6">
                <div class="col-xxl-6 col-xl-6 col-sm-12">
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
                                                    'options' => $productCategories->pluck('name','id')->toArray(),
                                                    'title' => __('Kategoriler'),
                                                    'multiple' => true,
                                                    'name' => 'product_categories[]',
                                                    'loopIndex' => $loop->index,
                                                    'selected' => $productCategoryIds
                                                ])
                                            </div>
                                        @endif
                                        <div class="col-md-12 mt-2">
                                            @include('inputs.input',[
                                                'title'=>__('Ürün Adı') . " ({$locale->language})",
                                                'name'=>"name[{$locale->locale}]",
                                                'required' => (bool)$loop->first,
                                                'value' => $product->getTranslation('name',$locale->locale)
                                            ])
                                        </div>
                                        @if($loop->first)
                                            <div class="col-md-12 mt-2">
                                                @include('inputs.input',[
                                                    'title'=>__('Ürün Kodu'),
                                                    'name'=>"code",
                                                    'value' => $product->code
                                                ])
                                            </div>
                                            <div class="col-md-12 mt-2">
                                                @include('inputs.input',[
                                                    'title'=>__('Ürün Barkodu'),
                                                    'name'=>"barcode",
                                                    'value' => $product->barcode
                                                ])
                                            </div>
                                            <div class="col-md-12 mt-2">
                                                @include('inputs.input',[
                                                    'title'=>__('Ürün Fiyatı'),
                                                    'name'=>"price",
                                                    'price' => $product->price
                                                ])
                                            </div>
                                            <div class="col-md-12 mt-2">
                                                @include('inputs.input',[
                                                    'title'=>__('Stok Adeti'),
                                                    'name'=>"quantity",
                                                    'type' => 'number',
                                                    'value' => $product->quantity
                                                ])
                                            </div>
                                        @endif

                                        <div class="col-md-12 mt-2">
                                            @include('inputs.editor',[
                                                'title'=>__('Ürün Kısa Açıklaması') . " ({$locale->language})",
                                                'name'=>"short_description[{$locale->locale}]",
                                                'loopIndex' => $loop->index,
                                                'id' => 'short_description_'.$locale->locale,
                                                'value' => $product->getTranslation('short_description',$locale->locale)
                                            ])
                                        </div>
                                        <div class="col-md-12 mt-2">
                                            @include('inputs.editor',[
                                                'title'=>__('Ürün Tam Açıklaması') . " ({$locale->language})",
                                                'name'=>"description[{$locale->locale}]",
                                                'loopIndex' => $loop->index + 1,
                                                'id' => 'description_'.$locale->locale,
                                                'value' => $product->getTranslation('description',$locale->locale)
                                            ])
                                        </div>
                                        @if($loop->first)
                                            <div class="col-md-12 mt-2">
                                                @include('inputs.input',[
                                                    'title'=>__('Gösterim Sırası'),
                                                    'type'=>'number',
                                                    'name'=>'rank',
                                                    'value' => $product->rank
                                                ])
                                            </div>
                                            <div class="col-md-12 mt-2">
                                                @include('inputs.input',[
                                                    'title'=>__('Video Link'),
                                                    'name'=>"video_url",
                                                    'value' => $product->video_url
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
                <div class="col-xxl-6 col-xl-6 col-sm-12">
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
                                                'value' => '/storage/'.$product->getTranslation('cover',$locale->locale)
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
                                                    @php $productImage = $productImages->where('locale_id',$locale->id)->skip($i)->take(1)->first() @endphp
                                                    <tr class="{{ $productImage ? '' : 'd-none' }} images-{{ $locale->locale }}">
                                                        <td>
                                                            @include('inputs.file',[
                                                               'title'=>__('Ek Görsel') . " ({$locale->language})",
                                                               'name'=>"images[{$locale->id}][{$i}]",
                                                               'cropWidth' => 1200,
                                                               'cropHeight' => 800,
                                                               'loopIndex' => $i + 1,
                                                               'dataHeight' => 100,
                                                               'value' => '/storage/'.$productImage?->image_url
                                                           ])
                                                            @if($productImage)
                                                                <input type="hidden" name="old_image_ids[{{ $locale->id }}][{{ $i }}]" value="{{ $productImage->id }}">
                                                            @endif
                                                        </td>
                                                        <td>
                                                            <input type="number" class="form-control-sm form-control" min="0" name="image_ranks[{{ $locale->id }}][{{ $i }}]" value="{{ $productImage ? $productImage->rank : $i+1 }}">
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
                                                'value' => $product->getTranslation('tags',$locale->locale)
                                            ])
                                        </div>
                                        <div class="col-md-12 mt-2">
                                            @include('inputs.textarea',[
                                                'title'=>__('Meta Anahtar Kelimeler') . " ({$locale->language})",
                                                'name'=>"meta_keywords[{$locale->locale}]",
                                                'value' => $product->getTranslation('meta_keywords',$locale->locale)
                                            ])
                                        </div>
                                        <div class="col-md-12 mt-2">
                                            @include('inputs.textarea',[
                                                'title'=>__('Meta Açıklamalar') . " ({$locale->language})",
                                                'name'=>"meta_description[{$locale->locale}]",
                                                'value' => $product->getTranslation('meta_description',$locale->locale)
                                            ])
                                        </div>
                                        <hr class="my-5 text-dark">
                                        <table class="table table-striped">
                                            <thead>
                                            <tr>
                                                <td>Özellik Başlık</td>
                                                <td>Özellik Açıklama</td>
                                            </tr>
                                            </thead>
                                            <tbody class="attributes-{{ $locale->locale }}">
                                                @foreach($productAttributes->where('locale_id',$locale->id) as $productAttribute)
                                                    <tr>
                                                        <td style="width: 40%"><input class="form-control form-control-sm" value="{{ $productAttribute->title }}" name="attribute[{{ $locale->id }}][title][]"></td>
                                                        <td class='d-flex'>
                                                            <input class="form-control form-control-sm" value="{{ $productAttribute->description }}" name="attribute[{{ $locale->id }}][description][]">
                                                            <button type='button' class='btn btn-danger btn-sm remove-attribute'><i class="menu-icon icon-base ti tabler-trash"></i></button>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                            <tfoot>
                                            <tr>
                                                <td colspan="2">
                                                    <button type="button" class="btn btn-sm btn-primary add-attribute-{{ $locale->locale }}">{{ $locale->language }} için Özellik Ekle</button>
                                                </td>
                                            </tr>
                                            </tfoot>
                                        </table>
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

        $('.add-attribute-{{ $locale->locale }}').on('click',function (){
            let html = `<tr>
                    <td style="width: 40%"><input class="form-control form-control-sm" name="attribute[{{ $locale->id }}][title][]"></td>
                    <td class='d-flex'>
                        <input class="form-control form-control-sm" name="attribute[{{ $locale->id }}][description][]">
                        <button type='button' class='btn btn-danger btn-sm remove-attribute'><i class="menu-icon icon-base ti tabler-trash"></i></button>
                    </td>
                </tr>`;
            $('.attributes-{{ $locale->locale }}').append(html);
        });
        @endforeach

        $(document).on('click', '.remove-attribute', function (){
            $(this).closest('tr').remove();
        })
    </script>
@endpush
