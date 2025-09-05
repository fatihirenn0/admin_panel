<?php

if (! function_exists('getResourceSlug')) {
    function getResourceSlug($resource){
        return config('routes.resources.'.$resource.'.routeName.'.app()->getLocale());
    }
}

if (! function_exists('getResourceFullLink')) {
    function getResourceFullLink($resource,$view = 'index'){
        return "site.".getResourceSlug($resource).".{$view}";
    }
}

if (! function_exists('getOtherSlug')) {
    function getOtherSlug($other){
        return config('routes.others.'.$other.'.routeName.'.app()->getLocale());
    }
}

if (! function_exists('getOtherFullLink')) {
    function getOtherFullLink($other){
        return "site.".config('routes.others.'.$other.'.name').".".app()->getLocale();
    }
}

if (!function_exists('menuItemClass')) {
    function menuItemClass($patterns, $type = 'parent')
    {
        $route = \Illuminate\Support\Facades\Route::currentRouteName();

        foreach ((array)$patterns as $pattern) {
            if (\Illuminate\Support\Str::is($pattern, $route)) {
                return $type === 'parent' ? 'active open' : 'active';
            }
        }

        return '';
    }
}

if (!function_exists('hasAnyRole')) {
    function hasAnyRole(string $prefix, array $roles): bool
    {
        return collect($roles)->contains(function ($role) use ($prefix) {
            return str_starts_with($role, $prefix.'_');
        });
    }
}
