<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\HeroController;
use App\Http\Controllers\Admin\ProfileController;
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
    Route::resource('hero', HeroController::class);
});
