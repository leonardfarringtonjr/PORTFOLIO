<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\CategoryDataTable;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(CategoryDataTable $dataTable){

        return $dataTable->render('admin.sections.portfolio-category.index');
    }
}
