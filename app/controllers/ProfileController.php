 <?php

class ProfileController extends BaseController {

    /*
 *
 * Nathan Feiglin for the Open Source Collaborative Consumption Marketplace Platform Project. 2014.
 */

	public function view($id)
	{


        $user = User::where('id', '=', $id)->first();
      

        if ($user) {
             

                if ($user->bio->bio) {

                        $bio = $user->bio->bio;
                } else {
                        $bio = "This user doesn't have a bio/.";
                }

                        // If the user has no avatar make it this one!
                         // $url = "/images/generic-avatar.jpg";

                    try {
                        $url = $user->profileimage->url;
                    } catch (Exception $e){
                        $url = "/images/generic-avatar.jpg";
                    }


                return View::make('profile.view')
        	       ->with('bio', $bio)
        	       ->with('contactDetails', "contact goes here!")
        	       ->with('name',  $user->name)
                   ->with('profile_image_url', $url);
}
else {

        return Redirect::to('/')->with('flash_message_404', "Sorry, the profile you requested doesn't exist so we brought you back home!");
}

        //Here we'll get the users data from db and display it.
       
	}

public function signup()
	{
        // return View::make('sessions.signup');
        // return "Signup route in Profile Controller";
        return View::make('profile.signup');
	}

public function store()
{
    $rules =  array(
                'name' => 'required|max:200',
                'email' => 'required|email|unique:users|max:200|',
                'password' => 'required|min:8|max:200');


    $messages = array('email.unique' => "You have already registered with this email address. Sign in <a href=\"/login\">here</a>");

    $input = Input::all();

    $validator = Validator::make($input, $rules, $messages);

     if ($validator->fails())
    {
        return Redirect::to('signup')->withInput()->withErrors($validator);
    } 

    else
    {
        $password = Hash::make($input['password']);

        //Validation passed -- Make a new user in the DB
        $user = new User;
        $user->name = $input['name'];
        $user->password = $password;
        $user->email = $input['email'];
        $user->isActive = 1;
        

        $user->save();

        //Here we will send an email with the link to confirm .... https://github.com/Zizaco/confide
        //We'll send the user an email thanking them for registering


       $attempt = Auth::attempt(array(
            'email' => $input['email'],
            'password' => $input['password']
       ));


       if ($attempt)
        {
           return Redirect::to('dashboard')->with('flash_message_good', 'Welcome to Open Source Collaborative Consumption Marketplace. You have been successfully signed up and logged in!');
        }

        else
        {
            Log::error('Trying to log user in straight after register failed. User redirected to login page');
            return Redirect::to('login')->with('flash_message_good', "Your signup has been successfull, go ahead and log in here!");
        }
    }
}

}
