<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function semester()
    {
        return $this->hasMany(Semester::class, 'semester_id');
    }
    public function department()
    {
        return $this->belongsTo(Department::class, 'department_id');
    }
}
