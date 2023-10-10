<?php
namespace App\DataTables;

use App\Models\Admin;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;

class AdminDataTable extends DataTable
{
    public function dataTable($query)
    {
        $dataTable = new EloquentDataTable($query);

        return $dataTable
        ->addColumn('role', function ($cat) {
            if ($cat->role_id != null) {
                return $cat->getRoleNames()[0];
            } else {
                return "";
            }
        })
        ->addColumn('action', 'backend.admins.datatables_actions');
    }

    public function query(Admin $model)
    {
        return $model->where('id','!=',auth()->user()->id)->newQuery();
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
                    // ['extend' => 'export', 'className' => 'btn btn-default btn-sm no-corner',],
                    // ['extend' => 'reset', 'className' => 'btn btn-default btn-sm no-corner',],
                    // ['extend' => 'reload', 'className' => 'btn btn-default btn-sm no-corner',],
                ],
            ]);
    }

    protected function getColumns()
    {
        return [
            'id',
            'role' => [
                'name' => 'role',
                'data' => 'role',
                'render' => '"<span class=\"badge badge-pill badge-info\">"+data+"</span>"'
            ],
            'name',
            'email' => [
                'name' => 'email',
                'data' => 'email',
                'render' => '"<i class=\"fas fa-envelope\"></i> "+data+""'
            ],
        ];
    }
}
