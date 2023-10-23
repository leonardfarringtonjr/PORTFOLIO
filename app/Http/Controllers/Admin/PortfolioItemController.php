<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\PortfolioItemDataTable;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\PortfolioItem;
use Illuminate\Http\Request;

class PortfolioItemController extends Controller
{

    // INDEX ROUTE
    public function index(PortfolioItemDataTable $portfolioItemDataTable) // PASSES THE DATA TABLE TO THE ROUTE
    {
        return $portfolioItemDataTable->render('admin.sections.portfolio.portfolio-item.index'); // RENDERS THE DATATABLE
    }

    // CREATE
    public function create()
    {
        $categories = Category::all();
        return view('admin.sections.portfolio.portfolio-item.create', compact('categories'));
    }

    public function edit($id){
        $categories = Category::all();
        $portfolioItem = PortfolioItem::findOrFail($id);
        return view('admin.sections.portfolio.portfolio-item.edit', compact('categories', 'portfolioItem')); // YOU ONLY HAVE TO PASS THE NAME
    }

    // STORE NEW DATA
    public function store(Request $request)
    {
        // VALIDATE
        $request->validate([
            'image' => ['required', 'image','max:5000'],
            'title' => ['required','max:200'],
            'category_id' => ['required','numeric'],
            'description' => ['required'],
            'client' => ['max:200'],
            'website' => ['url'], // requires the full https url
        ]);

        $imagePath = handleUpload('image');

        // STORE
        $portfolioItem = new PortfolioItem(); // WE ACCESS THE 'PORTFOLIOITEMS' MODEL
        $portfolioItem->image = $imagePath;
        $portfolioItem->title = $request->title;
        $portfolioItem->category_id = $request->category_id;
        $portfolioItem->description = $request->description;
        $portfolioItem->client = $request->client;
        $portfolioItem->website = $request->website;
        $portfolioItem->save();

        // NOTIFICATION
        toastr()->success('Updated Successfully!', 'Congrats!');

        // RETURN
        return redirect()->route('admin.portfolio-item.index');
    }

    // UPDATE
    public function update(Request $request, $id)
    {
        // TEST
        // dd($request->all());

        // VALIDATE
        $request->validate([
            'image' => ['image','max:5000'],
            'title' => ['required','max:200'],
            'category_id' => ['required','numeric'],
            'description' => ['required'],
            'client' => ['max:200'],
            'website' => ['url'], // requires the full https url
        ]);

        $portfolioItem = PortfolioItem::findOrFail($id); // WE ACCESS THE 'PORTFOLIOITEMS' MODEL // WE USE FINDORFAIL BECAUSE WE'RE UPDATING THE TABLE, NOT CREATING DATA
        $imagePath = handleUpload('image', $portfolioItem);

        // STORE
        $portfolioItem->image = (!empty($imagePath) ? $imagePath : $portfolioItem->image);
        $portfolioItem->title = $request->title;
        $portfolioItem->category_id = $request->category_id;
        $portfolioItem->description = $request->description;
        $portfolioItem->client = $request->client;
        $portfolioItem->website = $request->website;
        $portfolioItem->save();

        // NOTIFICATION
        toastr()->success('Updated Successfully!', 'Congrats!');

        // RETURN
        return redirect()->route('admin.portfolio-item.index');

    }

    public function destroy($id){
        $portfolioItem = PortfolioItem::findOrFail($id);
        deleteFileIfExists($portfolioItem->image);
        $portfolioItem->delete();
    }

}
