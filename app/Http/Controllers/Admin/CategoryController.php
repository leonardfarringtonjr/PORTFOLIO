<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\CategoryDataTable;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(CategoryDataTable $categoryDataTable)
    {

        return $categoryDataTable->render('admin.sections.portfolio-category.index');
    }
}
