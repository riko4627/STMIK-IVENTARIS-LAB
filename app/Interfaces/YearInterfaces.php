<?php

namespace App\Interfaces;

use App\Http\Requests\YearRequest;

interface YearInterfaces
{
    public function getAll();
    public function createData(YearRequest $request);
    public function getDataById($id);
    public function updateData(YearRequest $request, $id);
    public function deleteData($id);
}
