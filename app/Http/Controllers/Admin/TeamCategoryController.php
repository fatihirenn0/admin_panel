<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\TeamCategory\TeamCategoryStoreRequest;
use App\Http\Requests\TeamCategory\TeamCategoryUpdateRequest;
use App\Models\TeamCategory;
use App\Models\Locale;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TeamCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("admin.pages.team_category.index");
    }

    public function ajax(Request $request){

        $query = TeamCategory::query();

        if($search = $request->input('search.value')){
            $query->where('name', 'like', '%' . $search . '%');
        }

        $orderColumnIndex = $request->input('order.0.column');
        $orderDirection = $request->input('order.0.dir' , 'asc');
        $orderColumnName = $request->input("columns.$orderColumnIndex.data" , 'name');

        $query->orderBy($orderColumnName, $orderDirection);



        $recordsTotal = TeamCategory::count();
        $recordsFiltered = $query->count();


        $start = $request->input('start' , 0);
        $length = $request->input('length' , 10);
        $items = $query->skip($start)->take($length)->get();


        $data = $items->map(function ($item) {


            $editUrl = route('admin.team-categories.edit' , $item->id);
            $deleteUrl = route('admin.team-categories.destroy' , $item->id);

            return[
                'id' => $item->id,
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
        return view("admin.pages.team_category.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TeamCategoryStoreRequest $request) : \Illuminate\Http\RedirectResponse
    {
        $validated = $request->validated();

        $locales = Locale::all();
        $slugs = [];

        foreach ($locales as $locale) {
            $code = $locale->locale;

            // Slug üretimi
            $baseSlug = Str::slug($request->name[$code]);
            $slug = $baseSlug;
            $counter = 1;

            // Aynı slug varsa benzersiz hale getir
            while (DB::table('team_categories')->where("slug->{$code}", $slug)->exists()) {
                $slug = $baseSlug . '-' . $counter;
                $counter++;
            }

            $slugs[$code] = $slug;

        }

        // JSON encode yerine array cast ile doğrudan array olarak kaydediyoruz
        $validated['slug'] = $slugs;

        TeamCategory::create($validated);

        return redirect()->back()->with('success', __('Başarıyla Eklendi'));
    }

    /**
     * Display the specified resource.
     */
    public function show(TeamCategory $teamCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TeamCategory $teamCategory)
    {
        return view("admin.pages.team_category.edit", compact("teamCategory"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TeamCategoryUpdateRequest $request, TeamCategory $teamCategory)
    {
        $validated = $request->validated();

        $locales = Locale::all();
        $slugs = [];

        foreach ($locales as $locale) {
            $code = $locale->locale;

            // Ad alınamadıysa önceki değer kullan
            $name = $request->name[$code] ?? $teamCategory->getTranslation('name', $code);

            // Slug oluştur
            $baseSlug = Str::slug($name);
            $slug = $baseSlug;
            $counter = 1;

            // Güncel kayıt hariç diğerlerinde aynı slug var mı kontrol et
            while (TeamCategory::where("slug->{$code}", $slug)->where('id', '!=', $teamCategory->id)->exists()) {
                $slug = $baseSlug . '-' . $counter;
                $counter++;
            }

            $slugs[$code] = $slug;

        }

        $validated['slug'] = $slugs;

        $teamCategory->update($validated);

        return redirect()->back()->with('success', __('Başarıyla Güncellendi'));

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TeamCategory $teamCategory)
    {
        //
    }
}
