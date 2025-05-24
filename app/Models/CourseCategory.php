<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseCategory extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function course()
    {
        return $this->belongsTo(Course::class, 'course_category_id');
    }
    public function courseContent()
    {
        return $this->hasMany(CourseContent::class, 'course_category_id');
    }
    // public function courseCategory()
    // {
    //     return $this->hasMany(Course::class, 'course_category_id');
    // }
}
