<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\BlogCategoryDataTable;
use App\Http\Controllers\Controller;
use App\Models\BlogCategory;
use Illuminate\Http\Request;

class BlogCategoryController extends Controller
{
    public function index(BlogCategoryDataTable $blogCategoryDataTable){
        return $blogCategoryDataTable->render('admin.sections.blog.blog-category.index');
    }

    public function create(){
        return view('admin.sections.blog.blog-category.create');
    }

    public function store(Request $request){

        // TEST
        // return dd($request->all());

        // VALIDATE
        $request->validate([
            'name' => ['required', 'max:100'],
        ]);

        // STORE
        $category = new BlogCategory() ;
        $category->name = $request->name;
        $category->slug = \Str::slug($request->name);
        $category->save();

        // NOTIFY
        toastr()->success('Created Successfully!', 'Congrats!');

        // RETURN
        return redirect()->route('admin.category.index');

    }

    public function edit(){
        //
    }

    public function update(){
        //
    }

    public function destroy(){
        //
    }

}
