<?php

namespace App\Exports;

use App\Models\InventoryModel;
use Maatwebsite\Excel\Concerns\FromCollection;

class InventoryExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return InventoryModel::all();
    }
}
