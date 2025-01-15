<?php

namespace App\Repositories;

use App\Http\Requests\YearRequest;
use App\Interfaces\YearInterfaces;
use App\Models\YearModel;
use App\Traits\HttpResponseTrait;

class YearRepositories implements YearInterfaces
{
    use HttpResponseTrait;
    protected $yearmodel;
    public function __construct(YearModel $yearmodel)
    {
        $this->yearmodel = $yearmodel;
    }
    public function getAll()
    {
        $data = $this->yearmodel::all();
        if (!$data) {
            return $this->dataNotFound();
        } else {
            return $this->success($data, 'success', 'Successfully');
        }
    }
    public function createData(YearRequest $request)
    {
        try {
            $data = $this->yearmodel->create($request->all());
            return $this->success($data, 'success', 'Successfully');
        } catch (\Throwable $th) {
            return $this->error($th->getMessage());
        }
    }
    public function getDataById($id)
    {
        $data = $this->yearmodel->find($id);
        if (!$data) {
            return $this->dataNotFound();
        }
        return $this->success($data, '200', 'Successfully');
    }
    public function updateData(YearRequest $request, $id)
    {
        try {
            $data = $this->yearmodel->find($id);
            if (!$data) {
                return $this->dataNotFound();
            }
            $data->update($request->all());
            return $this->success($data, 'success', 'Successfully');
        } catch (\Throwable $th) {
            return $this->error($th->getMessage());
        }
    }
    public function deleteData($id)
    {
        try {
            $data = $this->yearmodel->find($id);
            if (!$data) {
                return $this->dataNotFound();
            }
            $data->delete();
            return $this->delete();
        } catch (\Throwable $th) {
            return $this->error($th->getMessage(), 500);
        }
    }
}
