<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\TypeProjectController;
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

Route::resource('/', HomeController::class)->only(['index']);
Route::resource('/aboutUs', AboutController::class)->only(['index']);
Route::post("/login-area", [LoginController::class, 'authenticate'])->name('login-area.authenticate');
Route::post('/logout', [LoginController::class, 'logout'])->name('login-area.logout');
Route::resource('/login-area', LoginController::class)->except(["store", "create", "update", "destroy", "show", "edit"]);
Route::get('/project-notStarted', [TypeProjectController::class, 'projectNotStarted'])->name('project.notStarted');
Route::get('/project-ongoing', [TypeProjectController::class, 'projectOngoing'])->name('project.ongoing');
Route::get('/project-finish', [TypeProjectController::class, 'projectFinished'])->name('project.finish');
Route::get('/calculator-kpr', function () {
    return view('pages.calculator');
})->name('calculator');
Route::resource('/contactUs',ContactController::class)->except(["store", "create", "update", "destroy", "show","edit"]);