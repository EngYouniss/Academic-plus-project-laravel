<?php

use App\Http\Controllers\user\CollegesController;
use App\Http\Controllers\user\DepartmentsController;
use App\Http\Controllers\user\HomeController;
use App\Http\Controllers\user\UniversitiesController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use League\Csv\Query\Row;

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
Route::get('/user/colleges',[CollegesController::class,'index'])->name('user.faculities');
Route::get('/user/departments/{id}',[DepartmentsController::class,'index'])->name('user.departments');
Route::post('/user/department_details',[DepartmentsController::class,'departmentDetails'])->name('user.department_details');
Route::get('/course-details/{id}', [DepartmentsController::class, 'courseDetails'])->name('course_details');
Route::get('/books/{id}',[DepartmentsController::class,'booksContent'])->name('courseBooks');

Route:: group([],function(){
    Route::get('/user/universities',[UniversitiesController::class, 'index'])->name('user.universities');
    Route::get('/government/universities/',[UniversitiesController::class, 'index'])->name('governmentUniversities');
Route::get('/private/universities/',[UniversitiesController::class, 'index'])->name('privateUniversities');

Route::get('/user/university/{id}',[CollegesController::class, 'show'])->name('user.colleges_by_university');

})->currentRouteName('universities');


Route::post("/logout",function(){
Auth::logout();
return redirect()->route('login');
})->name('logout');

// Route::get('/course/referencespart',[DepartmentsController::class, 'referencesPart'])->name('course.referencespart');

// Route::middleware([
//     'auth:sanctum',
//     config('jetstream.auth_session'),
//     'verified',
// ])->group(function () {
//     Route::get('/dashboard', function () {
//         return view('user.home');
//     })->name('dashboard');
// });
