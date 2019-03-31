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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::get('/groups', 'GroupsController@index')->name('groups.index');

Route::get('/groups/create', 'GroupsController@create')->name('groups.create');

Route::post('/groups', 'GroupsController@store')->name('groups.store');

Route::get('/groups/{groupid}/adduser', 'GroupsController@adduser')->name('groups.adduser');

Route::get('/groups/{groupid}/deleteuser/{userid}', 'GroupsController@deleteuser')->name('groups.deleteuser');

Route::get('/groups/{groupid}/deletegroup', 'GroupsController@deletegroup')->name('groups.deletegroup');

Route::get('/users', 'UsersController@index')->name('users.index');

Route::get('/users/create', 'UsersController@add')->name('users.create');

Route::post('/users', 'UsersController@store')->name('users.store');

Route::post('/groups/{group_id}/mapuser', 'GroupsController@mapuser')->name('groups.mapuser');

Route::get('/users/{id}/delete', 'UsersController@delete')->name('users.delete');

Route::get('/users/{id}/delete-confirmation', 'UsersController@deleteConfirmation')->name('users.deleteConfirm');


