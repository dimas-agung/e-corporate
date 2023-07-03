<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Composit extends Model
{
    use HasFactory;
    protected $table = 'composit';
    protected $primaryKey = 'composit_code';

    public $incrementing = false;
    protected $guarded = [];

    public function items()
    {
        return $this->hasMany(CompositItem::class, 'composit_code', 'composit_code');
    }
}