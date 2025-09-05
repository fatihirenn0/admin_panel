<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContactPeople\ContactPeopleStoreRequest;
use App\Http\Requests\ContactPeople\ContactPeopleUpdateRequest;
use App\Models\ContactPeople;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ContactPeopleController extends Controller
{
    public string $roleKey = 'contact_people';
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.pages.contact_people.index');
    }

    public function ajax(Request $request){

        $query = ContactPeople::query();

        if ($request->has('trashed'))
            $query = $query->onlyTrashed();

        if($search = $request->input('search.value')){
            $query->where('name', 'like', '%' . $search . '%');
        }

        $orderColumnIndex = $request->input('order.0.column');
        $orderDirection = $request->input('order.0.dir' , 'asc');
        $orderColumnName = $request->input("columns.$orderColumnIndex.data" , 'name');

        $query->orderBy($orderColumnName, $orderDirection);



        $recordsTotal = ContactPeople::count();
        $recordsFiltered = $query->count();


        $start = $request->input('start' , 0);
        $length = $request->input('length' , 10);
        $items = $query->skip($start)->take($length)->get();

        $data = $items->map(function ($item) use ($request){
            $editUrl = route('admin.contact-people.edit' , $item);
            $deleteUrl = route('admin.contact-people.destroy' , $item->id);
            $deleteEvent = 'onclick="checkBeforeDelete('.$item->id.', '.('false').')"';

            return [
                'id' => $item->id,
                'name' => $item->name,
                'email' => $item->email,
                'telephone' => $item->telephone,
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
        return view('admin.pages.contact_people.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ContactPeopleStoreRequest $request): \Illuminate\Http\RedirectResponse
    {
        $contactPeople = new ContactPeople();
        $contactPeople->name = $request->name;
        $contactPeople->slug = Str::slug($request->name, '-');
        $contactPeople->telephone = $request->telephone;
        $contactPeople->email = $request->email;
        if ($request->hasFile('image'))
            $contactPeople->image = $request->file('image')->store('contact-people','public2');
        $contactPeople->address = $request->address;
        $contactPeople->rank = $request->rank;
        $contactPeople->save();

        return redirect()->back()->with('success', __('Başarıyla Eklendi'));
    }

    /**
     * Display the specified resource.
     */
    public function show(ContactPeople $contactPeople)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($slug)
    {
        $contactPeople = ContactPeople::where('slug', $slug)->first();
        return view('admin.pages.contact_people.edit', compact('contactPeople'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ContactPeopleUpdateRequest $request, $slug)
    {
        $contactPeople = ContactPeople::where('slug', $slug)->first();
        $contactPeople->name = $request->name;
        $contactPeople->slug = \Illuminate\Support\Str::slug($contactPeople->name,'-');
        $contactPeople->telephone = $request->telephone;
        $contactPeople->email = $request->email;
        $contactPeople->address = $request->address;
        $contactPeople->rank = $request->rank;

        if ($request->hasFile('image'))
            $contactPeople->image = $request->file('image')->store('contact-people','public2');

        $contactPeople->save();

        return redirect()->route('admin.contact-people.edit',$contactPeople)->with('success', __('Başarıyla Güncellendi'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request,$id)
    {
        if (isset($request->type)){
            if ($request->type == "recycle"){//Geri Al
                ContactPeople::where('id',$id)
                    ->withTrashed()
                    ->restore();

                return redirect()->back()->with('success', __('Başarıyla Geri Alındı'));
            }else{//Tamamen sil
                $contactPeople = ContactPeople::where('id',$id)->withTrashed()->first();
                $imagePath = $contactPeople->image;

                if ($imagePath && Storage::disk('public2')->exists($imagePath)) {
                    Storage::disk('public2')->delete($imagePath);// kapak resmini sil
                }
                $contactPeople->forceDelete(); //modeli sil

                return redirect()->back()->with('success', __('Başarıyla Tamamen Silindi'));
            }
        }else{
            ContactPeople::where('id',$id)->withTrashed()->delete(); //modeli soft delete sil

            return redirect()->back()->with('success', __('Başarıyla Silindi'));
        }
    }
}
