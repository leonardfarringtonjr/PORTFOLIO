<?php

use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\HeroController;
use App\Http\Controllers\Admin\PortfolioItem;
use App\Http\Controllers\Admin\ProfileController;
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

// Route::get('/', function () {
//     return view('frontend.home');
// });

Route::get('/', [HomeController::class, 'index'])->name('home');

// BLOG PAGE ROUTES
Route::get('/blog', function () {
    return view('frontend.pages.blog-pages.blog');
});

Route::get('/blog-details', function () {
    return view('frontend.pages.blog-pages.blog-details');
});

// PORTFOLIO ROUTES
Route::get('/portfolio-details', function () {
    return view('frontend.pages.portfolio-pages.portfolio-details');
});

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

    // ABOUT PAGE
    Route::resource('about', AboutController::class); // we declare the 'about' route

    /* PORTFOLIO ROUTES */

    // PORTFOLIO / CATEGORY PAGE
    Route::resource('category', CategoryController::class);

    // PORTFOLIO / PORTFOLIO ITEM
    Route::resource('portfolio-item', PortfolioItem::class); // the first param is the route you create // THIS IS ROUTE DECLARATION / Route:resource defines a RESTFUL ROUTE / The class specifies the controller that will handle the request / When you use Route::resource, LARAVEL AUTO GENERATES THE NECESSARY ROUTES FOR IT

});
