<?php 

	require_once  'includes/db.php';
	require_once ("classes/class_categories.php");

	
	$test = new categories('Dos','lalalala');
	$categories = $test->getAllCategories($db); 
	
	var_dump($categories);

?>