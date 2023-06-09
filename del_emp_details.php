<?php 
    include './db/db.php'; 
    $id = trim($_POST['dl_id']); 
    $qry ="UPDATE `tb_emp_details` SET `active`='0',`updated_on`='" . date("Y-m-d H:i:s") . "' WHERE  id = '" . $id . "'"; 
    $res = $mysqli->query($qry); 
    echo "Record deleted successfully";
 
?> 