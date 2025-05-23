<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DepartmentsController extends Controller
{
      public function index()
    {
        return view('user.user_pages.departments');
    }
    public function departmentDetails()
    {
        return view('user.user_pages.department_details');
    }
}
