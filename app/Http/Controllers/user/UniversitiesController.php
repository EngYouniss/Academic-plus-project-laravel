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
        $universities =University::get();
        // Pass the universities data to the view
        return view('user.user_pages.universities', compact('universities'));
    }
}
