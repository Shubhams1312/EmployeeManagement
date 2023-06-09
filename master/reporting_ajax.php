<?php
include "../db/db.php";

$action = $_POST['action'];


if ($action == "add_reporting") {
    $reporting_name = trim($_POST['reporting_name']);

    $qry = "INSERT INTO `reporting_master`( `reporting_name`, `active`, `created_by`, `created_on`, `updated_by`, `updated_on`) VALUES ('" . $reporting_name . "','1','','" . date("Y-m-d H:i:s") . "','','" . date("Y-m-d H:i:s") . "')";
    $res = $mysqli->query($qry);
    echo "Reporting to Name saved successfully";

}
if ($action == "update_reporting") {
    $reporting_name = trim($_POST['reporting_name']);
    $reporting_id = trim($_POST['reporting_id']);

    $qry = "UPDATE `reporting_master` SET `reporting_name`='" . $reporting_name . "', `updated_by`='',`updated_on`='" . date("Y-m-d H:i:s") . "' WHERE  id = '" . $reporting_id . "'";
    $res = $mysqli->query($qry);
    echo "Reporting to Name updated successfully";

}
if ($action == "edit_reporting") {
    $reporting_id = trim($_POST['reporting_id']);

    $qry = "SELECT reporting_name FROM `reporting_master`  WHERE  id = '" . $reporting_id . "'";
    $res = $mysqli->query($qry);
    $row = $res->fetch_assoc();
    echo $row['reporting_name'];

}

if ($action == "del_reporting") {
    $reporting_id = trim($_POST['reporting_id']);

    $qry = "UPDATE `reporting_master` SET `active`='0', `updated_by`='',`updated_on`='" . date("Y-m-d H:i:s") . "' WHERE  id = '" . $reporting_id . "'";
    $res = $mysqli->query($qry);

    echo "Reporting to Name deleted successfully";

}

if ($action == "check_duplicate") {
    $reporting_name = trim($_POST['reporting_name']);

    $qry = "SELECT id FROM `reporting_master` WHERE reporting_name = '" . $reporting_name . "'";
    $res = $mysqli->query($qry);

    if ($res->num_rows > 0) {
        echo "true";
    } else {
        echo "false";
    }
}
 
?>