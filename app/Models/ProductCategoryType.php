<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductCategoryType extends Model
{
    use HasFactory;
    protected $table = 'product_category_type';
    protected $primaryKey = 'product_category_type_code';
    public $incrementing = false;
    protected $guarded = [];
}
