<?php
 
include "../db/db.php";
$action = $_POST['action']; 


if ($action == "del") {
    
 $user_id = $_SESSION['user_id'];
 
 $pic_id = $_REQUEST['pic_id'];

    $qry = "UPDATE `tbl_image` SET `active`='0', `updated_by`='$user_id',`updated_on`='" . date("Y-m-d H:i:s") . "' WHERE  id = '" . $pic_id . "'";
    $res = $mysqli->query($qry);

    echo "Data deleted successfully";

}
?>
