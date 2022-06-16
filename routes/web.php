<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\ModelController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\RioController;
use App\Http\Controllers\SubItemController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

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

Route::get('/', [DashboardController::class, 'index'])->middleware('auth');

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

Route::group(['middleware' => ['auth']], function () {
    Route::resource('task', TaskController::class)->except('update');
    Route::put('task-update/{id}', [TaskController::class, 'update'])->name('task-update');
    Route::resource('item', ItemController::class)->except('update');
    Route::put('item-update/{id}', [ItemController::class, 'update']);
    Route::resource('model', ModelController::class)->except('update');
    Route::put('model-update/{id}', [ModelController::class, 'update'])->name('model-update');
    Route::resource('project', ProjectController::class)->except('update');
    Route::put('project-update/{id}', [ProjectController::class, 'update'])->name('project-update');
    Route::resource('rio', RioController::class)->except('update', 'store_exist');
    Route::post('rio-store-exsist', [RioController::class, 'store_exsist'])->name('rio-store-exsist');
    Route::put('rio-update/{id}', [RioController::class, 'update']);
    Route::resource('sub-item', SubItemController::class);
    Route::resource('dashboard', DashboardController::class);
    Route::resource('user', UserController::class)->except('update');
    Route::put('user-update/{id}', [UserController::class, 'update'])->name('user-update');
    Route::get('/logout', [AuthenticatedSessionController::class, 'destroy'] );
});

require __DIR__.'/auth.php';
