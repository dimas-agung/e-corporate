<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UomItem extends Model
{
    use HasFactory;
    protected $table = 'uom_item';

    protected $guarded = [];

    public function uom()
    {
        return $this->hasOne(Uom::class, 'uom_code', 'uom_code');
    }
    public function uomTo()
    {
        return $this->hasOne(Uom::class, 'uom_code', 'to_uom_code');
    }
}
