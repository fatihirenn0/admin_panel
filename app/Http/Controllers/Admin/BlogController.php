<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Blog\BlogStoreRequest;
use App\Http\Requests\Blog\BlogUpdateRequest;
use App\Models\Blog;
use App\Models\BlogBlogCategory;
use App\Models\BlogCategory;
use App\Models\BlogImage;
use App\Models\Locale;
use App\Services\ImageService;
use App\Services\SlugService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.pages.blog.index');
    }

    public function ajax(Request $request)
    {
        $query = Blog::query();

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
        $recordsTotal = Blog::count();
        $recordsFiltered = $query->count();

        // 📄 Sayfalama
        $start = $request->input('start', 0);
        $length = $request->input('length', 10);
        $items = $query->skip($start)->take($length)->get();

        $blogCategories = BlogCategory::join('blog_blog_categories','blog_categories.id','=','blog_blog_categories.blog_category_id')
            ->whereIn('blog_blog_categories.blog_id',$items->pluck('id')->toArray())
            ->select('blog_categories.*','blog_blog_categories.blog_id')
            ->get();

        // 🔧 Görsel ve butonları ekleyerek veriyi hazırla
        $data = $items->map(function ($item) use ($blogCategories,$request){
            $editUrl = route('admin.blogs.edit', $item);
            $deleteUrl = route('admin.blogs.destroy', $item);
            $deleteEvent = 'onclick="checkBeforeDelete('.$item->id.', '.('false').')"';
            $categoryName = '';
            foreach ($blogCategories->where('blog_id',$item->id) as $index => $blogCategory) {
                $categoryName .= $blogCategory->name . (array_key_last($blogCategories->where('blog_id',$item->id)->toArray()) != $index ? ', ' : '');
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
        $blogCategories = BlogCategory::all();
        return view('admin.pages.blog.create', compact('blogCategories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BlogStoreRequest $request)
    {
        $validated = $request->validated();

        $locales = Locale::all();
        $slugs = [];
        $images = [];

        foreach ($locales as $locale) {
            $code = $locale->locale;

            // Slug üretimi
            $slugService = new SlugService();
            $slugs[$code] = $slugService->create('blogs',$request,$code);

            // Resim yüklemesi
            $imageService = new ImageService();
            $images[$code] = $imageService->save($code,$request,$slugs[$code],'blog','image');
        }

        $validated['slug'] = $slugs;
        $validated['image'] = $images;

        $blog = Blog::create($validated);

        $blogCategories = [];
        foreach ($request->input('blog_categories',[]) as $blogCategoryId){
            $blogCategories[] = [
                'blog_id' => $blog->id,
                'blog_category_id' => $blogCategoryId,
            ];
        }

        if (count($blogCategories)) {
            BlogBlogCategory::insert($blogCategories);
        }

        if (isset($request->images)){
            $blogImages = [];
            foreach ($request->images as $localeId => $images){
                $locale = $locales->where('id', $localeId)->first();
                foreach ($images as $index => $image){
                    if (is_file($image)){
                        $blogImages[] = [
                            'blog_id' => $blog->id,
                            'locale_id' => $localeId,
                            'image_url' => $image->storeAs('blog',Str::slug($blog->getTranslation('name',$locale->locale)).'-'.rand(1,999999).'.webp','public2'),
                            'rank' => $request->image_ranks[$localeId][$index],
                            'created_at' => now(),
                            'updated_at' => now(),
                        ];
                    }
                }
            }
            if(count($blogImages))
                BlogImage::insert($blogImages);
        }

        return redirect()->back()->with('success', __('Başarıyla Eklendi'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Blog $blog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Blog $blog)
    {
        $blogCategories = BlogCategory::all();
        $blogCategoryIds = BlogBlogCategory::where('blog_id',$blog->id)->pluck('blog_category_id')->toArray();
        $blogImages = BlogImage::where('blog_id',$blog->id)->get();
        return view('admin.pages.blog.edit', compact(
            'blog',
            'blogCategories',
            'blogCategoryIds',
            'blogImages'
        ));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BlogUpdateRequest $request, Blog $blog)
    {
        $validated = $request->validated();

        $locales = Locale::all();
        $slugs = [];
        $images = [];

        foreach ($locales as $locale) {
            $code = $locale->locale;

            // Slug üretimi
            $slugService = new SlugService();
            $slugs[$code] = $slugService->create('blogs',$request,$code,$blog->id);

            // Resim yükleme
            $imageService = new ImageService();
            $images[$code] = $imageService->save($code,$request,$slugs[$code],'blog','image',$blog->getTranslation('image',$code));
        }


        $validated['slug'] = $slugs;
        $validated['image'] = $images;

        $blog->update($validated);

        BlogBlogCategory::where('blog_id',$blog->id)->delete();
        $blogCategories = [];
        foreach ($request->input('blog_categories',[]) as $blogCategoryId){
            $blogCategories[] = [
                'blog_id' => $blog->id,
                'blog_category_id' => $blogCategoryId,
            ];
        }

        if (count($blogCategories)) {
            BlogBlogCategory::insert($blogCategories);
        }

        $blogImages = BlogImage::where('blog_id',$blog->id)->get();
        $deleteBlogImageIds = [];
        if (isset($request->deleted_images)){
            foreach ($blogImages as $blogImage){
                if (in_array($blogImage->image_url,$request->deleted_images)){
                    if (Storage::disk('public2')->exists($blogImage->image_url)){
                        Storage::disk('public2')->delete($blogImage->image_url);
                    }
                    $deleteBlogImageIds[] = $blogImage->id;
                }
            }
        }

        if (isset($request->images)){
            $newBlogImages = [];
            foreach ($request->images as $localeId => $images){
                $locale = $locales->where('id', $localeId)->first();
                foreach ($images as $index => $image){
                    if (is_file($image)){
                        if (isset($request->old_image_ids[$localeId][$index])){//önceden olan bir resim güncellenmişse
                            $blogImage = $blogImages->where('id',$request->old_image_ids[$localeId][$index])->first();
                            if (Storage::disk('public2')->exists($blogImage->image_url))
                                Storage::disk('public2')->delete($blogImage->image_url);
                            $deleteBlogImageIds[] = $blogImage->id;
                        }
                        $newBlogImages[] = [
                            'blog_id' => $blog->id,
                            'locale_id' => $localeId,
                            'image_url' => $image->storeAs('blog',Str::slug($blog->getTranslation('name',$locale->locale)).'-'.rand(1,999999).'.webp','public2'),
                            'rank' => $request->image_ranks[$localeId][$index],
                            'created_at' => now(),
                            'updated_at' => now(),
                        ];
                    }
                }
            }
            if(count($newBlogImages))
                BlogImage::insert($newBlogImages);
        }

        if (count($deleteBlogImageIds)) {
            BlogImage::whereIn('id', $deleteBlogImageIds)->delete();
        }
        if (isset($request->old_image_ids)){
            foreach ($request->old_image_ids as $localeId => $oldImageIds){
                foreach ($oldImageIds as $index => $oldImageId){
                    $blogImage = $blogImages->where('id',$oldImageId)->first();
                    if ($blogImage){
                        $blogImage->rank = $request->image_ranks[$localeId][$index];
                        $blogImage->save();
                    }
                }
            }
        }

        return redirect()->route('admin.blogs.edit',$blog)->with('success', __('Başarıyla Güncellendi'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request,$slug)
    {
        if (isset($request->type)){
            if ($request->type == "recycle"){//Geri Al
                Blog::where('slug->'.app()->getLocale(),$slug)
                    ->withTrashed()
                    ->restore();

                return redirect()->back()->with('success', __('Başarıyla Geri Alındı'));
            }else{//Tamamen sil
                $blog = Blog::where('slug->'.app()->getLocale(),$slug)->withTrashed()->first();
                BlogBlogCategory::where('blog_id',$blog->id)->delete(); //Kategori ilişkilerini sil
                $locales = Locale::all();

                foreach ($locales as $locale) {
                    $imagePath = $blog->getTranslation('image', $locale->locale);

                    if ($imagePath && Storage::disk('public2')->exists($imagePath)) {
                        Storage::disk('public2')->delete($imagePath);// kapak resmini sil
                    }
                }
                $blogImages = BlogImage::where('blog_id',$blog->id)->get();
                foreach ($blogImages as $blogImage) {
                    if (Storage::disk('public2')->exists($blogImage->image_url)) {
                        Storage::disk('public2')->delete($blogImage->image_url); //ek resimlerini sunucudan sil
                    }
                    $blogImage->delete();//ek resimlerini veritabanından sil
                }
                $blog->forceDelete(); //modeli sil

                return redirect()->back()->with('success', __('Başarıyla Tamamen Silindi'));
            }
        }else{
            Blog::where('slug->'.app()->getLocale(),$slug)->withTrashed()->delete(); //modeli soft delete sil

            return redirect()->back()->with('success', __('Başarıyla Silindi'));
        }
    }
}
