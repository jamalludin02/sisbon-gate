<?php

namespace App\DataTables;

use App\Models\Laporan;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class LaporanDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query)
    {
        return;
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Laporan $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('laporan-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            //->dom('Bfrtip')

            ->orderBy(1)
            ->buttons([Button::make('pdf'), Button::make('print')]);
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            Column::make('preferensi', 'rangking'),
            Column::make('nama'), 
            Column::make('nip'), 
            Column::make('jabatan'), 
            Column::make('positif', 'score_positif'), 
            Column::make('negatif', 'score_negatif'), 
            Column::make('preferensi'), 
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Laporan_' . date('YmdHis');
    }
}
