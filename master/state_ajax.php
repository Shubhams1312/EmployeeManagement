<?php
include "../db/db.php";

$action = $_POST['action'];


if ($action == "add_state") {
    $state_name = trim($_POST['state_name']);

    $qry = "INSERT INTO `state_master`( `state_name`, `active`, `created_by`, `created_on`, `updated_by`, `updated_on`) VALUES ('" . $state_name . "','1','','" . date("Y-m-d H:i:s") . "','','" . date("Y-m-d H:i:s") . "')";
    $res = $mysqli->query($qry);
    echo "State saved successfully";

}
if ($action == "update_state") {
    $state_name = trim($_POST['state_name']);
    $state_id = trim($_POST['state_id']);

    $qry = "UPDATE `state_master` SET `state_name`='" . $state_name . "', `updated_by`='',`updated_on`='" . date("Y-m-d H:i:s") . "' WHERE  id = '" . $state_id . "'";
    $res = $mysqli->query($qry);
    echo "State updated successfully";

}
if ($action == "edit_state") {
    $state_id = trim($_POST['state_id']);

    $qry = "SELECT state_name FROM `state_master`  WHERE  id = '" . $state_id . "'";
    $res = $mysqli->query($qry);
    $row = $res->fetch_assoc();
    echo $row['state_name'];

}

if ($action == "del_state") {
    $state_id = trim($_POST['state_id']);

    $qry = "UPDATE `state_master` SET `active`='0', `updated_by`='',`updated_on`='" . date("Y-m-d H:i:s") . "' WHERE  id = '" . $state_id . "'";
    $res = $mysqli->query($qry);

    echo "State deleted successfully";

}

if ($action == "check_duplicate") {
    $state_name = trim($_POST['state_name']);

    $qry = "SELECT id FROM `state_master` WHERE state_name = '" . $state_name . "'";
    $res = $mysqli->query($qry);

    if ($res->num_rows > 0) {
        echo "true";
    } else {
        echo "false";
    }
}
 
?>