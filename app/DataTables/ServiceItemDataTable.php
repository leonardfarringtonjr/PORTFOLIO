<?php

namespace App\DataTables;

use App\Models\ServiceItem;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class ServiceItemDataTable extends DataTable
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
            ->addColumn('created_at', function($query){ return date('M-d-Y', strtotime($query->created_at)); })
            ->addColumn('action', function($query){
                return '<a href="'.route('admin.service-item.edit', $query->id).'" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                <a href="'.route('admin.service-item.destroy', $query->id).'" class="btn btn-danger delete-item"><i class="fas fa-trash"></i></a>';
            })
            ->setRowId('id');
    }

    /*


    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
        ->addColumn("image", function ($query) {
            return '<img style="width: 70px;" src="'.asset($query->image).'"></img>';
        })
            ->addColumn('created_at', function($query){
                return date('d-m-Y', strtotime($query->created_at));
            })
            ->addColumn('category', function($query){
                return $query->category->name;
            })
            ->addColumn('action', function($query){
                return '<a href="'.route('admin.portfolio-item.edit', $query->id).'" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                <a href="'.route('admin.portfolio-item.destroy', $query->id).'" class="btn btn-danger delete-item"><i class="fas fa-trash"></i></a>';
            })
            ->rawColumns(['image', 'action']) // THIS TELLS LARAVEL DATA TABLES THAT THE COLUMN HAS HTML AND EXCLUDES IT // THERE CAN ONLY BE 1 'RAWCOLUMN'
            ->setRowId('id');
    }


    */

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\ServiceItem $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(ServiceItem $model): QueryBuilder
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
                    ->setTableId('serviceitem-table')
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
            Column::make('id'),
            Column::make('title'),
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
        return 'ServiceItem_' . date('YmdHis');
    }
}
