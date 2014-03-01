<?php

class ListingController extends BaseController {
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
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return View::make('listings.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        /*
 $input = array('name' => 'r');
$rules = array('name' => 'min:5');
 dd($coreValidator->messages());
*/

        /* Validation */
        $input = Input::all();
        $rules = array(
            'title' => array('required', 'min:3', 'unique:listings'),
            'elevator_pitch' => array('required', 'min:3'),
            'extended_desc' => 'max:999999',
            'faqs' => array('required', 'min:3'),
            'address1' => array('required', 'min:4', 'max:255'),
            'city' => array('required', 'alpha_num', 'min:3', 'max:255'),
            'suburb' => array('required', 'min:3', 'max:255'),
            'state' => array('required', 'min:4', 'max:255'),
            'country' => array('required', 'min:4', 'max:255'),
            'postcode' => array('required', 'numeric', 'min:0000', 'max:9999'),
            'daily_rate' => array('required', 'numeric', 'min:0', 'max:9999'),
            'weekly_rate' => array('required', 'numeric', 'min:0', 'max:99999'),
            'monthly_rate' => array('required', 'numeric', 'min:0', 'max:99999'),
            'space_type' =>array('required', 'alpha', 'exists:spacetypes,type')
        );

        /* Check to see if data is valid */
        $coreValidator = Validator::make($input,$rules);

        if ($coreValidator->fails()) {

            return Redirect::back()->withErrors($coreValidator)->withInput();
        }  else {
            //Check if the images are legit
            if (!$this->didPassImageValidation()) {
                return Redirect::back()->with('flash_message_404', 'Sorry, the image(s) you uploaded is not a supported file type');
            }


            //Add new listing to DB.
             $listing = new Listing();
             $listing->owner_id = Auth::user()->id;


        //Key info
        $listing->title = $input['title'];
        $listing->elevator_pitch = $input['elevator_pitch'];
        $listing->extended_desc = $this->sanitizeStringAndParseMarkdown($input['extended_desc']);
        $listing->faqs = $this->sanitizeStringAndParseMarkdown($input['faqs']);
        $listing->space_type = $input['space_type'];
        //Location
        $listing->address1 = $input['address1'];
        $listing->city = $input['city'];
        $listing->suburb = $input['suburb'];
        $listing->state = $input['state'];
        $listing->country = $input['country'];
        $listing->postcode = $input['postcode'];

        //Rates
        $listing->daily_rate = $input['daily_rate'];
        $listing->weekly_rate = $input['weekly_rate'];
        $listing->monthly_rate = $input['monthly_rate'];
        $listing->currency = 'AUD';

        $listing->isPublic = 1;

        //Amenities
        if(isset($input['wifi'])){
            $listing->wifi = 1;
        }

        else {
            $listing->wifi = 0;
        }

        if(isset($input['coffee'])){
            $listing->coffee_machine= 1;
        }

        else {
            $listing->coffee_machine = 0;
        }

        if(isset($input['heating'])){
            $listing->heating = 1;
        }

        else {
            $listing->heating = 0;
        }

        if(isset($input['parking'])){
            $listing->parking = 1;
        }

        else {
            $listing->parking = 0;
        }

        if(isset($input['aircon'])){
            $listing->aircon = 1;
        }

        else {
            $listing->aircon = 0;
        }

        if(isset($input['couches'])){
            $listing->couches = 1;
        }

        else {
            $listing->couches = 0;
        }

        $listing->save();

        /* Image Business */


        //Handle thumbnail upload
        $unique = uniqid("aimg", true);
        $path = 'images/listing_thumbnails/' . $unique . '.jpg';
        $thumb = Input::file('thumbnail')->getRealPath();
        $thumb = Image::make($thumb)->resize(300, 200, true, true);
        $thumb->encode('jpg', 60);
        $thumb->save($path);

        if(isset($thumb)){
            unset($thumb);
        }

        $thumbnail = new Thumbnail();
        $thumbnail->listing_id = $listing->id;
        $thumbnail->url = $path;
        $thumbnail->alt_text =  'Thumbnail image for ' . $input['title'] . ' space listing';
        $thumbnail->save();

        $counter = 1;
        foreach(Input::file('photos') as $photo) {

            $unique = uniqid("gallery", true);
            $path = 'images/listing_images/' . $unique . '.jpg';
            $photo = $photo->getRealPath();
            $photo= Image::make($photo)->resize(800, 450, true, true);
            $photo->encode('jpg', 60);
            $photo->save($path);


            if(isset($photo)){
                unset($photo);
            }

            $photo = new Photo();

            $photo->listing_id = $listing->id;
            $photo->url = $path;
            $photo->alt_text =  'Gallery image ' . $counter . "for " . $input['title'] . ' space listing';
            $photo->size = "800x450";
            $photo->save();

            $counter = $counter + 1;
        }
            return Redirect::to('/')->with('flash_message_good', 'Successfully listed');


	}
    }

