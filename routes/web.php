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
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::controller(App\Http\Controllers\EmployeeController::class)->group(function () {
    Route::get('/employee', 'index');
    Route::get('/employee/create', 'create');
    Route::post('/employee', 'store')->name('employee.store');
    Route::get('/employee/{employee}', 'show');
    Route::get('/employee/{employee}/edit', 'edit');
    Route::put('/employee/{employee}', 'update')->name('employee.update');
    Route::delete('/employee/{employee}', 'destroy');
    Route::get('/api/data_employee', 'dataEmployee')->name('employee.data_employee');
});
Route::controller(App\Http\Controllers\SectionController::class)->group(function () {
    Route::get('/section', 'index');
    Route::get('/section/create', 'create');
    Route::post('/section', 'store')->name('section.store');
    Route::get('/section/{section}', 'show');
    Route::get('/section/{section}/edit', 'edit');
    Route::put('/section/{section}', 'update')->name('section.update');
    Route::delete('/section/{section}', 'destroy');
    Route::get('/api/data_section', 'dataSection')->name('section.data_section');
});
Route::controller(App\Http\Controllers\DepartmentController::class)->group(function () {
    Route::get('/department', 'index');
    Route::get('/department/create', 'create');
    Route::post('/department', 'store')->name('department.store');
    Route::get('/department/{department}', 'show');
    Route::get('/department/{department}/edit', 'edit');
    Route::put('/department/{department}', 'update')->name('department.update');
    Route::delete('/department/{department}', 'destroy');
    Route::get('/api/data_department', 'dataDepartment')->name('department.data_department');
});
Route::controller(App\Http\Controllers\GradeTitleController::class)->group(function () {
    Route::get('/grade_title', 'index');
    Route::get('/grade_title/create', 'create');
    Route::post('/grade_title', 'store')->name('grade_title.store');
    Route::get('/grade_title/{grade_title}', 'show');
    Route::get('/grade_title/{grade_title}/edit', 'edit');
    Route::put('/grade_title/{grade_title}', 'update')->name('grade_title.update');
    Route::delete('/grade_title/{grade_title}', 'destroy');
    Route::get('/api/data_grade_title', 'dataGradeTitle')->name('grade_title.data_grade_title');
});