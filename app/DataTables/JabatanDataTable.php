<?php

namespace App\DataTables;

use App\Models\Jabatan;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class JabatanDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->editColumn('gaji_harian', function ($item) {
                return 'Rp. ' . number_format($item->gaji_harian, 0, ',', '.');
            })
            ->addColumn('action', function ($item) {
                // dd($item);
                return view('components.b-one-action', ['url' => route('admin.jabatan.edit', $item->id)]);
            })
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Jabatan $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('jabatan-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->responsive(true)
            ->orderBy(0, 'asc')
            ->buttons([
                Button::make('')
                    ->text('Tambah Data <i class="ms-1 bi bi-clipboard"></i>')
                    ->className('btn btn-sm bg-primary border-0')
                    ->action('function() { window.location = "' . route('admin.jabatan.create') . '"; }'),
            ]);
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [Column::make('id'), Column::make('jabatan'), Column::make('gaji_harian'), Column::computed('action')->exportable(false)->printable(false)->width(100)->addClass('text-center')];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Jabatan_' . date('YmdHis');
    }
}
