<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Experience;
use App\Models\Hero;
use App\Models\About;
use App\Models\PortfolioItem;
use App\Models\PortfolioSectionSetting;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {

        // SECTIONS
        $hero = Hero::first(); // TAKES THE FIRST ROW FROM THE 'HERO' MODEL OF THE DB // STORES ITS DATA INTO A VAR
        $about = About::first();
        $portfolioTitle = PortfolioSectionSetting::first();
        $portfolioCategories = Category::all();
        $portfolioItems = PortfolioItem::all();
        $experience = Experience::first();
        return view(
            'frontend.home',
            compact(
                'hero',
                'about',
                'portfolioTitle',
                'portfolioCategories',
                'portfolioItems',
                'experience',
            )
        ); // creates an array containing vars and their values // creates an array where the key is 'hero' // the data is then passed as data to the view

    }

    public function showPortfolio($id){
        $portfolioItem = PortfolioItem::findOrFail($id); // WE USE FINDORFAIL BECAUSE WE ARE GRABBING A SPECIFIC ROW WITH THE SPECIFIC ID
        return view(
            'frontend.pages.portfolio-pages.portfolio-details',
            compact(
                'id',
                'portfolioItem'
        )
    );
    }
}
