<?php

class Listing extends Eloquent {
	protected $guarded = array();

	public static $rules = array();

    public function amenities() {
        return $this->hasMany('Amenity', 'owner_desk_id')->select(array('type', 'description'))->where('has_amenity', '=', 1);

    }

    public function photos(){
        return $this->hasMany('Photo', 'listing_id')->select(array('url', 'alt_text'))->where('size', '=','800x450');
    }

    public function thumbnail(){
        return $this->hasOne('Thumbnail', 'listing_id');
        //->select(array('url', 'alt_text'));
    }

    public function user(){
        return $this->belongsTo('User');
    }

    public function booking(){
        return $this->hasMany('Booking', 'listing_id');
    }
}
