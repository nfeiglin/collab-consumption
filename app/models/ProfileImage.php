<?php

class ProfileImage extends Eloquent {
	/*
	protected $guarded = array();

	public static $rules = array();

*/
    public $table = "profile_images";
	public function user() {

	return $this->belongsTo('User');
	}
}
