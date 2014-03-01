<?php

class Photo extends Eloquent {
	protected $guarded = array();

	public static $rules = array();

    public function listing(){
        return $this->belongsTo('Listing');
    }

}
