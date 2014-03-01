<?php

class Booking extends Eloquent {
	protected $guarded = array();

	public static $rules = array();

    public function user(){
        return $this->belongsTo('User');
    }

    public function listing(){
        return $this->belongsTo('Listing');
    }
}
