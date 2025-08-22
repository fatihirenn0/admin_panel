<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactMessage;
use Illuminate\Http\Request;

class HelperController extends Controller
{
    public function index()
    {
        return view(
            'admin.pages.index'
        );
    }
}
