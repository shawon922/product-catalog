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


//Route::group(['prefix' => 'admin'], function() {
	Auth::routes();
//});

//Route::get('/', 'HomeController@index');

Route::get('/', 'ProductsController@index');

/*User Management Starts*/
    Route::get('/UsersList', ['middleware' => ['auth', 'admin'], 'uses' => 'UsersController@index']);

    Route::get('/addUser', ['middleware' => ['auth', 'admin'], 'uses' => 'UsersController@add']);
    Route::post('/addUser', ['middleware' => ['auth', 'admin'], 'uses' => 'UsersController@storeUser']);

    Route::get('/editUser/{id}', ['middleware' => ['auth', 'admin'], 'uses' => 'UsersController@edit']);
    Route::post('/editUser/{id}', ['middleware' => ['auth', 'admin'], 'uses' => 'UsersController@updateUser', 'as' => 'MyRoute.editUser']);

    Route::delete('/deleteUser/{id}', ['middleware' => ['auth', 'admin'], 'uses' => 'UsersController@destroy', 'as' => 'User.remove']);

    Route::get('/changePassword', ['middleware' => ['auth'], 'uses' => 'UsersController@changePassword']);
    Route::post('/changePassword', ['middleware' => ['auth'], 'uses' => 'UsersController@updatePassword']);

/*User Management Ends*/


Route::get('/add-product', ['middleware' => ['auth', 'admin'], 'uses' => 'ProductsController@add']);
Route::post('/add-product', ['middleware' => ['auth', 'admin'], 'uses' => 'ProductsController@store', 'as' => 'MyRoute.addProduct']);

Route::get('/edit-product/{id}', ['middleware' => ['auth', 'admin'], 'uses' => 'ProductsController@edit']);
Route::patch('/edit-product/{id}', ['middleware' => ['auth', 'admin'], 'uses' => 'ProductsController@update', 'as' => 'MyRoute.editProduct']);

Route::delete('/delete-product/{id}', ['middleware' => ['auth', 'admin'], 'uses' => 'ProductsController@destroy', 'as' => 'MyRoute.deleteProduct']);

Route::get('/product-details/{id}', ['uses' => 'ProductsController@show']);
