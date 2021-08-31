<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\LecturerController;
use App\Http\Controllers\CheckoutController;

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
Route::get('/student/compound', [StudentController::class, 'viewCompound'])->name('student.viewCompound')->middleware('role:student');
// Route::post('/student/compound/pay', [StudentController::class, 'payCompound'])->middleware('role:student');
Route::get('/student/merit', [StudentController::class, 'viewMerit'])->name('student.viewMerit')->middleware('role:student');
// Route::post('/student/merit/new', [StudentController::class, 'submitMerit'])->middleware('role:student');

// /** Lecturer-only Routes */
Route::get('/lecturer/compound', [LecturerController::class, 'viewCompound'])->name('lecturer.viewCompound')->middleware('role:lecturer');
Route::get('/lecturer/compound/new', [LecturerController::class, 'newCompound'])->name('lecturer.newCompound')->middleware('role:lecturer')->middleware('role:lecturer');
// Route::post('/lecturer/compound/create', [LecturerController::class, 'submitCompound'])->middleware('role:lecturer');
Route::post('/lecturer/compound/create', [LecturerController::class, 'submitCompound'])->name('lecturer.submitCompound')->middleware('role:lecturer');

// Checkout Routes
Route::get('/checkout/paycompound/{compoundid}', [CheckoutController::class, 'payCompound'])->name('checkout.payCompound')->middleware('role:student'); //this route specific for student only
Route::post('/checkout/createsession', [CheckoutController::class, 'createCheckoutSession'])->name('checkout.createSession');
Route::get('/checkout/success', [CheckoutController::class, 'success'])->name('checkout.success');
Route::get('/checkout/cancel', [CheckoutController::class, 'cancel'])->name('checkout.cancel');

// Stripe Webhooks Routes
Route::stripeWebhooks('stripe-webhook');