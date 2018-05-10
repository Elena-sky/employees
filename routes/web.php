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

Route::get('/', 'IndexController@index'); // Display the tree.
Route::post('/next-level', 'IndexController@getNextLevel'); // Show next level of the tree.

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::group([ 'middleware' => 'auth'], function(){

    Route::get('/employees', 'EmployeesController@show')->name('employees'); // Display all employees

    // Create employee
    Route::get('/employees/create-new', function () {
        return view('employees.create');
    })->name('createEmployee'); // Show the page for create new employee
    Route::post('/employees/store-new', 'EmployeesController@store')->name('createdEmployee');
    Route::get('/employees/selectBoss', 'EmployeesController@selectBoss'); // Ajax autocomplete

    // Update employee
    Route::get('/employees/{id}/update', 'EmployeesController@update')->name('updateEmployee');
    Route::put('/employees/{id}/updated', 'EmployeesController@updated')->name('updatedEmployee');

    // Delete employee
    Route::delete('/employees/delete', 'EmployeesController@delete')->name('delete'); // Ajax delete employee

    // Ajax
    Route::post('/employees/sort', 'EmployeesController@sortTable')->name('sort'); // sort employee
    Route::post('/employees/search', 'EmployeesController@search')->name('sort'); // search employee



});

