<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Blog\BlogStoreRequest;
use App\Http\Requests\Blog\BlogUpdateRequest;
use App\Models\Blog;
use App\Models\BlogBlogCategory;
use App\Models\BlogCategory;
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
        $data = $items->map(function ($item) use ($blogCategories){
            $editUrl = route('admin.blogs.edit', $item->id);
            $deleteUrl = route('admin.blogs.destroy', $item->id);
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
        return view('admin.pages.blog.edit', compact('blog', 'blogCategories','blogCategoryIds'));
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

        return redirect()->back()->with('success', __('Başarıyla Güncellendi'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blog $blog)
    {
        //
    }
}
