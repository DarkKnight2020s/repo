<?php

use Illuminate\Support\Facades\Route;
 



Route::get('tasks','TaskController@index');

Route::get('task/{id}','TaskController@show');

Route::post('store','TaskController@store');

Route::delete('delete/{id}','Taskcontroller@destroy');

Route::put('edit/{id}','Taskcontroller@ShowEditTask');

Route::patch('update/{id}','TaskController@Update');
 

    