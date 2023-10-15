<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\CategoryDataTable;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\TyperTitle;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(CategoryDataTable $categoryDataTable)
    {
        return $categoryDataTable->render('admin.sections.portfolio.index');
    }

    public function create(){
        return view('admin.sections.portfolio.create');
    }

    public function store(Request $request){

        // VALIDATE
        $request->validate([
            'name' => ['required','max:100'],
        ]);

        // STORE
        $category = new Category(); // CREATES A NEW INSTANCE OF THE 'CATEGORY' MODEL
        $category->name = $request->name; // CREATES A NEW OBJECT OF THE 'CATEGORY' CLASS, PRESUMABLY AN ELOQUENT MODEL REPRESENTING A CATEGORY IN YOUR APP // ASSIGNS THE VALUE OF THE 'NAME' FIELD FROM THE INCOMING REQUEST -> TO THE 'NAME' PROPERTY OF THE 'CATEGORY' OBJECT
        $category->slug = \Str::slug($request->name); // GENERATES A SLUG FROM THE 'NAME' FIELD USING '\STR::SLUG' METHOD. // A SLUG IS A USER-FRIENDLY VERSION OF A STRING, USED TO CREATE CLEAN HUMAN-READABLE URLS // CREATES SEO FRIENDLY URLS
        $category->save(); // THIS LINE PERSISTS THE 'CATEGORY' OBJECT, WHICH HAS THE NEW ASSIGNED DATA, TO THE DB

        // NOTIFICATION
        toastr()->success('Updated Successfully!', 'Congrats!');

        // RETURN
        return redirect()->route('admin.category.index');
    }

    // DESTROYS DATA IN THE DB
    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
    }

    public function edit($id){

        // GRABS THE ROW FROM THE DB
        $category = Category::findOrFail($id);
        return view('admin.sections.portfolio.edit', compact('category')); // ALLOWS US TO ACCESS THE 'CATEGORY' VAR WITHIN OUR VIEW
    }

    public function show($id){
        $category = Category::findOrFail($id);
        return view('admin.sections.portfolio.destroy', compact('category'));
    }

    // UPDATES DATA IN THE DB
    public function update(Request $request, $id){

        // VALIDATE
        $request->validate([
            'name' => ['required','max:100']
        ]);

        // STORE
        $category = Category::findOrFail($id); // GRABS THE ROW FROM THE DB WITH THE MATCHING ID
        $category->name = $request->name; // WE ACCESS THE COLUMN FROM THAT ROW AND STORE IT
        $category->slug = \Str::slug($request->name); // WE ASSIGN IT A NEW VALUE
        $category->save();

        // NOTIFY
        toastr()->success('Updated Successfully!', 'Congrats!');

        // REDIRECT
        return redirect()->route('admin.category.index');

    }
}
