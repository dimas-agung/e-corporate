<?php

use App\Http\Controllers\Product\CompositController;
use App\Http\Controllers\Product\UnitController;
use App\Http\Controllers\Product\UomController;
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
    Route::delete('/section/{section}', 'destroy')->name('section.destroy');
    Route::get('/api/data_section', 'dataSection')->name('section.data_section');
});
Route::controller(App\Http\Controllers\DepartmentController::class)->group(function () {
    Route::get('/department', 'index');
    Route::get('/department/create', 'create');
    Route::post('/department', 'store')->name('department.store');
    Route::get('/department/{department}', 'show');
    Route::get('/department/{department}/edit', 'edit');
    Route::put('/department/{department}', 'update')->name('department.update');
    Route::delete('/department/{department}', 'destroy')->name('department.destroy');
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

Route::prefix('/product')->group(function () {
    Route::controller(UnitController::class)->group(function () {
        Route::get('/unit', 'index');
        Route::get('/unit/create', 'create');
        Route::post('/unit', 'store')->name('unit.store');
        Route::get('/unit/{unit}', 'show');
        Route::get('/unit/{unit}/edit', 'edit');
        Route::put('/unit/{unit}', 'update')->name('unit.update');
        Route::delete('/unit/{unit}', 'destroy')->name('unit.destroy');
        Route::get('/api/data_unit', 'dataUnit')->name('unit.data_unit');
    });
    Route::controller(UomController::class)->group(function () {
        Route::get('/uom', 'index');
        Route::get('/uom/create', 'create');
        Route::post('/uom', 'store')->name('uom.store');
        Route::get('/uom/{uom}', 'show');
        Route::get('/uom/{uom}/edit', 'edit');
        Route::put('/uom/{uom}', 'update')->name('uom.update');
        Route::delete('/uom/{uom}', 'destroy')->name('uom.destroy');

        Route::get('/api/is_unique_uom_code', 'isUniqueUomCode')->name('uom.is_unique_uom_code');
        Route::get('/api/data_uom', 'dataUom')->name('uom.data_uom');
        Route::get('/api/data_uom_items', 'dataUomItems')->name('uom.data_uom_items');
    });
    Route::controller(CompositController::class)->group(function () {
        Route::get('/composit', 'index');
        Route::get('/composit/create', 'create');
        Route::post('/composit', 'store')->name('composit.store');
        Route::get('/composit/{composit}', 'show');
        Route::get('/composit/{composit}/edit', 'edit');
        Route::put('/composit/{composit}', 'update')->name('composit.update');
        Route::delete('/composit/{composit}', 'destroy')->name('composit.destroy');

        Route::get('/api/is_unique_composit_code', 'isUniqueUomCode')->name('composit.is_unique_composit_code');
        Route::get('/api/data_composit', 'dataUom')->name('composit.data_composit');
        Route::get('/api/data_composit_items', 'dataUomItems')->name('composit.data_composit_items');
    });
});
