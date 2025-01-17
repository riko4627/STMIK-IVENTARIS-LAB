<?php

namespace App\Repositories;

use App\Http\Requests\UserRequest;
use App\Interfaces\UserInterfaces;
use App\Models\User;
use App\Traits\HttpResponseTrait;
use Illuminate\Support\Facades\Hash;

class UserRepositories implements UserInterfaces
{
    use HttpResponseTrait;
    protected $userModel;
    public function __construct(User $userModel)
    {
        $this->userModel = $userModel;
    }
    public function getAllData()
    {
        $data = $this->userModel::all();
        if (!$data) {
            return $this->dataNotFound();
        } else {
            return $this->success($data);
        }
    }
    public function createData(UserRequest $request)
    {
        try {
            $data = new $this->userModel;
            $data->name = $request->input('name');
            $data->username = $request->input('username');
            $data->role = $request->input('role');
            $data->email = $request->input('email');
            $data->password =  Hash::make($request->input('password'));

            $data->save();

            return $this->success($data);
        } catch (\Throwable $th) {
            return $this->error($th->getMessage(), 400, $th, class_basename($this), __FUNCTION__);
        }
    }
    public function getDataById($id)
    {
        $data = $this->userModel::where('id', $id)->first();
        if ($data) {
            return $this->success($data);
        } else {
            return $this->dataNotFound();
        }
    }
    public function updateData(UserRequest $request, $id)
    {
        try {
            // Cari data berdasarkan ID
            $data = $this->userModel::findOrFail($id);

            // Update data utama
            $data->name = $request->input('name');
            $data->username = $request->input('username');
            $data->role = $request->input('role');
            $data->email = $request->input('email');

            // Update password jika ada input
            if ($request->filled('password')) {
                $data->password = Hash::make($request->input('password'));
            }

            // Simpan perubahan
            $data->save();

            // Return response sukses
            return $this->success([
                'message' => 'Data berhasil diperbarui',
                'data' => $data
            ]);
        } catch (\Throwable $th) {
            // Tangani error
            return $this->error($th->getMessage(), 400, $th, class_basename($this), __FUNCTION__);
        }
    }

    public function deleteData($id)
    {
        try {
            $data = $this->userModel::findOrFail($id);
            if (!$data) {
                return $this->dataNotFound();
            }
            $data->delete();
            return $this->delete();
        } catch (\Throwable $th) {
            return $this->error($th->getMessage(), 400, $th, class_basename($this), __FUNCTION__);
        }
    }
}
