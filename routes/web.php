<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('admin.pages.index');
})->name('admin.index');


Route::prefix('admin')->as('admin.')->group(function () {


    Route::resources([
        'blog-categories' => \App\Http\Controllers\Admin\BlogCategoryController::class,
        'catalog-categories' => \App\Http\Controllers\Admin\CatalogCategoryController::class,
        'faq-categories' => \App\Http\Controllers\Admin\FaqCategoryController::class,
        'news-categories' => \App\Http\Controllers\Admin\NewCategoryController::class,
        'photo-categories' => \App\Http\Controllers\Admin\PhotoCategoryController::class,
        'product-categories' => \App\Http\Controllers\Admin\ProductCategoryController::class,
        'project-categories' => \App\Http\Controllers\Admin\ProjectCategoryController::class,
        'service-categories' => \App\Http\Controllers\Admin\ServiceCategoryController::class,
        'applications' => \App\Http\Controllers\Admin\ApplicationController::class,
        'contact-messages' => \App\Http\Controllers\Admin\ContactMessageController::class,
        'contact-people' => \App\Http\Controllers\Admin\ContactPeopleController::class,
        'faqs' => \App\Http\Controllers\Admin\FaqController::class,
        'team-categories' => \App\Http\Controllers\Admin\TeamCategoryController::class,
        'video-categories' => \App\Http\Controllers\Admin\VideoCategoryController::class,
        'files' => \App\Http\Controllers\Admin\FileController::class,
        'announcements' => \App\Http\Controllers\Admin\AnnouncementController::class,
        'blogs' => \App\Http\Controllers\Admin\BlogController::class,
        'news' => \App\Http\Controllers\Admin\NewsController::class,
        'customer-comments' => \App\Http\Controllers\Admin\CustomerCommentController::class,
        'locales' => \App\Http\Controllers\Admin\LocaleController::class,
        'newsletters' => \App\Http\Controllers\Admin\NewsletterController::class,
        'milestones' => \App\Http\Controllers\Admin\MilestoneController::class,
        'photos' => \App\Http\Controllers\Admin\PhotoController::class,
        'catalogs' => \App\Http\Controllers\Admin\CatalogController::class,
        'videos' => \App\Http\Controllers\Admin\VideoController::class,
        'teams' => \App\Http\Controllers\Admin\TeamController::class,
        'references' => \App\Http\Controllers\Admin\ReferenceController::class,
        'settings' => \App\Http\Controllers\Admin\SettingController::class,
        'pages' => \App\Http\Controllers\Admin\PageController::class,
        'projects' => \App\Http\Controllers\Admin\ProjectController::class,
        'role-groups' => \App\Http\Controllers\Admin\RoleGroupController::class,
    ]);

    Route::prefix('ajax')->as('ajax.')->group(function () {
        Route::post('/blog-categories', [\App\Http\Controllers\Admin\BlogCategoryController::class, 'ajax'])->name('blog-categories');
        Route::post('/catalog-categories' , [\App\Http\Controllers\Admin\CatalogCategoryController::class, 'ajax'])->name('catalog-categories');
        Route::post('/faq-categories' , [\App\Http\Controllers\Admin\FaqCategoryController::class, 'ajax'])->name('faq-categories');
        Route::post('/news-categories' , [\App\Http\Controllers\Admin\NewCategoryController::class, 'ajax'])->name('news-categories');
        Route::post('/photo-categories' , [\App\Http\Controllers\Admin\PhotoCategoryController::class, 'ajax'])->name('photo-categories');
        Route::post('/product-categories' , [\App\Http\Controllers\Admin\ProductCategoryController::class, 'ajax'])->name('product-categories');
        Route::post('/project-categories' , [\App\Http\Controllers\Admin\ProjectCategoryController::class, 'ajax'])->name('project-categories');
        Route::post('/service-categories' , [\App\Http\Controllers\Admin\ServiceCategoryController::class, 'ajax'])->name('service-categories');
        Route::post('/applications' , [\App\Http\Controllers\Admin\ApplicationController::class, 'ajax'])->name('applications');
        Route::post('/contact-messages' , [\App\Http\Controllers\Admin\ContactMessageController::class, 'ajax'])->name('contact-messages');
        Route::post('/contact-people' , [\App\Http\Controllers\Admin\ContactPeopleController::class, 'ajax'])->name('contact-people');
        Route::post('/faqs' , [\App\Http\Controllers\Admin\FaqController::class, 'ajax'])->name('faqs');
        Route::post('/team-categories' , [\App\Http\Controllers\Admin\TeamCategoryController::class, 'ajax'])->name('team-categories');
        Route::post('/video-categories' , [\App\Http\Controllers\Admin\VideoCategoryController::class, 'ajax'])->name('video-categories');
        Route::post('/files' , [\App\Http\Controllers\Admin\FileController::class, 'ajax'])->name('files');
        Route::post('/announcements', [\App\Http\Controllers\Admin\AnnouncementController::class, 'ajax'])->name('announcements');
        Route::post('/blogs', [\App\Http\Controllers\Admin\BlogController::class, 'ajax'])->name('blogs');
        Route::post('/news', [\App\Http\Controllers\Admin\NewsController::class, 'ajax'])->name('news');
        Route::post('/pages', [\App\Http\Controllers\Admin\PageController::class, 'ajax'])->name('pages');
        Route::post('customer-comments', [\App\Http\Controllers\Admin\CustomerCommentController::class, 'ajax'])->name('customer-comments');
        Route::post('locales', [\App\Http\Controllers\Admin\LocaleController::class, 'ajax'])->name('locales');
        Route::post('newsletters', [\App\Http\Controllers\Admin\NewsletterController::class, 'ajax'])->name('newsletters');
        Route::post('milestones', [\App\Http\Controllers\Admin\MilestoneController::class, 'ajax'])->name('milestones');
        Route::post('photos', [\App\Http\Controllers\Admin\PhotoController::class, 'ajax'])->name('photos');
        Route::post('catalogs', [\App\Http\Controllers\Admin\CatalogController::class, 'ajax'])->name('catalogs');
        Route::post('videos', [\App\Http\Controllers\Admin\VideoController::class, 'ajax'])->name('videos');
        Route::post('teams', [\App\Http\Controllers\Admin\TeamController::class, 'ajax'])->name('teams');
        Route::post('references', [\App\Http\Controllers\Admin\ReferenceController::class, 'ajax'])->name('references');
        Route::post('settings', [\App\Http\Controllers\Admin\SettingController::class, 'ajax'])->name('settings');
        Route::post('projects', [\App\Http\Controllers\Admin\ProjectController::class, 'ajax'])->name('projects');
        Route::post('role-groups', [\App\Http\Controllers\Admin\RoleGroupController::class, 'ajax'])->name('role-groups');
    });
});
