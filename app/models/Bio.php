<?php

class Bio extends Eloquent {
	/*
	protected $guarded = array();

	public static $rules = array();
*/

	protected $table = 'bio';
	public function user() {

	return $this->belongsTo('User');
	}
}
