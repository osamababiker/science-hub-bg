<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\AuthController ;
use App\Http\Controllers\Admin\UsersController ;
use App\Http\Controllers\Admin\PartnersController;
use App\Http\Controllers\Admin\BlogsController;
use App\Http\Controllers\Admin\CategoriesController;
use App\Http\Controllers\Admin\StoriesController;
use App\Http\Controllers\Admin\SettingsController;
use App\Http\Controllers\Admin\MessagesController;
use App\Http\Controllers\Admin\TeachersController;
use App\Http\Controllers\Admin\MembersController;
use App\Http\Controllers\Admin\CoursesController;
use App\Http\Controllers\Admin\TestimonialsController;
use App\Http\Controllers\Admin\OrdersController;



Route::get('/cache/clear', function () {
    \Artisan::call('cache:clear');
    \Artisan::call('config:cache');
    \Artisan::call('route:clear');
   
    dd("Cache is cleared");
});

/* ============ site auth route ============== */
Route::get('/',[AuthController::class, 'showLogin'])->name('login')->middleware('guest');
Route::get('/login',[AuthController::class, 'showLogin'])->name('login')->middleware('guest');
Route::post('/login',[AuthController::class, 'login']);


Route::group(['middleware' => ['auth', 'admin'], 'prefix' => 'admin'], function() {
    /* ============ home route ============== */
    Route::get('/', [HomeController::class, 'index'])->name('admin.index');
    /* ============ settings route ============== */
    Route::resource('/settings', SettingsController::class, ['as' => 'admin']);
    /* ============ categories route ============== */
    Route::resource('/categories', CategoriesController::class, ['as' => 'admin']);
    /* ============ blogs route ============== */
    Route::resource('/blogs', BlogsController::class, ['as' => 'admin']);
    Route::post('/blogs/comments/destroy', [BlogsController::class, 'destroyComments'])->name('admin.blogs.destroyComments');
    /*============== partners route ============== */
    Route::resource('/partners', PartnersController::class, ['as' => 'admin']);
    /*============== stories route ============== */
    Route::resource('/stories', StoriesController::class, ['as' => 'admin']);
    /*============== projects route ============== */
    Route::resource('/courses', CoursesController::class, ['as' => 'admin']);
    /*============== teachers route ============== */
    Route::resource('/teachers', TeachersController::class, ['as' => 'admin']);
    /*============== members route ============== */
    Route::resource('/members', MembersController::class, ['as' => 'admin']);
    /*============== testimonials route ============== */
    Route::resource('/testimonials', TestimonialsController::class, ['as' => 'admin']);
    /*============== contacts route ============== */
    Route::resource('/messages', MessagesController::class, ['as' => 'admin']);
    /*============== orders route ============== */
    Route::resource('/orders', OrdersController::class, ['as' => 'admin']);
     /*============== users route ============== */
     Route::resource('/users', UsersController::class, ['as' => 'admin']);
    /*============== auth route  ==================*/
    Route::post('/logout',[AuthController::class, 'logout'])->name('logout');
    Route::post('/changePassword',[AuthController::class, 'changePassword'])->name('changePassword');
});