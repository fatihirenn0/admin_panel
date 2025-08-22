<?php

namespace App\Http\Middleware;

use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\Page;
use App\Models\Project;
use App\Models\Service;
use App\Models\Team;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Schema;
use Symfony\Component\HttpFoundation\Response;

class Site
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $allPages = Schema::hasTable('pages') ? Page::orderBy('rank')->get() : collect();
        $allServices = Schema::hasTable('services') ? Service::orderBy('rank')->get() : collect();
        $allProjects = Schema::hasTable('projects') ? Project::orderBy('rank')->get() : collect();
        $allBlogCategories = Schema::hasTable('blog_categories') ? BlogCategory::orderBy('rank')->get() : collect();
        $allTeams = Schema::hasTable('teams') ? Team::orderBy('rank')->get() : collect();
        $allBlogs = Schema::hasTable('blogs') ? Blog::orderBy('rank')->get() : collect();

        App::setLocale(session('locale','tr'));

        view()->share('allPages', $allPages);
        view()->share('allServices', $allServices);
        view()->share('allProjects', $allProjects);
        view()->share('allBlogCategories', $allBlogCategories);
        view()->share('allTeams', $allTeams);
        view()->share('allBlogs', $allBlogs);
        return $next($request);
    }
}
