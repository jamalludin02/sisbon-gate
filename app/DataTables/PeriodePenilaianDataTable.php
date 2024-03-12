<?php

namespace App\DataTables;

use App\Models\PeriodePenilaian;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class PeriodePenilaianDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('action', function ($item) {
                return view('components.b-one-action', ['url' => route('admin.periode-penilaian.edit', $item->id)]);
            })
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(PeriodePenilaian $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('periodepenilaian-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->responsive(true)
            ->orderBy(0, 'asc')
            ->buttons([
                Button::make('')
                    ->text('Tambah Data <i class="ms-1 bi bi-clipboard"></i>')
                    ->className('btn btn-sm bg-primary border-0')
                    ->action('function() { window.location = "' . route('admin.periode-penilaian.create') . '"; }'),
            ]);
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [Column::make('id'), Column::make('tahun'), Column::make('bulan'), Column::make('terbit'), Column::make('tutup'), Column::make('status'), Column::computed('action')->exportable(false)->printable(false)->width(100)->addClass('text-center')];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'PeriodePenilaian_' . date('YmdHis');
    }
}
