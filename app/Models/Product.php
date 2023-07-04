<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'product';
    protected $primaryKey = 'product_code';
    public $incrementing = false;
    protected $guarded = [];

    public function uom()
    {
        return $this->hasOne(Uom::class, 'uom_code', 'uom_code');
    }
    public function category()
    {
        return $this->hasOne(ProductCategory::class, 'product_category_1', 'product_category_code');
    }
}
