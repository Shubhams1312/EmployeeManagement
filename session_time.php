<?php 

	include "./db/db.php";  
	$sess = "0";
	if (!empty($_SESSION['time_out'])) {
    $timeDiffernce = time() - $_SESSION['time_out'];
    if ($timeDiffernce > 1440) { // exprie after 24 min  (1440 seconds)
	// unset session
		session_destroy();  
		
		$sess = "1";
		} else {
			 
			$_SESSION['time_out'] = time();
		}
	} else {
		$_SESSION['time_out'] = time();
	}
	echo $sess;

?>