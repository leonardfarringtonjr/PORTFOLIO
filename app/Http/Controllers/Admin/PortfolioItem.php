<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\PortfolioItemDataTable;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PortfolioItem extends Controller
{

    // INDEX ROUTE
    public function index(PortfolioItemDataTable $portfolioItemDataTable) // PASSES THE DATA TABLE TO THE ROUTE
    {
        return $portfolioItemDataTable->render('admin.sections.portfolio.portfolio-item.index'); // RENDERS THE DATATABLE
    }

    // CREATE
    public function create()
    {
        return view('admin.sections.portfolio.portfolio-item.create');
    }

    // STORE NEW DATA
    public function store()
    {
        //
    }
}
