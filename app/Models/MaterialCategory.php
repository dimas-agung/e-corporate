<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MaterialCategory extends Model
{
    use HasFactory;
    protected $table = 'material_category';
    protected $primaryKey = 'material_category_code';
    public $incrementing = false;
    protected $guarded = [];
}
