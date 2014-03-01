<?php

class DashboardController extends BaseController {

    /*
 *
 * Nathan Feiglin for the Open Source Collaborative Consumption Marketplace Platform Project. 2014.
 */

	public function view()
	{
        /*
        $user = Auth::user();
        $personal_bookings = Booking::where('user_id', '=', $user->id);
        $bookings_of_my_spaces = Booking::where('space_owner_id', '=', $user->id);
        $my_spaces = Listing::where('owner_id', '=', $user->id)->get(array('title', 'id'));
*/
        $userid = Auth::user()->id;
        $user = User::findOrFail($userid);
        $personal_bookings = $user->booking;
        $bookings_of_my_spaces = Booking::where('space_owner_id', '=', $userid)->get();
       // $bookings_of_my_spaces = $user->bookings_by_others;
        $my_spaces = $user->listing;
        return View::make('dashboard.DashboardView')
        	->with('name',  $user->name)
        	->with('email', $user->email)
            ->with('personal_bookings', $personal_bookings)
            ->with('bookings_of_my_spaces', $bookings_of_my_spaces)
            ->with('my_spaces', $my_spaces)
        ;

	}

public function signup()
	{
        // return View::make('sessions.signup');
        return "Signup route in controller";
	}


}
