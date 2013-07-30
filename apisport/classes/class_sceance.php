<?php
	/**
	 * 
	 */
	class sceance {
		
		function __construct() {
			
		}
		
		
	function getSceance($id_user) {
		
		global $db;
		try {
			$query = 	"SELECT * FROM api_sceances WHERE id_user = $id_user ";
			$results = $db->query($query);
			$results->setFetchMode(PDO::FETCH_OBJ);
			while($sceance = $results->fetch()) {
				$sceances[] = $sceance;
			}
				
			return $sceances;
		}
		catch (exception $e) {
			sendMail('SQL ERROR', $e->getMessage());
		}
		
	}
	
	
	function getSceanceDetail($id) {
		global $db;
		try {
			$query = "SELECT api_activities.*,api_sceances.* FROM api_sceances 
						INNER JOIN api_activities_to_seance ON api_activities_to_seance.id_seance = api_sceances.id
						INNER JOIN api_activities ON api_activities_to_seance.id_activity = api_activities.id
						WHERE api_sceances.id = $id";
			$results = $db->query($query);
			$results->setFetchMode(PDO::FETCH_OBJ);
			while($exercice = $results->fetch()) {
				$exercices[] = $exercice;
			}	
			return $exercices;
		}
		catch(exception $e) {
			sendMail('SQL ERROR', $e->getMessage());
		}
	}
	
	
		
	function addSceance($id_user, $name) {
		
		try {
			global $db;
			$query  = $db->prepare("INSERT INTO api_sceances (id_user, name) VALUES (:id_user, :name)");
			$query->bindParam(':id_user', $id_user);
			$query->bindParam(':name', $name);
			$query->execute();
		}
		catch(exception $e) {
			sendMail('SQL ERROR', $e->getMessage());
		}

	}	
	
	function addExercice($seance,$id_activity,$reps,$serie) {
		try {
			global $db;
			$query  = $db->prepare("INSERT INTO api_activities_to_seance (id_seance, id_activity, reps, series) VALUES (:id_seance, :id_activity, :reps , :series)");
			$query->bindParam(':id_seance', $seance);
			$query->bindParam(':id_activity', $id_activity);
			$query->bindParam(':reps', $reps);
			$query->bindParam(':series', $serie);
			$query->execute();
		}
		catch(exception $e) {
			sendMail('SQL ERROR', $e->getMessage());
		}
	}
		
		
		
		
	}
	


?>