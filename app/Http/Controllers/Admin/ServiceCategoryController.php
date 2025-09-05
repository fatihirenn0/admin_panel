<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ServiceCategory\ServiceCategoryStoreRequest;
use App\Http\Requests\ServiceCategory\ServiceCategoryUpdateRequest;
use App\Models\Locale;
use App\Models\Service;
use App\Models\ServiceCategory;
use App\Models\ServiceImage;
use App\Models\ServiceServiceCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ServiceCategoryController extends Controller
{
    public string $roleKey = 'service_category';
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("admin.pages.service_category.index");
    }

    public function ajax(Request $request){

        $query = ServiceCategory::query();

        if ($request->has('trashed'))
            $query = $query->onlyTrashed();

        if($search = $request->input('search.value')){
            $query->where('name', 'like', '%' . $search . '%');
        }

        $orderColumnIndex = $request->input('order.0.column');
        $orderDirection = $request->input('order.0.dir' , 'asc');
        $orderColumnName = $request->input("columns.$orderColumnIndex.data" , 'name');

        $query->orderBy($orderColumnName, $orderDirection);



        $recordsTotal = ServiceCategory::count();
        $recordsFiltered = $query->count();


        $start = $request->input('start' , 0);
        $length = $request->input('length' , 10);
        $items = $query->skip($start)->take($length)->get();


        $data = $items->map(function ($item) use ($request) {
            $editUrl = route('admin.service-categories.edit' , $item);
            $deleteUrl = route('admin.service-categories.destroy' , $item->id);
            $hasMore = ServiceServiceCategory::where('service_category_id', $item->id)->exists();

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
        return view('admin.pages.service_category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ServiceCategoryStoreRequest $request) : \Illuminate\Http\RedirectResponse
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
            while (DB::table('service_categories')->where("slug->{$code}", $slug)->exists()) {
                $slug = $baseSlug . '-' . $counter;
                $counter++;
            }

            $slugs[$code] = $slug;

            // Resim yüklemesi
            if ($request->hasFile("image.$code")) {
                $images[$code] = $request->file("image.$code")->store('service_category', 'public2');
            }
        }

        // JSON encode yerine array cast ile doğrudan array olarak kaydediyoruz
        $validated['slug'] = $slugs;
        $validated['image'] = $images;

        ServiceCategory::create($validated);

        return redirect()->back()->with('success', __('Başarıyla Eklendi'));
    }

    /**
     * Display the specified resource.
     */
    public function show(ServiceCategory $serviceCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ServiceCategory $serviceCategory)
    {
        return view('admin.pages.service_category.edit', compact('serviceCategory'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ServiceCategoryUpdateRequest $request, ServiceCategory $serviceCategory)
    {
        $validated = $request->validated();

        $locales = Locale::all();
        $slugs = [];
        $images = [];

        foreach ($locales as $locale) {
            $code = $locale->locale;

            // Ad alınamadıysa önceki değer kullan
            $name = $request->name[$code] ?? $serviceCategory->getTranslation('name', $code);

            // Slug oluştur
            $baseSlug = Str::slug($name);
            $slug = $baseSlug;
            $counter = 1;

            // Güncel kayıt hariç diğerlerinde aynı slug var mı kontrol et
            while (ServiceCategory::where("slug->{$code}", $slug)->where('id', '!=', $serviceCategory->id)->exists()) {
                $slug = $baseSlug . '-' . $counter;
                $counter++;
            }

            $slugs[$code] = $slug;

            // Resim yüklemesi
            if ($request->hasFile("image.$code")) {
                $images[$code] = $request->file("image.$code")->store('service_category', 'public2');
            } else {
                $images[$code] = $serviceCategory->getTranslation('image', $code);
            }
        }

        $validated['slug'] = $slugs;
        $validated['image'] = $images;

        $serviceCategory->update($validated);

        return redirect()->back()->with('success', __('Başarıyla Güncellendi'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request,$id)
    {
        $serviceCategory = ServiceCategory::where('id',$id)->withTrashed()->first();

        $serviceIds = ServiceServiceCategory::where('service_category_id',$serviceCategory->id)->pluck('service_id')->toArray();
        if (isset($request->type)){
            if ($request->type == "recycle"){ //geri al
                Service::whereIn('id',$serviceIds)
                    ->where('deleted_at','>=',$serviceCategory->deleted_at->subMinute())
                    ->where('deleted_at','<=',$serviceCategory->deleted_at->addMinute())
                    ->withTrashed()
                    ->restore();
                $serviceCategory->restore();

                return redirect()->back()->with('success', __('Başarıyla Geri Alındı'));
            }else{// tamamen sil
                $services = Service::whereIn('id',$serviceIds)
                    ->withTrashed()
                    ->get();
                ServiceServiceCategory::where('service_category_id',$serviceCategory->id)->delete(); //bağlı ilişkileri sil
                $locales = Locale::all();
                foreach ($services as $service) {
                    foreach ($locales as $locale) {
                        $imagePath = $service->getTranslation('image', $locale->locale);

                        if ($imagePath && Storage::disk('public2')->exists($imagePath)) {
                            Storage::disk('public2')->delete($imagePath);// bağlı elemanların kapak resimlerini sunucudan sil
                        }

                        $coverPath = $service->getTranslation('cover', $locale->locale);

                        if ($coverPath && Storage::disk('public2')->exists($coverPath)) {
                            Storage::disk('public2')->delete($coverPath);// bağlı elemanların kapak resimlerini sunucudan sil
                        }
                    }
                    $serviceImages = ServiceImage::where('service_id',$service->id)->get();
                    foreach ($serviceImages as $serviceImage) {
                        if (Storage::disk('public2')->exists($serviceImage->image_url)) {
                            Storage::disk('public2')->delete($serviceImage->image_url);// bağlı elemanların ek resimlerini sunucudan sil
                        }
                        $serviceImage->delete();// bağlı elemanların ek resimlerini veritabanından sil
                    }
                    $service->forceDelete();// bağlı elemanı veritabanından sil
                }
                foreach ($locales as $locale) {
                    $imagePath = $serviceCategory->getTranslation('image', $locale->locale);
                    if ($imagePath && Storage::disk('public2')->exists($imagePath)) {
                        Storage::disk('public2')->delete($imagePath); // kapak resimmini sunucudan sil
                    }

                    $coverPath = $serviceCategory->getTranslation('cover', $locale->locale);
                    if ($coverPath && Storage::disk('public2')->exists($coverPath)) {
                        Storage::disk('public2')->delete($coverPath); // kapak resimmini sunucudan sil
                    }
                }

                $serviceCategory->forceDelete(); // modeli sil

                return redirect()->back()->with('success', __('Başarıyla Tamamen Silindi'));
            }
        }else{
            Service::whereIn('id',$serviceIds)->delete();
            $serviceCategory->delete();

            return redirect()->back()->with('success', __('Başarıyla Silindi'));
        }
    }
}
