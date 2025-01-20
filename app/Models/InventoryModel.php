<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class InventoryModel extends Model
{
    use HasUuids, HasFactory, SoftDeletes;

    protected $table = 'tb_inventory';
    protected $dates = ['deleted_at'];
    protected $fillable = [
        'id',
        'item_name',
        'total_items',
        'total_items_good',
        'total_items_crash',
        'spesification',
        'id_lab',
        'id_year',
        'id_category',
        'created_at',
        'update_at'
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(CategoryModel::class, 'id_category', 'id');
    }
    public function lab(): BelongsTo
    {
        return $this->belongsTo(LabModel::class, 'id_lab', 'id');
    }
    public function year(): BelongsTo
    {
        return $this->belongsTo(YearModel::class, 'id_year', 'id');
    }

    public function createdBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }
}
