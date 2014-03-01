<?php
// app/models/Amenity.php
class Amenity extends Eloquent {


	public function listing() {
 	return $this->belongsTo('Amenity');
 }

	
}

?>