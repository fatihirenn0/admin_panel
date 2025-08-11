<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('admin.pages.index');
})->name('admin.index');


Route::prefix('admin')->as('admin.')->group(function () {


    Route::resources([
        'blog-categories' => \App\Http\Controllers\Admin\BlogCategoryController::class,
        'announcements' => \App\Http\Controllers\Admin\AnnouncementController::class,
        'blogs' => \App\Http\Controllers\Admin\BlogController::class,
    ]);

    Route::prefix('ajax')->as('ajax.')->group(function () {
        Route::post('/blog-categories', [\App\Http\Controllers\Admin\BlogCategoryController::class, 'ajax'])->name('blog-categories');
        Route::post('/announcements', [\App\Http\Controllers\Admin\AnnouncementController::class, 'ajax'])->name('announcements');
        Route::post('/blogs', [\App\Http\Controllers\Admin\BlogController::class, 'ajax'])->name('blogs');
    });
});
