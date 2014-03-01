<?php

class SearchController extends BaseController {
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
        return View::make('searches.all');
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  string $location
	 * @return Response
	 */
	public function show() {
        $location = Input::get('location');
        $type = strtolower(Input::get('type'));
        $wildcardLocation = "%" . $location . "%";
        if (Input::has('type')) {

            $types = array('meeting-room', 'coworking', 'desk');

            if(!in_array($type, $types, true)){

                return Redirect::to('/')->with('flash_message_404', "Sorry, we don't have that type of space so we brought you back home!");
            }


            $listings = Listing::with('thumbnail')
                ->where('isPublic', '=', 1, "and")
                ->where('space_type', '=', $type)
                ->where('city', 'LIKE', $wildcardLocation)
                ->orWhere('state', 'LIKE', $wildcardLocation)
                ->orWhere('suburb', 'LIKE', $wildcardLocation)
                ->orWhere('country', 'LIKE', $wildcardLocation)
                ->orWhere('postcode', 'LIKE', $wildcardLocation)->get();
        }

        else {

      $listings = Listing::with('thumbnail')
         ->where('isPublic', '=', 1, "and")
         ->where('space_type', '=', $type)
          ->where('city', 'LIKE', $wildcardLocation)
          ->orWhere('state', 'LIKE', $wildcardLocation)
          ->orWhere('suburb', 'LIKE', $wildcardLocation)
          ->orWhere('country', 'LIKE', $wildcardLocation)
          ->orWhere('postcode', 'LIKE', $wildcardLocation)->get();
        }

        $colNum = Listing::where('city', 'LIKE', $wildcardLocation)->orWhere('state', 'LIKE', $wildcardLocation)->orWhere('suburb', 'LIKE', $wildcardLocation)->orWhere('country', 'LIKE', $wildcardLocation)->where('isPublic', '=', '1')->count();


        switch ($colNum) {
            case 1:
                $colNum = 12;
        break;
            case 2:
                $colNum = 6;
                break;
            case 3:
                $colNum = 3;
                break;

        }

        $title = ucwords("Search: " . $type . " spaces in " . $location);
        return View::make('search.results')
            ->with('listings', $listings)
            ->with('title', $title)
            ->with('colNum', $colNum);

	}



}
