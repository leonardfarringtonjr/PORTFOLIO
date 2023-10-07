<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Hero;
use App\Models\About;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){

        // SECTIONS
        $hero = Hero::first(); // TAKES THE FIRST ROW FROM THE 'HERO' MODEL OF THE DB // STORES ITS DATA INTO A VAR
        $about = About::first();
        return view('frontend.home', compact('hero', 'about')); // creates an array containing vars and their values // creates an array where the key is 'hero' // the data is then passed as data to the view

    }
}
