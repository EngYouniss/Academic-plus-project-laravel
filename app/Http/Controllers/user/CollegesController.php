<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\College;
use App\Models\University;
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
        $colleges = College::with(['university','department','course'])->where('university_id',$id)->get();
        $university = University::find($id);
        return view('user.user_pages.colleges', compact('colleges', 'university'));
    }
}
