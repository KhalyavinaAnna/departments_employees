<?php

Route::get('/', 'DepartmentEmployeeController@getMainPage')->name('index');

Route::resource('employees', 'EmployeeController');
Route::resource('departments', 'DepartmentController');
