<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseContent extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function courseCategory()
    {
        return $this->belongsTo(CourseCategory::class, 'course_category_id');
    }
    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id');
    }
}
