<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrincipleClass extends Model
{
    use HasFactory;
    protected $table = 'principle_class';
    protected $primaryKey = 'principle_class_code';

    public $incrementing = false;
    protected $guarded = [];
}
