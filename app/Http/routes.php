<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('adminpanel.dashboard');  
}); 


	// jquery testing

	Route::get('index','JqueryController@index');
	Route::post('save','JqueryController@save');
	Route::get("take","JqueryController@take");



Route::group(['middleware' => ['web']], function () {   

	// category route
	Route::get('category_view', ['middleware' =>'auth','uses'=>'CategoryController@index']);
	Route::get("category_form",['middleware' =>'auth','uses'=>'CategoryController@create']);
	Route::post("insert_category","CategoryController@store");
	Route::get("delete/{id}","CategoryController@delete"); 
	Route::get("edit/{id}","CategoryController@edit");
	Route::post("update_category","CategoryController@update");
	//Route::post("category_form","CategoryController@create");

	// Book route
	Route::get("book_view","BookController@index"); 
	Route::get("book_form","BookController@create");
	Route::post("insert_book","BookController@store");
	Route::get("edit_book/{id}","BookController@edit");
	Route::get("delete_book/{id}","BookController@delete");
	Route::post("update_book","BookController@update");

	// image
	Route::get("image_form","ImageController@index");
	Route::post("insert_image","ImageController@Create");
	Route::get('edit_image/{id}',"ImageController@Edit");
	Route::post('update_image','ImageController@Update');
	Route::get('delete_image/{id}','ImageController@Delete');

	// login 
	Route::get('login','AuthController@login');
	Route::post('checklogin','AuthController@check_login');
	Route::get('logout','AuthController@logout');
	Route::get('create_user','AuthController@demo_user');

	//Registration


	//user Panel
	Route::get("main_content","Userpanel\MainContentController@index"); 
	Route::get('book_details/{id}',"Userpanel\MainContentController@book_details");
	Route::get('read_book/{id}',"Userpanel\MainContentController@read_book");
	Route::get('download_book/{id}',"Userpanel\MainContentController@download_book");



	
});

