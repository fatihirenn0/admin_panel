<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Page\PageUpdateRequest;
use App\Http\Requests\Page\PageStoreRequest;
use App\Models\Locale;
use App\Models\Page;
use App\Models\PageImage;
use App\Services\ImageService;
use App\Services\SlugService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.pages.page.index');
    }

    public function ajax(Request $request)
    {
        $query = Page::query();

        if ($request->has('trashed'))
            $query = $query->onlyTrashed();

        // 🔍 Arama
        if ($search = $request->input('search.value')) {
            $query->where('name->'.session('locale') ?? 'tr', 'like', '%' . $search . '%');
        }

        // 🔢 Sıralama
        $orderColumnIndex = $request->input('order.0.column');
        $orderDirection = $request->input('order.0.dir', 'asc');
        $orderColumnName = $request->input("columns.$orderColumnIndex.data", 'id');

        $query->orderBy($orderColumnName, $orderDirection);

        // 🔁 Toplam kayıtlar
        $recordsTotal = Page::count();
        $recordsFiltered = $query->count();

        // 📄 Sayfalama
        $start = $request->input('start', 0);
        $length = $request->input('length', 10);
        $items = $query->skip($start)->take($length)->get();

        // 🔧 Görsel ve butonları ekleyerek veriyi hazırla
        $data = $items->map(function ($item) use ($request){
            $editUrl = route('admin.pages.edit', $item->id);
            $deleteUrl = route('admin.pages.destroy', $item->id);
            $deleteEvent = 'onclick="checkBeforeDelete('.$item->id.', '.('false').')"';

            return [
                'id' => $item->id,
                'image' => !empty($item->image) ? '<img src="/storage/' . $item->image . '" height="60"/>' : __('Eklenmedi'),
                'name' => mb_substr($item->name,0,80,'UTF-8'),
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
        return view('admin.pages.page.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PageStoreRequest $request)
    {
        $validated = $request->validated();

        $locales = Locale::all();
        $slugs = [];
        $images = [];

        foreach ($locales as $locale) {
            $code = $locale->locale;

            // Slug üretimi
            $slugService = new SlugService();
            $slugs[$code] = $slugService->create('pages',$request,$code);

            // Resim yüklemesi
            $imageService = new ImageService();
            $images[$code] = $imageService->save($code,$request,$slugs[$code],'page','image');
        }

        $validated['slug'] = $slugs;
        $validated['image'] = $images;

        $page = Page::create($validated);

        if (isset($request->images)){
            $pageImages = [];
            foreach ($request->images as $localeId => $images){
                $locale = $locales->where('id', $localeId)->first();
                foreach ($images as $index => $image){
                    if (is_file($image)){
                        $pageImages[] = [
                            'page_id' => $page->id,
                            'locale_id' => $localeId,
                            'image_url' => $image->storeAs('page',Str::slug($page->getTranslation('name',$locale->locale)).'-'.rand(1,999999).'.webp','public2'),
                            'rank' => $request->image_ranks[$localeId][$index],
                            'created_at' => now(),
                            'updated_at' => now(),
                        ];
                    }
                }
            }
            if(count($pageImages))
                PageImage::insert($pageImages);
        }

        return redirect()->back()->with('success', __('Başarıyla Eklendi'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Page $page)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Page $page)
    {
        $pageImages = PageImage::where('page_id',$page->id)->get();
        return view('admin.pages.page.edit', compact(
            'page',
            'pageImages'
        ));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PageUpdateRequest $request, Page $page)
    {
        $validated = $request->validated();

        $locales = Locale::all();
        $slugs = [];
        $images = [];

        foreach ($locales as $locale) {
            $code = $locale->locale;

            // Slug üretimi
            $slugService = new SlugService();
            $slugs[$code] = $slugService->create('pages',$request,$code,$page->id);

            // Resim yükleme
            $imageService = new ImageService();
            $images[$code] = $imageService->save($code,$request,$slugs[$code],'page','image',$page->getTranslation('image',$code));
        }


        $validated['slug'] = $slugs;
        $validated['image'] = $images;

        $page->update($validated);


        $pageImages = PageImage::where('page_id',$page->id)->get();
        if (isset($request->deleted_images)){
            foreach ($pageImages as $pageImage){
                if (in_array($pageImage->image_url,$request->deleted_images)){
                    if (Storage::disk('public2')->exists($pageImage->image_url)){
                        Storage::disk('public2')->delete($pageImage->image_url);
                    }
                    PageImage::where('id',$pageImage->id)->delete();
                }
            }
        }

        if (isset($request->images)){
            $newPageImages = [];
            foreach ($request->images as $localeId => $images){
                $locale = $locales->where('id', $localeId)->first();
                foreach ($images as $index => $image){
                    if (is_file($image)){
                        if (isset($request->old_image_ids[$localeId][$index])){//önceden olan bir resim güncellenmişse
                            $pageImage = $pageImages->where('id',$request->old_image_ids[$localeId][$index])->first();
                            if (Storage::disk('public2')->exists($pageImage->image_url))
                                Storage::disk('public2')->delete($pageImage->image_url);
                            $pageImage->delete();
                        }
                        $newPageImages[] = [
                            'page_id' => $page->id,
                            'locale_id' => $localeId,
                            'image_url' => $image->storeAs('page',Str::slug($page->getTranslation('name',$locale->locale)).'-'.rand(1,999999).'.webp','public2'),
                            'rank' => $request->image_ranks[$localeId][$index],
                            'created_at' => now(),
                            'updated_at' => now(),
                        ];
                    }
                }
            }
            if(count($newPageImages))
                PageImage::insert($newPageImages);
        }

        if (isset($request->old_image_ids)){
            foreach ($request->old_image_ids as $localeId => $oldImageIds){
                foreach ($oldImageIds as $index => $oldImageId){
                    $pageImage = $pageImages->where('id',$oldImageId)->first();
                    $pageImage->rank = $request->image_ranks[$localeId][$index];
                    $pageImage->save();
                }
            }
        }

        return redirect()->back()->with('success', __('Başarıyla Güncellendi'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request,$id)
    {
        if (isset($request->type)){
            if ($request->type == "recycle"){//Geri Al
                Page::where('id',$id)
                    ->withTrashed()
                    ->restore();

                return redirect()->back()->with('success', __('Başarıyla Geri Alındı'));
            }else{//Tamamen sil
                $locales = Locale::all();
                $page = Page::where('id',$id)->withTrashed()->first();
                foreach ($locales as $locale) {
                    $imagePath = $page->getTranslation('image', $locale->locale);

                    if ($imagePath && Storage::disk('public2')->exists($imagePath)) {
                        Storage::disk('public2')->delete($imagePath);// kapak resmini sil
                    }
                }
                $pageImages = PageImage::where('page_id',$page->id)->get();
                foreach ($pageImages as $pageImage) {
                    if (Storage::disk('public2')->exists($pageImage->image_url)) {
                        Storage::disk('public2')->delete($pageImage->image_url); //ek resimlerini sunucudan sil
                    }
                    $pageImage->delete();//ek resimlerini veritabanından sil
                }
                $page->forceDelete(); //modeli sil

                return redirect()->back()->with('success', __('Başarıyla Tamamen Silindi'));
            }
        }else{
            Page::where('id',$id)->withTrashed()->delete(); //modeli soft delete sil

            return redirect()->back()->with('success', __('Başarıyla Silindi'));
        }
    }
}
