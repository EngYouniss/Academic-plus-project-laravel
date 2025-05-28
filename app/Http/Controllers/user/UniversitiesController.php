<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\University;
use Illuminate\Http\Request;

class UniversitiesController extends Controller
{
    public function index()
    {
        // Fetch all universities with their colleges, departments, and levels
        $universities = University::get();
        $governmentUniversities = University::where('university_type', 'حكومية')->get();
        $privateUniversities = University::where('university_type', 'خاصة')->get();
        // Pass the universities data to the view
        return view('user.user_pages.universities', compact('universities', 'governmentUniversities', 'privateUniversities'));
    }

    public function firstApi(){
        $universities=University::get();
        return response()->json($universities);
    }
    public function createun(Request $request){

        $newUnev=University::create($request->all());
        return response()->json($newUnev);
    }

    public function deleteun($id){
        $delun=University::find($id);
        $delun->delete();
        $info=[
            "massage"=>"تم حذف الجامعة بنجاح",
            "status"=>200,
            "data"=>$delun
        ];
        return response()->json($info);
    }

}
