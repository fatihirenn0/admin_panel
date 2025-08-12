<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\BlogCategory\AnnouncementStoreRequest;
use App\Http\Requests\BlogCategory\AnnouncementUpdateRequest;
use App\Http\Requests\BlogCategory\BlogCategoryStoreRequest;
use App\Http\Requests\BlogCategory\BlogCategoryUpdateRequest;
use App\Models\Blog;
use App\Models\BlogBlogCategory;
use App\Models\BlogCategory;
use App\Models\BlogImage;
use App\Models\Locale;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class BlogCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.pages.blog_category.index');
    }

    public function ajax(Request $request)
    {
        $query = BlogCategory::query();

        if ($request->has('trashed'))
            $query = $query->onlyTrashed();

        // 🔍 Arama
        if ($search = $request->input('search.value')) {
            $query->where('name', 'like', '%' . $search . '%');
        }

        // 🔢 Sıralama
        $orderColumnIndex = $request->input('order.0.column');
        $orderDirection = $request->input('order.0.dir', 'asc');
        $orderColumnName = $request->input("columns.$orderColumnIndex.data", 'id');

        $query->orderBy($orderColumnName, $orderDirection);

        // 🔁 Toplam kayıtlar
        $recordsTotal = BlogCategory::count();
        $recordsFiltered = $query->count();

        // 📄 Sayfalama
        $start = $request->input('start', 0);
        $length = $request->input('length', 10);
        $items = $query->skip($start)->take($length)->get();

        // 🔧 Görsel ve butonları ekleyerek veriyi hazırla
        $data = $items->map(function ($item) use ($request){
            $editUrl = route('admin.blog-categories.edit', $item->id);
            $deleteUrl = route('admin.blog-categories.destroy', $item->id);
            $hasMore = BlogBlogCategory::where('blog_category_id', $item->id)->exists();

            $deleteEvent = 'onclick="checkBeforeDelete('.$item->id.', '.($hasMore ? 'true' : 'false').')"';

            return [
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
        return view('admin.pages.blog_category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BlogCategoryStoreRequest $request): \Illuminate\Http\RedirectResponse
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
            while (DB::table('blog_categories')->where("slug->{$code}", $slug)->exists()) {
                $slug = $baseSlug . '-' . $counter;
                $counter++;
            }

            $slugs[$code] = $slug;

            // Resim yüklemesi
            if ($request->hasFile("image.$code")) {
                $images[$code] = $request->file("image.$code")->store('blog_category', 'public2');
            }
        }

        // JSON encode yerine array cast ile doğrudan array olarak kaydediyoruz
        $validated['slug'] = $slugs;
        $validated['image'] = $images;

        BlogCategory::create($validated);

        return redirect()->back()->with('success', __('Başarıyla Eklendi'));
    }


    /**
     * Display the specified resource.
     */
    public function show(BlogCategory $blogCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BlogCategory $blogCategory)
    {
        return view('admin.pages.blog_category.edit', compact('blogCategory'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BlogCategoryUpdateRequest $request, BlogCategory $blogCategory)
    {
        $validated = $request->validated();

        $locales = Locale::all();
        $slugs = [];
        $images = [];

        foreach ($locales as $locale) {
            $code = $locale->locale;

            // Ad alınamadıysa önceki değer kullan
            $name = $request->name[$code] ?? $blogCategory->getTranslation('name', $code);

            // Slug oluştur
            $baseSlug = Str::slug($name);
            $slug = $baseSlug;
            $counter = 1;

            // Güncel kayıt hariç diğerlerinde aynı slug var mı kontrol et
            while (BlogCategory::where("slug->{$code}", $slug)->where('id', '!=', $blogCategory->id)->exists()) {
                $slug = $baseSlug . '-' . $counter;
                $counter++;
            }

            $slugs[$code] = $slug;

            // Resim yüklemesi
            if ($request->hasFile("image.$code")) {
                $images[$code] = $request->file("image.$code")->store('blog_category', 'public2');
            } else {
                $images[$code] = $blogCategory->getTranslation('image', $code);
            }
        }

        $validated['slug'] = $slugs;
        $validated['image'] = $images;

        $blogCategory->update($validated);

        return redirect()->back()->with('success', __('Başarıyla Güncellendi'));
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request,$id)
    {
        $blogCategory = BlogCategory::where('id',$id)->withTrashed()->first();

        $blogIds = BlogBlogCategory::where('blog_category_id',$blogCategory->id)->pluck('blog_id')->toArray();
        if (isset($request->type)){
            if ($request->type == "recycle"){
                Blog::whereIn('id',$blogIds)
                    ->where('deleted_at','>=',$blogCategory->deleted_at->subMinute())
                    ->where('deleted_at','<=',$blogCategory->deleted_at->addMinute())
                    ->withTrashed()
                    ->restore();
                $blogCategory->restore();

                return redirect()->back()->with('success', __('Başarıyla Geri Alındı'));
            }else{
                $blogs = Blog::whereIn('id',$blogIds)
                    ->withTrashed()
                    ->get();
                BlogBlogCategory::where('blog_category_id',$blogCategory->id)->delete();
                $locales = Locale::all();
                foreach ($blogs as $blog) {
                    foreach ($locales as $locale) {
                        $imagePath = $blog->getTranslation('image', $locale->locale);

                        if ($imagePath && Storage::disk('public2')->exists($imagePath)) {
                            Storage::disk('public2')->delete($imagePath);
                        }
                    }
                    $blogImages = BlogImage::where('blog_id',$blog->id)->get();
                    foreach ($blogImages as $blogImage) {
                        if (Storage::disk('public2')->exists($blogImage->image_url)) {
                            Storage::disk('public2')->delete($blogImage->image_url);
                        }
                        $blogImage->delete();
                    }
                    $blog->forceDelete();
                }
                foreach ($locales as $locale) {
                    $imagePath = $blogCategory->getTranslation('image', $locale->locale);
                    if ($imagePath && Storage::disk('public2')->exists($imagePath)) {
                        Storage::disk('public2')->delete($imagePath);
                    }
                }


                $blogCategory->forceDelete();

                return redirect()->back()->with('success', __('Başarıyla Tamamen Silindi'));
            }
        }else{
            Blog::whereIn('id',$blogIds)->delete();
            $blogCategory->delete();

            return redirect()->back()->with('success', __('Başarıyla Silindi'));
        }
    }
}
