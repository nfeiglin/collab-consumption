<?php
//Password Reset Controller

class PasswordController extends BaseController {
    /*
     *
     * Nathan Feiglin for the Open Source Collaborative Consumption Marketplace Platform Project. 2014.
     */
	public function view()
	{
	return View::make('password.reset');
	}

	public function send()
	{
		//Manage sending of the email and validate input.
		$credentials = array('email' => Input::get('email'));
		return Password::remind($credentials, function($message, $user)
		{
			$message->subject('Your Open Source Collaborative Consumption Marketplace Password Reset');

		});
		
	}

	public function viewReset($token)
	{
				Session::forget('email');
                 //This causes an offset exception if the token doesn't exist.
				$email = DB::table('password_reminders')->where('token', $token)->first();
				$email = $email->email;
				Session::push('email', '$email');
				return View::make('password.viewReset')->with('token', $token)->with('email', $email);
			 	
			 
		
	}

	public function handleReset()
	{


    $credentials = array(
        'email' => Input::get('email'),
        'password' => Input::get('password'),
        'password_confirmation' => Input::get('password_confirmation')
    );

    return Password::reset($credentials, function($user, $password)
    {
        $user->password = Hash::make($password);

        $user->save();
        
        Session::forget('email');
        return Redirect::to('login')->with("flash_message_good", "Your password has been successfully changed, login here.");
    });
	}

}
