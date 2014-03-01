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


/*
 *
 * Nathan Feiglin for the Open Source Collaborative Consumption Marketplace Platform Project. 2014.
 */

//Home page route
Route::get('/',
    function()
{
	return View::make('home');
});





/*
|--------------------------------------------------------------------------
| Profile and user account creation routes                                
|--------------------------------------------------------------------------
*/
Route::get('/profile/{id}', 'ProfileController@view');
Route::post('signup','ProfileController@store')->before('csrf');
Route::get('signup', 'ProfileController@signup');

/*
|--------------------------------------------------------------------------
| Password reset routes                                
|--------------------------------------------------------------------------
*/
Route::get('password/reset', 'PasswordController@view');
Route::post('password/reset', 'PasswordController@send')->before('csrf');
Route::get('password/reset/{token}', 'PasswordController@viewReset');
Route::post('password/reset/{token}', 'PasswordController@handleReset')->before('csrf');

/*
|--------------------------------------------------------------------------
| User session management routes                                
|--------------------------------------------------------------------------
*/
Route::get('login', 'SessionsController@create');
Route::get('logout', 'SessionsController@destroy');
Route::resource('sessions', 'SessionsController', array("only" => array('index', 'create', 'destroy', 'store')));



/*
|--------------------------------------------------------------------------
| Backend User-admin console routes                              
|--------------------------------------------------------------------------
*/
Route::get('dashboard', 'DashboardController@view')->before('auth');


/*
|--------------------------------------------------------------------------
| Listing routes
|--------------------------------------------------------------------------
*/
//Route for viewing listing
Route::get('spaces/{type}/{id}', 'ListingController@show');

//Routes for creating a new listing
Route::get('list', 'ListingController@create')->before('auth');
Route::post('space/new', 'ListingController@store')->before('auth')->before('csrf');

//Route for modifying listing.
Route::put('visibility/{id}', 'ListingController@visibility')->before('auth')->before('csrf');
// Route::delete('listing/{id}/{token}', 'ListingController@destroy')->before('auth')->before('csrf');

/*
|--------------------------------------------------------------------------
| Search Route
|--------------------------------------------------------------------------
*/

Route::get('/search', 'SearchController@show');

/*
|--------------------------------------------------------------------------
| Booking Routes
|--------------------------------------------------------------------------
*/
Route::get('/book/{id}', 'BookingController@create')->before('auth');
Route::post('/book/{id}', 'BookingController@store')->before('auth')->before('csrf');

Route::delete('/booking/cancel/{id}', 'BookingController@destroy')->before('auth');
Route::get('/my-bookings', 'BookingController@index')->before('auth');

/*
|--------------------------------------------------------------------------
| Payment Routes
|--------------------------------------------------------------------------
*/
/*
Route::get('/pay/{id}', 'PaymentController@create')->before('auth');
Route::post('/pay/{id}', 'PaymentController@store')->before('auth')->before('csrf');

*/