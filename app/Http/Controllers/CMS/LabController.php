<?php

namespace App\Http\Controllers\CMS;

use App\Http\Controllers\Controller;
use App\Http\Requests\GrupRequest;
use App\Http\Requests\LabRequest;
use App\Repositories\LabRepositories;

class LabController extends Controller
{
    protected $LabRepo;
    public function __construct(LabRepositories $LabRepo)
    {
        $this->LabRepo = $LabRepo;
    }
    public function getAllData()
    {
        return $this->LabRepo->getAllData();
    }
    public function createData(LabRequest $request)
    {
        return $this->LabRepo->createData($request);
    }
    public function getDataById($id)
    {
        return $this->LabRepo->getDataById($id);
    }
    public function updateData(LabRequest $request, $id)
    {
        return $this->LabRepo->updateDataById($request, $id);
    }
    public function deleteData($id)
    {
        return $this->LabRepo->deleteData($id);
    }
}
