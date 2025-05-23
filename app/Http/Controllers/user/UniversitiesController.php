<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UniversitiesController extends Controller
{
    public function index()
    {
        return view('user.user_pages.universities');
    }
}
