<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\RoleGroup;
use App\Models\User;
use Illuminate\Http\Request;

class RoleGroupController extends Controller
{
    public string $roleKey = 'role_group';
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = RoleGroup::all();

        return view('admin.pages.role_group.index', compact('items'));
    }

    public function ajax(Request $request)
    {
        $query = RoleGroup::query();

        if ($request->has('trashed'))
            $query = $query->onlyTrashed();

        // 🔍 Arama
        if ($search = $request->input('search.value')) {
            $query->where('name->'.app()->getLocale(), 'like', '%' . $search . '%');
        }

        // 🔢 Sıralama
        $orderColumnIndex = $request->input('order.0.column');
        $orderDirection = $request->input('order.0.dir', 'asc');
        $orderColumnName = $request->input("columns.$orderColumnIndex.data", 'id');

        $query->orderBy($orderColumnName, $orderDirection);

        // 🔁 Toplam kayıtlar
        $recordsTotal = RoleGroup::count();
        $recordsFiltered = $query->count();

        // 📄 Sayfalama
        $start = $request->input('start', 0);
        $length = $request->input('length', 10);
        $items = $query->skip($start)->take($length)->get();


        // 🔧 Görsel ve butonları ekleyerek veriyi hazırla
        $data = $items->map(function ($item) use ($request){
            $editUrl = route('admin.role-groups.edit', $item);
            $deleteUrl = route('admin.role-groups.destroy', $item->id);
            $deleteEvent = 'onclick="checkBeforeDelete('.$item->id.', '.('false').')"';

            return [
                'id' => $item->id,
                'name' => mb_substr($item->name,0,80,'UTF-8'),
                'actions' =>
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
        return view('admin.pages.role_group.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $roleGroup = new RoleGroup();
        $roleGroup->name = $request->name;
        $roleGroup->save();

        $roles = [];
        foreach ($request->input('role',[]) as $roleKey){
            $role = new Role();
            $role->role_group_id = $roleGroup->id;
            $roles [] = [
                'role_group_id' => $roleGroup->id,
                'key' => $roleKey
            ];
        }

        if (!empty($roles)){
            Role::insert($roles);
        }

        return redirect()->back()->with('success', __('Başarıyla Eklendi'));
    }

    /**
     * Display the specified resource.
     */
    public function show(RoleGroup $roleGroup)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(RoleGroup $roleGroup)
    {
        $roles = Role::where('role_group_id',$roleGroup->id)->pluck('key')->toArray();
        return view('admin.pages.role_group.edit', compact('roleGroup','roles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, RoleGroup $roleGroup)
    {
        $roleGroup->name = $request->name;
        $roleGroup->save();

        Role::where('role_group_id',$roleGroup->id)->delete();
        $roles = [];
        foreach ($request->input('role',[]) as $roleKey){
            $role = new Role();
            $role->role_group_id = $roleGroup->id;
            $roles [] = [
                'role_group_id' => $roleGroup->id,
                'key' => $roleKey
            ];
        }

        if (!empty($roles)){
            Role::insert($roles);
        }

        return redirect()->back()->with('success', __('Başarıyla Güncellendi'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(RoleGroup $roleGroup)
    {
        $user = User::where('role_group_id',$roleGroup->id)->first();
        if ($user)
            return redirect()->back()->with('error','Role Bağlı Kullanıcı(lar) var. '.$user->name);

        $roleGroup->delete();

        return redirect()->back()->with('success', __('Başarıyla Silindi.'));
    }
}
