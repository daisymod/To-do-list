<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/welcome', function () {
    return view('welcome');
})->name('welcome');

Route::group(['middleware'=>'is_admin'], function (){
    Route::get('/control-panel', 'UserController@allData')->name('control-p');
});

Route::get('/create_task', function () {
    return view('createTask');
})->name('createTask');

Route::get('/task/all', 'TaskController@allData')->name('task-data');
Route::post('/task/submit', 'TaskController@submit')->name('task-form');

Route::get('/task/all{id}', 'TaskController@showOneTask')->name('task-data-one');
Route::get('/task/all{id}/update', 'TaskController@updateTask')->name('task-update');
Route::post('/task/all{id}/update', 'TaskController@updateTaskSubmit')->name('task-update-submit');
Route::get('/task/all{id}/delete', 'TaskController@deleteTask')->name('task-delete');
Route::get('/task/all{id}/shared', 'TaskController@sharedTask')->name('task-shared');
Route::post('/task/all{id}/shared', 'TaskController@sharedTaskSubmit')->name('task-shared-submit');

Route::get('/task/all/Shared', 'TaskController@allDataShared')->name('task-data-shared');
Route::get('/task/all/Shared{id}', 'TaskController@showOneTaskShared')->name('task-data-one-shared');
Route::get('/task/all/Shared{id}/update', 'TaskController@updateTaskShared')->name('task-update-shared');
Route::post('/task/all/Shared{id}/update', 'TaskController@updateTaskSubmitShared')->name('task-update-submit-shared');
Route::get('/task/all/Process{id}/delete', 'TaskController@deleteTaskShared')->name('task-delete-shared');

Route::get('/task/all/Process', 'TaskController@allDataProcess')->name('task-data-process');
Route::get('/task/all/Process{id}', 'TaskController@showOneTaskProcess')->name('task-data-one-process');
Route::get('/task/all/Process{id}/update', 'TaskController@updateTaskProcess')->name('task-update-process');
Route::post('/task/all/Process{id}/update', 'TaskController@updateTaskSubmitProcess')->name('task-update-submit-process');
Route::get('/task/all/Process{id}/delete', 'TaskController@deleteTaskProcess')->name('task-delete-process');

Route::get('/task/all/Done', 'TaskController@allDataDone')->name('task-data-done');
Route::get('/task/all/Done{id}', 'TaskController@showOneTaskDone')->name('task-data-one-done');
Route::get('/task/all/Done{id}/update', 'TaskController@updateTaskDone')->name('task-update-done');
Route::post('/task/all/Done{id}/update','TaskController@updateTaskSubmitDone')->name('task-update-submit-done');
Route::get('/task/all/Done{id}/delete', 'TaskController@deleteTaskDone')->name('task-delete-done');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

