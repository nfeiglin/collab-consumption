<?php

class SessionsController extends BaseController {
    /*
     *
     * Nathan Feiglin for the Open Source Collaborative Consumption Marketplace Platform Project. 2014.
     */
	
	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		if (Auth::check()) {
			return Redirect::to('dashboard');
		}

        return View::make('sessions.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//

		$input = Input::all();
		$attempt = Auth::attempt(array(
			'email' => $input['email'],
			'password' => $input['password']
        ), true);

		if ($attempt)
		 {

			return Redirect::intended('dashboard')->with('flash_message_good', 'You have been successfully logged in!');
		}
			
		else
		 {
			return Redirect::back()->with('flash_message', 'Your email address or password is incorrect')->withInput();
		 }
	}

	
	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy()
	{
		Auth::logout();

		return Redirect::to('/');


	}

}
