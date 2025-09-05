<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Locale;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class LocaleController extends Controller
{
    public string $roleKey = 'locale';
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.pages.locale.index');
    }
    public function ajax(Request $request){

        $query = Locale::query();

        if($search = $request->input('search.value')){
            $query->where('name', 'like', '%' . $search . '%');
        }

        $orderColumnIndex = $request->input('order.0.column');
        $orderDirection = $request->input('order.0.dir' , 'asc');
        $orderColumnName = $request->input("columns.$orderColumnIndex.data" , 'name');

        $query->orderBy($orderColumnName, $orderDirection);



        $recordsTotal = Locale::count();
        $recordsFiltered = $query->count();


        $start = $request->input('start' , 0);
        $length = $request->input('length' , 10);
        $items = $query->skip($start)->take($length)->get();

        $data = $items->map(function ($item) use ($request){
            $editUrl = route('admin.locales.edit', $item);

            return [
                'id' => $item->id,
                'locale' => $item->locale,
                'language' => $item->language,
                'image' => !empty($item->image) ? '<img src="/storage/' . $item->image . '" height="60"/>' : __('Eklenmedi'),
                'rank' => $item->rank ?? '',
                'default' => $item->default ? 'Evet' : 'Hayır',
                'active' => $item->active ? 'Evet' : 'Hayır',
                'actions' =>
                    '<a href="' . $editUrl . '" class="btn btn-sm btn-primary me-1" title="Düzenle">
                        <i class="icon-base ti tabler-pencil"></i>
                    </a>
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
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Locale $locale)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Locale $locale)
    {
        return view('admin.pages.locale.edit', compact('locale'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Locale $locale)
    {
        // Validation
        $validated = $request->validate([
            'language' => ['required','string','max:30'],
            'rank'     => ['required','integer','min:0'],
            'default'  => ['required','boolean'],
            'active'   => ['required','boolean'],
            'image'    => ['nullable','image','mimes:jpg,jpeg,png,svg,webp','max:2048'],
        ]);

        // 3. Pasif dil varsayılan olamaz
        if ($validated['default'] == 1 && $validated['active'] == 0) {
            return back()->with('error', __('Varsayılan dil pasif olamaz.'));
        }

        // 4. Varsayılan dil pasif yapılamaz
        if ($locale->default == 1 && $validated['active'] == 0) {
            return back()->with('error', __('Varsayılan dil pasif yapılamaz.'));
        }

        // 1. En az 1 aktif dil olmalı
        if ($validated['active'] == 0) {
            $activeExists = Locale::where('active', 1)
                ->where('id', '!=', $locale->id)
                ->exists();
            if (! $activeExists) {
                return back()->with('error', __('En az 1 tane dil aktif olmalıdır.'));
            }
        }

        // 2. En az 1 varsayılan dil olmalı
        if ($validated['default'] == 0 && $locale->default == 1) {
            $defaultExists = Locale::where('default', 1)
                ->where('id', '!=', $locale->id)
                ->exists();
            if (! $defaultExists) {
                return back()->with('error', __('En az 1 tane dil varsayılan olmalıdır.'));
            }
        }

        // Eğer bu dil varsayılan seçildiyse, diğerlerini kaldır
        if ($validated['default'] == 1) {
            Locale::where('default', 1)
                ->where('id', '!=', $locale->id)
                ->update(['default' => 0]);
        }

        // Görsel işlemi
        if ($request->hasFile('image')) {
            $old = ltrim(Str::after((string) $locale->image, 'storage/'), '/');
            if ($locale->image && Storage::disk('public2')->exists($old)) {
                Storage::disk('public2')->delete($old);
            }
            $validated['image'] = $request->file('image')->store('locales', 'public2');
        }

        $locale->update($validated);

        return redirect()->route('admin.locales.index')->with('success', __('Başarıyla Güncellendi'));
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Locale $locale)
    {
        //
    }
}
