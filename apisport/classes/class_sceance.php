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
			$query = 	"SELECT api_sceances.* , api_activities.name FROM api_sceances 
							LEFT JOIN api_activities 
							ON api_activities.id = api_sceances.id_activity
						WHERE id_user = $id_user ";
			$results = $db->query($query);
			$results->setFetchMode(PDO::FETCH_OBJ);
			while($sceance = $results->fetch()) {
				$sceances[] = $sceance;
			}
				
			return $sceances;
		}
		catch (exception $e) {
			mail('nicoo2k4@gmail.com','[ERROR SQL NSPORT]', $e->getMessage() );
		}
		
	}
		
	function addSceance($reps, $weight, $id_user, $id_activity, $serie) {
		
		try {
			global $db;
			$query  = $db->prepare("INSERT INTO api_sceances (reps, weight, id_user, id_activity, serie) VALUES (:reps, :weight, :id_user, :id_activity, :serie)");
			$query->bindParam(':reps', $reps);
			$query->bindParam(':weight', $weight);
			$query->bindParam(':id_user', $id_user);
			$query->bindParam(':id_activity', $id_activity);
			$query->bindParam(':serie', $serie);
			$query->execute();
		}
		catch(exception $e) {
			echo'here';
  			mail('nicoo2k4@gmail.com',"[ERROR NSPORT] SQL ERROR ",$e->getMessage());
		}

	}	
		
		
		
		
	}
	


?>