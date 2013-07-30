<?php 

	/* define DB params */
	global $db;
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
		//echo "Connection à MySQL impossible : ", $e->getMessage();
		mail('nicoo2k4@gmail.com','[ERROR NSPORT] : Connexion SQL',$e->getMessage());
		exit();
	}
	
	/* End Connect */
	