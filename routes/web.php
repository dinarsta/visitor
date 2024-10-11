<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VisitorController;


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

// Redirect the root URL to the visitor form
Route::get('/', function () {
    return redirect()->route('visitor.form');
});

// Route to show the visitor form
Route::get('/visitor/form', [VisitorController::class, 'showForm'])->name('visitor.form');

// Route to handle the form submission
Route::post('/visitor/form/submit', [VisitorController::class, 'submitForm']);
