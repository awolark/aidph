<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
 */

// header('Access-Control-Allow-Origin: *');

Route::get('/', 'HomeController@showWelcome');

Route::get('/expiry', function(){
   Response::json(array('flash' => 'Expired!'), 401);
});

/*
 * Register User
 */
Route::post('/register', 'RegistrationController@register');
/*
 * Verify a User thru email
 */
Route::get('/register/verify/{confirmation_code}', 'RegistrationController@verify');

/*
 * Sessions
 */
Route::post('auth/login', 'SessionsController@store');
Route::delete('auth/logout', 'SessionsController@destroy');
Route::post('auth/unlock', 'SessionsController@unlock');
//Route::get('auth/check', 'SessionsController@check');

/*
 * Resource Data
 */

/* Infras */
Route::get('/areas/barangays', 'AreasController@getBrgys');
Route::resource('/infras', 'InfrastructuresController');
Route::post('/infras/{id}', 'InfrastructuresController@postUpdate');
/**/

/* Areas */
Route::resource('/areas', 'AreasController');
// Route::post('/areas/{id}', 'AreasController@postUpdate');
/**/

/* Persons */
Route::resource('/persons', 'PersonsController');
/**/

/* Households */
Route::resource('/households', 'HouseholdsController');
/**/

Route::get('/areas/{id}/infras', 'InfrastructuresController@infras');






//Route::get('login', function(){
//        echo (Auth::attempt(array('username' => 'admin', 'password' => '1234'))
//            ) ? 'success login' : 'failed login' ;
//});
//
//Route::get('logout', function(){
//    Auth::logout();
//});
////
//Route::get('/getuser', function(){
//   dd(Auth::user());
//});

