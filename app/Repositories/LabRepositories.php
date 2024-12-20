<?php

namespace App\Repositories;

use App\Http\Requests\LabRequest;
use App\Interfaces\LabInterfaces;
use App\Models\LabModel;
use App\Traits\HttpResponseTrait;
use Illuminate\Support\Facades\Hash;



class LabRepositories implements LabInterfaces
{
    use HttpResponseTrait;
    protected $LabModel;
    public function __construct(LabModel $LabModel)
    {
        $this->LabModel = $LabModel;
    }

    public function getAllData()
    {
        $data = $this->LabModel::all();
        if ($data->isEmpty()) {
            return $this->dataNotFound();
        } else {
            return $this->success($data);
        }
    }
    public function createData(LabRequest $request)
    {
        try {
            // Create the Grup
            $data = new $this->LabModel;
            $data->name = $request->input('name');
            $data->location = $request->input('location');

            $data->save();

            return $this->success($data);
        } catch (\Throwable $th) {
            return $this->error($th->getMessage(), 400, $th, class_basename($this), __FUNCTION__);
        }
    }

    public function getDataById($id)
    {
        $data = $this->LabModel::where('id', $id)->first();
        if ($data) {
            return $this->success($data);
        } else {
            return $this->dataNotFound();
        }
    }

    public function updateDataById(LabRequest $request, $id)
    {
        try {
            // Temukan data pengguna berdasarkan ID
            $data = $this->LabModel::findOrFail($id);

            // Perbarui data pengguna
            $data->name = $request->input('name');
            $data->location = $request->input('location');


            $data->save();

            return $this->success($data);
        } catch (\Throwable $th) {
            return $this->error($th->getMessage(), 400, $th, class_basename($this), __FUNCTION__);
        }
    }

    public function deleteData($id)
    {
        try {
            // Temukan data pengguna berdasarkan ID
            $data = $this->LabModel::findOrFail($id);

            // Hapus data pengguna
            $data->delete();

            return $this->success("Data pengguna berhasil dihapus.");
        } catch (\Throwable $th) {
            return $this->error($th->getMessage(), 400, $th, class_basename($this), __FUNCTION__);
        }
    }
}
