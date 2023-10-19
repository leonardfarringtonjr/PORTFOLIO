<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PortfolioSectionSettingController extends Controller
{
    public function index(){
        return view('admin.sections.portfolio.portfolio-setting.index'); // BECAUSE THE CONTROLLER PROCESSES ALL THE LOGIC, YOU MUST SPECIFY THE FULL VIEW PATH
    }

    public function update(Request $request, $id){
        return dd($request->all());
    }
}
