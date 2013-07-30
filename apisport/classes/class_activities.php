<?php



class activities {

	/* Define variables */

		private $_type;
		private $_name;
		private $_description;
		private $_image;

	/* End define variavle */

	
	
	
	
	/* Gettor */
	
	public function getAllActivities() {
		global $db;
		try {
			$query = "SELECT * FROM api_activities";
			$results = $db->query($query);
			$results->setFetchMode(PDO::FETCH_OBJ);
			while($activity = $results->fetch()) {
				$activities[] = $activity;
			}
				
			return $activities;
		}
		catch (exception $e) {
			sendMail('SQL ERROR', $e->getMessage());
		}
			
	}
	
	public function getActivities($id) {
		global $db;
		try {
			$query = "SELECT * FROM api_activities WHERE id = $id";
			$results = $db->query($query);
			$results->setFetchMode(PDO::FETCH_OBJ);
			while($activity = $results->fetch()) {
				$activities[] = $activity;
			}
				
			return $activities;
		}
		catch (exception $e) {
			sendMail('SQL ERROR', $e->getMessage());
		}
	}
	
	public function getActivitiesByCategories($categoryId) {
		global $db;
		try {
			$query = "SELECT * FROM api_activities WHERE id_category = $categoryId";
			$results = $db->query($query);
			$results->setFetchMode(PDO::FETCH_OBJ);
			while($activity = $results->fetch()) {
				$activities[] = $activity;
			}
				
			return $activities;
		}
		catch (exception $e) {
			sendMail('SQL ERROR', $e->getMessage());
		}
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

	/* settor */
	
	public function saveActivites($name,$description,$resume,$id_category,$image='')
	{
		try {
			global $db;
			$query  = $db->prepare("INSERT INTO api_activities (name, description,resume,id_category) VALUES (:name, :description, :resume, :id_category)");
			$query->bindParam(':name', $name);
			$query->bindParam(':description', $description);
			$query->bindParam(':resume', $resume);
			$query->bindParam(':id_category', $id_category);
			$query->execute();
		}
		catch(exception $e) {
			sendMail('SQL ERROR', $e->getMessage());
		}


	}
	
	
	/* end settor */


}

?>