<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\ServiceItemDataTable;
use App\Http\Controllers\Controller;
use App\Models\ServiceItem;
use Illuminate\Http\Request;

class ServiceItemController extends Controller
{
    public function index(ServiceItemDataTable $serviceItemDataTable) // PASSES THE DATA TABLE TO THE ROUTE
    {
        return $serviceItemDataTable->render('admin.sections.services.service-item.index'); // RENDERS THE DATATABLE
    }

    public function create(){
        $services = ServiceItem::all();
        return view('admin.sections.services.service-item.create', compact('services'));
    }

    public function store(Request $request){

        // TEST
        // return dd($request->all());

        // VALIDATE
        $request->validate([
            'title' => ['required', 'max:200', 'min:1'],
            'description' => ['required', 'max:5000', 'string'],
        ]);

        // CREATE
        $service = new ServiceItem();
        $service->title = $request->title;
        $service->description = $request->description;
        $service->save(); // SAVES YOUR DATA TO THE DB TABLE

        // NOTIFY
        toastr()->success('Created Successfully!', 'Congrats!');

        // RETURN
        return redirect()->route('admin.service-item.index');
    }

    public function edit($id){
        $serviceItem = ServiceItem::findOrFail($id);
        return view('admin.sections.services.service-item.edit', compact('serviceItem'));
    }

    public function update(Request $request, $id){

        // TEST
        // return dd($request->all());

        // VALIDATE
        $request->validate([
            'title' => ['required', 'max:200', 'min:1'],
            'description' => ['required','max:5000', 'string'],
        ]);

        // ACCESS
        $serviceItem = ServiceItem::findOrFail($id); // FIND() -> USED WHEN YOU LOOK FOR A RECORD, BUT ITS ACCEPTABLE NOT TO FIND IT // FINDORFAIL -> YOU EXPECT A RECORD AND THROW AN ERR IF ITS NOT THERE

        // UPDATE
        $serviceItem->title = $request->title;
        $serviceItem->description = $request->description;
        $serviceItem->save();

        // NOTIFY
        toastr()->success('Updated Successfully!', 'Congrats!');

        // RETURN
        return redirect()->route('admin.service-item.index');

    }

    public function destroy($id){
        $serviceItem = ServiceItem::findOrFail($id);
        $serviceItem->delete();
    }
}
