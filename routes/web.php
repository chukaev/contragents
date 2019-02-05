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

Route::redirect('/', '/admin/representatives');

Route::get('/admin/representatives', 'Admin\RepresentativesController@index')->name('admin_representatives_all');
Route::post('/admin/representatives', 'Admin\RepresentativesController@index')->name('admin_representatives_all_post');
Route::get('/admin/representatives/create', 'Admin\RepresentativesController@create')->name('admin_representative_create');
Route::get('/admin/representative/create', 'Admin\RepresentativesController@create')->name('admin_representative_create');
Route::get('/admin/representative/edit/{id}', 'Admin\RepresentativesController@edit')->name('admin_representative_edit');
Route::post('/admin/representative/store', 'Admin\RepresentativesController@store')->name('admin_representative_store');
Route::post('/admin/representative/update', 'Admin\RepresentativesController@update')->name('admin_representative_update');
Route::get('/admin/representative/delete/{id}', 'Admin\RepresentativesController@delete')->name('admin_representative_delete');
//Route::post('/admin/logout', 'Auth\LoginController@logout')->name('admin_logout');