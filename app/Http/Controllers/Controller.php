<?php

namespace App\Http\Controllers;

abstract class Controller
{
    public string $activeTheme;

    public function __construct()
    {
        $this->activeTheme = app('themeSettings')->get('active_theme');
    }
}
