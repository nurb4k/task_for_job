<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
//Route::get('/sessions',[\App\Http\Controllers\UserController::class,'getAllSessions']);
//Route::post('/terminateAll', [\App\Http\Controllers\UserController::class, 'terminateAllSession']);


Route::get('/sessions',[UserController::class,'sessions'])->middleware(['auth'])->name('profile');
Route::post('/sessions/terminate-all', [UserController::class, 'terminateAll'])->middleware(['auth'])->name('sessions.terminateAll');
Route::post('/terminate/{session}', [UserController::class, 'terminate'])->middleware(['auth'])->name('sessions.terminate');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
