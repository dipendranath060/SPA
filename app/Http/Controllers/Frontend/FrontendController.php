<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Blog;
use App\Models\Milestone;
use App\Models\Package;
use App\Models\Service;
use App\Models\Team;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        $blogs = Package::orderBy('created_at', 'DESC')->get();
        $banners = Banner::orderBy('created_at', 'DESC')->get();
        $milestones = Milestone::all();
        $services = Service::all();
        return view('frontend.index', compact('services', 'milestones', 'banners', 'blogs'));
    }

    public function about()
    {
        $testimonials = Testimonial::all();
        $milestones = Milestone::all();
        $teams = Team::all();
        return view('frontend.about', compact('teams','milestones','testimonials'));
    }

    public function service()
    {
        $services = Service::all();
        $packages = Package::all();
        return view('frontend.service', compact('services','packages'));
    }


    public function blog()
    {
        $blogs = Blog::paginate(6);
        $latestPackage = Package::orderBy('created_at', 'DESC')->get();

        return view('frontend.blog', compact('blogs', 'latestPackage'));
    }

    public function contact()
    {
        $packages = Package::select('id','title')->get();
        return view('frontend.contact', compact('packages'));
    }

    public function show_blog(string $blog_slug)
    {
        $blogs = Blog::where('blog_slug', $blog_slug)->first();
        $latestBlog = Blog::orderBy('created_at', 'DESC')->get();
        return view('frontend.show-blog', compact('blogs', 'latestBlog'));
    }

    public function show_service(string $service_slug)
    {
        $services = Service::where('service_slug', $service_slug)->first();
        $otherServices = Service::orderBy('created_at', 'DESC')->get();
        return view('frontend.show-service', compact('services', 'otherServices'));
    }
}
