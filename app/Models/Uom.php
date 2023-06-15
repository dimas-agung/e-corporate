<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Uom extends Model
{
    use HasFactory;
    protected $table = 'uom';
    protected $primaryKey = 'uom_code';

    public $incrementing = false;
    protected $guarded = [];

    public function unit()
    {
        return $this->hasOne(Unit::class, 'unit_code', 'unit_code');
    }
}
