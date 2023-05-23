<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Query\Grammars\Grammar;

class Employee extends Model
{
    use HasFactory;
    // use SoftDeletes;

    protected $table = 'employee';
    protected $primaryKey = 'employee_code';
    public $incrementing = false;
    protected $guarded = [];

    public function department()
    {
        return $this->belongsTo(Department::class, 'department_code', 'department_code');
    }
    public function section()
    {
        return $this->belongsTo(Section::class, 'section_code', 'section_code');
    }
    public function bank()
    {
        return $this->belongsTo(Bank::class, 'bank_code', 'bank_code');
    }
    public function gradeTitle()
    {
        return $this->belongsTo(GradeTitle::class, 'grade_title_code', 'grade_title_code');
    }
    public function maritalStatus()
    {
        return $this->belongsTo(MaritalStatus::class, 'marital_status_code', 'marital_status_code');
    }
}
