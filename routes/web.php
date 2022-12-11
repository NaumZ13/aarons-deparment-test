<?php

use App\Http\Controllers\CsvFileUploadController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\EmployeeShiftController;
use App\Http\Controllers\ShiftController;
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

Route::get('/',[CsvFileUploadController::class, 'index']);
Route::post('/',[CsvFileUploadController::class, 'upload']);

Route::get('employees', [EmployeeController::class, 'index'])->name('employees.index');
Route::get('employees/{employee}', [EmployeeController::class, 'show'])->name('employees.show');

Route::get('employees/{employee}/shifts', [EmployeeShiftController::class, 'index'])->name('employees.shifts');


Route::resource('shifts',ShiftController::class)->except('show');
