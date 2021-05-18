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

Route::get('/', 'app_ctrl@index');

Route::get('/login', 'myApp\auth_ctrl@index');

//login
Route::Post('login','myApp\auth_ctrl@dologin');

//sign in
Route::Post('sign','myApp\auth_ctrl@doSignin');

//logout
Route::get('logout','myApp\auth_ctrl@logout');

//admin
Route::get('/dash','dash\dash_ctrl@index');


Route::get('/dash/addUser','dash\dash_ctrl@addUser');
Route::post('/dash/doAddUser','dash\dash_ctrl@doAddUser');

Route::get('/dash/editUser/{id}','dash\dash_ctrl@editUser');
Route::post('/dash/doEditUser/{id}','dash\dash_ctrl@doEditUser');

Route::post('/dash/delUser/{id}','dash\dash_ctrl@delUser');



