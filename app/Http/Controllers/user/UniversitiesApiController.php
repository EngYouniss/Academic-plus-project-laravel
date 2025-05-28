<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\University;
use Illuminate\Http\Request;

class UniversitiesApiController extends Controller
{
    public function getuniv(){
        $universities=University::with('colleges')-> get();
        return response($universities);
    }
}
