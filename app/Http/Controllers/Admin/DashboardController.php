<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Package;
use App\Models\Service;
use App\Models\Team;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $latestPackage = Package::orderBy('created_at', 'DESC')->get();
        $services = Service::count();
        $packages = Package::count();
        $members = Team::count();
        $blogs = Blog::count();
        return view('admin.dashboard', compact('services', 'packages', 'members', 'blogs', 'latestPackage'));
    }

    public function profile()
    {
        return view('admin.profile');
    }
}
