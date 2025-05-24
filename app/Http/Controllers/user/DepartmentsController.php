<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Department;
use App\Models\Level;
use App\Models\Semester;
use Illuminate\Http\Request;

class DepartmentsController extends Controller
{
      public function index($id)
    {
        $departments=Department::where('college_id',$id)->with('college')->get();
        $levels = Level::all();
        $semesters=Semester::all();
        return view('user.user_pages.departments', compact('departments', 'levels', 'semesters'));
    }
   public function departmentDetails(Request $request)
{
    // تحقق من صحة البيانات
    $request->validate([
        'department' => 'required|integer',
        'level' => 'required|integer',
        'semester' => 'required|integer',
    ]);

    // جلب المواد حسب الخيارات
    $courses = Course::where('department_id', $request->department)
        ->where('level_id', $request->level)
        ->where('semester_id', $request->semester)
        ->with(['department', 'level', 'semester'])
        ->get();

    // عرض الصفحة مع النتائج
    return view('user.user_pages.department_details', compact('courses'));
}

    
    public function courseDetails($id)
    {
        $course = Course::with(['department', 'level', 'semester'])->findOrFail($id);
        return view('user.user_pages.course_details', compact('course'));
    }
}
