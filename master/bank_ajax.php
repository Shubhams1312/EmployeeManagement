<?php
include "../db/db.php";

$action = $_POST['action'];


if ($action == "add_bank") {
    $bank_name = trim($_POST['bank_name']);

    $qry = "INSERT INTO `bank_master`( `bank_name`, `active`, `created_by`, `created_on`, `updated_by`, `updated_on`) VALUES ('" . $bank_name . "','1','','" . date("Y-m-d H:i:s") . "','','" . date("Y-m-d H:i:s") . "')";
    $res = $mysqli->query($qry);
    echo "Bank Name saved successfully";

}
if ($action == "update_bank") {
    $bank_name = trim($_POST['bank_name']);
    $bank_id = trim($_POST['bank_id']);

    $qry = "UPDATE `bank_master` SET `bank_name`='" . $bank_name . "', `updated_by`='',`updated_on`='" . date("Y-m-d H:i:s") . "' WHERE  id = '" . $bank_id . "'";
    $res = $mysqli->query($qry);
    echo "Bank Name updated successfully";

}
if ($action == "edit_bank") {
    $bank_id = trim($_POST['bank_id']);

    $qry = "SELECT bank_name FROM `bank_master`  WHERE  id = '" . $bank_id . "'";
    $res = $mysqli->query($qry);
    $row = $res->fetch_assoc();
    echo $row['bank_name'];

}

if ($action == "del_bank") {
    $bank_id = trim($_POST['bank_id']);

    $qry = "UPDATE `bank_master` SET `active`='0', `updated_by`='',`updated_on`='" . date("Y-m-d H:i:s") . "' WHERE  id = '" . $bank_id . "'";
    $res = $mysqli->query($qry);

    echo "Bank Name deleted successfully";

}

if ($action == "check_duplicate") {
    $bank_name = trim($_POST['bank_name']);

    $qry = "SELECT id FROM `bank_master` WHERE bank_name = '" . $bank_name . "'";
    $res = $mysqli->query($qry);

    if ($res->num_rows > 0) {
        echo "true";
    } else {
        echo "false";
    }
}

//     $query = "SELECT state_name FROM state_master WHERE id = $id LIMIT 1";

//     $res_state = $mysqli->query($query);
//     $row = $res_state->fetch_assoc();
//     echo json_encode($row['state_name']);
//   else {
//     echo json_encode(array('message' => 'id parameter is missing'));
// }
?>