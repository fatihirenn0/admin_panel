<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\File\FileStoreRequest;
use App\Models\File;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class FileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.pages.file.index');
    }

    public function ajax(Request $request){

        $query = File::query();

        if($search = $request->input('search.value')){
            $query->where('name', 'like', '%' . $search . '%');
        }

        $orderColumnIndex = $request->input('order.0.column');
        $orderDirection = $request->input('order.0.dir' , 'asc');
        $orderColumnName = $request->input("columns.$orderColumnIndex.data" , 'name');

        $query->orderBy($orderColumnName, $orderDirection);



        $recordsTotal = File::count();
        $recordsFiltered = $query->count();


        $start = $request->input('start' , 0);
        $length = $request->input('length' , 10);
        $items = $query->skip($start)->take($length)->get();

        $data = $items->map(function ($item) {
            $editUrl = route('admin.files.edit' , $item->id);
            $deleteUrl = route('admin.files.destroy' , $item->id);

            return [
                'id' => $item->id,
                'name' => $item->name,
                'file_url' => !empty($item->file_url) ? '<img src="/storage/' . $item->file_url . '" height="60"/>' : __('Eklenmedi'),
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
        return view('admin.pages.file.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request):\Illuminate\Http\RedirectResponse
    {
        $file = new File();
        $file->name = $request->name;
        if ($request->hasFile('file_url')){
            $uploadedFile = $request->file('file_url');
            $extension = $uploadedFile->getClientOriginalExtension();

            $fileName = $uploadedFile->getClientOriginalName();
            $fileName = str_replace(".".$extension,"",$fileName);
            $fileName = Str::slug($fileName, '_');
            $fileName = $fileName .'_' . rand(1,99999);
            $file->file_url = $request->file('file_url')->storeAs('file',$fileName.'.'.$extension,'public2');
        }

        $file->save();

        return redirect()->back()->with('success', __('Başarıyla Eklendi'));
    }

    /**
     * Display the specified resource.
     */
    public function show(File $file)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(File $file)
    {
        return view('admin.pages.file.edit', compact('file'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, File $file)
    {
        $file->name = $request->name;
        if ($request->hasFile('file_url')){
            $uploadedFile = $request->file('file_url');
            $extension = $uploadedFile->getClientOriginalExtension();

            $fileName = $uploadedFile->getClientOriginalName();
            $fileName = str_replace(".".$extension,"",$fileName);
            $fileName = Str::slug($fileName, '_');
            $fileName = $fileName .'_' . rand(1,99999);
            $file->file_url = $request->file('file_url')->storeAs('file',$fileName.'.'.$extension,'public2');
        }

        $file->save();

        return redirect()->back()->with('success', __('Başarıyla Güncellendi'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(File $file)
    {
        //
    }
}
