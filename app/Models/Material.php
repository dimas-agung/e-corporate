<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    use HasFactory;
    protected $table = 'material';
    protected $primaryKey = 'material_code';
    public $incrementing = false;
    protected $guarded = [];

    public function uom()
    {
        return $this->hasOne(Uom::class, 'uom_code', 'uom_code');
    }
    public function category()
    {
        return $this->hasOne(MaterialCategory::class, 'material_category_1', 'material_category_code');
    }
}
