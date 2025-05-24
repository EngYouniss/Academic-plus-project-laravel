<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;
    public $guarded = [];
    public function college()
    {
        return $this->belongsTo(College::class, 'college_id');
    }
    public function semester()
    {
        return $this->hasMany(Semester::class, 'department_id');
    }
}
