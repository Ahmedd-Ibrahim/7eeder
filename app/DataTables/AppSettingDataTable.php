<?php

namespace App\DataTables;

use App\Models\AppSetting;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;

class AppSettingDataTable extends DataTable
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

        return $dataTable->addColumn('action', 'app_settings.datatables_actions')
            ->editColumn('about', function ($q) {
                return $q->getTranslation('about', \App::getLocale());
            })->editColumn('term_desc', function ($q) {
                return $q->getTranslation('term_desc', \App::getLocale());
            })->editColumn('condation_desc', function ($q) {
                return $q->getTranslation('condation_desc', \App::getLocale());
            });
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\AppSetting $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(AppSetting $model)
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
            'about' =>  new Column(['title' => __('settings.About Desc:'), 'data' => 'about']),
            'term_desc' => new Column(['title' => __('settings.Term Desc:'), 'data' => 'term_desc']),
            'condation_desc' => new Column(['title' => __('settings.condition Desc:'), 'data' => 'condation_desc']),
            'app_share_link' => new Column(['title' => __('settings.App Share Link:'), 'data' => 'app_share_link']) ,
            'app_review_link' => new Column(['title' => __('settings.App Review Link:'), 'data' => 'app_review_link']) ,
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'app_settings_datatable_' . time();
    }
}
