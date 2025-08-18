<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Project\ProjectStoreRequest;
use App\Http\Requests\Project\ProjectUpdateRequest;
use App\Models\Locale;
use App\Models\Project;
use App\Models\ProjectCategory;
use App\Models\ProjectImage;
use App\Models\ProjectProjectCategory;
use App\Services\ImageService;
use App\Services\SlugService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.pages.project.index');
    }

    public function ajax(Request $request)
    {
        $query = Project::query();

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
        $recordsTotal = Project::count();
        $recordsFiltered = $query->count();

        // 📄 Sayfalama
        $start = $request->input('start', 0);
        $length = $request->input('length', 10);
        $items = $query->skip($start)->take($length)->get();

        $projectCategories = ProjectCategory::join('project_project_categories','project_categories.id','=','project_project_categories.project_category_id')
            ->whereIn('project_project_categories.project_id',$items->pluck('id')->toArray())
            ->select('project_categories.*','project_project_categories.project_id')
            ->get();

        // 🔧 Görsel ve butonları ekleyerek veriyi hazırla
        $data = $items->map(function ($item) use ($projectCategories,$request){
            $editUrl = route('admin.projects.edit', $item->id);
            $deleteUrl = route('admin.projects.destroy', $item->id);
            $deleteEvent = 'onclick="checkBeforeDelete('.$item->id.', '.('false').')"';
            $categoryName = '';
            foreach ($projectCategories->where('project_id',$item->id) as $index => $projectCategory) {
                $categoryName .= $projectCategory->name . (array_key_last($projectCategories->where('project_id',$item->id)->toArray()) != $index ? ', ' : '');
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
        $projectCategories = ProjectCategory::all();
        return view('admin.pages.project.create', compact('projectCategories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProjectStoreRequest $request)
    {
        $validated = $request->validated();

        $locales = Locale::all();
        $slugs = [];
        $images = [];

        foreach ($locales as $locale) {
            $code = $locale->locale;

            // Slug üretimi
            $slugService = new SlugService();
            $slugs[$code] = $slugService->create('projects',$request,$code);

            // Resim yüklemesi
            $imageService = new ImageService();
            $images[$code] = $imageService->save($code,$request,$slugs[$code],'project','image');
        }

        $validated['slug'] = $slugs;
        $validated['image'] = $images;

        $project = Project::create($validated);

        $projectCategories = [];
        foreach ($request->input('project_categories',[]) as $projectCategoryId){
            $projectCategories[] = [
                'project_id' => $project->id,
                'project_category_id' => $projectCategoryId,
            ];
        }

        if (count($projectCategories)) {
            ProjectProjectCategory::insert($projectCategories);
        }

        if (isset($request->images)){
            $projectImages = [];
            foreach ($request->images as $localeId => $images){
                $locale = $locales->where('id', $localeId)->first();
                foreach ($images as $index => $image){
                    if (is_file($image)){
                        $projectImages[] = [
                            'project_id' => $project->id,
                            'locale_id' => $localeId,
                            'image_url' => $image->storeAs('project',Str::slug($project->getTranslation('name',$locale->locale)).'-'.rand(1,999999).'.webp','public2'),
                            'rank' => $request->image_ranks[$localeId][$index],
                            'created_at' => now(),
                            'updated_at' => now(),
                        ];
                    }
                }
            }
            if(count($projectImages))
                ProjectImage::insert($projectImages);
        }

        return redirect()->back()->with('success', __('Başarıyla Eklendi'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        $projectCategories = ProjectCategory::all();
        $projectCategoryIds = ProjectProjectCategory::where('project_id',$project->id)->pluck('project_category_id')->toArray();
        $projectImages = ProjectImage::where('project_id',$project->id)->get();
        return view('admin.pages.project.edit', compact(
            'project',
            'projectCategories',
            'projectCategoryIds',
            'projectImages'
        ));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProjectUpdateRequest $request, Project $project)
    {
        $validated = $request->validated();

        $locales = Locale::all();
        $slugs = [];
        $images = [];

        foreach ($locales as $locale) {
            $code = $locale->locale;

            // Slug üretimi
            $slugService = new SlugService();
            $slugs[$code] = $slugService->create('projects',$request,$code,$project->id);

            // Resim yükleme
            $imageService = new ImageService();
            $images[$code] = $imageService->save($code,$request,$slugs[$code],'project','image',$project->getTranslation('image',$code));
        }


        $validated['slug'] = $slugs;
        $validated['image'] = $images;

        $project->update($validated);

        ProjectProjectCategory::where('project_id',$project->id)->delete();
        $projectCategories = [];
        foreach ($request->input('project_categories',[]) as $projectCategoryId){
            $projectCategories[] = [
                'project_id' => $project->id,
                'project_category_id' => $projectCategoryId,
            ];
        }

        if (count($projectCategories)) {
            ProjectProjectCategory::insert($projectCategories);
        }

        $projectImages = ProjectImage::where('project_id',$project->id)->get();
        if (isset($request->deleted_images)){
            foreach ($projectImages as $projectImage){
                if (in_array($projectImage->image_url,$request->deleted_images)){
                    if (Storage::disk('public2')->exists($projectImage->image_url)){
                        Storage::disk('public2')->delete($projectImage->image_url);
                    }
                    ProjectImage::where('id',$projectImage->id)->delete();
                }
            }
        }

        if (isset($request->images)){
            $newProjectImages = [];
            foreach ($request->images as $localeId => $images){
                $locale = $locales->where('id', $localeId)->first();
                foreach ($images as $index => $image){
                    if (is_file($image)){
                        if (isset($request->old_image_ids[$localeId][$index])){//önceden olan bir resim güncellenmişse
                            $projectImage = $projectImages->where('id',$request->old_image_ids[$localeId][$index])->first();
                            if (Storage::disk('public2')->exists($projectImage->image_url))
                                Storage::disk('public2')->delete($projectImage->image_url);
                            $projectImage->delete();
                        }
                        $newProjectImages[] = [
                            'project_id' => $project->id,
                            'locale_id' => $localeId,
                            'image_url' => $image->storeAs('project',Str::slug($project->getTranslation('name',$locale->locale)).'-'.rand(1,999999).'.webp','public2'),
                            'rank' => $request->image_ranks[$localeId][$index],
                            'created_at' => now(),
                            'updated_at' => now(),
                        ];
                    }
                }
            }
            if(count($newProjectImages))
                ProjectImage::insert($newProjectImages);
        }

        if (isset($request->old_image_ids)){
            foreach ($request->old_image_ids as $localeId => $oldImageIds){
                foreach ($oldImageIds as $index => $oldImageId){
                    $projectImage = $projectImages->where('id',$oldImageId)->first();
                    $projectImage->rank = $request->image_ranks[$localeId][$index];
                    $projectImage->save();
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
                Project::where('id',$id)
                    ->withTrashed()
                    ->restore();

                return redirect()->back()->with('success', __('Başarıyla Geri Alındı'));
            }else{//Tamamen sil
                ProjectProjectCategory::where('project_id',$id)->delete(); //Kategori ilişkilerini sil
                $locales = Locale::all();
                $project = Project::where('id',$id)->withTrashed()->first();
                foreach ($locales as $locale) {
                    $imagePath = $project->getTranslation('image', $locale->locale);

                    if ($imagePath && Storage::disk('public2')->exists($imagePath)) {
                        Storage::disk('public2')->delete($imagePath);// kapak resmini sil
                    }
                }
                $projectImages = ProjectImage::where('project_id',$project->id)->get();
                foreach ($projectImages as $projectImage) {
                    if (Storage::disk('public2')->exists($projectImage->image_url)) {
                        Storage::disk('public2')->delete($projectImage->image_url); //ek resimlerini sunucudan sil
                    }
                    $projectImage->delete();//ek resimlerini veritabanından sil
                }
                $project->forceDelete(); //modeli sil

                return redirect()->back()->with('success', __('Başarıyla Tamamen Silindi'));
            }
        }else{
            Project::where('id',$id)->withTrashed()->delete(); //modeli soft delete sil

            return redirect()->back()->with('success', __('Başarıyla Silindi'));
        }
    }
}
