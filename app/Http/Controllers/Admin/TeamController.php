<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\TeamCategory\TeamCategoryStoreRequest;
use App\Models\Locale;
use App\Models\Team;
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
        $recordsTotal = Team::count();
        $recordsFiltered = $query->count();

        // 📄 Sayfalama
        $start = $request->input('start', 0);
        $length = $request->input('length', 10);
        $items = $query->skip($start)->take($length)->get();


        // 🔧 Görsel ve butonları ekleyerek veriyi hazırla
        $data = $items->map(function ($item){
            $editUrl = route('admin.teams.edit', $item->id);
            $deleteUrl = route('admin.teams.destroy', $item->id);

            return [
                'id' => $item->id,
                'name' => mb_substr($item->name,0,80,'UTF-8'),
                'job' => $item->job,
                'email' => $item->email,
                'telephone' => $item->telephone,
                'image' => !empty($item->image) ? '<img src="/storage/' . $item->image . '" height="60"/>' : __('Eklenmedi'),
                'education' => $item->education,
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
        return view('admin.pages.team.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TeamCategoryStoreRequest $request): \Illuminate\Http\RedirectResponse
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
            while (DB::table('teams')->where("slug->{$code}", $slug)->exists()) {
                $slug = $baseSlug . '-' . $counter;
                $counter++;
            }

            $slugs[$code] = $slug;

            // Resim yüklemesi
            if ($request->hasFile("image.$code")) {
                $images[$code] = $request->file("image.$code")->store('team', 'public2');
            }
        }

        // JSON encode yerine array cast ile doğrudan array olarak kaydediyoruz
        $validated['slug'] = $slugs;
        $validated['image'] = $images;
        $validated['team_category_id'] = (int) $request->input('team_category_id');

        Team::create($validated);
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
        return view('admin.pages.team.edit', compact('team'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Team $team)
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
            while (DB::table('teams')->where("slug->{$code}", $slug)->exists()) {
                $slug = $baseSlug . '-' . $counter;
                $counter++;
            }

            $slugs[$code] = $slug;

            // Resim yüklemesi
            if ($request->hasFile("image.$code")) {
                $images[$code] = $request->file("image.$code")->store('team', 'public2');
            }
        }

        // JSON encode yerine array cast ile doğrudan array olarak kaydediyoruz
        $validated['slug'] = $slugs;
        $validated['image'] = $images;
        $validated['team_category_id'] = (int) $request->input('team_category_id');

        $team->update($validated);
        return redirect()->back()->with('success', __('Başarıyla Güncellendi'));


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Team $team)
    {
        //
    }
}
