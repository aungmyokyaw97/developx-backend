<?php
namespace App\DataTables;

use App\Models\Job;
use Carbon\Carbon;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;

class JobDataTable extends DataTable
{
    public function dataTable($query)
    {
        $dataTable = new EloquentDataTable($query);

        return $dataTable
            ->addColumn('start_date', function ($cat) {
                return Carbon::parse($cat->start_date)->format('Y-m-d');
            })
            ->addColumn('end_date', function ($cat) {
                return Carbon::parse($cat->end_date)->format('Y-m-d');
            })
            ->addColumn('active', function ($cat) {
                if ($cat->active == 1) {
                    return ['css' => 'success','data' => 'active'];
                } else {
                    return ['css' => 'danger','data' => 'inactive'];
                }
            })
            ->addColumn('action', 'backend.jobs.datatables_actions');
    }

    public function query(Job $model)
    {
        return $model->newQuery();
    }

    public function html()
    {
        return $this->builder()
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->addAction(['width' => '120px', 'printable' => false])
            ->parameters([
                'dom'       => 'Bfrtip',
                'stateSave' => true,
                'order'     => [[0, 'desc']],
                'buttons'   => [
//                    ['extend' => 'export', 'className' => 'btn btn-default btn-sm no-corner',],
//                    ['extend' => 'reset', 'className' => 'btn btn-default btn-sm no-corner',],
//                    ['extend' => 'reload', 'className' => 'btn btn-default btn-sm no-corner',],
                ],
            ]);
    }

    protected function getColumns()
    {
        return [
            'id',
            'title',
            'start_date',
            'end_date',
            'active' => [
                'name' => 'active',
                'data' => 'active',
                'render' => '"<span class=\"badge badge-pill badge-"+data.css+"\">"+data.data+"</span>"'
            ],
        ];
    }

}
