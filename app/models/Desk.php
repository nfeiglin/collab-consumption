<?php
// app/models/Desk.php
class Desk extends Eloquent
{

public function getRoundedDailyrateAttribute() {
	return round($this->dailyrate, 2);
	}
	
public function getRoundedCleaningfeeAttribute() {
	
	return round($this->cleaningfee, 2);

	}	
	
public function amenities() {

return $this->hasMany('Amenity', 'owner_listing_id')->select(array('type', 'description'))->where('has_amenity', '=', 1);


}
	
	
}

?>