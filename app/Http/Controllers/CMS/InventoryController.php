<?php

namespace App\Http\Controllers\CMS;

use App\Exports\InventoryExport;
use App\Http\Controllers\Controller;
use App\Http\Requests\InventoryRequest;
use App\Repositories\InventoryRepositories;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class InventoryController extends Controller
{
    protected $inventoryRepositories;

    public function __construct(InventoryRepositories $inventoryInterfaces)
    {
        $this->inventoryRepositories = $inventoryInterfaces;
    }

    public function getAllData()
    {
        return $this->inventoryRepositories->getAllData();
    }

    public function createData(InventoryRequest $request)
    {
        return $this->inventoryRepositories->createData($request);
    }

    public function getDataById($id)
    {
        return $this->inventoryRepositories->getDataById($id);
    }

    public function updateData(InventoryRequest $request, $id)
    {
        return $this->inventoryRepositories->updateData($request, $id);
    }

    public function deleteData($id)
    {
        return $this->inventoryRepositories->deleteData($id);
    }
    public function export() 
    {
        return Excel::download(new InventoryExport, 'Inventory.xlsx');
    }
}
