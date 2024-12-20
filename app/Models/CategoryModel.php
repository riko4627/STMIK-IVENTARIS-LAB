<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryModel extends Model
{
    use HasUuids, HasFactory;

    protected $table = 'tb_category';
    protected $fillable = [
        'id',
        'name',
        'created_at',
        'updated_at'
    ];
}
