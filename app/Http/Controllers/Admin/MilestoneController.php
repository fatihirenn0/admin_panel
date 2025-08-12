<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Milestone\MilestoneStoreRequest;
use App\Http\Requests\Milestone\MilestoneUpdateRequest;
use App\Models\Locale;
use App\Models\Milestone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class MilestoneController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.pages.milestone.index');
    }
    public function ajax(Request $request){

        $query = Milestone::query();

        if($search = $request->input('search.value')){
            $query->where('name', 'like', '%' . $search . '%');
        }

        $orderColumnIndex = $request->input('order.0.column');
        $orderDirection = $request->input('order.0.dir' , 'asc');
        $orderColumnName = $request->input("columns.$orderColumnIndex.data" , 'name');

        $query->orderBy($orderColumnName, $orderDirection);



        $recordsTotal = Milestone::count();
        $recordsFiltered = $query->count();


        $start = $request->input('start' , 0);
        $length = $request->input('length' , 10);
        $items = $query->skip($start)->take($length)->get();


        $data = $items->map(function ($item) {


            $editUrl = route('admin.milestones.edit' , $item->id);
            $deleteUrl = route('admin.milestones.destroy' , $item->id);

            return[
                'id' => $item->id,
                'image' => !empty($item->image) ? '<img src="/storage/' . $item->image . '" height="60"/>' : __('Eklenmedi'),
                'name' => $item->name,
                'date' => $item->date,
                'description' => $item->description,
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
        return view('admin.pages.milestone.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MilestoneStoreRequest $request): \Illuminate\Http\RedirectResponse
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
            while (DB::table('milestones')->where("slug->{$code}", $slug)->exists()) {
                $slug = $baseSlug . '-' . $counter;
                $counter++;
            }

            $slugs[$code] = $slug;

            // Resim yüklemesi
            if ($request->hasFile("image.$code")) {
                $images[$code] = $request->file("image.$code")->store('milestone', 'public2');
            }
        }

        // JSON encode yerine array cast ile doğrudan array olarak kaydediyoruz
        $validated['slug'] = $slugs;
        $validated['image'] = $images;

        Milestone::create($validated);

        return redirect()->back()->with('success', __('Başarıyla Eklendi'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Milestone $milestone)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Milestone $milestone)
    {
        return view('admin.pages.milestone.edit', compact('milestone'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(MilestoneUpdateRequest $request, Milestone $milestone)
    {
        $validated = $request->validated();

        $locales = Locale::all();
        $slugs = [];
        $images = [];

        foreach ($locales as $locale) {
            $code = $locale->locale;

            // Ad alınamadıysa önceki değer kullan
            $name = $request->name[$code] ?? $milestone->getTranslation('name', $code);

            // Slug oluştur
            $baseSlug = Str::slug($name);
            $slug = $baseSlug;
            $counter = 1;

            // Güncel kayıt hariç diğerlerinde aynı slug var mı kontrol et
            while (Milestone::where("slug->{$code}", $slug)->where('id', '!=', $milestone->id)->exists()) {
                $slug = $baseSlug . '-' . $counter;
                $counter++;
            }

            $slugs[$code] = $slug;

            // Resim yüklemesi
            if ($request->hasFile("image.$code")) {
                $images[$code] = $request->file("image.$code")->store('milestone', 'public2');
            } else {
                $images[$code] = $milestone->getTranslation('image', $code);
            }
        }

        $validated['slug'] = $slugs;
        $validated['image'] = $images;

        $milestone->update($validated);

        return redirect()->back()->with('success', __('Başarıyla Güncellendi'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Milestone $milestone)
    {
        //
    }
}
