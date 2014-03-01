<?php

class Thumbnail extends Eloquent {
	protected $guarded = array();

	public static $rules = array();
    public $table = "thumbnail";

    public function listing(){
        return $this->belongsTo('Thumbnail');
    }
}
