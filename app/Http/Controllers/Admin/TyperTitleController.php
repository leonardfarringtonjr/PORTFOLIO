<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\TyperTitleDataTable;
use App\Http\Controllers\Controller;
use App\Models\TyperTitle;
use Illuminate\Http\Request;

class TyperTitleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(TyperTitleDataTable $typerTitleDataTable)
    {
        return $typerTitleDataTable->render('admin.typer-title.index'); // YOU HAVE TO CALL A DOUBLE INSTANCE
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.typer-title.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());

        // (1) VALIDATE THE DATA
        $request->validate([
            'title' => ['required', 'max:200']
        ]);

        // (2) STORE THE DATA INTO THE DB BY INVOKING ITS MODEL
        $create = new TyperTitle(); // STORES THE MODEL DATA INTO A VAR // INSTANTIATES THE TYPER TITLE CLASS
        $create->title = $request->title; // WE GET THE TITLE COLUMN FROM THE MODEL // WE THEN ASSIGN IT A NEW VALUE
        $create->save(); // THEN WE SAVE THE DATA

        toastr()->success('Updated Successfully!', 'Congrats!');
        // return redirect()->back();
        return redirect()->route('admin.typer-title.index');

        //

        /*

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

        */
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
