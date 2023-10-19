<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PortfolioSectionSetting;
use Illuminate\Http\Request;

class PortfolioSectionSettingController extends Controller
{
    public function index(Request $request){
        $portfolioSettings = PortfolioSectionSetting::first();
        return view('admin.sections.portfolio.portfolio-setting.index', compact('portfolioSettings')); // BECAUSE THE CONTROLLER PROCESSES ALL THE LOGIC, YOU MUST SPECIFY THE FULL VIEW PATH
    }

    public function update(Request $request, $id){

        // TEST
        // dd($request->all());

        // VALIDATE
        $request->validate([
            'title' => ['required','max:200'],
            'sub_title' => ['required','max:200'],
        ]);


        // UPDATE OR CREATE
        PortfolioSectionSetting::updateOrCreate(
            ['id' => $id],
            [
                'title' => $request->title,
                'sub_title' => $request->sub_title,
            ]);

        // NOTIFICATION
        toastr()->success('Updated Successfully!', 'Congrats!');

        // RETURN
        return redirect()->back();

    }
}
