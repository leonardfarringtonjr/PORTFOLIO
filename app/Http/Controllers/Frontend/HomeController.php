<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Experience;
use App\Models\Feedback;
use App\Models\FeedbackSectionSettings;
use App\Models\Hero;
use App\Models\PortfolioItem;
use App\Models\PortfolioSectionSetting;
use App\Models\ServiceItem;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {

        // SECTIONS
        $hero = Hero::first(); // TAKES THE FIRST ROW FROM THE 'HERO' MODEL OF THE DB // STORES ITS DATA INTO A VAR
        $serviceItems = ServiceItem::all();
        $about = About::first();
        $blogs = Blog::all();
        $portfolioTitle = PortfolioSectionSetting::first();
        $portfolioCategories = Category::all();
        $portfolioItems = PortfolioItem::all();
        $experience = Experience::first();
        $feedbackItems = Feedback::all();
        $feedbackSettings = FeedbackSectionSettings::first();
        return view(
            'frontend.home',
            compact(
                'hero',
                'serviceItems',
                'about',
                'portfolioTitle',
                'portfolioCategories',
                'portfolioItems',
                'experience',
                'feedbackItems',
                'feedbackSettings',
                'blogs',
            )
        ); // creates an array containing vars and their values // creates an array where the key is 'hero' // the data is then passed as data to the view

    }

    // SHOW DYNAMIC PORTFOLIO PAGES
    public function showPortfolio($id)
    {
        $portfolioItem = PortfolioItem::findOrFail($id); // WE USE FINDORFAIL BECAUSE WE ARE GRABBING A SPECIFIC ROW WITH THE SPECIFIC ID
        return view(
            'frontend.pages.portfolio-pages.portfolio-details',
            compact(
                'id',
                'portfolioItem'
            )
        );
    }

    // SHOW DYNAMIC BLOG PAGES
    // THE ID IS PASSED TO THE METHOD FROM THE ROUTE
    public function showBlog($id){
        $blogItem = Blog::findOrFail($id);
        $previousPost = Blog::where('id','<', $blogItem->id)->orderBy('id','desc')->first();// SHOWS THE PREVIOUS PERK
        $nextPost = Blog::where('id','>', $blogItem->id)->orderBy('id','asc')->first();// SHOWS THE PREVIOUS PERK
        return view('frontend.pages.blog-pages.blog-details',compact('id','blogItem','previousPost','nextPost'));
    }

    // SHOW ALL BLOGS
    public function blog()
    {
        // $blogs = Blog::latest()->paginate(1);
        $blogs = Blog::latest()->paginate(9);
        return view('frontend.pages.blog-pages.blog', compact('blogs'));
    }
}
