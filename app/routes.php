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


//Event::listen('Aidph.Registration.Events.UserHasCreated', function ($event) {
////    dd('send a notification email');
//});


use Aidph\Helpers\UserQueryHelperTrait;

Route::group(['after' => 'access-control'], function () {

   /*
    * Register User
    */
    Route::post('/register', 'RegistrationController@register');

    // Verify a User thru email
    Route::get('/register/verify/{confirmation_code}', 'RegistrationController@verify');

    /*
     * Sessions
     */
    Route::post('auth/login', 'SessionsController@store');

    Route::delete('auth/logout', 'SessionsController@destroy');


    /*
     * Resource Data
     */

    /* Users Registration */
    Route::post('/users', 'RegistrationController@register');


    /* Users */
    Route::resource('/users', 'UsersController',
        array('only' => array('index', 'show', 'destroy')));

    Route::get('/users/{id}/areas', 'UsersController@getLoggedUserAreas');

    Route::get('/users/generate_username', 'UsersController@generateUsername');
    /* */

    /* Areas */
    Route::resource('/areas', 'AreasController',
        array('only' => array('index', 'show', 'store', 'destroy', 'update')));

    Route::get('/areas/barangays', 'AreasController@getBrgys');

    Route::get('/areas/{id}/infras', 'InfrastructuresController@infras');
    // Route::post('/areas/{id}', 'AreasController@postUpdate');
    /**/

    /* Infras */
    Route::resource('/infras', 'InfrastructuresController',
        array('only' => array('index', 'show', 'store', 'destroy')));

    Route::post('/infras/{id}', 'InfrastructuresController@postUpdate');
    /**/


    /* Persons */
    Route::resource('/persons', 'PersonsController',
        array('only' => array('index', 'show', 'store', 'destroy')));
    /**/

    /* Households */
    Route::resource('/households', 'HouseholdsController',
        array('only' => array('index', 'show', 'store', 'destroy')));
    /**/



    Route::get('/', function () {
//        $area = Area::find(1);
//        $firstLevelAreaOnly = true;
//        $areas = Area::getAreaAndChildren($area, $firstLevelAreaOnly);
//        foreach ( $areas as $a ) {
//            echo $a->name . '<br/>';
//        }
//        $data = [
//            'confirmation_code' => str_random(30)
//        ];
//
//        Mail::send('emails.registration.confirm', $data, function($message)
//        {
//           $message->to('waynearila@gmail.com')
//                   ->subject('Test');
//        });

//        $areaIds = [];
//        $users = [];
//
//        $loggedUsersArea = UserQueryHelperTrait::getUsersArea(18);
//        $areaIds = Area::getAreaIdsForUser(18);
//        $areas = Area::where('id', '!=', $loggedUsersArea->id)
//            ->whereIn('area_id', $areaIds)
//            ->orderBy('id', 'asc')
//            ->paginate(25);
//
//        dd($areas);


    });


});
// for testing only
//Route::get('/expiry', function () {
//    Response::json(array('flash' => 'Expired!'), 401);
//});
//



