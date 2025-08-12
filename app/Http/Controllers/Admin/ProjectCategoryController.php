<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProjectCategory\ProjectCategoryStoreRequest;
use App\Http\Requests\ProjectCategory\ProjectCategoryUpdateRequest;
use App\Models\Locale;
use App\Models\ProjectCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProjectCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.pages.project_category.index');
    }

    public function ajax(Request $request){

        $query = ProjectCategory::query();

        if($search = $request->input('search.value')){
            $query->where('name', 'like', '%' . $search . '%');
        }

        $orderColumnIndex = $request->input('order.0.column');
        $orderDirection = $request->input('order.0.dir' , 'asc');
        $orderColumnName = $request->input("columns.$orderColumnIndex.data" , 'name');

        $query->orderBy($orderColumnName, $orderDirection);



        $recordsTotal = ProjectCategory::count();
        $recordsFiltered = $query->count();


        $start = $request->input('start' , 0);
        $length = $request->input('length' , 10);
        $items = $query->skip($start)->take($length)->get();


        $data = $items->map(function ($item) {


            $editUrl = route('admin.project-categories.edit' , $item->id);
            $deleteUrl = route('admin.project-categories.destroy' , $item->id);

            return[
                'id' => $item->id,
                'image' => !empty($item->image) ? '<img src="/storage/' . $item->image . '" height="60"/>' : __('Eklenmedi'),
                'name' => $item->name,
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
        return view('admin.pages.project_category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProjectCategoryStoreRequest $request): \Illuminate\Http\RedirectResponse
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
            while (DB::table('project_categories')->where("slug->{$code}", $slug)->exists()) {
                $slug = $baseSlug . '-' . $counter;
                $counter++;
            }

            $slugs[$code] = $slug;

            // Resim yüklemesi
            if ($request->hasFile("image.$code")) {
                $images[$code] = $request->file("image.$code")->store('project_category', 'public2');
            }
        }

        // JSON encode yerine array cast ile doğrudan array olarak kaydediyoruz
        $validated['slug'] = $slugs;
        $validated['image'] = $images;

        ProjectCategory::create($validated);

        return redirect()->back()->with('success', __('Başarıyla Eklendi'));
    }

    /**
     * Display the specified resource.
     */
    public function show(ProjectCategory $projectCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ProjectCategory $projectCategory)
    {
        return view('admin.pages.project_category.edit', compact('projectCategory'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProjectCategoryUpdateRequest $request, ProjectCategory $projectCategory)
    {
        $validated = $request->validated();

        $locales = Locale::all();
        $slugs = [];
        $images = [];

        foreach ($locales as $locale) {
            $code = $locale->locale;

            // Ad alınamadıysa önceki değer kullan
            $name = $request->name[$code] ?? $projectCategory->getTranslation('name', $code);

            // Slug oluştur
            $baseSlug = Str::slug($name);
            $slug = $baseSlug;
            $counter = 1;

            // Güncel kayıt hariç diğerlerinde aynı slug var mı kontrol et
            while (ProjectCategory::where("slug->{$code}", $slug)->where('id', '!=', $projectCategory->id)->exists()) {
                $slug = $baseSlug . '-' . $counter;
                $counter++;
            }

            $slugs[$code] = $slug;

            // Resim yüklemesi
            if ($request->hasFile("image.$code")) {
                $images[$code] = $request->file("image.$code")->store('project_category', 'public2');
            } else {
                $images[$code] = $projectCategory->getTranslation('image', $code);
            }
        }

        $validated['slug'] = $slugs;
        $validated['image'] = $images;

        $projectCategory->update($validated);

        return redirect()->back()->with('success', __('Başarıyla Güncellendi'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProjectCategory $projectCategory)
    {
        //
    }
}
