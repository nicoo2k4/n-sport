<?php 

	/* define DB params */
	$user = "root";
	$password = "";
	$databse = "mysql:host=localhost;dbname=sport";
	$table = "sport";
	
	/* End define */
	
	/* Connect to DB */
	
	try {
	  	$db = new PDO( $databse, $user, $password );
	}
	catch ( Exception $e ) {
		echo "Connection à MySQL impossible : ", $e->getMessage();
	}
	
	/* End Connect */
	