<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('admin.pages.index');
})->name('admin.index');


Route::prefix('admin')->as('admin.')->group(function () {


    Route::resources([
        'blog-categories' => \App\Http\Controllers\Admin\BlogCategoryController::class
    ]);

    Route::prefix('ajax')->as('ajax.')->group(function () {
        Route::post('/blog-categories', [\App\Http\Controllers\Admin\BlogCategoryController::class, 'ajax'])->name('blog-categories');
    });
});
