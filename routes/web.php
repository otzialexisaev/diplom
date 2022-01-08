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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('/user')->middleware(['auth'])->group(function() {
    Route::fallback(function() {
        return view('layouts.userVue');
    });
});

Route::get('/user', function() {
    return view('layouts.userVue');
})->middleware(['auth']);

Route::prefix('/admin')->middleware(['auth', 'isAdmin'])->group(function() {
    Route::fallback(function() {
        return view('layouts.adminVue');
    });
});

Route::prefix('/api/admin/')->group(function() {
    Route::get('groups', [\App\Http\Controllers\Api\Admin\ApiController::class, 'groups']);
    Route::get('tests/index', [\App\Http\Controllers\Api\Admin\TestsController::class, 'index']);
    Route::get('tests/{id}', [\App\Http\Controllers\Api\Admin\TestsController::class, 'show']);
    Route::post('tests/store', [\App\Http\Controllers\Api\Admin\TestsController::class, 'store']);
    Route::post('tests/update/{id}', [\App\Http\Controllers\Api\Admin\TestsController::class, 'update']);
    Route::get('materials', [\App\Http\Controllers\Api\Admin\MaterialsController::class, 'index']);
    Route::post('materials/store', [\App\Http\Controllers\Api\Admin\MaterialsController::class, 'store']);
    Route::get('subjects', [\App\Http\Controllers\Api\Admin\SubjectsController::class, 'index']);
    Route::post('subjects/store', [\App\Http\Controllers\Api\Admin\SubjectsController::class, 'store']);
});

Route::prefix('/api/')->group(function() {
    Route::get('tests/index', [\App\Http\Controllers\Api\TestsController::class, 'index']);
    Route::post('tests/solve/{id}', [\App\Http\Controllers\Api\TestsController::class, 'solve']);
    Route::get('tests/{id}', [\App\Http\Controllers\Api\TestsController::class, 'getTest']);
});
