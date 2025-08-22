<?php


return [
    'resources' => [
        'blogs' => [
            'routeName' => [
                'tr' => 'bloglar',
                'en' => 'blogs'
            ],
            'controller' => \App\Http\Controllers\Site\BlogController::class,
            'model' => \App\Models\Blog::class
        ],
        'blog_categories'=> [
            'routeName' => [
                'tr' => 'blog-kategorileri',
                'en' => 'blog-categories'
            ],
            'controller' => \App\Http\Controllers\Site\BlogCategoryController::class,
            'model' => \App\Models\BlogCategory::class
        ],
        'projects'=> [
            'routeName' => [
                'tr' => 'projeler',
                'en' => 'projects'
            ],
            'controller' => \App\Http\Controllers\Site\ProjectController::class,
            'model' => \App\Models\Project::class
        ],
        'project_categories'=> [
            'routeName' => [
                'tr' => 'proje-kategorileri',
                'en' => 'project-categories'
            ],
            'controller' => \App\Http\Controllers\Site\ProjectCategoryController::class,
            'model' => \App\Models\ProjectCategory::class
        ],
        'teams'=> [
            'routeName' => [
                'tr' => 'ekibimiz',
                'en' => 'teams'
            ],
            'controller' => \App\Http\Controllers\Site\TeamController::class,
            'model' => \App\Models\Team::class
        ],
        'team_categories'=> [
            'routeName' => [
                'tr' => 'ekip-kategorileri',
                'en' => 'team-categories'
            ],
            'controller' => \App\Http\Controllers\Site\TeamCategoryController::class,
            'model' => \App\Models\TeamCategory::class
        ],
        'customer_comments'=> [
            'routeName' => [
                'tr' => 'musteri-yorumlari',
                'en' => 'customer-comments'
            ],
            'controller' => \App\Http\Controllers\Site\CustomerCommentController::class,
            'model' => \App\Models\CustomerComment::class
        ],
        'faqs'=> [
            'routeName' => [
                'tr' => 'sikca-sorulan-sorular',
                'en' => 'frequently-asked-questions'
            ],
            'controller' => \App\Http\Controllers\Site\FaqController::class,
            'model' => \App\Models\Faq::class
        ],
        'services'=> [
            'routeName' => [
                'tr' => 'hizmetler',
                'en' => 'services'
            ],
            'controller' => \App\Http\Controllers\Site\ServiceController::class,
            'model' => \App\Models\Service::class
        ],
        'service_categories'=> [
            'routeName' => [
                'tr' => 'hizmet-kategorileri',
                'en' => 'service-categories'
            ],
            'controller' => \App\Http\Controllers\Site\ServiceCategoryController::class,
            'model' => \App\Models\ServiceCategory::class
        ],
        'pages'=> [
            'routeName' => [
                'tr' => 'kurumsal',
                'en' => 'corporate'
            ],
            'controller' => \App\Http\Controllers\Site\PageController::class,
            'model' => \App\Models\Page::class
        ],
    ],
    'others' => [
        'contact' => [
            'routeName' => [
                'tr' => '/iletisim',
                'en' => '/contact'
            ],
            'controller' => \App\Http\Controllers\Site\HelperController::class,
            'method' => 'contact',
            'name' => 'contact'
        ],
        'search' => [
            'routeName' => [
                'tr' => '/arama-sonuclari',
                'en' => '/search-results'
            ],
            'controller' => \App\Http\Controllers\Site\HelperController::class,
            'method' => 'search',
            'name' => 'search'
        ]
    ],
];

