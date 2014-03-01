<?php

class BookingController extends BaseController {
    /*
     *
     * Nathan Feiglin for the Open Source Collaborative Consumption Marketplace Platform Project. 2014.
     */

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        return View::make('bookings.index');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create($id)
	{

        $listing = Listing::where('isPublic', '=', 1)->where('id', '=', $id)->first();
        $address = $listing->address1 . ", " . $listing->suburb . ", " . $listing->city . " " . $listing->country;
        return View::make('booking.create')
            ->with('listing', $listing)
            ->with('address', $address)
            ->with('title', $listing->title)
            ->with('id', $id)
        ;

	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store($id)
	{
        $listing = Listing::where('isPublic', '=', 1)->where('id', '=', $id)->first();
        if (!$listing) {
            throw new \Symfony\Component\Routing\Exception\ResourceNotFoundException;
        }
        $input = Input::all();

        //return print_r($input,true);
       $yesterday = \Carbon\Carbon::now('Australia/Sydney');
        $yesterday = $yesterday->format('Y-m-d H:i:s');

        // return $yesterday;
        $rules = array(
            'comments' => array('required', 'min:3'),
            'user_phone' => array('required', 'min:9', 'max:30'),
            'request_start_datetime' =>array('required', 'date', 'dateformat: Y-m-d H:i:s', 'before: ' . $input['request_end_datetime']),
            'request_end_datetime' => array('required', 'date', 'dateformat: Y-m-d H:i:s', 'after: ' . $yesterday)

        );


		$validator = Validator::make($input, $rules);

        if ($validator->fails()) {
            return Redirect::back()->withInput($input)->withErrors($validator);
        }

        $comments = $this->sanitizeStringAndParseMarkdown($input['comments']);


        $authuser = Auth::user();
        $name = $authuser->name;
        $bookings = new Booking();
        $bookings->user_id = $authuser->id;
        $bookings->user_name = $name;
        $bookings->listing_id = $id;
        $bookings->user_phone = $input['user_phone'];
        $bookings->request_start_datetime = $input['request_start_datetime'];
        $bookings->request_end_datetime = $input['request_end_datetime'];
        $bookings->status = "Booking request submitted. Awaiting Open Source Collaborative Consumption Marketplace review.";
        $bookings->user_comments = $comments;
        $bookings->space_owner_id = $listing->owner_id;



        $address = $listing->address1 . ", " . $listing->suburb . ", " . $listing->city . " " . $listing->country;
        $data = $input;
        $data['address'] = $address;
        $data['title'] = $listing->title;
        $data['id'] = $id;
        $data['type'] = $listing->space_type;
        $data['user_name'] = $name;
        $data['status'] = $bookings->status;

        /* TODO: Make it email the user and space owner */

        Mail::send("booking.mail.newbookingfounders",$data, function($message) {
            $message->to('founders@worldburrow.com')->subject('New booking on Open Source Collaborative Consumption Marketplace');
        });

        $email = Auth::user()->email;
        Mail::send("booking.mail.newbookinguser",$data, function($message) use ($email) {
            $message->to($email)->subject('Your new booking on Open Source Collaborative Consumption Marketplace!');
        });

        $bookings->save();
        return Redirect::to('dashboard')->with('flash_message_good', "Your booking has been sent. We'll be in touch soon with confirmation or questions!");

    }

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{

	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
        return View::make('bookings.edit');
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

    public function sanitizeStringAndParseMarkdown ($input) {
        $foo = Parsedown::instance()->parse($input);

        $config = HTMLPurifier_Config::createDefault();
        $config->set('AutoFormat.AutoParagraph', 'false');
        $config->set('HTML.Allowed', 'p, h3, h4, h5, b, i, em, strong, blockquote');

        $purifier = new HTMLPurifier($config);
        $foo = $purifier->purify($foo);


        return $foo;
    }

}
