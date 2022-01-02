<?php

use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::prefix('/admin')->middleware(['auth', 'isAdmin'])->group(function() {
    Route::fallback(function() {
        return view('layouts.onlyVue');
    });
});

Route::prefix('/api')->group(function() {
    Route::get('/admin/groups', [\App\Http\Controllers\Api\ApiController::class, 'groups']);
    Route::get('/admin/test/index', [\App\Http\Controllers\Api\TestsController::class, 'index']);
    Route::get('/admin/test/{id}', [\App\Http\Controllers\Api\TestsController::class, 'show']);
    Route::post('/admin/test/store', [\App\Http\Controllers\Api\TestsController::class, 'store']);
    Route::post('/admin/test/update/{id}', [\App\Http\Controllers\Api\TestsController::class, 'update']);
    Route::post('/admin/materials/store', [\App\Http\Controllers\Api\MaterialsController::class, 'store']);
    Route::post('/admin/subject/store', [\App\Http\Controllers\Api\SubjectsController::class, 'store']);
});
