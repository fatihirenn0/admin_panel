<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HelperController extends Controller
{
    public function index()
    {
        return view(
            'admin.pages.index'
        );
    }

    public function login()
    {
        return view('admin.pages.login');
    }

    public function loginPost(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials, $request->filled('remember'))) {
            $request->session()->regenerate();

            return redirect()->intended($request->return_url ?? route('admin.index'));
        }

        return back()->with('error','Geçersiz Bilgiler')->withInput();
    }

    public function logout(Request $request)
    {
        Auth::logout(); // Kullanıcının oturumunu kapat

        $request->session()->invalidate(); // session id sıfırla
        $request->session()->regenerateToken(); // CSRF token yenile

        return redirect()->route('admin.login'); // login sayfasına yönlendir
    }

    public function translations()
    {
        if (isset($_GET['type']) && $_GET['type'] == 'delete'){
            DB::table('ltm_translations')->where('group','_json')->delete();
        }elseif (isset($_GET['type']) && $_GET['type'] == 'find'){
            Artisan::call("translations:find");
        }

        return view('admin.pages.translations');
    }
}
