<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductCategory\ProductCategoryStoreRequest;
use App\Http\Requests\ProductCategory\ProductCategoryUpdateRequest;
use App\Models\Locale;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductImage;
use App\Models\ProductProductCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProductCategoryController extends Controller
{
    public string $roleKey = 'product_category';
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.pages.product_category.index');
    }

    public function ajax(Request $request)
    {
        $query = ProductCategory::query();

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
        $recordsTotal = ProductCategory::count();
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
            $editUrl = route('admin.product-categories.edit', $item);
            $deleteUrl = route('admin.product-categories.destroy', $item->id);
            $deleteEvent = 'onclick="checkBeforeDelete('.$item->id.', '.('false').')"';

            return [
                'id' => $item->id,
                'image' => !empty($item->image) ? '<img src="/storage/' . $item->image . '" height="60"/>' : __('Eklenmedi'),
                'name' => ($item->parent_id > 0 ? $item->parentCategory?->name . ' > ' : '') .  mb_substr($item->name,0,80,'UTF-8'),
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
        $parentCategories = ProductCategory::whereNull('parent_id')->get();
        return view('admin.pages.product_category.create',compact('parentCategories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductCategoryStoreRequest $request)
    {
        $validated = $request->validated();

        $locales = Locale::all();
        $slugs = [];
        $images = [];

        foreach ($locales as $locale) {
            $code = $locale->locale;

            // Slug üretimi
            $baseSlug = Str::slug($request->name[$code]);
            $slug = $baseSlug;
            $counter = 1;

            // Aynı slug varsa benzersiz hale getir
            while (DB::table('product_categories')->where("slug->{$code}", $slug)->exists()) {
                $slug = $baseSlug . '-' . $counter;
                $counter++;
            }

            $slugs[$code] = $slug;

            // Resim yüklemesi
            if ($request->hasFile("image.$code")) {
                $images[$code] = $request->file("image.$code")->store('product_category', 'public2');
            }
        }

        // JSON encode yerine array cast ile doğrudan array olarak kaydediyoruz
        $validated['slug'] = $slugs;
        $validated['image'] = $images;

        ProductCategory::create($validated);

        return redirect()->back()->with('success', __('Başarıyla Eklendi'));
    }

    /**
     * Display the specified resource.
     */
    public function show(ProductCategory $productCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ProductCategory $productCategory)
    {
        $parentCategories = ProductCategory::whereNull('parent_id')->where('id','!=',$productCategory->id)->get();
        return view('admin.pages.product_category.edit',compact('parentCategories','productCategory'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductCategoryUpdateRequest $request, ProductCategory $productCategory)
    {
        $validated = $request->validated();

        $locales = Locale::all();
        $slugs = [];
        $images = [];

        foreach ($locales as $locale) {
            $code = $locale->locale;

            // Ad alınamadıysa önceki değer kullan
            $name = $request->name[$code] ?? $productCategory->getTranslation('name', $code);

            // Slug oluştur
            $baseSlug = Str::slug($name);
            $slug = $baseSlug;
            $counter = 1;

            // Güncel kayıt hariç diğerlerinde aynı slug var mı kontrol et
            while (ProductCategory::where("slug->{$code}", $slug)->where('id', '!=', $productCategory->id)->exists()) {
                $slug = $baseSlug . '-' . $counter;
                $counter++;
            }

            $slugs[$code] = $slug;

            // Resim yüklemesi
            if ($request->hasFile("image.$code")) {
                $images[$code] = $request->file("image.$code")->store('product_category', 'public2');
            } else {
                $images[$code] = $productCategory->getTranslation('image', $code);
            }
        }

        $validated['slug'] = $slugs;
        $validated['image'] = $images;

        $productCategory->update($validated);

        return redirect()->route('admin.product-categories.edit',$productCategory)->with('success', __('Başarıyla Güncellendi'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request,$id)
    {
        $productCategory = ProductCategory::where('id',$id)->withTrashed()->first();

        $productIds = ProductProductCategory::where('product_category_id',$productCategory->id)->pluck('product_id')->toArray();
        if (isset($request->type)){
            if ($request->type == "recycle"){ //geri al
                Product::whereIn('id',$productIds)
                    ->where('deleted_at','>=',$productCategory->deleted_at->subMinute())
                    ->where('deleted_at','<=',$productCategory->deleted_at->addMinute())
                    ->withTrashed()
                    ->restore();
                $productCategory->restore();

                return redirect()->back()->with('success', __('Başarıyla Geri Alındı'));
            }else{// tamamen sil
                $products = Product::whereIn('id',$productIds)
                    ->withTrashed()
                    ->get();
                ProductProductCategory::where('product_category_id',$productCategory->id)->delete(); //bağlı ilişkileri sil
                $locales = Locale::all();
                foreach ($products as $product) {
                    foreach ($locales as $locale) {
                        $imagePath = $product->getTranslation('image', $locale->locale);

                        if ($imagePath && Storage::disk('public2')->exists($imagePath)) {
                            Storage::disk('public2')->delete($imagePath);// bağlı elemanların kapak resimlerini sunucudan sil
                        }
                    }
                    $productImages = ProductImage::where('product_id',$product->id)->get();
                    foreach ($productImages as $productImage) {
                        if (Storage::disk('public2')->exists($productImage->image_url)) {
                            Storage::disk('public2')->delete($productImage->image_url);// bağlı elemanların ek resimlerini sunucudan sil
                        }
                        $productImage->delete();// bağlı elemanların ek resimlerini veritabanından sil
                    }
                    $product->forceDelete();// bağlı elemanı veritabanından sil
                }
                foreach ($locales as $locale) {
                    $imagePath = $productCategory->getTranslation('image', $locale->locale);
                    if ($imagePath && Storage::disk('public2')->exists($imagePath)) {
                        Storage::disk('public2')->delete($imagePath); // kapak resimmini sunucudan sil
                    }
                }
                $productCategory->forceDelete(); // modeli sil
                return redirect()->back()->with('success', __('Başarıyla Tamamen Silindi'));
            }
        }else{
            Product::whereIn('id',$productIds)->delete();
            $productCategory->delete();

            return redirect()->back()->with('success', __('Başarıyla Silindi'));
        }
    }
}
