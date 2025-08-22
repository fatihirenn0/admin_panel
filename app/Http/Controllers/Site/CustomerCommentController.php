<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\CustomerComment;
use Illuminate\Http\Request;

class CustomerCommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $customerComments = CustomerComment::orderBy('rank')->get();
        return view($this->activeTheme.'.pages.customer_comment', compact('customerComments'));
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
    public function show(CustomerComment $customerComment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CustomerComment $customerComment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CustomerComment $customerComment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CustomerComment $customerComment)
    {
        //
    }
}
