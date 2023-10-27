<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FeedbackSectionSettings;
use Illuminate\Http\Request;

class FeedbackSectionSettingController extends Controller
{
    public function index()
    {
        $feedbackSettings = FeedbackSectionSettings::first();
        return view("admin.sections.feedback.feedback-setting.index", compact("feedbackSettings"));
    }

    public function update(Request $request, $id)
    {
        // TEST
        // dd($request->all());

        // VALIDATE
        $request->validate([
            'title' => ['required', 'max:200'],
            'sub_title' => ['required', 'max:200'],
        ]);

        // ACCESS / UPDATE OR CREATE
        FeedbackSectionSettings::updateOrCreate(
            ['id' => $id], // THE CONDITION TO CHECK FOR AN EXISTING USER
            [
                'title' => $request->title,
                'sub_title' => $request->sub_title,
            ]
        );

        // NOTIFY
        toastr()->success('Feedback Updated Successfully!', 'Congrats!');

        // RETURN
        return redirect()->route('admin.feedback-section-setting.index');
    }

    /*

    public function index(Request $request){
        $portfolioSettings = PortfolioSectionSetting::first();
        return view('admin.sections.portfolio.portfolio-setting.index', compact('portfolioSettings')); // BECAUSE THE CONTROLLER PROCESSES ALL THE LOGIC, YOU MUST SPECIFY THE FULL VIEW PATH
    }

    */
}
