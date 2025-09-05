<?php

namespace App\Http\Controllers;

use App\Models\Role;

abstract class Controller
{
    public string $activeTheme;

    public function __construct()
    {
        $this->activeTheme = app('themeSettings')->get('active_theme');

        $keyMap = [
            'index'   => 'list',
            'create'  => 'add',
            'store'   => 'add',
            'show'    => 'list',
            'edit'    => 'edit',
            'update'  => 'edit',
            'destroy' => 'delete',
        ];

        $method = request()->route()->getActionMethod();

        if (isset($this->roleKey) && array_key_exists($method, $keyMap)) {
            $check = Role::where('role_group_id', auth()->user()->role_group_id)
                ->where('key', $this->roleKey . '_' . $keyMap[$method])
                ->exists();

            if (!$check) {
                abort(403, __('Bu işlemi yapmaya yetkiniz yok.'));
            }
        }
    }
}
