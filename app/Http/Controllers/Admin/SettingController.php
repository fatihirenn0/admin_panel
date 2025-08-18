<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $settings = Setting::all();
        return view('admin.pages.setting' , compact('settings'));
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
        $settings = Setting::all()->keyBy('key');

        foreach ($request->except('_token') as $key => $value) {
            if (!isset($settings[$key])) {
                $setting = new Setting();
                $setting->key = $key;
            }else{
                $setting = $settings[$key];
            }
            if ($request->hasFile($key)) {
                // önce eski dosya varsa sil
                if (!empty($settings[$key]?->value) && Storage::disk('public2')->exists($settings[$key]->value)) {
                    Storage::disk('public2')->delete($settings[$key]->value);
                }

                $setting->value = $request->file($key)->store('settings', 'public2');
            } else {
                $setting->value = $value;
            }

            $setting->save();
        }

        return redirect()->route('admin.settings.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Setting $setting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Setting $setting)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Setting $setting)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Setting $setting)
    {
        //
    }
}
