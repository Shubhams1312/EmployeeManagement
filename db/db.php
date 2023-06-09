<?php
	date_default_timezone_set('Asia/Kolkata');

	define("dbip", "localhost"); 
	define("dbuser", "root");
	define("dbpasswd", "");
	define("dbname", "db_hr_management"); 
	 
	 

	$mysqli = new mysqli(dbip,dbuser,dbpasswd,dbname);
	if ($mysqli->connect_errno) {
		echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
		echo dbip,dbuser,dbpasswd,dbname;
	} 
	 
	 
	$arrContextOptions = array(
		"ssl" => array(
        "verify_peer" => false,
        "verify_peer_name" => false,
		),
	);
 #echo "connected";
	session_name("mklook");
	session_start();

?>

