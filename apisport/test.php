<?php 

error_reporting(E_ALL);
ini_set('display_errors', '1');
	// Include FrameWork Slim 
	require_once ("includes/Slim/Slim.php");
	require_once ("includes/functions.php");
	require_once ("classes/class_categories.php");
	require_once ("classes/class_activities.php");	
	require_once ("classes/class_sceance.php");	
	require_once ("classes/class_programme.php");	
	require_once ("includes/db.php");
	 
	
	
	//Initilize App with Slim FrameWork
	\Slim\Slim::registerAutoloader();
	$app = new \Slim\Slim();
	
	// Define All Get Method 
	
	// Exercice part 
	$app->get('/exercice/all/' , 'getAllExercices');
	$app->get('/exercice/:id', 'getExerciceById');
	
	//Categories part 
	$app->get('/categorie/all', 'getAllCategories');
	$app->get('/categorie/:id', 'getCategoryById');
	
	
	/* Seance */ 
	$app->get('/sceance/add/:user_id/:name' , 'addSceance');
	$app->get('/sceance/get/:user', 'getSeance');
	$app->get('/sceance/add_exercice/:seance_id/:id_activity/:reps/:serie','addExercice');
	$app->get('/sceance/get/detail/:id', 'getSeanceDetail');
	
	
	/* Programme */
	$app->get('/programme/:user', 'getProgramme');
	$app->run();

	
	function getAllCategories() {
		try {
			$categories = new categories();
			$results = $categories->getAllCategories();
			return json_encode($results);
		}
		catch(exception $e) {
			sendMail(__FUNCTION__, $e->getMessage());
		}
		
	} 
	
	function getCategoryById($id) {
		$categories = new categories();
		try {
			$result = $categories->getCategory($id);
			print_r($result);
			if(!empty($result)) {
				return json_encode($result);
			}
			else {
				return json_encode(array('error' => 'No Result'));
			}
		}
		catch(exception $e) {
			sendMail(__FUNCTION__, $e->getMessage());
			return json_encode('False');
		}
	
	}
	
		
	/**
	 *  getExerciceById function
	 * 	parameter must be a integer
	 * 	Return Detail of an exercice 
	 */
	
	function getExerciceById($id) {
		if(!empty($id)) {
			try {
				$exercices = new activities();
				return json_encode($exercices->getActivities($id));
			}
			catch(exception $e) {
				sendMail(__FUNCTION__, $e->getMessage());
			}
		}
		else {
			sendMail(__FUNCTION__, 'No ID');
		}
		
	}
	

	/**
	 *  getAllExercices function
	 * 	Return list of all exercices 
	 */
	
	function getAllExercices() {
		try {	
			$exercices = new activities();
			return json_encode($exercices->getAllActivities());
		}
		catch(exception $e) {
			sendMail(__FUNCTION__, $e->getMessage());
			return json_encode('False');
		}
	}
	
	
	function getProgramme($user) {
		//$programme = new programme();
		//print_r($programme->getProgramme($user));
		
	}
	
	
	function getSeanceDetail($id) {
		$seance = new sceance(); 
		try {
			$result = $seance->getSceanceDetail($id);
			return json_encode($result);
		}
		catch( exception $e) {
			sendMail(__FUNCTION__, $e->getMessage());
			return json_encode('False');
		}
	}
	
	
	
	function addExercice($seance_id,$id_activity,$reps,$serie) {
		$seance = new sceance() ;
		
		$seance->addExercice($seance_id,$id_activity,$reps,$serie); 
	}
	
	function addSceance($user_id,$name) {
		$sceance = new sceance();
		try {
			$sceance->addSceance($user_id, $name);
		}
		catch( exception $e ) {
			sendMail(__FUNCTION__, $e->getMessage());
		}
	}
	
	/**
	 *  getSeance function
	 * 	parameter must be a integer 
	 */
	 
	function getSeance($user) {
		//Sceance
		//Try if it's an integer
		if($user and strlen($user) <= 6 ) {
			$sceance = new sceance();
			$result = $sceance->getSceance($user);
			try {
				$result = $sceance->getSceance($user);

				if(!empty($result)) {
					return json_encode($result);
				}
				else {
					return json_encode(array('error' => 'No Result'));
				}
			}
			catch(exception $e) {
				sendMail(__FUNCTION__, $e->getMessage());
				return json_encode('False');
			}
		}
		else {
			sendMail(__FUNCTION__, 'User ID is not an integer or is to long.');
		}
	}
	
	

	
