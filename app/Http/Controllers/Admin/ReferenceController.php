<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Reference\ReferenceStoreRequest;
use App\Http\Requests\Reference\ReferenceUpdateRequest;
use App\Models\Locale;
use App\Models\Reference;
use Illuminate\Http\Request;

class ReferenceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.pages.reference.index');
    }
    public function ajax(Request $request)
    {
        $query = Reference::query();

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
        $recordsTotal = Reference::count();
        $recordsFiltered = $query->count();

        // 📄 Sayfalama
        $start = $request->input('start', 0);
        $length = $request->input('length', 10);
        $items = $query->skip($start)->take($length)->get();

        // 🔧 Görsel ve butonları ekleyerek veriyi hazırla
        $data = $items->map(function ($item) use ($request){
            $editUrl = route('admin.references.edit', $item->id);
            $deleteUrl = route('admin.references.destroy', $item->id);
            $hasMore = Reference::where('id', $item->id)->exists();

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
        return view('admin.pages.reference.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ReferenceStoreRequest $request): \Illuminate\Http\RedirectResponse
    {
        $validated = $request->validated();
        $locales = Locale::all();
        $images = [];
        foreach ($locales as $locale) {
            $code = $locale->locale;

            if ($request->hasFile("image.$code")) {
                $images[$code] = $request->file("image.$code")->store('reference', 'public2');
            }
        }
        if (!empty($images)) {
            $validated['image'] = $images;
        } else {
            $validated['image'] = null;
        }
        Reference::create($validated);

        return redirect()->back()->with('success', __('Başarıyla Eklendi'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Reference $reference)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Reference $reference)
    {
        return view('admin.pages.reference.edit', compact('reference'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ReferenceUpdateRequest $request, Reference $reference)
    {
        $validated = $request->validated();

        $locales = Locale::all();
        $images = [];

        foreach ($locales as $locale) {
            $code = $locale->locale;

            $name = $request->name[$code] ?? $reference->getTranslation('name', $code);

            if ($request->hasFile("image.$code")) {
                $images[$code] = $request->file("image.$code")->store('reference', 'public2');
            } else {
                $images[$code] = $reference->getTranslation('image', $code);
            }
        }

        $validated['image'] = $images;

        $reference->update($validated);

        return redirect()->back()->with('success', __('Başarıyla Güncellendi'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Reference $reference)
    {
        //
    }
}