    /**
     * Preview and confirm the newly created resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function preview($id)
    {
        //
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($type, $id)
    {

        $listing = Listing::where('isPublic', '=', '1')->where('id', '=', $id)->where('space_type', '=', strtolower($type))->firstOrFail();

       $address = $listing->address1 . ", " . $listing->suburb . ", " . $listing->city . " " . $listing->country;

        $amenities = Listing::where('id', '=', $id)->first(array('coffee_machine', 'heating', 'parking', 'aircon', 'couches', 'wifi'))->toArray();

    $owner = User::where('id', '=', $listing->owner_id)->first();
        $ownername = $owner->name;
        if(isset($owner)){
            unset($owner);
        }
        $amenClass = array();
        foreach($amenities as $key => $value) {
            if ($value == 1) {
                $amenClass[$key] = "glyphicon glyphicon-ok text-success color-green";
            }
            else {
                $amenClass[$key] = "glyphicon glyphicon-remove color-grey";
            }
        }


        return View::make('listings.show')
            ->with('title', $listing->title)
            ->with('address', $address)
            ->with('postcode', $listing->postcode)
            ->with('photos', $listing->photos->toArray())
            ->with('elevator_pitch', $listing->elevator_pitch)
            ->with('extended_desc', $listing->extended_desc)
            ->with('faqs', $listing->faqs)
            ->with('daily_rate', $listing->daily_rate)
            ->with('weekly_rate', $listing->weekly_rate)
            ->with('monthly_rate', $listing->monthly_rate)
            ->with('currency', $listing->currency)
            ->with('amenity',$amenClass)
            ->with('bookURL', action('BookingController@create', $id))
            ->with('ownername', $ownername)
            ;

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Toggle the isPublic visibility in storage for a specified ID;
     *
     * @param  int  $id
     * @return Response
     */
    public function visibility($id)
    {

        $listing = Listing::where('id', '=', $id)->first();
        /* Check if the user "owns" the space in DB */
        if ($listing->owner_id != Auth::user()->id){
            return Redirect::back()->with('flash_message_404', 'You do not have permission to change that listing');
        }
        $status = $listing->isPublic;
        $message  = "Visibility for listing: " . $listing->title . " updated!";


        if ($status == 1) {
            $listing->isPublic = 0;
            $listing->save();
            return Redirect::back()->with('flash_message_good', $message);
        }

        else {
            $listing->isPublic = 1;
            $listing->save();
            return Redirect::back()->with('flash_message_good', $message);
        }
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

    }

    public function didPassImageValidation() {
        $valid_mime_types = array(
            "image/gif",
            "image/png",
            "image/jpeg",
            "image/pjpeg",
            "image/x-png",
        );

        // Check that the uploaded file is actually an image (by MIME)
            $counter = 0;
            foreach ($_FILES['photos']['type'] as $file) {
                if (!in_array($file, $valid_mime_types)) {
                    $counter = $counter+1;
                }
            }

             if (!in_array(Input::file('thumbnail')->getMimeType(), $valid_mime_types)){
                $counter = $counter + 1;
                }

            if ($counter > 0){
                return false;
            } else{
                return true;
            }
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