<?php

namespace App\Exports;

use App\Models\InventoryModel;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class InventoryExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $dataInventory = InventoryModel::select(
            'item_name',
            'total_items',
            'total_items_good',
            'total_items_crash',
            'spesification',
            'category.name as category_name', // Ambil nama kategori
            'lab.name as lab_name',           // Ambil nama lab
            'year.year as year_name'          // Ambil nama tahun
        )
        ->join('category', 'inventory.id_category', '=', 'category.id')
        ->join('lab', 'inventory.id_lab', '=', 'lab.id')
        ->join('year', 'inventory.id_year', '=', 'year.id')
        ->get();

        return $dataInventory;
    }

    public function headings(): array
    {
        return [
            'Nama barang',
            'Jumlah barang',
            'Jumlah barang baik',
            'jumlah barang rusak',
            'Spesifikasi',
            'Kategori',
            'lab',
            'Tahun'
        ];
    }
}
