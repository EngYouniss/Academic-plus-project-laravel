<?php

use App\Http\Controllers\user\CollegesController;
use App\Http\Controllers\user\DepartmentsController;
use App\Http\Controllers\user\HomeController;
use App\Http\Controllers\user\UniversitiesController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/',[HomeController::class, 'index'])->name('user.home');
Route::get('/user/universities',[UniversitiesController::class, 'index'])->name('user.universities');
Route::get('/user/colleges',[CollegesController::class,'index'])->name('user.faculities');
Route::get('/user/departments',[DepartmentsController::class,'index'])->name('user.departments');
Route::get('/user/department_details',[DepartmentsController::class,'departmentDetails'])->name('user.department_details');

Route::get('/user/university/{id}',[CollegesController::class, 'show'])->name('user.university');
