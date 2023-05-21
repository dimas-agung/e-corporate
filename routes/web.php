<?php

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

Route::controller(App\Http\Controllers\EmployeeController::class)->group(function () {
    Route::get('/employee', 'index');
    Route::get('/employee/create', 'create');
    Route::post('/employee', 'store');
    Route::get('/employee/{employee}', 'show');
    Route::get('/employee/{employee}/edit', 'edit');
    Route::put('/employee/{employee}', 'update')->name('employee.update');
    Route::delete('/employee/{employee}', 'destroy');
});
