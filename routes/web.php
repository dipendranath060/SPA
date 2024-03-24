<?php

use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\MilestoneController;
use App\Http\Controllers\Admin\PackageController;
use App\Http\Controllers\Admin\SendMailController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\TeamController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Frontend\FrontendController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [FrontendController::class, 'index'])->name('homes');
Route::get('/about', [FrontendController::class, 'about'])->name('about');
Route::get('/contact', [FrontendController::class, 'contact'])->name('contact');
Route::get('/service', [FrontendController::class, 'service'])->name('service');
Route::get('/blog', [FrontendController::class, 'blog'])->name('blog');
Route::get('/blog/{blog_slug}', [FrontendController::class, 'show_blog']);
Route::get('/service/{service_slug}', [FrontendController::class, 'show_service']);
Route::post('/sendMail', [SendMailController::class, 'index'])->name('sendMail');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::prefix('admin')->middleware(['auth', 'isAdmin'])->group(function(){
    
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/profile', [DashboardController::class, 'profile'])->name('profile');


//Routes for Services
Route::get('/services', [ServiceController::class, 'index'])->name('services');
Route::get('/add-service', [ServiceController::class, 'create'])->name('add-service');
Route::post('/add-service', [ServiceController::class, 'store']);
Route::get('/edit-service/{id}', [ServiceController::class, 'edit'])->name('edit-service');
Route::put('/update-service/{id}', [ServiceController::class, 'update'])->name('update-service');
Route::delete('/delete-service/{id}', [ServiceController::class, 'destroy'])->name('delete-service');


//Routes for Packages
Route::get('/packages', [PackageController::class, 'index'])->name('packages');
Route::get('/add-package', [PackageController::class, 'create'])->name('add-package');
Route::post('/add-package', [PackageController::class, 'store']);
Route::get('/edit-package/{id}', [PackageController::class, 'edit'])->name('edit-package');
Route::put('/update-package/{id}', [PackageController::class, 'update'])->name('update-package');
Route::delete('/delete-package/{id}', [PackageController::class, 'destroy'])->name('delete-package');


//Routes for Team members
Route::get('/members', [TeamController::class, 'index'])->name('members');
Route::get('/add-member', [TeamController::class, 'create'])->name('add-member');
Route::post('/add-member', [TeamController::class, 'store']);
Route::get('/edit-member/{id}', [TeamController::class, 'edit'])->name('edit-member');
Route::put('/update-member/{id}', [TeamController::class, 'update'])->name('update-member');
Route::delete('/delete-member/{id}', [TeamController::class, 'destroy'])->name('delete-member');


//Routes for blogs
Route::get('/blogs', [BlogController::class, 'index'])->name('blogs');
Route::get('/add-blog', [BlogController::class, 'create'])->name('add-blog');
Route::post('/add-blog', [BlogController::class, 'store']);
Route::get('/edit-blog/{id}', [BlogController::class, 'edit'])->name('edit-blog');
Route::put('/update-blog/{id}', [BlogController::class, 'update'])->name('update-blog');
Route::delete('/delete-blog/{id}', [BlogController::class, 'destroy'])->name('delete-blog');


//Routes for testimonials
Route::get('/testimonials', [TestimonialController::class, 'index'])->name('testimonials');
Route::get('/add-testimonial', [TestimonialController::class, 'create'])->name('add-testimonial');
Route::post('/add-testimonial', [TestimonialController::class, 'store']);
Route::get('/edit-testimonial/{id}', [TestimonialController::class, 'edit'])->name('edit-testimonial');
Route::put('/update-testimonial/{id}', [TestimonialController::class, 'update'])->name('update-testimonial');
Route::delete('/delete-testimonial/{id}', [TestimonialController::class, 'destroy'])->name('delete-testimonial');


//Routes for Milestones
Route::get('/milestones', [MilestoneController::class, 'index'])->name('milestones');
Route::get('/add-milestone', [MilestoneController::class, 'create'])->name('add-milestone');
Route::post('/add-milestone', [MilestoneController::class, 'store']);
Route::get('/edit-milestone/{id}', [MilestoneController::class, 'edit'])->name('edit-milestone');
Route::put('/update-milestone/{id}', [MilestoneController::class, 'update'])->name('update-milestone');
Route::delete('/delete-milestone/{id}', [MilestoneController::class, 'destroy'])->name('delete-milestone');


//Routes for Banners
Route::get('/banners', [BannerController::class, 'index'])->name('banners');
Route::get('/add-banner', [BannerController::class, 'create'])->name('add-banner');
Route::post('/add-banner', [BannerController::class, 'store']);
Route::get('/edit-banner/{id}', [BannerController::class, 'edit'])->name('edit-banner');
Route::put('/update-banner/{id}', [BannerController::class, 'update'])->name('update-banner');
Route::delete('/delete-banner/{id}', [BannerController::class, 'destroy'])->name('delete-banner');


//Routes for Users
Route::get('/users', [UserController::class, 'index'])->name('users');
Route::get('/add-user', [UserController::class, 'create'])->name('add-user');
Route::post('/add-user', [UserController::class, 'store'])->name('store-user');
Route::get('/edit-user/{id}', [UserController::class, 'edit'])->name('edit-user');
Route::put('/update-user/{id}', [UserController::class, 'update'])->name('update-user');
Route::delete('/delete-user/{id}', [UserController::class, 'destroy'])->name('delete-user');

});