<?php 

/**
 * Class categories for nicoo-sport
 *  TODO  : Secure input
 * 			Add insert
 * 			generate url image
 */
 

class categories {
	
	
	/* Define variables*/
	private $_name;
	private $_description;
	
	/* End define variables */
	
	function __construct() {
	}
	
	
	/* Gettor */
	
	public function getCategory($id) {
		global $db;
		$query = "SELECT * FROM api_categories WHERE id=$id";
		$result = $db->query($query);
		$result->setFetchMode(PDO::FETCH_OBJ);
		if($result->rowCount() > 0 ) {
			$return = $result->fetch();
		}
		return $return; 
	}
	
	
	public function getAllCategories() {
		
		global $db;
		$query = "SELECT * FROM api_categories";
		$results = $db->query($query);
		$results->setFetchMode(PDO::FETCH_OBJ);
		while($category = $results->fetch()) {
			$categories[] = $category;
		}
			
		return $categories;
	}
	
	
	public function getName()
	{
		return $this->_name;
	}
	
	public function getDescription() {
		return $this->_description;
	}
	
	
	/* End Gettor */
	
	
	/* settor */
	
	public function saveCategory($name,$description,$image)
	{
		try {
			global $db;
			$query  = $db->prepare("INSERT INTO api_categories (name, description) VALUES (:name, :description)");
			$query->bindParam(':name', $name);
			$query->bindParam(':description', $description);
			$query->execute();
		}
		catch(exception $e) {
			sendMail('SQL ERROR', $e->getMessage());
		}


	}
	
	public function setName($name) {
		$this->_name = $name;
	}
	
	public function setDescription($description) {
		
		$this->_description = $description;
	}
	
	/* end settor */
	
}
