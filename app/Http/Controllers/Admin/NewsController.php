<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\News\NewsStoreRequest;
use App\Http\Requests\News\NewsUpdateRequest;
use App\Models\Locale;
use App\Models\News;
use App\Models\NewsCategory;
use App\Models\NewsImage;
use App\Models\NewsNewCategory;
use App\Services\ImageService;
use App\Services\SlugService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class NewsController extends Controller
{
    public string $roleKey = 'news';
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.pages.news.index');
    }

    public function ajax(Request $request)
    {
        $query = News::query();

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
        $recordsTotal = News::count();
        $recordsFiltered = $query->count();

        // 📄 Sayfalama
        $start = $request->input('start', 0);
        $length = $request->input('length', 10);
        $items = $query->skip($start)->take($length)->get();

        $newsCategories = NewsCategory::join('news_news_categories','news_categories.id','=','news_news_categories.news_category_id')
            ->whereIn('news_news_categories.news_id',$items->pluck('id')->toArray())
            ->select('news_categories.*','news_news_categories.news_id')
            ->get();

        // 🔧 Görsel ve butonları ekleyerek veriyi hazırla
        $data = $items->map(function ($item) use ($newsCategories,$request){
            $editUrl = route('admin.news.edit', $item);
            $deleteUrl = route('admin.news.destroy', $item->id);
            $deleteEvent = 'onclick="checkBeforeDelete('.$item->id.', '.('false').')"';
            $categoryName = '';
            foreach ($newsCategories->where('news_id',$item->id) as $index => $newsCategory) {
                $categoryName .= $newsCategory->name . (array_key_last($newsCategories->where('news_id',$item->id)->toArray()) != $index ? ', ' : '');
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
        $newsCategories = NewsCategory::all();
        return view('admin.pages.news.create', compact('newsCategories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(NewsStoreRequest $request)
    {
        $validated = $request->validated();

        $locales = Locale::all();
        $slugs = [];
        $images = [];

        foreach ($locales as $locale) {
            $code = $locale->locale;

            // Slug üretimi
            $slugService = new SlugService();
            $slugs[$code] = $slugService->create('news',$request,$code);

            // Resim yüklemesi
            $imageService = new ImageService();
            $images[$code] = $imageService->save($code,$request,$slugs[$code],'news','image');
        }

        $validated['slug'] = $slugs;
        $validated['image'] = $images;

        $news = News::create($validated);

        $newsCategories = [];
        foreach ($request->input('news_categories',[]) as $newsCategoryId){
            $newsCategories[] = [
                'news_id' => $news->id,
                'news_category_id' => $newsCategoryId,
            ];
        }

        if (count($newsCategories)) {
            NewsNewCategory::insert($newsCategories);
        }

        if (isset($request->images)){
            $newsImages = [];
            foreach ($request->images as $localeId => $images){
                $locale = $locales->where('id', $localeId)->first();
                foreach ($images as $index => $image){
                    if (is_file($image)){
                        $newsImages[] = [
                            'news_id' => $news->id,
                            'locale_id' => $localeId,
                            'image_url' => $image->storeAs('news',Str::slug($news->getTranslation('name',$locale->locale)).'-'.rand(1,999999).'.webp','public2'),
                            'rank' => $request->image_ranks[$localeId][$index],
                            'created_at' => now(),
                            'updated_at' => now(),
                        ];
                    }
                }
            }
            if(count($newsImages))
                NewsImage::insert($newsImages);
        }

        return redirect()->back()->with('success', __('Başarıyla Eklendi'));
    }

    /**
     * Display the specified resource.
     */
    public function show(News $news)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(News $news)
    {
        $newsCategories = NewsCategory::all();
        $newsCategoryIds = NewsNewCategory::where('news_id',$news->id)->pluck('news_category_id')->toArray();
        $newsImages = NewsImage::where('news_id',$news->id)->get();
        return view('admin.pages.news.edit', compact(
            'news',
            'newsCategories',
            'newsCategoryIds',
            'newsImages'
        ));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(NewsUpdateRequest $request, News $news)
    {
        $validated = $request->validated();

        $locales = Locale::all();
        $slugs = [];
        $images = [];

        foreach ($locales as $locale) {
            $code = $locale->locale;

            // Slug üretimi
            $slugService = new SlugService();
            $slugs[$code] = $slugService->create('news',$request,$code,$news->id);

            // Resim yükleme
            $imageService = new ImageService();
            $images[$code] = $imageService->save($code,$request,$slugs[$code],'news','image',$news->getTranslation('image',$code));
        }


        $validated['slug'] = $slugs;
        $validated['image'] = $images;

        $news->update($validated);

        NewsNewCategory::where('news_id',$news->id)->delete();
        $newsCategories = [];
        foreach ($request->input('news_categories',[]) as $newsCategoryId){
            $newsCategories[] = [
                'news_id' => $news->id,
                'news_category_id' => $newsCategoryId,
            ];
        }

        if (count($newsCategories)) {
            NewsNewCategory::insert($newsCategories);
        }

        $newsImages = NewsImage::where('news_id',$news->id)->get();
        if (isset($request->deleted_images)){
            foreach ($newsImages as $newsImage){
                if (in_array($newsImage->image_url,$request->deleted_images)){
                    if (Storage::disk('public2')->exists($newsImage->image_url)){
                        Storage::disk('public2')->delete($newsImage->image_url);
                    }
                    NewsImage::where('id',$newsImage->id)->delete();
                }
            }
        }

        if (isset($request->images)){
            $newNewsImages = [];
            foreach ($request->images as $localeId => $images){
                $locale = $locales->where('id', $localeId)->first();
                foreach ($images as $index => $image){
                    if (is_file($image)){
                        if (isset($request->old_image_ids[$localeId][$index])){//önceden olan bir resim güncellenmişse
                            $newsImage = $newsImages->where('id',$request->old_image_ids[$localeId][$index])->first();
                            if (Storage::disk('public2')->exists($newsImage->image_url))
                                Storage::disk('public2')->delete($newsImage->image_url);
                            $newsImage->delete();
                        }
                        $newNewsImages[] = [
                            'news_id' => $news->id,
                            'locale_id' => $localeId,
                            'image_url' => $image->storeAs('news',Str::slug($news->getTranslation('name',$locale->locale)).'-'.rand(1,999999).'.webp','public2'),
                            'rank' => $request->image_ranks[$localeId][$index],
                            'created_at' => now(),
                            'updated_at' => now(),
                        ];
                    }
                }
            }
            if(count($newNewsImages))
                NewsImage::insert($newNewsImages);
        }

        if (isset($request->old_image_ids)){
            foreach ($request->old_image_ids as $localeId => $oldImageIds){
                foreach ($oldImageIds as $index => $oldImageId){
                    $newsImage = $newsImages->where('id',$oldImageId)->first();
                    $newsImage->rank = $request->image_ranks[$localeId][$index];
                    $newsImage->save();
                }
            }
        }

        return redirect()->route('admin.news.edit',$news)->with('success', __('Başarıyla Güncellendi'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request,$id)
    {
        if (isset($request->type)){
            if ($request->type == "recycle"){//Geri Al
                News::where('id',$id)
                    ->withTrashed()
                    ->restore();

                return redirect()->back()->with('success', __('Başarıyla Geri Alındı'));
            }else{//Tamamen sil
                NewsNewCategory::where('news_id',$id)->delete(); //Kategori ilişkilerini sil
                $locales = Locale::all();
                $news = News::where('id',$id)->withTrashed()->first();
                foreach ($locales as $locale) {
                    $imagePath = $news->getTranslation('image', $locale->locale);

                    if ($imagePath && Storage::disk('public2')->exists($imagePath)) {
                        Storage::disk('public2')->delete($imagePath);// kapak resmini sil
                    }
                }
                $newsImages = NewsImage::where('news_id',$news->id)->get();
                foreach ($newsImages as $newsImage) {
                    if (Storage::disk('public2')->exists($newsImage->image_url)) {
                        Storage::disk('public2')->delete($newsImage->image_url); //ek resimlerini sunucudan sil
                    }
                    $newsImage->delete();//ek resimlerini veritabanından sil
                }
                $news->forceDelete(); //modeli sil

                return redirect()->back()->with('success', __('Başarıyla Tamamen Silindi'));
            }
        }else{
            News::where('id',$id)->withTrashed()->delete(); //modeli soft delete sil

            return redirect()->back()->with('success', __('Başarıyla Silindi'));
        }
    }
}
