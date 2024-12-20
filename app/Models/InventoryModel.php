<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InventoryModel extends Model
{
    use HasUuids, HasFactory;

    protected $table = 'tb_inventory';
    protected $fillable = [
        'id',
        'item_name',
        'total_item',
        'total_items_good',
        'total_items_crash',
        'spesification',
        'id_lab',
        'id_year',
        'id_category',
        'created_at',
        'update_at'
    ];
}
