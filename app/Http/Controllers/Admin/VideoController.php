<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Video\VideoStoreRequest;
use App\Http\Requests\Video\VideoUpdateRequest;
use App\Models\Video;
use App\Models\VideoCategory;
use App\Models\VideoVideoCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.pages.video.index');
    }
    public function ajax(Request $request){

        $query = Video::query();

        if($search = $request->input('search.value')){
            $query->where('title', 'like', '%' . $search . '%');
        }

        $orderColumnIndex = $request->input('order.0.column');
        $orderDirection = $request->input('order.0.dir' , 'asc');
        $orderColumnName = $request->input("columns.$orderColumnIndex.data" , 'title');

        $query->orderBy($orderColumnName, $orderDirection);



        $recordsTotal = Video::count();
        $recordsFiltered = $query->count();


        $start = $request->input('start' , 0);
        $length = $request->input('length' , 10);
        $items = $query->skip($start)->take($length)->get();

        $data = $items->map(function ($item) {
            $editUrl = route('admin.videos.edit' , $item->id);
            $deleteUrl = route('admin.videos.destroy' , $item->id);

            return [
                'id' => $item->id,
                'title' => $item->title,
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
        $videoCategories = VideoCategory::all();
        return view('admin.pages.video.create' , compact('videoCategories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(VideoStoreRequest $request , Video $video) : \Illuminate\Http\RedirectResponse
    {
        $validated = $request->validated();

        $validated['video_url'] = $request->file('video_url')->store('videos', 'public2');

        $video = Video::create($validated);

        if($request->video_categories){
            foreach ($request->video_categories as $videoCategory){
                $videoVideoCategory = new VideoVideoCategory();
                $videoVideoCategory->video_id = $video->id;
                $videoVideoCategory->video_category_id = $videoCategory;
                $videoVideoCategory->save();

            }

        }

        return redirect()->back()->with('success', __('Başarıyla Eklendi'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Video $video)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Video $video)
    {
        $videoCategories = VideoCategory::all();
        $videoVideoCategories = VideoVideoCategory::where('video_id',$video->id)->pluck('video_category_id')->toArray();
        return view('admin.pages.video.edit' , compact(
            'video',
            'videoCategories',
            'videoVideoCategories'
        ));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(VideoUpdateRequest $request, Video $video)
    {
        $validated = $request->validated();

        // Yeni video dosyası geldiyse: eskisini sil, yenisini kaydet
        if ($request->hasFile('video_url')) {
            if ($video->getRawOriginal('video_url')) {
                Storage::disk('public2')->delete($video->getRawOriginal('video_url'));
            }
            $validated['video_url'] = $request->file('video_url')->store('videos', 'public2');
        } else {
            // Dosya gelmediyse mevcut video_url'ü KORU
            unset($validated['video_url']);
        }

        // Mass assignment ile kalan alanları (title dahil) doldur
        $video->fill($validated);

        // Tüm değişiklikleri kalıcı yap
        $video->save();

        VideoVideoCategory::where('video_id',$video)->delete();
        if ($request->video_category_id){
            $videoVideoCategory = new VideoVideoCategory();
            $videoVideoCategory->video_id = $video->id;
            $videoVideoCategory->video_category_id = $request->video_category_id;
            $videoVideoCategory->save();
        }

        return redirect()->back()->with('success', __('Başarıyla Güncellendi'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Video $video)
    {
        //
    }
}
