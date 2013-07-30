<?php

	/**
	 * 
	 */
	class programme {
		
		function __construct() {
			
		}
			
			
		public function getProgramme($id_user) {
			global $db;
			try {
				$query = "SELECT * FROM api_programme WHERE id_user = $id_user";
				$results = $db->query($query);
				$results->setFetchMode(PDO::FETCH_OBJ);
				while($programme = $results->fetch()) {
					$programmes[] = $programme;
				}
				echo 'here';	
				return $programmes;
			}
			catch (exception $e) {
				mail('nicoo2k4@gmail.com','[ERROR SQL NSPORT]', $e->getMessage() );
			}
				
			
		}
		
		
		public function addSceanceInProgramme($id_programme,$id_sceance) {
		
			try {
				global $db;
				$query  = $db->prepare("INSERT INTO api_programme (name, description,id_category) VALUES (:name, :description, :resume, :id_category)");
				$query->bindParam(':name', $name);
				$query->bindParam(':description', $description);
				$query->bindParam(':resume', $resume);
				$query->bindParam(':id_category', $id_category);
				$query->execute();
			}
			catch(exception $e) {
				echo'here';
	  			mail('nicoo2k4@gmail.com',"[ERROR NSPORT] SQL ERROR ",$e->getMessage());
			}
				
			
		}
			
		
	}
	


?>