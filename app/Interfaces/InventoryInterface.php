<?php

namespace App\Interfaces;

use App\Http\Requests\InventoryRequest;

interface InventoryInterface
{
    public function getAllData();
    public function createData(InventoryRequest $request);
    public function getDataById($id);
    public function updateData(InventoryRequest $request, $id);
    public function deleteData($id);
}
