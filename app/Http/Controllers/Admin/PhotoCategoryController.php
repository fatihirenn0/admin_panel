<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PhotoCategory\PhotoCategoryStoreRequest;
use App\Http\Requests\PhotoCategory\PhotoCategoryUpdateRequest;
use App\Models\Locale;
use App\Models\Photo;
use App\Models\PhotoCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PhotoCategoryController extends Controller
{
    public string $roleKey = 'photo_category';
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.pages.photo_category.index');
    }

    public function ajax(Request $request){

        $query = PhotoCategory::query();

        if ($request->has('trashed'))
            $query = $query->onlyTrashed();

        if($search = $request->input('search.value')){
            $query->where('name', 'like', '%' . $search . '%');
        }

        $orderColumnIndex = $request->input('order.0.column');
        $orderDirection = $request->input('order.0.dir' , 'asc');
        $orderColumnName = $request->input("columns.$orderColumnIndex.data" , 'name');

        $query->orderBy($orderColumnName, $orderDirection);



        $recordsTotal = PhotoCategory::count();
        $recordsFiltered = $query->count();


        $start = $request->input('start' , 0);
        $length = $request->input('length' , 10);
        $items = $query->skip($start)->take($length)->get();


        $data = $items->map(function ($item) use ($request) {
            $editUrl = route('admin.photo-categories.edit' , $item);
            $deleteUrl = route('admin.photo-categories.destroy' , $item->id);
            $hasMore = Photo::where('photo_category_id', $item->id)->exists();

            $deleteEvent = 'onclick="checkBeforeDelete('.$item->id.', '.($hasMore ? 'true' : 'false').')"';

            return[
                'id' => $item->id,
                'image' => !empty($item->image) ? '<img src="/storage/' . $item->image . '" height="60"/>' : __('Eklenmedi'),
                'name' => $item->name,
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
        return view('admin.pages.photo_category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PhotoCategoryStoreRequest $request): \Illuminate\Http\RedirectResponse
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
            while (DB::table('photo_categories')->where("slug->{$code}", $slug)->exists()) {
                $slug = $baseSlug . '-' . $counter;
                $counter++;
            }

            $slugs[$code] = $slug;

            // Resim yüklemesi
            if ($request->hasFile("image.$code")) {
                $images[$code] = $request->file("image.$code")->store('photo_category', 'public2');
            }
        }

        // JSON encode yerine array cast ile doğrudan array olarak kaydediyoruz
        $validated['slug'] = $slugs;
        $validated['image'] = $images;

        PhotoCategory::create($validated);

        return redirect()->back()->with('success', __('Başarıyla Eklendi'));
    }

    /**
     * Display the specified resource.
     */
    public function show(PhotoCategory $photoCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PhotoCategory $photoCategory)
    {
        return view('admin.pages.photo_category.edit', compact('photoCategory'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PhotoCategoryUpdateRequest $request, PhotoCategory $photoCategory)
    {
        $validated = $request->validated();

        $locales = Locale::all();
        $slugs = [];
        $images = [];

        foreach ($locales as $locale) {
            $code = $locale->locale;

            // Ad alınamadıysa önceki değer kullan
            $name = $request->name[$code] ?? $photoCategory->getTranslation('name', $code);

            // Slug oluştur
            $baseSlug = Str::slug($name);
            $slug = $baseSlug;
            $counter = 1;

            // Güncel kayıt hariç diğerlerinde aynı slug var mı kontrol et
            while (PhotoCategory::where("slug->{$code}", $slug)->where('id', '!=', $photoCategory->id)->exists()) {
                $slug = $baseSlug . '-' . $counter;
                $counter++;
            }

            $slugs[$code] = $slug;

            // Resim yüklemesi
            if ($request->hasFile("image.$code")) {
                $images[$code] = $request->file("image.$code")->store('photo_category', 'public2');
            } else {
                $images[$code] = $photoCategory->getTranslation('image', $code);
            }
        }

        $validated['slug'] = $slugs;
        $validated['image'] = $images;

        $photoCategory->update($validated);

        return redirect()->route('admin.photo-categories.edit',$photoCategory)->with('success', __('Başarıyla Güncellendi'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request,$id)
    {
        $photoCategory = PhotoCategory::where('id',$id)->withTrashed()->first();

        $photoIds = Photo::where('photo_category_id',$photoCategory->id)->pluck('id')->toArray();

        if (isset($request->type)){
            if ($request->type == "recycle"){ //geri al
                Photo::where('photo_category_id',$photoCategory->id)
                    ->where('deleted_at','>=',$photoCategory->deleted_at->subMinute())
                    ->where('deleted_at','<=',$photoCategory->deleted_at->addMinute())
                    ->withTrashed()
                    ->restore();
                $photoCategory->restore();

                return redirect()->back()->with('success', __('Başarıyla Geri Alındı'));
            }else{// tamamen sil
                $photos = Photo::whereIn('id',$photoIds)
                    ->withTrashed()
                    ->get();
                $locales = Locale::all();
                foreach ($photos as $photo) {
                    foreach ($locales as $locale) {
                        $imagePath = $photo->getTranslation('image', $locale->locale);

                        if ($imagePath && Storage::disk('public2')->exists($imagePath)) {
                            Storage::disk('public2')->delete($imagePath);// bağlı elemanların kapak resimlerini sunucudan sil
                        }
                    }

                    $photo->forceDelete();// bağlı elemanı veritabanından sil
                }
                foreach ($locales as $locale) {
                    $imagePath = $photoCategory->getTranslation('image', $locale->locale);
                    if ($imagePath && Storage::disk('public2')->exists($imagePath)) {
                        Storage::disk('public2')->delete($imagePath); // kapak resimmini sunucudan sil
                    }
                }

                $photoCategory->forceDelete(); // modeli sil

                return redirect()->back()->with('success', __('Başarıyla Tamamen Silindi'));
            }
        }else{
            Photo::whereIn('id',$photoIds)->delete();
            $photoCategory->delete();

            return redirect()->back()->with('success', __('Başarıyla Silindi'));
        }
    }
}
