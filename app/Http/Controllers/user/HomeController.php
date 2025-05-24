<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\University;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $universities = University::all();
        return view('user.home',compact('universities'));
    }
}
