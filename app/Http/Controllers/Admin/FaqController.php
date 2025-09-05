<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Faq\FaqStoreRequest;
use App\Http\Requests\Faq\FaqUpdateRequest;
use App\Models\Faq;
use App\Models\FaqCategory;
use App\Models\FaqFaqCategory;
use App\Models\Locale;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FaqController extends Controller
{
    public string $roleKey = 'faq';
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.pages.faq.index');
    }
    public function ajax(Request $request){

        $query = Faq::query();

        if ($request->has('trashed'))
            $query = $query->onlyTrashed();

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


        $data = $items->map(function ($item) use ($request) {
            $editUrl = route('admin.faqs.edit' , $item);
            $deleteUrl = route('admin.faqs.destroy' , $item->id);
            $deleteEvent = 'onclick="checkBeforeDelete('.$item->id.', '.('false').')"';

            return[
                'id' => $item->id,
                'question' => $item->question,
                'answer' => $item->answer,
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
        $faqCategories = FaqCategory::all();
        return view('admin.pages.faq.create',compact('faqCategories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(FaqStoreRequest $request): \Illuminate\Http\RedirectResponse
    {
        $validated = $request->validated();

        $faq = Faq::create($validated);

        if ($request->faq_categories){
            foreach ($request->faq_categories as $faqCategory){
                $faqFaqCategory = new FaqFaqCategory();
                $faqFaqCategory->faq_id = $faq->id;
                $faqFaqCategory->faq_category_id = $faqCategory;
                $faqFaqCategory->save();
            }
        }

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
        $faqCategories = FaqCategory::all();
        $faqCategoryIds = FaqFaqCategory::where('faq_id',$faq->id)->pluck('faq_category_id')->toArray();
        return view('admin.pages.faq.edit', compact(
            'faq',
            'faqCategories',
            'faqCategoryIds'
        ));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(FaqUpdateRequest $request, Faq $faq)
    {
        $validated = $request->validated();
        $faq->update($validated);

        FaqFaqCategory::where('faq_id',$faq->id)->delete();
        if ($request->faq_categories){
            foreach ($request->faq_categories as $faqCategory){
                $faqFaqCategory = new FaqFaqCategory();
                $faqFaqCategory->faq_id = $faq->id;
                $faqFaqCategory->faq_category_id = $faqCategory;
                $faqFaqCategory->save();
            }
        }

        return redirect()->route('admin.faqs.edit',$faq)->with('success', __('Başarıyla Güncellendi'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request,$id)
    {
        if (isset($request->type)){
            if ($request->type == "recycle"){//Geri Al
                Faq::where('id',$id)
                    ->withTrashed()
                    ->restore();

                return redirect()->back()->with('success', __('Başarıyla Geri Alındı'));
            }else{//Tamamen sil
                $faq = Faq::where('id',$id)->withTrashed()->first();
                FaqFaqCategory::where('faq_id',$faq->id)->delete(); //Kategori ilişkilerini sil

                $faq->forceDelete(); //modeli sil

                return redirect()->back()->with('success', __('Başarıyla Tamamen Silindi'));
            }
        }else{
            Faq::where('id',$id)->withTrashed()->delete(); //modeli soft delete sil

            return redirect()->back()->with('success', __('Başarıyla Silindi'));
        }
    }
}
