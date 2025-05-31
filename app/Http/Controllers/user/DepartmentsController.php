<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\CourseContent;
use App\Models\Department;
use App\Models\Level;
use App\Models\Semester;
use Illuminate\Http\Request;

class DepartmentsController extends Controller
{
    // عرض الأقسام الخاصة بكل كلية
    public function index($id)
    {
        $departments = Department::where('college_id', $id)->with('college')->get();
        $levels = Level::all();
        $semesters = Semester::all();

        return view('user.user_pages.departments', compact('departments', 'levels', 'semesters'));
    }

    // عرض تفاصيل المواد بحسب القسم والمستوى والفصل
    public function departmentDetails(Request $request)
    {
        $request->validate([
            'department' => 'required|integer',
            'level' => 'required|integer',
            'semester' => 'required|integer',
        ]);

        $courses = Course::where('department_id', $request->department)
            ->where('level_id', $request->level)
            ->where('semester_id', $request->semester)
            ->with(['department', 'level', 'semester'])
            ->get();

        return view('user.user_pages.department_details', compact('courses'));
    }

    // عرض صفحة تفاصيل الكورس ومحتوياته
  public function courseDetails(Request $request, $id)
{
    $course = Course::with(['department', 'level', 'semester'])->findOrFail($id);
    $type = $request->query('type'); // جلب نوع المحتوى من الرابط

    // فلترة المحتوى حسب النوع إن وجد
    $courseContents = CourseContent::where('course_id', $id)
        ->when($type, function ($query, $type) {
            return $query->where('content_type', $type);
        })
        ->get();

    return view('user.user_pages.course_details', compact('course', 'courseContents'));
}


    // فلترة محتويات من نوع "كتاب" فقط (غير مستخدمة حاليًا، يمكنك استخدامها لاحقًا)
    public function booksContent($id)
    {
        return CourseContent::where('course_id', $id)
            ->where('content_type', 'book')
            ->get();
    }
}
