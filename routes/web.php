<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\VisitRequestController;
use App\Models\VisitRequest;

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

Route::get('/', [GuestController::class, 'index'])->name('guest.home');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Property Routes
Route::get('/property', [PropertyController::class, 'index'])->name('property.index');
Route::get('/property/create', [PropertyController::class, 'create'])->name('property.create');
Route::post('/property', [PropertyController::class, 'store'])->name('property.store');
Route::get('/property/{property}', [PropertyController::class, 'show'])->name('property.show');
Route::post('/property/search', [PropertyController::class, 'search'])->name('property.search');

// Comment Routes
Route::post('/comment', [CommentController::class, 'store'])->name('comment.store');

// Visit Request Routes
Route::get('/visit-request', [VisitRequestController::class, 'index'])->name('visit_request.index');
Route::post('/visit-request', [VisitRequestController::class, 'store'])->name('visit_request.store');
Route::put('/visit-request/{visitRequest}', [VisitRequestController::class, 'update'])->name('visit_request.update');
