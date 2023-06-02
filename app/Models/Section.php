<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Section extends Model
{
    use HasFactory;
    // use SoftDeletes;
    protected $table = 'section';
    protected $primaryKey = 'section_code';
    public $incrementing = false;
    protected $guarded = [];
    public function department()
    {
        return $this->hasOne(Department::class, 'department_code', 'department_code');
    }
}
