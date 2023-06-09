<?php
 
include './db/db.php';

if(isset($_SESSION['id']))
{   
    $today = date('Y-m-d H:i:s');
    $query = " UPDATE master_user SET last_login = '$today'  where id='".$_SESSION['id']."' ";
    $res = $mysqli->query($query);
session_destroy();
header('Location:login.php');
}else{
	session_destroy();
header('Location:login.php');
	
}
header('Location:login.php');
?>
 