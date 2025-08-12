<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Locale;
use Illuminate\Http\Request;

class LocaleController extends Controller
{
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
            $editUrl = route('admin.locales.edit', $item->id);
            $deleteUrl = route('admin.locales.destroy', $item->id);
            $hasMore = Locale::where('id', $item->id)->exists();

            $deleteEvent = 'onclick="checkBeforeDelete('.$item->id.', '.($hasMore ? 'true' : 'false').')"';

            return [
                'id' => $item->id,
                'locale' => $item->locale,
                'language' => $item->language,
                'image' => !empty($item->image) ? '<img src="/storage/' . $item->image . '" height="60"/>' : __('Eklenmedi'),
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Locale $locale)
    {
        //
    }
}
