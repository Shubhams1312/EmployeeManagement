<?php  
ini_set('session.gc_maxlifetime',60*60*6*6);
include './db/db.php'; 

$query = "SELECT `id`, `username`, `active`, `last_login`  FROM `master_user` WHERE username='".$_REQUEST['username']."' and encrypted_password ='".md5(base64_decode($_REQUEST['password']))."' and active='1'";
 
$currentSessId = session_id();
$res = $mysqli->query($query);
if($res->num_rows > 0)
{
    $row = $res->fetch_assoc();
	$_SESSION['user_id'] = $row['id'];
    $_SESSION['username'] = $row['username'];
	 
    $mysqli->query("update master_user set 	last_login = '".date('Y-m-d H:i:s')."'   where id = '".$_SESSION['user_id']."'");

    echo "yes";	
  
} else {
    echo "no";	 
} 
	

?>