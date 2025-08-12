<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Application;
use Illuminate\Http\Request;

class ApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.pages.application.index');
    }
    public function ajax(Request $request){

        $query = Application::query();

        if($search = $request->input('search.value')){
            $query->where('name', 'like', '%' . $search . '%');
        }

        $orderColumnIndex = $request->input('order.0.column');
        $orderDirection = $request->input('order.0.dir' , 'asc');
        $orderColumnName = $request->input("columns.$orderColumnIndex.data" , 'name');

        $query->orderBy($orderColumnName, $orderDirection);



        $recordsTotal = Application::count();
        $recordsFiltered = $query->count();


        $start = $request->input('start' , 0);
        $length = $request->input('length' , 10);
        $items = $query->skip($start)->take($length)->get();

        $data = $items->map(function ($item) {
            $editUrl = route('admin.applications.edit' , $item->id);
            $deleteUrl = route('admin.applications.destroy' , $item->id);

            return [
                'id' => $item->id,
                'name' => $item->name,
                'job' => $item->job,
                'email' => $item->email,
                'experience' => $item->experience,
                'telephone' => $item->telephone,
                'gender' => $item->gender,
                'department' => $item->department,
                'birthdate' => $item->birthdate,
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
    public function show(Application $application)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Application $application)
    {
        return view('admin.pages.application.edit', compact('application'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Application $application)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Application $application)
    {
        //
    }
}
