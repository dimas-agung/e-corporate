<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Department extends Model
{
    use HasFactory;
    // use SoftDeletes;
    protected $table = 'department';
    protected $guarded = [];

    public function section()
    {
        return $this->hasMany(Section::class, 'department_code', 'department_code');
    }
}