<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class College extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function university()
    {
        return $this->belongsTo(University::class, 'university_id');
    }
    public function department(){
        return $this->hasMany(Department::class, 'college_id');
    }
}
