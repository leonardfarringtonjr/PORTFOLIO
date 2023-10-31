<?php

namespace App\DataTables;

use App\Models\Blog;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class BlogDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     * @return \Yajra\DataTables\EloquentDataTable
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {

        return (new EloquentDataTable($query))
            ->addColumn("image", function ($query) {
                return '<img style="width: 70px;" src="' . asset($query->image) . '"></img>';
            })
            ->addColumn('created_at', function ($query) {
                return date('m/d/Y', strtotime($query->created_at));
            })

            // TO SHOW THE NAMES OF THE BLOG'S CATEGORIES, YOU HAVE TO CREATE A RELATIONSHIP BETWEEN BLOGS AND BLOG CATEGORIES
            ->addColumn('category', function ($query) {
                return $query->category;
            })
            ->addColumn('action', function ($query) {
                return '<a href="' . route('admin.blog-list.edit', $query->id) . '" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                <a href="' . route('admin.blog-list.destroy', $query->id) . '" class="btn btn-danger delete-item"><i class="fas fa-trash"></i></a>';
            })
            ->rawColumns(['image', 'action']) // THIS TELLS LARAVEL DATA TABLES THAT THE COLUMN HAS HTML AND EXCLUDES IT // THERE CAN ONLY BE 1 'RAWCOLUMN'
            ->setRowId('id');

        // return (new EloquentDataTable($query))
        //     ->addColumn('action', function($query){ // THE 'ACTION' COLUMN WILL HAVE BUTTONS IN IT
        //         return
        //         '<a href="'.route('admin.blog-list.edit', $query->id).'" class="btn btn-primary"><i class="fas fa-edit"></i></a>
        //         <a href="'.route('admin.blog-list.destroy', $query->id).'" class="btn btn-danger delete-item"><i class="fas fa-trash"></i></a>'; // WE PASS THE ID OF THE CATEGORY TO THE ROUTE
        //     })
        //     ->setRowId('id');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Blog $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Blog $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('blog-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->orderBy(0)
            ->selectStyleSingle()
            ->buttons([]);
    }

    /**
     * Get the dataTable columns definition.
     *
     * @return array
     */
    public function getColumns(): array
    {
        return [
            Column::make('id')->width(100),
            Column::make('image'),
            Column::make('title'),
            Column::make('category'),
            Column::make('description'),
            Column::make('created_at'),
            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->width(200)
                ->addClass('text-center'),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename(): string
    {
        return 'Blog_' . date('YmdHis');
    }
}
