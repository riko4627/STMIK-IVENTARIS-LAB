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
            'tb_category.name as category_name', // Ambil nama kategori dari tb_category
            'tb_lab.name as lab_name',           // Ambil nama lab dari tb_lab
            'tb_year.year as year_name'          // Ambil nama tahun dari tb_year
        )
        ->join('tb_category', 'tb_inventory.id_category', '=', 'tb_category.id') // Sesuaikan nama tabel
        ->join('tb_lab', 'tb_inventory.id_lab', '=', 'tb_lab.id')               // Sesuaikan nama tabel
        ->join('tb_year', 'tb_inventory.id_year', '=', 'tb_year.id')            // Sesuaikan nama tabel
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
