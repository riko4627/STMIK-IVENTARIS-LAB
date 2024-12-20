<?php

namespace App\Http\Controllers\CMS;

use App\Http\Controllers\Controller;
use App\Http\Requests\YearRequest;
use App\Repositories\YearRepositories;
use Illuminate\Http\Request;

class YearController extends Controller
{
    protected $yearRepo;
    public function __construct(YearRepositories $yearRepo)
    {
        $this->yearRepo = $yearRepo;
    }
    public function getAllData()
    {
        return $this->yearRepo->getAll();
    }
    public function createData(YearRequest $request)
    {
        return $this->yearRepo->createData($request);
    }
    public function getDataById($id)
    {
        return $this->yearRepo->getDataById($id);
    }
    public function updateData(YearRequest $request, $id)
    {
        return $this->yearRepo->updateData($request, $id);
    }
    public function deleteData($id)
    {
        return $this->yearRepo->deleteData($id);
    }
}
