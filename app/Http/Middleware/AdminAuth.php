<?php

namespace App\Http\Middleware;

use App\Models\Role;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (auth()->check()){
            $authUserRoles = Role::where('role_group_id',auth()->user()->role_group_id)->pluck('key')->toArray();

            view()->share('authUserRoles', $authUserRoles);
            return $next($request);
        }
        else
            return redirect()->route('admin.login')->with('error','Lütfen önce giriş yapın');
    }
}
