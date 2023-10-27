<?php

use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\BlogCategoryController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ExperienceController;
use App\Http\Controllers\Admin\FeedbackController;
use App\Http\Controllers\Admin\FeedbackSectionSettingController;
use App\Http\Controllers\Admin\HeroController;
use App\Http\Controllers\Admin\PortfolioItem;
use App\Http\Controllers\Admin\PortfolioItemController;
use App\Http\Controllers\Admin\PortfolioSectionSettingController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\ServiceItemController;
use App\Http\Controllers\Admin\TyperTitleController;
use App\Http\Controllers\Frontend\HomeController;
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

// FRONTEND ROUTES

// DEFINES A SPECIFIC ACTION THAT SHOULD HAPPEN WHEN A USER ACCESSES A PARTICULAR URL USING THE HTTP GET METHOD // WHEN SOMEONE GOES TO THIS WEB ADDRESS, DO THIS
// THE CONTROLLER AND METHOD THAT SHOULD BE EXECUTED WHEN THE USER ACCESSES THE URL
// THE NAME I ASSIGN THE ROUTE GIVES ME A WAY TO INTERNALLY REFERENCE THE ROUTE // WHEN YOU CREATE A LINK, THE ROUTE TO GET BACK TO THE '/' PAGE IS SIMPLY 'HOME'
Route::get('/', [HomeController::class, 'index'])->name('home');

// BLOG PAGE ROUTES
Route::get('/blog', function () {
    return view('frontend.pages.blog-pages.blog');
});

Route::get('/blog-details', function () {
    return view('frontend.pages.blog-pages.blog-details');
});

// PORTFOLIO ROUTES
// Route::get('/portfolio-details', function () {
//     return view('frontend.pages.portfolio-pages.portfolio-details');
// });
Route::get('portfolio-details/{id}', [HomeController::class, 'showPortfolio'])->name('show.portfolio');

// WHEN YOU LOG IN YOU ARE REDIRECTED TO THE DASHBOARD
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

// ADMIN ROUTES

// prefix key -> adds to your URL
// as key -> adds the prefix to your route names
// 'admin' is the prefix to all routes you put into here
Route::group(['middleware' => ['auth'], 'prefix' => 'admin', 'as' => 'admin.'], function () {

    // HERO PAGE
    Route::resource('hero', HeroController::class);

    // TYPER TITLE
    Route::resource('typer-title', TyperTitleController::class); // WHEN YOU USE php artisan route:list // IT WILL CREATE A ROUTE FOR WHATEVER IS THE FIRST PARAM // admin/type-title/

    // SERVICE PAGE
    Route::resource('service-item', ServiceItemController::class);

    // ABOUT PAGE
    Route::resource('about', AboutController::class); // we declare the 'about' route

    // EXPERIENCE SECTION
    Route::resource('experience', ExperienceController::class);

    /* FEEDBACK ROUTES */

    // FEEDBACK SECTION
    Route::resource('feedback', FeedbackController::class);

    // FEEDBACK SETTING
    Route::resource('feedback-section-setting', FeedbackSectionSettingController::class);

    /* PORTFOLIO ROUTES */

    // PORTFOLIO CATEGORIES
    Route::resource('category', CategoryController::class);

    // PORTFOLIO / PORTFOLIO ITEM
    Route::resource('portfolio-item', PortfolioItemController::class); // the first param is the route you create // THIS IS ROUTE DECLARATION / Route:resource defines a RESTFUL ROUTE / The class specifies the controller that will handle the request / When you use Route::resource, LARAVEL AUTO GENERATES THE NECESSARY ROUTES FOR IT

    // PORTFOLIO / SECTION SETTINGS
    Route::resource('portfolio-section-setting', PortfolioSectionSettingController::class);

    /* BLOG ROUTES */

    // BLOG CATEGORIES
    Route::resource('blog-category', BlogCategoryController::class);

    // BLOG
    Route::resource('blog-list', BlogController::class);

});
