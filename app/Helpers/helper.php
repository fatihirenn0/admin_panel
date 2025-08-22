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
        return "site.".config('routes.others.'.$other.'.name');
    }
}
