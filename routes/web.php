<?php

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

Route::view('/', 'welcome');
Route::resource('members', \App\Http\Controllers\MemberController::class);
Route::resource('trainings', \App\Http\Controllers\TrainingController::class);
Route::resource('departments', \App\Http\Controllers\DepartmentController::class);
Route::resource('departments.members', \App\Http\Controllers\DepartmentMemberController::class);
Route::resource('departments.trainings', \App\Http\Controllers\DepartmentTrainingController::class);





