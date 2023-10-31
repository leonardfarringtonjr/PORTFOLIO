<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\BlogDataTable;
use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\BlogCategory;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(BlogDatatable $blogDataTable)
    {
        return $blogDataTable->render('admin.sections.blog.blog-list.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = BlogCategory::all();
        return view('admin.sections.blog.blog-list.create', compact('categories'));
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
            'image' => ['required', 'image','max:5000'],
            'title' => ['required','max:200'],
            'category_id' => ['required','numeric'],
            'description' => ['required'],
        ]);

        // ACCESS
        $imagePath = handleUpload('image');

        $blog = new Blog();

        // CREATE
        $blog->image = $imagePath;
        $blog->title = $request->title;
        $blog->category = $request->category_id;
        $blog->description = $request->description;
        $blog->save();

        // NOTIFY
        toastr()->success('Blog Created Successfully!', 'Congrats!');

        // RETURN
        return redirect()->route('admin.blog-list.index');
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
