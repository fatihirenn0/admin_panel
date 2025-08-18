<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProjectCategory\ProjectCategoryStoreRequest;
use App\Http\Requests\ProjectCategory\ProjectCategoryUpdateRequest;
use App\Models\Locale;
use App\Models\Project;
use App\Models\ProjectCategory;
use App\Models\ProjectImage;
use App\Models\ProjectProjectCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
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

        if ($request->has('trashed'))
            $query = $query->onlyTrashed();

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


        $data = $items->map(function ($item)  use ($request){


            $editUrl = route('admin.project-categories.edit' , $item->id);
            $deleteUrl = route('admin.project-categories.destroy' , $item->id);

            $hasMore = ProjectProjectCategory::where('project_category_id', $item->id)->exists();

            $deleteEvent = 'onclick="checkBeforeDelete('.$item->id.', '.($hasMore ? 'true' : 'false').')"';

            return[
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
    public function destroy(Request $request,$id)
    {
        $projectCategory = ProjectCategory::where('id',$id)->withTrashed()->first();

        $projectIds = ProjectProjectCategory::where('project_category_id',$projectCategory->id)->pluck('project_id')->toArray();
        if (isset($request->type)){
            if ($request->type == "recycle"){ //geri al
                Project::whereIn('id',$projectIds)
                    ->where('deleted_at','>=',$projectCategory->deleted_at->subMinute())
                    ->where('deleted_at','<=',$projectCategory->deleted_at->addMinute())
                    ->withTrashed()
                    ->restore();
                $projectCategory->restore();

                return redirect()->back()->with('success', __('Başarıyla Geri Alındı'));
            }else{// tamamen sil
                $projects = Project::whereIn('id',$projectIds)
                    ->withTrashed()
                    ->get();
                ProjectProjectCategory::where('project_category_id',$projectCategory->id)->delete(); //bağlı ilişkileri sil
                $locales = Locale::all();
                foreach ($projects as $project) {
                    foreach ($locales as $locale) {
                        $imagePath = $project->getTranslation('image', $locale->locale);

                        if ($imagePath && Storage::disk('public2')->exists($imagePath)) {
                            Storage::disk('public2')->delete($imagePath);// bağlı elemanların kapak resimlerini sunucudan sil
                        }
                    }
                    $projectImages = ProjectImage::where('project_id',$project->id)->get();
                    foreach ($projectImages as $projectImage) {
                        if (Storage::disk('public2')->exists($projectImage->image_url)) {
                            Storage::disk('public2')->delete($projectImage->image_url);// bağlı elemanların ek resimlerini sunucudan sil
                        }
                        $projectImage->delete();// bağlı elemanların ek resimlerini veritabanından sil
                    }
                    $project->forceDelete();// bağlı elemanı veritabanından sil
                }
                foreach ($locales as $locale) {
                    $imagePath = $projectCategory->getTranslation('image', $locale->locale);
                    if ($imagePath && Storage::disk('public2')->exists($imagePath)) {
                        Storage::disk('public2')->delete($imagePath); // kapak resimmini sunucudan sil
                    }
                }


                $projectCategory->forceDelete(); // modeli sil

                return redirect()->back()->with('success', __('Başarıyla Tamamen Silindi'));
            }
        }else{
            Project::whereIn('id',$projectIds)->delete();
            $projectCategory->delete();

            return redirect()->back()->with('success', __('Başarıyla Silindi'));
        }
    }
}
