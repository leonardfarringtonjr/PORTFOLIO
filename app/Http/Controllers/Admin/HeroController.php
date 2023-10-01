<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Hero;
use Illuminate\Http\Request;

class HeroController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.hero.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
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

        if($request->hasFile('image')){
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
                // 'image' => $imagePath,
                'image' => isset($imagePath) ? $imagePath : '', // IF THE VAR IS NOT SET, IT SETS IT TO EMPTY, IF IT IS SET, IT ASSIGNS ITS VALUE TO BE THE $imageParth VAR
            ],
        );

        toastr()->success('Updated Successfully!', 'Congrats!');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
