<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Experience;
use Illuminate\Http\Request;

class ExperienceController extends Controller
{
    public function index(){
        $experience = Experience::first();
        return view('admin.sections.experience.index', compact('experience'));
    }

    public function update(Request $request, $id){

        // TEST
        // return dd($request->all());

        // VALIDATE
        $request->validate([
            'image' => ['image', 'mimes:png,jpg','max:1000000'], // FILE UPLOAD VALIDATION // CHECKS IF THE FILE IS AN IMAGE // ENSURES ITS NOT AN EXECUTABLE FILE USING 'MIMES'
            'title' => ['required','max:200', 'min:1'],
            'description' => ['required', 'max:5000', 'string'],
        ]);

        // FINDORFAIL DOESN'T WORK WHEN THERE ISNT ALREADY DATA IN THE DB // FIND WILL WORK
        $experience = Experience::find($id); // WE ACCESS THE 'PORTFOLIOITEMS' MODEL // WE USE FINDORFAIL BECAUSE WE'RE UPDATING THE TABLE, NOT CREATING DATA //
        $imagePath = handleUpload('image', $experience);

        // ACCESS
        Experience::updateOrCreate(
            ['id' => $id],
            [
                'title' => $request->title,
                'description' => $request->description,
                'image' => isset($imagePath) ? $imagePath : $experience->image,
            ],
        );

        // NOTIFICATION
        toastr()->success('Updated Successfully!', 'Congrats!');

        // RETURN
        return redirect()->route('admin.experience.index');

    }
}
