<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\ProductStoreRequest;
use App\Http\Requests\Product\ProductUpdateRequest;
use App\Models\Locale;
use App\Models\Product;
use App\Models\ProductAttribute;
use App\Models\ProductCategory;
use App\Models\ProductImage;
use App\Models\ProductProductCategory;
use App\Services\ImageService;
use App\Services\SlugService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public string $roleKey = 'product';
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.pages.product.index');
    }

    public function ajax(Request $request)
    {
        $query = Product::query();

        if ($request->has('trashed'))
            $query = $query->onlyTrashed();

        // 🔍 Arama
        if ($search = $request->input('search.value')) {
            $query->where('name->'.app()->getLocale(), 'like', '%' . $search . '%');
        }

        // 🔢 Sıralama
        $orderColumnIndex = $request->input('order.0.column');
        $orderDirection = $request->input('order.0.dir', 'asc');
        $orderColumnName = $request->input("columns.$orderColumnIndex.data", 'id');

        $query->orderBy($orderColumnName, $orderDirection);

        // 🔁 Toplam kayıtlar
        $recordsTotal = Product::count();
        $recordsFiltered = $query->count();

        // 📄 Sayfalama
        $start = $request->input('start', 0);
        $length = $request->input('length', 10);
        $items = $query->skip($start)->take($length)->get();

        $productCategories = ProductCategory::join('product_product_categories','product_categories.id','=','product_product_categories.product_category_id')
            ->whereIn('product_product_categories.product_id',$items->pluck('id')->toArray())
            ->select('product_categories.*','product_product_categories.product_id')
            ->get();

        // 🔧 Görsel ve butonları ekleyerek veriyi hazırla
        $data = $items->map(function ($item) use ($productCategories,$request){
            $editUrl = route('admin.products.edit', $item);
            $deleteUrl = route('admin.products.destroy', $item->id);
            $deleteEvent = 'onclick="checkBeforeDelete('.$item->id.', '.('false').')"';
            $categoryName = '';
            foreach ($productCategories->where('product_id',$item->id) as $index => $productCategory) {
                $categoryName .= $productCategory->name . (array_key_last($productCategories->where('product_id',$item->id)->toArray()) != $index ? ', ' : '');
            }

            return [
                'id' => $item->id,
                'image' => !empty($item->image) ? '<img src="/storage/' . $item->image . '" height="60"/>' : __('Eklenmedi'),
                'name' => mb_substr($item->name,0,80,'UTF-8'),
                'category_name' => $categoryName,
                'rank' => $item->rank ?? '',
                'actions' => $request->has('trashed') ?
                    '<form method="POST" action="'.$deleteUrl.'" class="delete-item-form" style="display:inline-block" data-id="'.$item->id.'">
                ' . csrf_field() . method_field('DELETE') . '
                        <button name="type" value="recycle" class="btn btn-sm btn-success">
                            <i class="icon-base ti tabler-recycle"></i> Geri Al
                        </button>
                        <button name="type" value="trash" class="btn btn-sm btn-danger">
                            <i class="icon-base ti tabler-trash-x"></i> Tamamen Sil
                        </button>
                    </form>' :
                    '<a href="' . $editUrl . '" class="btn btn-sm btn-primary me-1" title="Düzenle">
                        <i class="icon-base ti tabler-pencil"></i>
                    </a>
                    <form method="POST" action="'.$deleteUrl.'" class="delete-item-form" style="display:inline-block" data-id="'.$item->id.'">
                        ' . csrf_field() . method_field('DELETE') . '
                        <button type="button" class="btn btn-sm btn-danger" '.$deleteEvent.'>
                            <i class="icon-base ti tabler-trash"></i>
                        </button>
                    </form>
                ',
            ];
        });


        return response()->json([
            'draw' => intval($request->input('draw')),
            'recordsTotal' => $recordsTotal,
            'recordsFiltered' => $recordsFiltered,
            'data' => $data
        ]);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $productCategories = ProductCategory::all();
        return view('admin.pages.product.create', compact('productCategories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductStoreRequest $request)
    {
        $validated = $request->validated();

        $locales = Locale::all();
        $slugs = [];
        $covers = [];

        foreach ($locales as $locale) {
            $code = $locale->locale;

            // Slug üretimi
            $slugProduct = new SlugService();
            $slugs[$code] = $slugProduct->create('products',$request,$code);

            // Resim yüklemesi
            $imageProduct = new ImageService();
            $covers[$code] = $imageProduct->save($code,$request,$slugs[$code],'product','cover');
        }

        $validated['slug'] = $slugs;
        $validated['cover'] = $covers;

        $product = Product::create($validated);

        $productCategories = [];
        foreach ($request->input('product_categories',[]) as $productCategoryId){
            $productCategories[] = [
                'product_id' => $product->id,
                'product_category_id' => $productCategoryId,
            ];
        }

        if (count($productCategories)) {
            ProductProductCategory::insert($productCategories);
        }

        if (isset($request->images)){
            $productImages = [];
            foreach ($request->images as $localeId => $images){
                $locale = $locales->where('id', $localeId)->first();
                foreach ($images as $index => $image){
                    if (is_file($image)){
                        $productImages[] = [
                            'product_id' => $product->id,
                            'locale_id' => $localeId,
                            'image_url' => $image->storeAs('product',Str::slug($product->getTranslation('name',$locale->locale)).'-'.rand(1,999999).'.webp','public2'),
                            'rank' => $request->image_ranks[$localeId][$index],
                            'created_at' => now(),
                            'updated_at' => now(),
                        ];
                    }
                }
            }
            if(count($productImages))
                ProductImage::insert($productImages);
        }

        $productAttributes = [];
        foreach ($request->input('attribute',[]) as $localeId => $attributes){
            foreach ($attributes['title'] as $index => $title){
                if (!is_null($request->attribute[$localeId]['title'][$index]) || !is_null($request->attribute[$localeId]['description'][$index])){
                    $productAttributes[] = [
                        'product_id' => $product->id,
                        'locale_id' => $localeId,
                        'title' => $request->attribute[$localeId]['title'][$index],
                        'description' => $request->attribute[$localeId]['description'][$index],
                        'created_at' => now(),
                        'updated_at' => now(),
                    ];
                }
            }
        }
        if(count($productAttributes))
            ProductAttribute::insert($productAttributes);

        return redirect()->back()->with('success', __('Başarıyla Eklendi'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $productCategories = ProductCategory::all();
        $productCategoryIds = ProductProductCategory::where('product_id',$product->id)->pluck('product_category_id')->toArray();
        $productImages = ProductImage::where('product_id',$product->id)->get();
        $productAttributes = ProductAttribute::where('product_id',$product->id)->get();
        return view('admin.pages.product.edit', compact(
            'product',
            'productCategories',
            'productCategoryIds',
            'productImages',
            'productAttributes'
        ));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductUpdateRequest $request, Product $product)
    {
        $validated = $request->validated();
        $locales = Locale::all();
        $slugs = [];
        $covers = [];

        foreach ($locales as $locale) {
            $code = $locale->locale;

            // Slug üretimi
            $slugService = new SlugService();
            $slugs[$code] = $slugService->create('services',$request,$code,$product->id);

            // Resim yükleme
            $imageService = new ImageService();
            $covers[$code] = $imageService->save($code,$request,$slugs[$code].'-cover-'.$code,'product','cover',$product->getTranslation('cover',$code));
        }


        $validated['slug'] = $slugs;
        $validated['cover'] = $covers;

        $product->update($validated);

        ProductProductCategory::where('product_id',$product->id)->delete();
        $productCategories = [];
        foreach ($request->input('product_categories',[]) as $productCategoryId){
            $productCategories[] = [
                'product_id' => $product->id,
                'product_category_id' => $productCategoryId,
            ];
        }

        if (count($productCategories)) {
            ProductProductCategory::insert($productCategories);
        }

        $productImages = ProductImage::where('product_id',$product->id)->get();
        if (isset($request->deleted_images)){
            foreach ($productImages as $productImage){
                if (in_array($productImage->image_url,$request->deleted_images)){
                    if (Storage::disk('public2')->exists($productImage->image_url)){
                        Storage::disk('public2')->delete($productImage->image_url);
                    }
                    ProductImage::where('id',$productImage->id)->delete();
                }
            }
        }

        if (isset($request->images)){
            $newProductImages = [];
            foreach ($request->images as $localeId => $images){
                $locale = $locales->where('id', $localeId)->first();
                foreach ($images as $index => $image){
                    if (is_file($image)){
                        if (isset($request->old_image_ids[$localeId][$index])){//önceden olan bir resim güncellenmişse
                            $productImage = $productImages->where('id',$request->old_image_ids[$localeId][$index])->first();
                            if (Storage::disk('public2')->exists($productImage->image_url))
                                Storage::disk('public2')->delete($productImage->image_url);
                            $productImage->delete();
                        }
                        $newProductImages[] = [
                            'product_id' => $product->id,
                            'locale_id' => $localeId,
                            'image_url' => $image->storeAs('product',Str::slug($product->getTranslation('name',$locale->locale)).'-'.rand(1,999999).'.webp','public2'),
                            'rank' => $request->image_ranks[$localeId][$index],
                            'created_at' => now(),
                            'updated_at' => now(),
                        ];
                    }
                }
            }
            if(count($newProductImages))
                ProductImage::insert($newProductImages);
        }

        if (isset($request->old_image_ids)){
            foreach ($request->old_image_ids as $localeId => $oldImageIds){
                foreach ($oldImageIds as $index => $oldImageId){
                    $productImage = $productImages->where('id',$oldImageId)->first();
                    $productImage->rank = $request->image_ranks[$localeId][$index];
                    $productImage->save();
                }
            }
        }

        ProductAttribute::where('product_id',$product->id)->delete();
        $productAttributes = [];
        foreach ($request->input('attribute',[]) as $localeId => $attributes){
            foreach ($attributes['title'] as $index => $title){
                if (!is_null($request->attribute[$localeId]['title'][$index]) || !is_null($request->attribute[$localeId]['description'][$index])){
                    $productAttributes[] = [
                        'product_id' => $product->id,
                        'locale_id' => $localeId,
                        'title' => $request->attribute[$localeId]['title'][$index],
                        'description' => $request->attribute[$localeId]['description'][$index],
                        'created_at' => now(),
                        'updated_at' => now(),
                    ];
                }
            }
        }
        if(count($productAttributes))
            ProductAttribute::insert($productAttributes);

        return redirect()->route('admin.products.edit',$product)->with('success', __('Başarıyla Güncellendi'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request,$id)
    {
        if (isset($request->type)){
            if ($request->type == "recycle"){//Geri Al
                Product::where('id',$id)
                    ->withTrashed()
                    ->restore();

                return redirect()->back()->with('success', __('Başarıyla Geri Alındı'));
            }else{//Tamamen sil
                ProductProductCategory::where('product_id',$id)->delete(); //Kategori ilişkilerini sil
                $locales = Locale::all();
                $product = Product::where('id',$id)->withTrashed()->first();
                foreach ($locales as $locale) {
                    $imagePath = $product->getTranslation('image', $locale->locale);

                    if ($imagePath && Storage::disk('public2')->exists($imagePath)) {
                        Storage::disk('public2')->delete($imagePath);// kapak resmini sil
                    }
                }
                $productImages = ProductImage::where('product_id',$product->id)->get();
                foreach ($productImages as $productImage) {
                    if (Storage::disk('public2')->exists($productImage->image_url)) {
                        Storage::disk('public2')->delete($productImage->image_url); //ek resimlerini sunucudan sil
                    }
                    $productImage->delete();//ek resimlerini veritabanından sil
                }
                $product->forceDelete(); //modeli sil

                return redirect()->back()->with('success', __('Başarıyla Tamamen Silindi'));
            }
        }else{
            Product::where('id',$id)->withTrashed()->delete(); //modeli soft delete sil

            return redirect()->back()->with('success', __('Başarıyla Silindi'));
        }
    }
}
