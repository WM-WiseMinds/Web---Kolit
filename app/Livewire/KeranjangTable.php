<?php

namespace App\Livewire;

use App\Models\Keranjang;
use App\Models\Ukuran;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Masmerise\Toaster\Toastable;
use PowerComponents\LivewirePowerGrid\Button;
use PowerComponents\LivewirePowerGrid\Column;
use PowerComponents\LivewirePowerGrid\Detail;
use PowerComponents\LivewirePowerGrid\Exportable;
use PowerComponents\LivewirePowerGrid\Facades\Filter;
use PowerComponents\LivewirePowerGrid\Footer;
use PowerComponents\LivewirePowerGrid\Header;
use PowerComponents\LivewirePowerGrid\PowerGrid;
use PowerComponents\LivewirePowerGrid\PowerGridFields;
use PowerComponents\LivewirePowerGrid\PowerGridComponent;
use PowerComponents\LivewirePowerGrid\Traits\WithExport;

final class KeranjangTable extends PowerGridComponent
{
    use WithExport;
    use Toastable;

    public function setUp(): array
    {
        $setUp = [
            Header::make()->showSearchInput(),
            Footer::make()
                ->showPerPage()
                ->showRecordCount(),
            Detail::make()
                ->view('details.keranjang-detail')
                ->showCollapseIcon(),
        ];

        return $setUp;
    }

    public function datasource(): Builder
    {
        $userId = auth()->id();
        return Keranjang::query()
            ->with('user', 'barang')
            ->where('user_id', $userId);
    }

    public function relationSearch(): array
    {
        return [
            'barang' => ['nama_barang'],
        ];
    }

    public function fields(): PowerGridFields
    {
        return PowerGrid::fields()
            ->add('id')
            ->add('barang.nama_barang')
            ->add('user_id')
            ->add('ukuran_id')
            ->add('ukuran_custom_id')
            ->add('jumlah')
            ->add('tipe_ukuran')
            ->add('created_at');
    }

    public function columns(): array
    {
        return [
            Column::make('Id', 'id'),
            Column::make('Nama Barang', 'barang.nama_barang')->sortable()->searchable(),
            Column::make('Jumlah', 'jumlah')
                ->sortable()
                ->searchable(),

            Column::make('Tipe ukuran', 'tipe_ukuran')
                ->sortable()
                ->searchable(),

            Column::action('Action')
        ];
    }

    public function filters(): array
    {
        return [];
    }

    public function actions(\App\Models\Keranjang $row): array
    {
        $actions = [];

        // Jika user memiliki permissions delete
        if (auth()->user()->can('keranjang')) {
            $actions[] =
                Button::add('delete')
                ->slot('<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                </svg>
                ')
                ->id()
                ->class('pg-btn-white dark:ring-pg-primary-600 dark:border-pg-primary-600 dark:hover:bg-pg-primary-700 dark:ring-offset-pg-primary-800 dark:text-pg-primary-300 dark:bg-pg-primary-700')
                ->dispatch('delete', ['rowId' => $row->id]);
        }
        return $actions;
    }

    public function header(): array
    {
        $userId = auth()->id();
        $keranjangIds = Keranjang::where('user_id', $userId)->pluck('id')->toArray();

        $header = [];

        if (auth()->user()->can('transaksi')) {
            $header[] =
                Button::add('add-transaksi')
                ->slot(__('<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 10.5V6a3.75 3.75 0 1 0-7.5 0v4.5m11.356-1.993 1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 0 1-1.12-1.243l1.264-12A1.125 1.125 0 0 1 5.513 7.5h12.974c.576 0 1.059.435 1.119 1.007ZM8.625 10.5a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm7.5 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
                </svg>
                '))
                ->class('pg-btn-white dark:ring-pg-primary-600 dark:border-pg-primary-600 dark:hover:bg-pg-primary-700 dark:ring-offset-pg-primary-800 dark:text-pg-primary-300 dark:bg-pg-primary-700 w-full')
                ->openModal('transaksi-form', ['keranjangIds' => $keranjangIds]);
        }
        return $header;
    }

    protected function getListeners()
    {
        return array_merge(
            parent::getListeners(),
            [
                'delete',
            ]
        );
    }

    // Function to delete data
    public function delete($rowId)
    {
        $keranjang = Keranjang::findOrFail($rowId);

        // Pulihkan stok pada Ukuran sesuai tipe ukuran
        if ($keranjang->tipe_ukuran === 'standar') {
            $ukuran = Ukuran::find($keranjang->ukuran_id);

            $ukuran->stock += $keranjang->jumlah;
            $ukuran->save();
        }

        $keranjang->delete();
        $this->success('Data keranjang berhasil dihapus');
    }
}
