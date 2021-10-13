<?php

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

// Route::resource('employees', EmployeeController::class);

Route::prefix('dashboard')->middleware(['web', 'auth'])->group(function(){
    Route::get('home', 'HomeController@index')->name('Dashboard.home');
    Route::get('employees', 'EmployeeController@index' )->name('Dashboard.Employees.index');
    Route::get('employees/cadastrar', 'EmployeeController@create')->name('Dashboard.Employees.create');
    Route::post('employees', 'EmployeeController@store')->name('Dashboard.Employees.store');
    Route::get('employees/{id}/editar', 'EmployeeController@edit')->name('Dashboard.Employees.edit');
    Route::post('employees/{id}', 'EmployeeController@update')->name('Dashboard.Employees.update');
    Route::get('employees/deletar/{id}', 'EmployeeController@destroy')->name('Dashboard.Employees.destroy');
});

Route::post('/autocomplete', 'EmployeeController@fill')->name('autocomplete');

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

