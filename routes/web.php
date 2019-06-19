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



Route::resource('ajaxproducts','ProductAjaxController');

Route::get('my-datatables', 'MyDatatablesController@index');

Route::get('get-data-my-datatables', ['as'=>'get.data','uses'=>'MyDatatablesController@getData']);

Route::get('orders','OrderController@index')->name('orders.index');
/*something goes here*/
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

/*eloquent section*/
Route::get('eloquent', 'EloquentController@index');

Route::get('get-order-my-datatables', ['as'=>'get.order','uses'=>'EloquentController@getData']);
/*end eloquent  */
















