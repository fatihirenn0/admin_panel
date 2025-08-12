<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Faq\FaqStoreRequest;
use App\Http\Requests\Faq\FaqUpdateRequest;
use App\Models\Faq;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.pages.faq.index');
    }
    public function ajax(Request $request){

        $query = Faq::query();

        if($search = $request->input('search.value')){
            $query->where('name', 'like', '%' . $search . '%');
        }

        $orderColumnIndex = $request->input('order.0.column');
        $orderDirection = $request->input('order.0.dir' , 'asc');
        $orderColumnName = $request->input("columns.$orderColumnIndex.data" , 'name');

        $query->orderBy($orderColumnName, $orderDirection);



        $recordsTotal = Faq::count();
        $recordsFiltered = $query->count();


        $start = $request->input('start' , 0);
        $length = $request->input('length' , 10);
        $items = $query->skip($start)->take($length)->get();


        $data = $items->map(function ($item) {


            $editUrl = route('admin.faqs.edit' , $item->id);
            $deleteUrl = route('admin.faqs.destroy' , $item->id);

            return[
                'id' => $item->id,
                'question' => $item->question,
                'answer' => $item->answer,
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
        return view('admin.pages.faq.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(FaqStoreRequest $request): \Illuminate\Http\RedirectResponse
    {
        $validated = $request->validated();

        Faq::create($validated);

        return redirect()->back()->with('success', __('Başarıyla Eklendi'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Faq $faq)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Faq $faq)
    {
        return view('admin.pages.faq.edit', compact('faq'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(FaqUpdateRequest $request, Faq $faq)
    {
        $validated = $request->validated();

        $faq->update($validated);

        return redirect()->back()->with('success', __('Başarıyla Güncellendi'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Faq $faq)
    {
        //
    }
}
