<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

/*Route::get('/', function () {
    return view('welcome');
});
*/
Route::get('/', 'HomeController@index');
Auth::routes();

Route::get('/home', 'HomeController@index');


/*
 * Articles routes
 */
//Route::get('articles',array('as'=>'articles','uses'=>'ArticlesController@index'));
Route::get('articles', 'ArticlesController@index');
Route::get('articles/ajax/{id}',array('as'=>'articles.ajax','uses'=>'ArticlesController@myformAjax'));
Route::get('articles/ajaxdistrict/{id}',array('as'=>'articles.ajaxdistrict','uses'=>'ArticlesController@myformAjaxKecamatan'));

Route::get('articles/create', 'ArticlesController@create');
Route::get('articles/{id}', 'ArticlesController@show');
Route::post('articles', 'ArticlesController@store');         
Route::get('articles/{id}/edit', 'ArticlesController@edit');
Route::patch('articles/{id}', 'ArticlesController@update');
Route::delete('articles/{id}', 'ArticlesController@destroy');


/*
 * Users routes
 */
 Route::group(['prefix' => 'users'], function () {
            Route::get('/', 'UsersController@index');
            Route::match(['get'],'{id}', 'UsersController@show');
            Route::match(['get'], 'create', 'UsersController@create');
            Route::match(['post'], '/', 'UsersController@store');
            Route::match(['get'],'{id}/edit' ,'UsersController@edit');
            Route::match(['patch'], '{id}', 'UsersController@update');
            Route::delete('{id}', 'UsersController@destroy');
            Route::match(['get'],'{id}/detail', 'UsersController@users_article'); // 1 To M
            Route::match(['get'],'{id}/reset_password', 'UsersController@reset_password');
            Route::match(['patch'],'{id}/reset_password', 'UsersController@update_password');
            Route::match(['get'],'downloadExcel/{type}', 'UsersController@downloadExcel');
            Route::match(['post'],'importExcel', 'UsersController@importExcel');
        });

/*
 * Roles routes
 */
Route::get('roles', 'RolesController@index');
Route::get('roles/create', 'RolesController@create');
Route::post('roles', 'RolesController@store');              //save
Route::get('roles/{id}/edit', 'RolesController@edit');
Route::patch('roles/{id}', 'RolesController@update');
Route::delete('roles/{id}', 'RolesController@destroy');


/*
 * Profile routes
 */
Route::get('profile', 'ProfileController@profile');
Route::get('password', 'ProfileController@password');
Route::patch('profile', 'ProfileController@update');
Route::patch('profile/change_password', 'ProfileController@change_password');


/*
 * Settings routes
 */
Route::get('settings', 'SettingsController@index');
