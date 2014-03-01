<?php

/*
|--------------------------------------------------------------------------
| Application & Route Filters
|--------------------------------------------------------------------------
|
| Below you will find the "before" and "after" events for the application
| which may be used to do any work before or after a request into your
| application. Here you may also register your custom route filters.
|
*/

App::before(function($request)
{
	//
});


App::after(function($request, $response)
{
	//
});

/*
|--------------------------------------------------------------------------
| Authentication Filters
|--------------------------------------------------------------------------
|
| The following filters are used to verify that the user of the current
| session is logged into this application. The "basic" filter easily
| integrates HTTP Basic authentication for quick, simple checking.
|
*/
/*
 *
 * Nathan Feiglin for the Open Source Collaborative Consumption Marketplace Platform Project. 2014.
 */
Route::filter('auth', function()
{
	if (Auth::guest()) return Redirect::guest('login')->with('flash_message_good', 'Please log in to continue.');
});


Route::filter('auth.basic', function()
{
	return Auth::basic();
});

/*
|--------------------------------------------------------------------------
| Guest Filter
|--------------------------------------------------------------------------
|
| The "guest" filter is the counterpart of the authentication filters as
| it simply checks that the current user is not logged in. A redirect
| response will be issued if they are, which you may freely change.
|
*/

Route::filter('guest', function()
{
	if (Auth::check()) return Redirect::to('/');
});

/*
|--------------------------------------------------------------------------
| CSRF Protection Filter
|--------------------------------------------------------------------------
|
| The CSRF filter is responsible for protecting your application against
| cross-site request forgery attacks. If this special token in a user
| session does not match the one given in this request, we'll bail.
|
*/

Route::filter('csrf', function()
{
	if (Session::token() != Input::get('_token'))
	{
		throw new Illuminate\Session\TokenMismatchException;
	}
});

/*
|--------------------------------------------------------------------------
| Listing ownership / belonging filter
|--------------------------------------------------------------------------
|
| This filter checks to see if the currently authenticated owns the listing.
| For example, this should be used before allowing editing or deletion of listing. If he doesn't, we abort!
|
*/

Route::filter('ownership', function($id)
{

    if (Listing::findOrFail($id)->id != Auth::user()->id){
        return Redirect::back()->with('flash_message_bad', 'You do not have permission to change that listing');
    }
});