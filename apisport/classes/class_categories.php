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
	
	function __construct($name,$description) {
		$this->_description = $description;
		$this->_name = $name;
	}
	
	
	/* Gettor */
	
	public function getCategory($db,$id) {
		
		$query = "SELECT * FROM categories WHERE id=$id";
		$result = $db->query($query);
		$result->setFetchMode(PDO::FETCH_OBJ);
		$result = $result->fetch();
		
		return $result; 
		
	}
	
	
	public function getAllCategories($db) {
		
		$query = "SELECT * FROM categories";
		$results = $db->query($query);
		$results->setFetchMode(PDO::FETCH_OBJ);
		while($activity = $results->fetch()) {
			$activities[] = $activity;
		}
			
		return $activities;
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
	
	public function setName($name) {
		$this->_name = $name;
	}
	
	public function setDescription($description) {
		
		$this->_description = $description;
	}
	
	/* end settor */
	
}
