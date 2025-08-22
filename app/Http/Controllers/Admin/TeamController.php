<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Team\TeamStoreRequest;
use App\Http\Requests\Team\TeamUpdateRequest;
use App\Http\Requests\TeamCategory\TeamCategoryStoreRequest;
use App\Models\Locale;
use App\Models\Team;
use App\Models\TeamCategory;
use App\Models\TeamTeamCategory;
use App\Services\ImageService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.pages.team.index');
    }

    public function ajax(Request $request)
    {
        $query = Team::query();

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
        $recordsTotal = Team::count();
        $recordsFiltered = $query->count();

        // 📄 Sayfalama
        $start = $request->input('start', 0);
        $length = $request->input('length', 10);
        $items = $query->skip($start)->take($length)->get();


        // 🔧 Görsel ve butonları ekleyerek veriyi hazırla
        $data = $items->map(function ($item) use($request){
            $editUrl = route('admin.teams.edit', $item->id);
            $deleteUrl = route('admin.teams.destroy', $item->id);
            $deleteEvent = 'onclick="checkBeforeDelete('.$item->id.', '.('false').')"';

            return [
                'id' => $item->id,
                'name' => mb_substr($item->name,0,80,'UTF-8'),
                'job' => $item->job,
                'email' => $item->email,
                'telephone' => $item->telephone,
                'image' => !empty($item->image) ? '<img src="/storage/' . $item->image . '" height="60"/>' : __('Eklenmedi'),
                'education' => $item->education,
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
        $teamCategories = TeamCategory::all();
        return view('admin.pages.team.create',compact('teamCategories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TeamStoreRequest $request): \Illuminate\Http\RedirectResponse
    {
        $validated = $request->validated();

        $locales = Locale::all();
        $images = [];

        foreach ($locales as $locale) {
            $code = $locale->locale;

            // Resim yüklemesi
            if ($request->hasFile("image.$code")) {
                $images[$code] = $request->file("image.$code")->store('team', 'public2');
            }
        }

        // JSON encode yerine array cast ile doğrudan array olarak kaydediyoruz
        $validated['slug'] = Str::slug($request->name);
        $validated['image'] = $images;
        $validated['team_category_id'] = (int) $request->input('team_category_id');

        $team = Team::create($validated);

        if($request->team_categories){
            foreach ($request->team_categories as $teamCategoryId){
                $teamTeamCategory = new TeamTeamCategory();
                $teamTeamCategory->team_id = $team->id;
                $teamTeamCategory->team_category_id = $teamCategoryId;
                $teamTeamCategory->save();
            }
        }
        return redirect()->back()->with('success', __('Başarıyla Eklendi'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Team $team)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Team $team)
    {
        $teamCategories = TeamCategory::all();
        $teamTeamCategories = TeamTeamCategory::where('team_id',$team->id)->pluck('team_category_id')->toArray();
        return view('admin.pages.team.edit', compact(
            'team',
            'teamCategories',
            'teamTeamCategories'
        ));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TeamUpdateRequest $request, Team $team)
    {
        $validated = $request->validated();

        $locales = Locale::all();
        $images = [];

        foreach ($locales as $locale) {
            $code = $locale->locale;

            // Resim yüklemesi
            $imageService = new ImageService();
            $images[$code] = $imageService->save($code,$request,Str::slug($request->name).'-'.$code,'team','image',$team->getTranslation('image',$code));
        }

        // JSON encode yerine array cast ile doğrudan array olarak kaydediyoruz
        $validated['slug'] = Str::slug($request->name);
        $validated['image'] = $images;

        $team->update($validated);

        TeamTeamCategory::where('team_id',$team->id)->delete();
        if($request->team_categories){
            foreach ($request->team_categories as $teamCategoryId){
                $teamTeamCategory = new TeamTeamCategory();
                $teamTeamCategory->team_id = $team->id;
                $teamTeamCategory->team_category_id = $teamCategoryId;
                $teamTeamCategory->save();
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
                Team::where('id',$id)
                    ->withTrashed()
                    ->restore();

                return redirect()->back()->with('success', __('Başarıyla Geri Alındı'));
            }else{//Tamamen sil
                TeamTeamCategory::where('team_id',$id)->delete(); //Kategori ilişkilerini sil
                $locales = Locale::all();
                $team = Team::where('id',$id)->withTrashed()->first();
                foreach ($locales as $locale) {
                    $imagePath = $team->getTranslation('image', $locale->locale);

                    if ($imagePath && Storage::disk('public2')->exists($imagePath)) {
                        Storage::disk('public2')->delete($imagePath);// kapak resmini sil
                    }
                }
                $team->forceDelete(); //modeli sil

                return redirect()->back()->with('success', __('Başarıyla Tamamen Silindi'));
            }
        }else{
            Team::where('id',$id)->withTrashed()->delete(); //modeli soft delete sil

            return redirect()->back()->with('success', __('Başarıyla Silindi'));
        }
    }
}
