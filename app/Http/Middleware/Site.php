<?php

namespace App\Http\Middleware;

use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\Locale;
use App\Models\CustomerComment;
use App\Models\Faq;
use App\Models\Milestone;
use App\Models\Page;
use App\Models\Project;
use App\Models\ProjectCategory;
use App\Models\Reference;
use App\Models\Service;
use App\Models\ServiceCategory;
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
        $allComments = Schema::hasTable('customer_comments') ? CustomerComment::orderBy('rank')->get() : collect();
        $allProjectCategories = Schema::hasTable('project_categories') ? ProjectCategory::orderBy('rank')->get() : collect();
        $allFaqs = Schema::hasTable('faqs') ? Faq::orderBy('rank')->get() : collect();
        $allReferences = Schema::hasTable('references') ? Reference::orderBy('rank')->get() : collect();
        $allMilestones = Schema::hasTable('milestones') ? Milestone::orderBy('rank')->get() : collect();
        $allServiceCategories = Schema::hasTable('service_categories') ? ServiceCategory::orderBy('rank')->get() : collect();

        if (!session('locale')){
            session(['locale' => Locale::where('default',1)->first()?->locale]);
        }
        App::setLocale(session('locale','tr'));

        view()->share('allPages', $allPages);
        view()->share('allServices', $allServices);
        view()->share('allProjects', $allProjects);
        view()->share('allBlogCategories', $allBlogCategories);
        view()->share('allTeams', $allTeams);
        view()->share('allBlogs', $allBlogs);
        view()->share('allComments', $allComments);
        view()->share('allProjectCategories', $allProjectCategories);
        view()->share('allFaqs', $allFaqs);
        view()->share('allReferences', $allReferences);
        view()->share('allMilestones', $allMilestones);
        view()->share('allServiceCategories', $allServiceCategories);
        return $next($request);
    }
}
