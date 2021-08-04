<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\LecturerController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


/** Static Homepage route */
Route::get('/', function () {
    return view('welcome');
});

/** Auth Routes */
Auth::routes();

/** Main Dashboard Route */
// Retrieve data based on role of the user and that specific user's data
Route::get('/home', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');

/** Student-only Routes */
Route::get('/student/compound', [StudentController::class, 'viewCompound'])->name('student.viewCompound');
// Route::post('/student/compound/pay', [StudentController::class, 'payCompound']);
Route::get('/student/merit', [StudentController::class, 'viewMerit'])->name('student.viewMerit');
// Route::post('/student/merit/new', [StudentController::class, 'submitMerit']);

// /** Lecturer-only Routes */
Route::get('/lecturer/compound', [LecturerController::class, 'viewCompound'])->name('lecturer.viewCompound');
// Route::post('/lecturer/compound/new', [LecturerController::class, 'submitCompound']);
