<?php
include "../db/db.php";

$action = $_POST['action'];


if ($action == "add_division") {
    $division_name = trim($_POST['division_name']);

    $qry = "INSERT INTO `division_master`( `division_name`, `active`, `created_by`, `created_on`, `updated_by`, `updated_on`) VALUES ('" . $division_name . "','1','','" . date("Y-m-d H:i:s") . "','','" . date("Y-m-d H:i:s") . "')";
    $res = $mysqli->query($qry);
    echo "Division saved successfully";

}
if ($action == "update_division") {
    $division_name = trim($_POST['division_name']);
    $division_id = trim($_POST['division_id']);

    $qry = "UPDATE `division_master` SET `division_name`='" . $division_name . "', `updated_by`='',`updated_on`='" . date("Y-m-d H:i:s") . "' WHERE  id = '" . $division_id . "'";
    $res = $mysqli->query($qry);
    echo "Division updated successfully";

}
if ($action == "edit_division") {
    $division_id = trim($_POST['division_id']);

    $qry = "SELECT division_name FROM `division_master`  WHERE  id = '" . $division_id . "'";
    $res = $mysqli->query($qry);
    $row = $res->fetch_assoc();
    echo $row['division_name'];

}

if ($action == "del_division") {
    $division_id = trim($_POST['division_id']);

    $qry = "UPDATE `division_master` SET `active`='0', `updated_by`='',`updated_on`='" . date("Y-m-d H:i:s") . "' WHERE  id = '" . $division_id . "'";
    $res = $mysqli->query($qry);

    echo "Division deleted successfully";

}

if ($action == "check_duplicate") {
    $division_name = trim($_POST['division_name']);

    $qry = "SELECT id FROM `division_master` WHERE division_name = '" . $division_name . "'";
    $res = $mysqli->query($qry);

    if ($res->num_rows > 0) {
        echo "true";
    } else {
        echo "false";
    }
} 
?>