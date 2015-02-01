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

Route::get('/', function()
{
    return View::make('hello');
});

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
Route::get('auth/unlock', 'SessionsController@unlock');
//Route::get('auth/check', 'SessionsController@check');

/*
 * Resource Data
 */
Route::resource('/areas', 'AreasController');
Route::resource('/infras', 'InfrastructuresController');
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

