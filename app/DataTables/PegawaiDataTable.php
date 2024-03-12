<?php

namespace App\DataTables;

use App\Models\Pegawai;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class PegawaiDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->editColumn('jabatan', function ($item) {
                if ($item->jabatan == null) {
                    return '-';
                }
                return $item->jabatan->jabatan;
            })
            ->editColumn('status', fn($item) => $item->status == 1 ? 'Aktif' : 'Tidak Aktif')
            ->addColumn('action', function ($item) {
                return view('components.b-one-action', ['url' => route('admin.pegawai.edit', $item->id)]);
            })
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Pegawai $model): QueryBuilder
    {
        return $model->with('jabatan')->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('pegawai-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->responsive(true)
            ->orderBy(0, 'asc')
            ->buttons([
                Button::make('')
                    ->text('Tambah Data <i class="ms-1 bi bi-clipboard"></i>')
                    ->className('btn btn-sm bg-primary border-0')
                    ->action('function() { window.location = "' . route('admin.pegawai.create') . '"; }'),
            ]);
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            Column::make('id'),
            Column::make('nip'),
            Column::make('nama'),
            Column::make('tgl_lahir')->format(function ($value) {
                return $value->format('Y-m-d'); // Sesuaikan dengan format yang Anda inginkan
            }),
            Column::make('pendidikan'),
            Column::make('gender'),
            Column::make('no_telp'),
            Column::make('alamat'),
            Column::make('jabatan', 'jabatan_id'),
            Column::make('status'),
            Column::computed('action')->exportable(false)->printable(false)->width(100)->addClass('text-center'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Pegawai_' . date('YmdHis');
    }
}
