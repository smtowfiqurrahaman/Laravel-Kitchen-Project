<?php

use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ItemController;
use App\Http\Controllers\HomeController;

use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('welcome');
Route::post('/reservation', [App\Http\Controllers\ResrvationController::class, 'reserve'])->name('reservation.reserve');

Auth::routes();

// Route::get('admin/dashboard',function(){
// 	return view('admin.dashboard');
// });


Route::group(['prefix' => 'admin', 'middleware' => 'auth'],function(){
	Route::get('dashboard', [App\Http\Controllers\Admin\DashboardController::class,'index'])->name('admin.dashboard');

	Route::resource('slider', SliderController::class);
	Route::resource('category',CategoryController::class);
	Route::resource('item',ItemController::class);


	Route::get('reservation', [App\Http\Controllers\Admin\ResrvationController::class, 'index'])->name('reservation.index');

	Route::post('/reservation/status/{id}', [App\Http\Controllers\Admin\ResrvationController::class, 'status'])->name('reservation.status');

	Route::post('/reservation/delete/{id}', [App\Http\Controllers\Admin\ResrvationController::class, 'destroy'])->name('reservation.destroy');
});

// Route::get('slider',function(){
// 	return view('admin.slider.index');
// });

