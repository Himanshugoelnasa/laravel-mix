<?php


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



// open api route for login
Route::post('/login', 'LoginController@login');

//get categories list
Route::get('/getCategories', 'LoginController@getCategories');

// get all products list
Route::get('/getProducts', 'LoginController@getProducts');

// get prouct by category
Route::get('/getProductByCategory', 'LoginController@getProductByCategory');



//middleware to check if route is authenticated with  access token or not
Route::group(['middleware' => 'auth:api'], function() {


	//api to add product to cart
	Route::post('/addProductToCart', 'LoginController@addProductToCart');

	//api to aget cart for a logged in user
	Route::get('/userCart', 'LoginController@userCart');


});
