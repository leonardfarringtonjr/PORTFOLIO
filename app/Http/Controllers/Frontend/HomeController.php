<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Hero;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $hero = Hero::find(1);
        return view('frontend.home', compact('hero')); // creates an array containing vars and their values // creates an array where the key is 'hero' // the data is then passed as data to the view
    }
}
