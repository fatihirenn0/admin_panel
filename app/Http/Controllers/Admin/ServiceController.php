<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Service\ServiceStoreRequest;
use App\Http\Requests\Service\ServiceUpdateRequest;
use App\Models\Service;
use App\Models\ServiceServiceCategory;
use App\Models\ServiceCategory;
use App\Models\ServiceImage;
use App\Models\Locale;
use App\Services\ImageService;
use App\Services\SlugService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ServiceController extends Controller
{
    public string $roleKey = 'service';
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.pages.service.index');
    }

    public function ajax(Request $request)
    {
        $query = Service::query();

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
        $recordsTotal = Service::count();
        $recordsFiltered = $query->count();

        // 📄 Sayfalama
        $start = $request->input('start', 0);
        $length = $request->input('length', 10);
        $items = $query->skip($start)->take($length)->get();

        $serviceCategories = ServiceCategory::join('service_service_categories','service_categories.id','=','service_service_categories.service_category_id')
            ->whereIn('service_service_categories.service_id',$items->pluck('id')->toArray())
            ->select('service_categories.*','service_service_categories.service_id')
            ->get();

        // 🔧 Görsel ve butonları ekleyerek veriyi hazırla
        $data = $items->map(function ($item) use ($serviceCategories,$request){
            $editUrl = route('admin.services.edit', $item);
            $deleteUrl = route('admin.services.destroy', $item->id);
            $deleteEvent = 'onclick="checkBeforeDelete('.$item->id.', '.('false').')"';
            $categoryName = '';
            foreach ($serviceCategories->where('service_id',$item->id) as $index => $serviceCategory) {
                $categoryName .= $serviceCategory->name . (array_key_last($serviceCategories->where('service_id',$item->id)->toArray()) != $index ? ', ' : '');
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
        $serviceCategories = ServiceCategory::all();
        return view('admin.pages.service.create', compact('serviceCategories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ServiceStoreRequest $request)
    {
        $validated = $request->validated();

        $locales = Locale::all();
        $slugs = [];
        $covers = [];
        $images = [];

        foreach ($locales as $locale) {
            $code = $locale->locale;

            // Slug üretimi
            $slugService = new SlugService();
            $slugs[$code] = $slugService->create('services',$request,$code);

            // Resim yüklemesi
            $imageService = new ImageService();
            $covers[$code] = $imageService->save($code,$request,$slugs[$code],'service','cover');
            $images[$code] = $imageService->save($code,$request,$slugs[$code],'service','image');
        }

        $validated['slug'] = $slugs;
        $validated['cover'] = $covers;
        $validated['image'] = $images;

        $service = Service::create($validated);

        $serviceCategories = [];
        foreach ($request->input('service_categories',[]) as $serviceCategoryId){
            $serviceCategories[] = [
                'service_id' => $service->id,
                'service_category_id' => $serviceCategoryId,
            ];
        }

        if (count($serviceCategories)) {
            ServiceServiceCategory::insert($serviceCategories);
        }

        if (isset($request->images)){
            $serviceImages = [];
            foreach ($request->images as $localeId => $images){
                $locale = $locales->where('id', $localeId)->first();
                foreach ($images as $index => $image){
                    if (is_file($image)){
                        $serviceImages[] = [
                            'service_id' => $service->id,
                            'locale_id' => $localeId,
                            'image_url' => $image->storeAs('service',Str::slug($service->getTranslation('name',$locale->locale)).'-'.rand(1,999999).'.webp','public2'),
                            'rank' => $request->image_ranks[$localeId][$index],
                            'created_at' => now(),
                            'updated_at' => now(),
                        ];
                    }
                }
            }
            if(count($serviceImages))
                ServiceImage::insert($serviceImages);
        }

        return redirect()->back()->with('success', __('Başarıyla Eklendi'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Service $service)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Service $service)
    {
        $serviceCategories = ServiceCategory::all();
        $serviceCategoryIds = ServiceServiceCategory::where('service_id',$service->id)->pluck('service_category_id')->toArray();
        $serviceImages = ServiceImage::where('service_id',$service->id)->get();
        return view('admin.pages.service.edit', compact(
            'service',
            'serviceCategories',
            'serviceCategoryIds',
            'serviceImages'
        ));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ServiceUpdateRequest $request, Service $service)
    {
        $validated = $request->validated();
        $locales = Locale::all();
        $slugs = [];
        $covers = [];
        $images = [];

        foreach ($locales as $locale) {
            $code = $locale->locale;

            // Slug üretimi
            $slugService = new SlugService();
            $slugs[$code] = $slugService->create('services',$request,$code,$service->id);

            // Resim yükleme
            $imageService = new ImageService();
            $covers[$code] = $imageService->save($code,$request,$slugs[$code].'-cover-'.$code,'service','cover',$service->getTranslation('cover',$code));
            $images[$code] = $imageService->save($code,$request,$slugs[$code].'-image-'.$code,'service','image',$service->getTranslation('image',$code));
        }


        $validated['slug'] = $slugs;
        $validated['cover'] = $covers;
        $validated['image'] = $images;

        $service->update($validated);

        ServiceServiceCategory::where('service_id',$service->id)->delete();
        $serviceCategories = [];
        foreach ($request->input('service_categories',[]) as $serviceCategoryId){
            $serviceCategories[] = [
                'service_id' => $service->id,
                'service_category_id' => $serviceCategoryId,
            ];
        }

        if (count($serviceCategories)) {
            ServiceServiceCategory::insert($serviceCategories);
        }

        $serviceImages = ServiceImage::where('service_id',$service->id)->get();
        if (isset($request->deleted_images)){
            foreach ($serviceImages as $serviceImage){
                if (in_array($serviceImage->image_url,$request->deleted_images)){
                    if (Storage::disk('public2')->exists($serviceImage->image_url)){
                        Storage::disk('public2')->delete($serviceImage->image_url);
                    }
                    ServiceImage::where('id',$serviceImage->id)->delete();
                }
            }
        }

        if (isset($request->images)){
            $newServiceImages = [];
            foreach ($request->images as $localeId => $images){
                $locale = $locales->where('id', $localeId)->first();
                foreach ($images as $index => $image){
                    if (is_file($image)){
                        if (isset($request->old_image_ids[$localeId][$index])){//önceden olan bir resim güncellenmişse
                            $serviceImage = $serviceImages->where('id',$request->old_image_ids[$localeId][$index])->first();
                            if (Storage::disk('public2')->exists($serviceImage->image_url))
                                Storage::disk('public2')->delete($serviceImage->image_url);
                            $serviceImage->delete();
                        }
                        $newServiceImages[] = [
                            'service_id' => $service->id,
                            'locale_id' => $localeId,
                            'image_url' => $image->storeAs('service',Str::slug($service->getTranslation('name',$locale->locale)).'-'.rand(1,999999).'.webp','public2'),
                            'rank' => $request->image_ranks[$localeId][$index],
                            'created_at' => now(),
                            'updated_at' => now(),
                        ];
                    }
                }
            }
            if(count($newServiceImages))
                ServiceImage::insert($newServiceImages);
        }

        if (isset($request->old_image_ids)){
            foreach ($request->old_image_ids as $localeId => $oldImageIds){
                foreach ($oldImageIds as $index => $oldImageId){
                    $serviceImage = $serviceImages->where('id',$oldImageId)->first();
                    $serviceImage->rank = $request->image_ranks[$localeId][$index];
                    $serviceImage->save();
                }
            }
        }

        return redirect()->route('admin.services.edit',$service)->with('success', __('Başarıyla Güncellendi'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request,$id)
    {
        if (isset($request->type)){
            if ($request->type == "recycle"){//Geri Al
                Service::where('id',$id)
                    ->withTrashed()
                    ->restore();

                return redirect()->back()->with('success', __('Başarıyla Geri Alındı'));
            }else{//Tamamen sil
                ServiceServiceCategory::where('service_id',$id)->delete(); //Kategori ilişkilerini sil
                $locales = Locale::all();
                $service = Service::where('id',$id)->withTrashed()->first();
                foreach ($locales as $locale) {
                    $imagePath = $service->getTranslation('image', $locale->locale);

                    if ($imagePath && Storage::disk('public2')->exists($imagePath)) {
                        Storage::disk('public2')->delete($imagePath);// kapak resmini sil
                    }
                }
                $serviceImages = ServiceImage::where('service_id',$service->id)->get();
                foreach ($serviceImages as $serviceImage) {
                    if (Storage::disk('public2')->exists($serviceImage->image_url)) {
                        Storage::disk('public2')->delete($serviceImage->image_url); //ek resimlerini sunucudan sil
                    }
                    $serviceImage->delete();//ek resimlerini veritabanından sil
                }
                $service->forceDelete(); //modeli sil

                return redirect()->back()->with('success', __('Başarıyla Tamamen Silindi'));
            }
        }else{
            Service::where('id',$id)->withTrashed()->delete(); //modeli soft delete sil

            return redirect()->back()->with('success', __('Başarıyla Silindi'));
        }
    }
}
