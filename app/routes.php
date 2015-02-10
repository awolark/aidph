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



Event::listen('Aidph.Registration.Events.UserHasCreated', function($event)
{
    dd('send a notification email');
});

Route::get('/', function(){
    $area = Area::find(18);
    $areas = Area::getAreaAndChildren($area);
    foreach($areas as $a){
        echo $a->name.'<br/>';
    }
});


Route::get('/expiry', function(){
   Response::json(array('flash' => 'Expired!'), 401);
});





Route::group(['after' => 'access-control'], function(){
    /*
     * Register User
     */
//    Route::post('/register', 'RegistrationController@register');
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
    /*
     * Resource Data
     */

    /* Users */
    Route::resource('/users', 'UsersController',
        array('only' => array('index', 'show', 'store', 'destroy')));

//    Route::post('/users/{id}', 'UsersController@postUpdate');
    Route::get('/users/{id}/areas', 'UsersController@getLoggedUserAreas');
    /* */

    /* Infras */
    Route::resource('/infras', 'InfrastructuresController',
        array('only' => array('index', 'show', 'store', 'destroy')));

    Route::post('/infras/{id}', 'InfrastructuresController@postUpdate');
    /**/

    /* Areas */
    Route::resource('/areas', 'AreasController',
        array('only' => array('index', 'show', 'store', 'destroy', 'update')));

    Route::get('/areas/barangays', 'AreasController@getBrgys');
//    Route::post('/areas/{id}', 'AreasController@postUpdate');
    /**/

    /* Persons */
    Route::resource('/persons', 'PersonsController',
        array('only' => array('index', 'show', 'store', 'destroy')));
    /**/

    /* Households */
    Route::resource('/households', 'HouseholdsController');
    /**/

    Route::get('/areas/{id}/infras', 'InfrastructuresController@infras');




});








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

