<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\VisitRequestController;
use App\Http\Controllers\LikeController;
use App\Models\VisitRequest;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Admin\HomeController as HomeController_;
use App\Http\Controllers\Admin\LocalityController as LocalityController_;
use App\Http\Controllers\Admin\PropertyController as PropertyController_;
use App\Http\Controllers\Admin\UserController as UserController_;
use App\Http\Controllers\Admin\UserStatusController as UserStatusController_;
use App\Http\Controllers\Admin\ImageController;

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
Route::get('/property/search', [PropertyController::class, 'search'])->name('property.search');
Route::get('/property/{property}', [PropertyController::class, 'show'])->name('property.show');


// Comment Routes
Route::post('/comment', [CommentController::class, 'store'])->name('comment.store');

// Visit Request Routes
Route::get('/visit-request', [VisitRequestController::class, 'index'])->name('visit_request.index');
Route::post('/visit-request', [VisitRequestController::class, 'store'])->name('visit_request.store');
Route::put('/visit-request/{visitRequest}', [VisitRequestController::class, 'update'])->name('visit_request.update');

// Like Routes
Route::post('/like', [LikeController::class, 'store'])->name('like');
Route::get('/like', [LikeController::class, 'index'])->name('like.index');

// User Routes
Route::get('/user/{user}', [UserController::class, 'show'])->name('user.show');

// Routes for admin dashboard
Route::group([
    'prefix' => 'admin',
    'namespace' => 'Admin',
    'as' => 'admin.',
    'middleware' => [
        'admin',
    ],
], function () {
    Route::get('/', [HomeController_::class, 'index'])->name('dashboard');

    // Users Controller
    Route::get('/users', [UserController_::class, 'index'])->name('user.index');
    Route::delete('/users/{user}', [UserController_::class, 'destroy'])->name('user.destroy');
    Route::patch('/users/{user}', [UserController_::class, 'patch'])->name('user.patch');


    // Property Controllers
    Route::get('/properties', [PropertyController_::class, 'index'])->name('property.index');
    Route::delete('/properties/{property}', [PropertyController_::class, 'destroy'])->name('property.destroy');

    // Locality Controllers
    Route::get('/localities', [LocalityController_::class, 'index'])->name('locality.index');
    Route::get('/localities/create', [LocalityController_::class, 'create'])->name('locality.create');
    Route::post('/localities/store', [LocalityController_::class, 'store'])->name('locality.store');
    Route::delete('/localities/{locality}', [LocalityController_::class, 'destroy'])->name('locality.destroy');
    Route::get('/localities/{locality}/edit', [LocalityController_::class, 'edit'])->name('locality.edit');

    // Image Controller
    Route::get('/images', [ImageController::class, 'index'])->name('image.index');
    Route::delete('/images/{image}', [ImageController::class, 'destroy'])->name('image.destroy');
    // Route::get('/localities', [LocalityController_::class, 'index'])->name('locality.index');
});
