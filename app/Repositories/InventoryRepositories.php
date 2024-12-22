<?php

namespace App\Repositories;

use App\Helper\ImageHandler;
use App\Http\Requests\InventoryRequest;
use App\Interfaces\InventoryInterface;
use App\Models\CategoryModel;
use App\Models\InventoryModel;
use App\Models\LabModel;
use App\Models\YearModel;
use App\Traits\HttpResponseTrait;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Str;

class InventoryRepositories implements InventoryInterface
{
    protected $inventoryModel;
    protected $labModel;
    protected $yearModel;
    protected $categoryModel;
    use HttpResponseTrait;

    public function __construct(InventoryModel $inventoryModel, CategoryModel $categoryModel, YearModel $yearModel, LabModel $labModel)
    {
        $this->categoryModel = $categoryModel;
        $this->inventoryModel = $inventoryModel;
        $this->yearModel = $yearModel;
        $this->labModel = $labModel;
    }

    public function getAllData()
    {
        $data = $this->inventoryModel->with('category', 'lab', 'year')->get();
        if(!$data){
            return $this->dataNotFound();
        }else{
            return $this->success($data, 'success', 'success get all data inventaris barang');
        }
    }

    public function createData(InventoryRequest $request)
    {

        try {
            DB::beginTransaction();
            $data = new $this->inventoryModel;
            $data->item_name = $request->input('item_name');
            $data->total_items = $request->input('total_items');
            $data->total_items_good = $request->input('total_items_good');
            $data->total_items_crash = $request->input('total_items_crash');
            $data->spesification = $request->input('spesification');
            $data->id_category = $request->input('id_category');
            $data->id_lab = $request->input('id_lab');
            $data->id_year = $request->input('id_year');
            $data->save();
            DB::commit();
            return $this->success($data, 'success', 'success create data inventaris barang');
        } catch (\Throwable $th) {
            DB::rollBack();
            return $this->error($th->getMessage());
        }
    }

    public function getDataById($id)
    {
        $data = $this->inventoryModel->find($id);
        if(!$data){
            return $this->dataNotFound();
        }else{
            return $this->success($data, 'success', 'success get data inventaris barang by id');
        }
    }

    public function updateData(InventoryRequest $request, $id)
    {
        try {
            DB::beginTransaction();
            $data = $this->inventoryModel->find($id);
            if(!$data){
                return $this->dataNotFound();
            }
            $data->item_name = $request->input('item_name');
            $data->total_items = $request->input('total_items');
            $data->total_items_good = $request->input('total_items_good');
            $data->total_items_crash = $request->input('total_items_crash');
            $data->spesification = $request->input('spesification');
            $data->save();
            DB::commit();
            return $this->success($data, 'success', 'success update data inventaris barang');
        } catch (\Throwable $th) {
            DB::rollBack();
            return $this->error($th->getMessage());
        }
    }

    public function deleteData($id)
    {
        try {
            $data = $this->inventoryModel->find($id);
            if(!$data){
                return $this->dataNotFound();
            }
            
            $data->delete();
            return $this->delete();

        } catch (\Throwable $th) {
            return $this->error($th->getMessage(), 500);
        }
    }
}
