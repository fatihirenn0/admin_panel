<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\FaqCategory\FaqCategoryStoreRequest;
use App\Http\Requests\FaqCategory\FaqCategoryUpdateRequest;
use App\Models\CatalogCategory;
use App\Models\Faq;
use App\Models\FaqCategory;
use App\Models\FaqFaqCategory;
use App\Models\Locale;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class FaqCategoryController extends Controller
{
    public string $roleKey = 'faq_category';
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("admin.pages.faq_category.index");
    }

    public function ajax(Request $request)
    {
        $query = FaqCategory::query();

        if ($request->has('trashed'))
            $query = $query->onlyTrashed();

        if($search = $request->input('search.value')){
            $query->where('name', 'like', '%' . $search . '%');
        }

        $orderColumnIndex = $request->input('order.0.column');
        $orderDirection = $request->input('order.0.dir' , 'asc');
        $orderColumnName = $request->input("columns.$orderColumnIndex.data" , 'name');

        $query->orderBy($orderColumnName, $orderDirection);
        $recordsTotal = FaqCategory::count();
        $recordsFiltered = $query->count();


        $start = $request->input('start' , 0);
        $length = $request->input('length' , 10);
        $items = $query->skip($start)->take($length)->get();


        $data = $items->map(function ($item) use ($request){


            $editUrl = route('admin.faq-categories.edit' , $item);
            $deleteUrl = route('admin.faq-categories.destroy' , $item->id);
            $hasMore = FaqFaqCategory::where('faq_category_id', $item->id)->exists();

            $deleteEvent = 'onclick="checkBeforeDelete('.$item->id.', '.($hasMore ? 'true' : 'false').')"';

            return[
                'id' => $item->id,
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
        return view("admin.pages.faq_category.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(FaqCategoryStoreRequest $request): \Illuminate\Http\RedirectResponse
    {
        $validated = $request->validated();

        $locales = Locale::all();
        $slugs = [];

        foreach ($locales as $locale) {
            $code = $locale->locale;

            $baseSlug = Str::slug($request->name[$code]);
            $slug = $baseSlug;
            $counter = 1;

            while (DB::table('faq_categories')->where("slug->{$code}", $slug)->exists()) {
                $slug = $baseSlug . '-' . $counter;
                $counter++;
            }

            $slugs[$code] = $slug;
        }

        $validated['slug'] = $slugs;

        FaqCategory::create($validated);

        return redirect()->back()->with('success', __('Başarıyla Eklendi'));
    }

    /**
     * Display the specified resource.
     */
    public function show(FaqCategory $faqCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(FaqCategory $faqCategory)
    {
        return view('admin.pages.faq_category.edit', compact('faqCategory'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(FaqCategoryUpdateRequest $request, FaqCategory $faqCategory)
    {
        $validated = $request->validated();

        $locales = Locale::all();
        $slugs = [];
        $images = [];

        foreach ($locales as $locale) {
            $code = $locale->locale;

            $name = $request->name[$code] ?? $faqCategory->getTranslation('name', $code);

            $baseSlug = Str::slug($name);
            $slug = $baseSlug;
            $counter = 1;

            while (FaqCategory::where("slug->{$code}", $slug)->where('id', '!=', $faqCategory->id)->exists()) {
                $slug = $baseSlug . '-' . $counter;
                $counter++;
            }

            $slugs[$code] = $slug;

        }

        $validated['slug'] = $slugs;

        $faqCategory->update($validated);

        return redirect()->route('admin.faq-categories.edit',$faqCategory)->with('success', __('Başarıyla Güncellendi'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request,$id)
    {
        $faqCategory = FaqCategory::where('id',$id)->withTrashed()->first();

        $faqIds = FaqFaqCategory::where('faq_category_id',$faqCategory->id)->pluck('faq_id')->toArray();
        if (isset($request->type)){
            if ($request->type == "recycle"){ //geri al
                Faq::whereIn('id',$faqIds)
                    ->where('deleted_at','>=',$faqCategory->deleted_at->subMinute())
                    ->where('deleted_at','<=',$faqCategory->deleted_at->addMinute())
                    ->withTrashed()
                    ->restore();
                $faqCategory->restore();

                return redirect()->back()->with('success', __('Başarıyla Geri Alındı'));
            }else{// tamamen sil
                Faq::whereIn('id',$faqIds)
                    ->withTrashed()
                    ->delete();
                FaqFaqCategory::where('faq_category_id',$faqCategory->id)->delete(); //bağlı ilişkileri sil

                $faqCategory->forceDelete(); // modeli sil

                return redirect()->back()->with('success', __('Başarıyla Tamamen Silindi'));
            }
        }else{
            Faq::whereIn('id',$faqIds)->delete();
            $faqCategory->delete();

            return redirect()->back()->with('success', __('Başarıyla Silindi'));
        }
    }
}
