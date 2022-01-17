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

Route::get('/', function() {
    if (auth()->user()->isAdmin()) {
        return view('layouts.adminVue');
    }
    return view('layouts.userVue');
})->middleware(['auth']);

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
    Route::get('groups', [\App\Http\Controllers\Api\Admin\GroupsController::class, 'index']);
    Route::get('tests/getAll', [\App\Http\Controllers\Api\Admin\TestsController::class, 'getAll']);
    Route::get('tests/get/{id}', [\App\Http\Controllers\Api\Admin\TestsController::class, 'get']);
    Route::post('tests/store', [\App\Http\Controllers\Api\Admin\TestsController::class, 'store']);
    Route::post('tests/update/{id}', [\App\Http\Controllers\Api\Admin\TestsController::class, 'update']);
    Route::get('materials/getAll', [\App\Http\Controllers\Api\Admin\MaterialsController::class, 'getAll']);
    Route::post('materials/store', [\App\Http\Controllers\Api\Admin\MaterialsController::class, 'store']);
    Route::get('subjects/getAll', [\App\Http\Controllers\Api\Admin\SubjectsController::class, 'getAll']);
    Route::post('subjects/store', [\App\Http\Controllers\Api\Admin\SubjectsController::class, 'store']);
});

Route::prefix('/api/')->group(function() {
    Route::get('tests/get/{id}', [\App\Http\Controllers\Api\TestsController::class, 'get']);
    Route::get('tests/getAll', [\App\Http\Controllers\Api\TestsController::class, 'getAll']);
    Route::get('solves/get/{id}', [\App\Http\Controllers\Api\SolvesController::class, 'get']);
    Route::post('solves/store/{id}', [\App\Http\Controllers\Api\SolvesController::class, 'store']);
    Route::get('solves/findByTestId/{id}', [\App\Http\Controllers\Api\SolvesController::class, 'findByTestId']);
    Route::get('materials/download/{id}', [\App\Http\Controllers\Api\MaterialsController::class, 'download']);
});
