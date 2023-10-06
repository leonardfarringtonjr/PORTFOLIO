<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\About;
use Illuminate\Http\Request;
use File;

class AboutController extends Controller
{
    // public function index(Request $request, string $id){
    public function index(Request $request){
        $about = About::find(1); // WE SEARCH THE 'ABOUT' MODEL FOR ID '1'
        return view('admin.sections.about.index', compact('about')); // WE PASS THE VAR 'ABOUT' TO THE VIEW
    }

    public function update(Request $request, string $id){

        // (1) VALIDATE THE DATA
        $request->validate([
            'image' => ['required', 'image'],
            'title' => ['required', 'max:200'],
            'sub_title' => ['required', 'max:500'],
            'description' => ['max: 300']
        ]);

        $about = About::first(); // STORES THE MODEL ROW
        $imagePath = handleUpload('image',$about); // RETURNS THE PATH OF THE IMAGE

        // (2) SENDS THE DATA TO THE DB
        // CHECKS IF DATA EXISTS AND THEN CREATES IT OR UPDATES IT IN THE DB
        About::updateOrCreate(
            ['id' => $id], // CHECKS IF WE HAVE AN 'ID' OF '1' // IF NOT, IT CREATES A NEW ENTRY // IF SO, IT UPDATES THE ENTRY
            [
                'image' => (!empty($imagePath) ? $imagePath : $about->image),
                'title' => $request->title,
                'sub_title' => $request->sub_title,
                'description' => $request->description,
            ],
        );

        toastr()->success('Updated Successfully!', 'Congrats!');
        return redirect()->back();

    }
}
