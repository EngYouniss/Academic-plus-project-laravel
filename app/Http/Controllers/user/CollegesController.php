<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\College;
use Illuminate\Http\Request;

class CollegesController extends Controller
{
     public function index()
    {
        // Fetch all colleges with their associated universities
        $colleges = College::with('university')->get();
        return view('user.user_pages.colleges',compact('colleges'));
    }
    public function show($id)
    {
        // Fetch the college with the given ID and its associated departments
        $college = College::with('university')->where('university_id',$id)->get();
        return view('user.user_pages.colleges', compact('college'));
    }
}
