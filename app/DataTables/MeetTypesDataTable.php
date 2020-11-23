<?php

namespace App\DataTables;

use App\Models\MeetTypes;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;

class MeetTypesDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        $dataTable = new EloquentDataTable($query);

        return $dataTable->addColumn('action', 'meet_types.datatables_actions');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\MeetTypes $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(MeetTypes $model)
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->addAction(['width' => '120px', 'printable' => false,'title' => __('datatables_buttons.action')])
            ->parameters([
                'dom'       => 'Bfrtip',
                'stateSave' => true,
                'order'     => [[0, 'desc']],
                'buttons'   => [
                    ['extend' => 'create', 'className' => 'btn btn-default btn-sm no-corner',],
                    ['extend' => 'export', 'className' => 'btn btn-default btn-sm no-corner',],
                    ['extend' => 'print', 'className' => 'btn btn-default btn-sm no-corner',],
                    ['extend' => 'reset', 'className' => 'btn btn-default btn-sm no-corner',],
                    ['extend' => 'reload', 'className' => 'btn btn-default btn-sm no-corner',],
                ],
            ]);
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            'image' =>  new Column(['title' => __('meet.image:'), 'data' => 'image']),
            'meet_type' =>  new Column(['title' => __('meet.Meet Types'), 'data' => 'meet_type']),
            'slaughter_date' =>  new Column(['title' => __('meet.Slaughter Date:'), 'data' => 'slaughter_date']),
            'age' => new Column(['title' => __('meet.age:'), 'data' => 'age'])
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'meet_types_datatable_' . time();
    }
}
