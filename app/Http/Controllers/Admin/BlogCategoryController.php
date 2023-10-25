<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\BlogCategoryDataTable;
use App\Http\Controllers\Controller;
use App\Models\BlogCategory;
use Illuminate\Http\Request;
use Str;

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
        $category->slug = Str::slug($request->name);
        $category->save();

        // NOTIFY
        toastr()->success('Created Successfully!', 'Congrats!');

        // RETURN
        return redirect()->route('admin.blog-category.index');

    }

    public function edit($id){
        $blogCategory = BlogCategory::findOrFail($id);
        return view('admin.sections.blog.blog-category.edit', compact('blogCategory'));
    }

    public function update(Request $request, $id){

        // TEST
        // return dd($request->all());

        // VALIDATE
        $request->validate([
            'name'=> ['required','max:100'],
        ]);

        // ACCESS
        $blogCategory = BlogCategory::findOrFail($id);

        // UPDATE
        $blogCategory->name = $request->name;
        $blogCategory->slug = Str::slug($request->name);
        $blogCategory->save();

        // NOTIFICATION
        toastr()->success('Updated Successfully!', 'Congrats!');

        // RETURN
        return redirect()->route('admin.blog-category.index');
    }

    public function destroy($id){
        $blogCategory = BlogCategory::findOrFail($id);
        $blogCategory->delete();
    }

}
