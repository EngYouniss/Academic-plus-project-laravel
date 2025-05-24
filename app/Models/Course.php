<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function semester()
    {
        return $this->belongsTo(Semester::class, 'semester_id');
    }
    public function department()
    {
        return $this->belongsTo(Department::class, 'department_id');
    }
    public function level()
    {
        return $this->belongsTo(Level::class, 'level_id');
    }
    public function college()
    {
        return $this->belongsTo(College::class, 'college_id');
    }
    public function university()
    {
        return $this->belongsTo(University::class, 'university_id');
    }

    public function courseCategory()
    {
        return $this->belongsTo(CourseCategory::class, 'course_id');
    }

    public function CourseContent()
    {
        return $this->hasMany(CourseContent::class, 'course_id');
    }
}
