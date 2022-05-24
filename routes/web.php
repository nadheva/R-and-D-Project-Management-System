<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\ModelController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\RioController;
use App\Http\Controllers\SubItemController;
use App\Http\Controllers\UserController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

Route::group(['middleware' => ['auth']], function () {
    Route::resource('task', TaskController::class);
    Route::resource('item', ItemController::class)->except('update');
    Route::put('item-update/{id}', [ItemController::class, 'update']);
    Route::resource('model', ModelController::class);
    Route::resource('project', ProjectController::class);
    Route::resource('rio', RioController::class);
    Route::resource('sub-item', SubItemController::class);
    Route::resource('dashboard', DashboardController::class);
    Route::resource('user', DashboardController::class);
    Route::get('logout', [AuthenticatedSessionController::class, 'destroy'] );
});

require __DIR__.'/auth.php';
