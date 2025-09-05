<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\ContactMessage;
use App\Models\Page;
use App\Models\Project;
use App\Models\Reference;
use App\Models\Service;
use App\Models\Slider;
use Illuminate\Http\Request;

class HelperController extends Controller
{
    public function index()
    {
        $sliders = Slider::orderBy('rank')->get();
        $references = Reference::orderBy('rank')->get();
        return view($this->activeTheme.'.pages.'.app('themeSettings')->get('active_index'),compact(
            'sliders',
            'references'
        ));
    }

    public function contact()
    {
        return view(
            $this->activeTheme.'.pages.contact'
        );
    }

    public function search()
    {
        $pages = Page::where('name->'.app()->getLocale(),'like','%'.request('q').'%')->get();
        $services = Service::where('name->'.app()->getLocale(),'like','%'.request('q').'%')->get();
        $projects = Project::where('name->'.app()->getLocale(),'like','%'.request('q').'%')->get();
        $blogs = Blog::where('name->'.app()->getLocale(),'like','%'.request('q').'%')->get();
        return view(
            $this->activeTheme.'.pages.search',
            compact(
                'pages',
                'services',
                'projects',
                'blogs'
            )
        );
    }

    public function contactMessage(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255|string',
            'email' => 'required|email:rfc,dns|max:255',
            'telephone' => 'required|max:255|string',
            'subject' => 'required|max:255|string',
            'message' => 'required|max:1000|string',
        ],[],[
            'name' => __('Ad Soyad'),
            'email' => __('E-posta Adresi'),
            'telephone' => __('Telefon Numarası'),
            'subject' => __('Konu'),
            'message' => __('Mesaj'),
        ]);

        $contactMessage = new ContactMessage();
        $contactMessage->fill($request->all());
        $contactMessage->save();

        return redirect()->back()->with('success',__('Mesajınız gönderildi.'));
    }
}
