<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CollegesController extends Controller
{
     public function index()
    {
        return view('user.user_pages.colleges');
    }
}
