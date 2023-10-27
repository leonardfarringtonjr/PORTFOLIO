<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\FeedbackDataTable;
use App\Http\Controllers\Controller;
use App\Models\Feedback;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(FeedbackDataTable $feedbackDataTable)
    {
        return $feedbackDataTable->render('admin.sections.feedback.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.sections.feedback.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // TEST
        // return dd($request->all());

        // VALIDATE
        $request->validate([
            'title' => ['required','max:200','min:1'],
            'position' => ['required','max:200','string'],
            'description' => ['required','max:5000','string'],
        ]);

        // ACCESS
        $feedback = new Feedback();

        // STORE / SAVE
        $feedback->title = $request->title;
        $feedback->position = $request->position;
        $feedback->description = $request->description;
        $feedback->save();

        // NOTIFY
        toastr()->success('Feedback Created Successfully!', 'Congrats!');

        // RETURN
        return redirect()->route('admin.feedback.index');

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $feedback = Feedback::findOrFail($id);
        return view('admin.sections.feedback.edit', compact('feedback'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // TEST
        // return dd($request->all());

        // VALIDATE
        $request->validate([
            'title' => ['required','max:200','min:1'],
            'position' => ['required','max:200','string'],
            'description' => ['required','max:5000','string'],
        ]);

        // ACCESS / FIND
        $feedback = Feedback::findOrFail($id);

        // STORE / SAVE
        $feedback->title = $request->title;
        $feedback->position = $request->position;
        $feedback->description = $request->description;
        $feedback->save();

        // NOTIFY
        toastr()->success('Updated Successfully!', 'Congrats!');

        // RETURN
        return redirect()->route('admin.feedback.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $feedback = Feedback::findOrFail($id);
        $feedback->delete();
    }
}
