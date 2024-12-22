<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\PartnersController;
use App\Http\Controllers\BlogsController;
use App\Http\Controllers\MessagesController;
use App\Http\Controllers\CoursesController;
use App\Http\Controllers\TeachersController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


/** categories APIs */
Route::resource('categories', CategoriesController::class);
/** blogs APIs */
Route::resource('blogs', BlogsController::class);
/** partners APIs */
Route::resource('partners', PartnersController::class);
/** messages APIs */
Route::resource('messages', MessagesController::class);
/** courses APIs */
Route::resource('courses', CoursesController::class);
/** teachers APIs */
Route::resource('teachers', TeachersController::class);
