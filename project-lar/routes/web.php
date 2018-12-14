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

Route::get('/', 'FrontendController@getHome')->name('frontend');

Route::get('detail/{id}/{slug}.html','FrontendController@getDetail');
Route::post('detail/{id}/{slug}.html','FrontendController@postComment');


Route::get('category/{id}/{slug}.html','FrontendController@getCategory');

Route::post('search','FrontendController@getSearch')->name('searchprod');
Route::post('/tim-kiem', 'FrontendController@timkiem')->name('timkiem.fetch');
Route::get('/tim-kiem/{tukhoa}', [
	'as'=>'timkiem',
	'uses' => 'FrontendController@trangtimkiem']);

//Cart

Route::group(['prefix'=>'cart'],function(){
	Route::get('add/{id}','CartController@getAddCart')->name('addcart');
	Route::get('show','CartController@getShowCart')->name('showcart');
	Route::get('delete/{id}','CartController@getDeleteCart')->name('deletecart');
	Route::get('update','CartController@getUpdateCart')->name('updatecart');
	Route::post('show','CartController@postComplete')->name('submcart');
	Route::post('update/{id}','CartController@updateSoLuong')->name('updateSL');
		});



Route::get('complete','CartController@getComplete')->name('complete');


Route::group(['namespace'=>'Admin'],function(){
	Route::group(['prefix'=>'login','middleware'=>'CheckLogedIn'],function(){
		Route::get('/','LoginController@getLogin');
		Route::post('/','LoginController@postLogin');
	});
	Route::get('logout','LoginController@getLogout');

	Route::group(['prefix'=>'admin','middleware'=>'CheckLogedOut'],function(){
		Route::get('home','LoginController@getHome');

	//Category
	
	Route::group(['prefix'=>'category'],function(){
	Route::get('/cate','CategoryController@getCate')->name('categoryadmin');
	Route::post('/cateabc','CategoryController@postCate')->name('categoryadmincreate');

	Route::get('edit/{id}','CategoryController@getEditCate')->name('editadmin');
	Route::post('edit/{id}','CategoryController@postEditCate')->name('editabc');


	Route::get('delete/{id}','CategoryController@getDeleteCate')->name('deleteadmin');
		});

	//Product
	Route::group(['prefix'=>'product'],function(){
	Route::get('/pro','ProductController@getProduct')->name('product');
	Route::get('/add','ProductController@getAddProduct')->name('productadmin');
	Route::post('/addproduct','ProductController@postAddProduct')->name('productadmincreate');

	Route::get('edit/{id}','ProductController@getEditProduct')->name('editpro');
	Route::post('edit/{id}','ProductController@postEditProduct')->name('editproabc');


	Route::get('delete/{id}','ProductController@getDeleteProduct')->name('deletepro');
		});
		
	});
});

Route::post('/loginabc','Admin\LoginController@postLogin')->name('login');

Route::get('/home','Admin\LoginController@getHome')->name('index');

Route::get('home/category','Admin\CategoryController@getCate')->name('category');
