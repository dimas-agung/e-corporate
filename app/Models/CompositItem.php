<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompositItem extends Model
{
    use HasFactory;
    protected $table = 'composit_item';

    protected $guarded = [];

    public function composit()
    {
        return $this->hasOne(Composit::class, 'composit_code', 'composit_code');;
    }
    public function UomItem()
    {
        return $this->hasOne(Uom::class, 'uom_code', 'uom_code')->where('item_number', $this->item_number);
    }
}
