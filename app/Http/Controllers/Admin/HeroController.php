<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Hero;
use Illuminate\Http\Request;
use File;

class HeroController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $hero = Hero::find(1); // RETRIEVES A RECORD/ID FROM THE DB TABLE 'HERO' AND STORES IT INTO A VAR TO BE USED WITHIN THE VIEW IT RETURNS
        return view('admin.sections.hero.index', compact('hero'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => ['required', 'max:200'],
            'sub_title' => ['required', 'max:500'],
            'image' => ['max:3000', 'image'],
        ]);

        $hero_image = Hero::find(1); // STORES THE HERO IMAGE

        if($request->hasFile('image')){

            if($hero_image && File::exists(public_path($hero_image->image))){ // CHECKS IF THERE IS A HERO IMAGE
                File::delete(public_path($hero_image->image)); // DELETES THE OLD FILE
            }

            $image = $request->file('image');
            $imageName = rand().$image->getClientOriginalName(); // GRABS THE FILE'S ORIGINAL NAME, THE METHOD RETURNS THE FILENAME AND ITS EXTENSION, IT MAKES SURE EVERY FILE YOU UPLOAD IS UNIQUE
            $image->move(public_path('/uploads'), $imageName); // STORES THE IMAGE INTO THE UPLOADS FOLDER
            $imagePath = "/uploads/".$imageName; // SAVES THE IMAGE PATH INTO THE DB
        }

        // CHECKS IF DATA EXISTS AND THEN CREATES IT OR UPDATES IT
        Hero::updateOrCreate(
            ['id' => $id],
            [
                'title' => $request->title,
                'sub_title' => $request->sub_title,
                'btn_text' => $request->btn_text,
                'btn_url' => $request->btn_url,
                // 'image' => isset($imagePath) ? $imagePath : '', // IF THE VAR IS NOT SET, IT SETS IT TO EMPTY, IF IT IS SET, IT ASSIGNS ITS VALUE TO BE THE $imageParth VAR
                'image' => isset($imagePath) ? $imagePath : $hero_image->image,
            ],
        );

        toastr()->success('Updated Successfully!', 'Congrats!');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    // public function destroy(string $id)
    // {
    //     //
    // }
}
