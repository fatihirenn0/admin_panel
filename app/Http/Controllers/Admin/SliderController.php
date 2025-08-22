<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Slider\SliderStoreRequest;
use App\Http\Requests\Slider\SliderUpdateRequest;
use App\Models\Locale;
use App\Models\Slider;
use App\Services\ImageService;
use App\Services\SlugService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.pages.slider.index');
    }

    public function ajax(Request $request)
    {
        $query = Slider::query();

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
        $recordsTotal = Slider::count();
        $recordsFiltered = $query->count();

        // 📄 Sayfalama
        $start = $request->input('start', 0);
        $length = $request->input('length', 10);
        $items = $query->skip($start)->take($length)->get();

        // 🔧 Görsel ve butonları ekleyerek veriyi hazırla
        $data = $items->map(function ($item) use ($request){
            $editUrl = route('admin.sliders.edit', $item->id);
            $deleteUrl = route('admin.sliders.destroy', $item->id);
            $deleteEvent = 'onclick="checkBeforeDelete('.$item->id.', '.('false').')"';

            return [
                'id' => $item->id,
                'image' => !empty($item->file_url) ? '<img src="/storage/' . $item->file_url . '" height="60"/>' : __('Eklenmedi'),
                'name' => mb_substr($item->title,0,80,'UTF-8'),
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
        return view('admin.pages.slider.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SliderStoreRequest $request)
    {

        $validated = $request->validated();

        $locales = Locale::all();
        $images = [];

        foreach ($locales as $locale) {
            $code = $locale->locale;

            // Resim yüklemesi
            $imageService = new ImageService();
            $images[$code] = $imageService->save($code,$request,Str::slug($request->title[$code] ?? Str::random(10)),'slider','file_url');
        }

        $validated['file_url'] = $images;

        $slider = Slider::create($validated);
        return redirect()->back()->with('success', __('Başarıyla Eklendi'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Slider $slider)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Slider $slider)
    {
        return view('admin.pages.slider.edit', compact(
            'slider'
        ));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SliderUpdateRequest $request, Slider $slider)
    {
        $validated = $request->validated();

        $locales = Locale::all();
        $images = [];

        foreach ($locales as $locale) {
            $code = $locale->locale;

            // Resim yükleme
            $imageService = new ImageService();
            $images[$code] = $imageService->save($code,$request,Str::slug($request->title[$code] ?? Str::random(10)),'slider','file_url',$slider->getTranslation('file_url',$code));
        }

        $validated['file_url'] = $images;

        $slider->update($validated);

        return redirect()->back()->with('success', __('Başarıyla Güncellendi'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request,$id)
    {
        if (isset($request->type)){
            if ($request->type == "recycle"){//Geri Al
                Slider::where('id',$id)
                    ->withTrashed()
                    ->restore();

                return redirect()->back()->with('success', __('Başarıyla Geri Alındı'));
            }else{//Tamamen sil
                $locales = Locale::all();
                $slider = Slider::where('id',$id)->withTrashed()->first();
                foreach ($locales as $locale) {
                    $imagePath = $slider->getTranslation('file_url', $locale->locale);

                    if ($imagePath && Storage::disk('public2')->exists($imagePath)) {
                        Storage::disk('public2')->delete($imagePath);// kapak resmini sil
                    }
                }
                $slider->forceDelete(); //modeli sil

                return redirect()->back()->with('success', __('Başarıyla Tamamen Silindi'));
            }
        }else{
            Slider::where('id',$id)->withTrashed()->delete(); //modeli soft delete sil

            return redirect()->back()->with('success', __('Başarıyla Silindi'));
        }
    }
}
