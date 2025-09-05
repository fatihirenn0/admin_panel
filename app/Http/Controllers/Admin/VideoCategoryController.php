<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\VideoCategory\VideoCategoryStoreRequest;
use App\Http\Requests\VideoCategory\VideoCategoryUpdateRequest;
use App\Models\Video;
use App\Models\VideoCategory;
use App\Models\Locale;
use App\Models\VideoVideoCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class VideoCategoryController extends Controller
{
    public string $roleKey = 'video_category';
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.pages.video_category.index');
    }
    public function ajax(Request $request){

        $query = VideoCategory::query();

        if ($request->has('trashed'))
            $query = $query->onlyTrashed();

        if($search = $request->input('search.value')){
            $query->where('name', 'like', '%' . $search . '%');
        }

        $orderColumnIndex = $request->input('order.0.column');
        $orderDirection = $request->input('order.0.dir' , 'asc');
        $orderColumnName = $request->input("columns.$orderColumnIndex.data" , 'name');

        $query->orderBy($orderColumnName, $orderDirection);



        $recordsTotal = VideoCategory::count();
        $recordsFiltered = $query->count();


        $start = $request->input('start' , 0);
        $length = $request->input('length' , 10);
        $items = $query->skip($start)->take($length)->get();


        $data = $items->map(function ($item) use ($request){
            $editUrl = route('admin.video-categories.edit' , $item);
            $deleteUrl = route('admin.video-categories.destroy' , $item->id);
            $hasMore = VideoVideoCategory::where('video_category_id', $item->id)->exists();

            $deleteEvent = 'onclick="checkBeforeDelete('.$item->id.', '.($hasMore ? 'true' : 'false').')"';

            return[
                'id' => $item->id,
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
        return view('admin.pages.video_category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(VideoCategoryStoreRequest $request) : \Illuminate\Http\RedirectResponse
    {
        $validated = $request->validated();

        $locales = Locale::all();
        $slugs = [];

        foreach ($locales as $locale) {
            $code = $locale->locale;

            // Slug üretimi
            $baseSlug = Str::slug($request->name[$code]);
            $slug = $baseSlug;
            $counter = 1;

            // Aynı slug varsa benzersiz hale getir
            while (DB::table('video_categories')->where("slug->{$code}", $slug)->exists()) {
                $slug = $baseSlug . '-' . $counter;
                $counter++;
            }

            $slugs[$code] = $slug;

        }

        // JSON encode yerine array cast ile doğrudan array olarak kaydediyoruz
        $validated['slug'] = $slugs;

        VideoCategory::create($validated);

        return redirect()->back()->with('success', __('Başarıyla Eklendi'));
    }

    /**
     * Display the specified resource.
     */
    public function show(VideoCategory $videoCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(VideoCategory $videoCategory)
    {
        return view('admin.pages.video_category.edit', compact('videoCategory'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(VideoCategoryUpdateRequest $request, VideoCategory $videoCategory)
    {
        $validated = $request->validated();

        $locales = Locale::all();
        $slugs = [];

        foreach ($locales as $locale) {
            $code = $locale->locale;

            // Ad alınamadıysa önceki değer kullan
            $name = $request->name[$code] ?? $videoCategory->getTranslation('name', $code);

            // Slug oluştur
            $baseSlug = Str::slug($name);
            $slug = $baseSlug;
            $counter = 1;

            // Güncel kayıt hariç diğerlerinde aynı slug var mı kontrol et
            while (VideoCategory::where("slug->{$code}", $slug)->where('id', '!=', $videoCategory->id)->exists()) {
                $slug = $baseSlug . '-' . $counter;
                $counter++;
            }

            $slugs[$code] = $slug;

        }

        $validated['slug'] = $slugs;

        $videoCategory->update($validated);

        return redirect()->route('admin.video-categories.edit',$videoCategory)->with('success', __('Başarıyla Güncellendi'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request,$id)
    {
        $videoCategory = VideoCategory::where('id',$id)->withTrashed()->first();

        $videoIds = VideoVideoCategory::where('video_category_id',$videoCategory->id)->pluck('video_id')->toArray();
        if (isset($request->type)){
            if ($request->type == "recycle"){ //geri al
                Video::whereIn('id',$videoIds)
                    ->where('deleted_at','>=',$videoCategory->deleted_at->subMinute())
                    ->where('deleted_at','<=',$videoCategory->deleted_at->addMinute())
                    ->withTrashed()
                    ->restore();
                $videoCategory->restore();

                return redirect()->back()->with('success', __('Başarıyla Geri Alındı'));
            }else{// tamamen sil
                $videos = Video::whereIn('id',$videoIds)
                    ->withTrashed()
                    ->get();
                VideoVideoCategory::where('video_category_id',$videoCategory->id)->delete(); //bağlı ilişkileri sil
                $locales = Locale::all();
                foreach ($videos as $video) {
                    foreach ($locales as $locale) {
                        $imagePath = $video->getTranslation('image', $locale->locale);

                        if ($imagePath && Storage::disk('public2')->exists($imagePath)) {
                            Storage::disk('public2')->delete($imagePath);// bağlı elemanların kapak resimlerini sunucudan sil
                        }
                    }
                    $videoImages = VideoImage::where('video_id',$video->id)->get();
                    foreach ($videoImages as $videoImage) {
                        if (Storage::disk('public2')->exists($videoImage->image_url)) {
                            Storage::disk('public2')->delete($videoImage->image_url);// bağlı elemanların ek resimlerini sunucudan sil
                        }
                        $videoImage->delete();// bağlı elemanların ek resimlerini veritabanından sil
                    }
                    $video->forceDelete();// bağlı elemanı veritabanından sil
                }
                foreach ($locales as $locale) {
                    $imagePath = $videoCategory->getTranslation('image', $locale->locale);
                    if ($imagePath && Storage::disk('public2')->exists($imagePath)) {
                        Storage::disk('public2')->delete($imagePath); // kapak resimmini sunucudan sil
                    }
                }


                $videoCategory->forceDelete(); // modeli sil

                return redirect()->back()->with('success', __('Başarıyla Tamamen Silindi'));
            }
        }else{
            Video::whereIn('id',$videoIds)->delete();
            $videoCategory->delete();

            return redirect()->back()->with('success', __('Başarıyla Silindi'));
        }
    }
}
