<?php

namespace App\Interfaces;

use App\Http\Requests\LabRequest;

interface LabInterfaces
{
    public function getAllData();
    public function createData(LabRequest $request);
    public function getDataById($id);
    public function updateDataById(LabRequest $request, $id);
    public function deleteData($id);
}
