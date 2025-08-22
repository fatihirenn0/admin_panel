<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Photo\PhotoStoreRequest;
use App\Http\Requests\PhotoCategory\PhotoCategoryUpdateRequest;
use App\Models\Locale;
use App\Models\Photo;
use App\Models\PhotoCategory;
use App\Services\ImageService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;use Illuminate\Support\Str;

class PhotoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("admin.pages.photo.index");
    }
    public function ajax(Request $request)
    {
        $query = Photo::query();

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
        $recordsTotal = Photo::count();
        $recordsFiltered = $query->count();

        // 📄 Sayfalama
        $start = $request->input('start', 0);
        $length = $request->input('length', 10);
        $items = $query->skip($start)->take($length)->get();

        $photoCategories = PhotoCategory::join('photos', 'photo_categories.id', '=', 'photos.photo_category_id')
            ->whereIn('photos.id', $items->pluck('id')->toArray())
            ->select('photo_categories.*', 'photos.id as photo_id')
            ->get();

        // 🔧 Görsel ve butonları ekleyerek veriyi hazırla
        $data = $items->map(function ($item) use ($photoCategories){
            $editUrl = route('admin.photos.edit', $item->id);
            $deleteUrl = route('admin.photos.destroy', $item->id);
            $categoryName = '';
            foreach ($photoCategories->where('photo_id',$item->id) as $index => $photoCategory) {
                $categoryName  .= $photoCategory->name . (array_key_last($photoCategories->where('photo_id',$item->id)->toArray()) != $index ? ', ' : '');
            }

            return [
                'id' => $item->id,
                'image' => !empty($item->image) ? '<img src="/storage/' . $item->image . '" height="60"/>' : __('Eklenmedi'),
                'name' => mb_substr($item->name,0,80,'UTF-8'),
                'photo_category_id' => e($categoryName),
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
        $photoCategories = PhotoCategory::all();
        return view("admin.pages.photo.create" , compact('photoCategories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PhotoStoreRequest $request): \Illuminate\Http\RedirectResponse
    {
        $validated = $request->validated();

        $locales = Locale::all();
        $images = [];
        foreach ($locales as $locale) {
            $code = $locale->locale;

            // Resim yüklemesi
            $imageService = new ImageService();
            $images[$code] = $imageService->save($code,$request,Str::slug($request->name[$code]).'-'.rand(1,9999),'image');
        }

        $validated['image'] = $images;
        $photo = Photo::create($validated);



        return redirect()->back()->with('success', __('Başarıyla Eklendi'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Photo $photo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Photo $photo)
    {
        $photoCategories = PhotoCategory::all();
        return view("admin.pages.photo.edit" , compact('photo' , 'photoCategories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PhotoCategoryUpdateRequest $request, Photo $photo)
    {
        $validated = $request->validated();

        $locales = Locale::all();
        $images = [];
        foreach ($locales as $locale) {
            $code = $locale->locale;

            // Resim yüklemesi
            $imageService = new ImageService();
            $images[$code] = $imageService->save($code,$request,Str::slug($request->name[$code]).'-'.rand(1,9999),'image');
        }

        $validated['image'] = $images;
        $photo->update($validated);

        return redirect()->back()->with('success', __('Başarıyla Güncellendi'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Photo $photo)
    {
        //
    }
}
