<?php



class exercices {

	/* Define variables */

		private $_type;
		private $_name;
		private $_description;
		private $_image;

	/* End define variavle */

	
	
	
	
	/* Gettor */
	
	public function getActivities() {
		//Query database
		
		//Fetch in array
		
		//Return
		
	}
	
	public function getActivitiesByCategories($categoryId) {
		//Query database
		
		//fetch in array
		
		//return
	}
	
	
	//return Type 
	public function getType() {
		return $this->_type;
	}
	
	//return Name 
	public function getName() {
		return $this->_name;
	}
	
	//return Description 
	public function getDescription() {
		return $this->_description;
	}
	
	//return image 
	public function getImage() {
		return $this->_image;
	}
	
	
	
	
	
	/* End Gettor */



}

?>