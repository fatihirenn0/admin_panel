<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CatalogCategory\CatalogCategoryStoreRequest;
use App\Http\Requests\CatalogCategory\CatalogCategoryUpdateRequest;
use App\Models\Catalog;
use App\Models\CatalogCategory;
use App\Models\Locale;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class CatalogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("admin.pages.catalog.index");
    }
    public function ajax(Request $request)
    {
        $query = Catalog::query();

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
        $recordsTotal = Catalog::count();
        $recordsFiltered = $query->count();

        // 📄 Sayfalama
        $start = $request->input('start', 0);
        $length = $request->input('length', 10);
        $items = $query->skip($start)->take($length)->get();

        $catalogCategories = CatalogCategory::join('catalogs', 'catalog_categories.id', '=', 'catalogs.catalog_category_id')
            ->whereIn('catalogs.id', $items->pluck('id')->toArray())
            ->select('catalog_categories.*', 'catalogs.id as catalog_id')
            ->get();

        // 🔧 Görsel ve butonları ekleyerek veriyi hazırla
        $data = $items->map(function ($item) use ($catalogCategories){
            $editUrl = route('admin.catalogs.edit', $item->id);
            $deleteUrl = route('admin.catalogs.destroy', $item->id);
            $categoryName = '';
            foreach ($catalogCategories->where('catalog_id',$item->id) as $index => $catalogCategory) {
                $categoryName  .= $catalogCategory->name . (array_key_last($catalogCategories->where('catalog_id',$item->id)->toArray()) != $index ? ', ' : '');
            }

            return [
                'id' => $item->id,
                'catalog_category_id' => e($categoryName),
                'name' => mb_substr($item->name,0,80,'UTF-8'),
                'cover' => !empty($item->cover) ? '<img src="/storage/' . $item->cover . '" height="60"/>' : __('Eklenmedi'),
                'rank' => $item->rank ?? '',
                'actions' => '
            <a href="' . $editUrl . '" class="btn btn-sm btn-primary me-1" title="Düzenle">
                <i class="icon-base ti tabler-pencil"></i>
            </a>
            <form method="POST" action="'.$deleteUrl.'" class="delete-item-form" style="display:inline-block" data-id="'.$item->id.'">
                ' . csrf_field() . method_field('DELETE') . '
                <button type="button" class="btn btn-sm btn-danger" onclick="checkBeforeDelete('.$item->id.')">
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
        $catalogCategories = CatalogCategory::all();
        return view("admin.pages.catalog.create" , compact('catalogCategories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CatalogCategoryStoreRequest $request) : \Illuminate\Http\RedirectResponse
    {
        $validated = $request->validated();

        $locales = Locale::all();
        $slugs = [];
        $covers = [];
        $files = [];

        foreach ($locales as $locale) {
            $code = $locale->locale;

            // Slug üretimi
            $baseSlug = Str::slug($request->name[$code]);
            $slug = $baseSlug;
            $counter = 1;

            // Aynı slug varsa benzersiz hale getir
            while (DB::table('catalogs')->where("slug->{$code}", $slug)->exists()) {
                $slug = $baseSlug . '-' . $counter;
                $counter++;
            }

            $slugs[$code] = $slug;

            // Resim yüklemesi
            if ($request->hasFile("cover.$code")) {
                $covers[$code] = $request->file("cover.$code")->store('catalog', 'public2');
            }
            if ($request->hasFile("file.$code")) {
                $path = $request->file("file.$code")->store('catalog/files', 'public2'); // disk: public2
                $files[$code] = $path;                                  // storage yolu
            }
        }

        // JSON encode yerine array cast ile doğrudan array olarak kaydediyoruz
        $validated['slug'] = $slugs;
        $validated['cover'] = $covers;
        $validated['file']      = $files;

        Catalog::create($validated);

        return redirect()->back()->with('success', __('Başarıyla Eklendi'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Catalog $catalog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Catalog $catalog)
    {
        $catalogCategories = CatalogCategory::all();
        return view("admin.pages.catalog.edit" , compact('catalog','catalogCategories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CatalogCategoryUpdateRequest $request, Catalog $catalog)
    {
        $validated = $request->validated();
        $locales = Locale::all();
        $slugs = [];
        $covers = [];
        $files = [];

        foreach ($locales as $locale) {
            $code = $locale->locale;

            // Slug üretimi
            $baseSlug = Str::slug($request->name[$code]);
            $slug = $baseSlug;
            $counter = 1;

            // Aynı slug varsa benzersiz hale getir
            while (DB::table('catalogs')->where("slug->{$code}", $slug)->exists()) {
                $slug = $baseSlug . '-' . $counter;
                $counter++;
            }

            $slugs[$code] = $slug;

            // Resim yüklemesi
            if ($request->hasFile("cover.$code")) {
                $covers[$code] = $request->file("cover.$code")->store('catalog', 'public2');
            }
            if ($request->hasFile("file.$code")) {
                $path = $request->file("file.$code")->store('catalog/files', 'public2'); // disk: public2
                $files[$code] = $path;                                  // storage yolu
            }
        }

        // JSON encode yerine array cast ile doğrudan array olarak kaydediyoruz
        $validated['slug'] = $slugs;
        $validated['cover'] = $covers;
        $validated['file']      = $files;

        $catalog->update($validated);

        return redirect()->back()->with('success', __('Başarıyla Güncellendi'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Catalog $catalog)
    {
        //
    }
}
