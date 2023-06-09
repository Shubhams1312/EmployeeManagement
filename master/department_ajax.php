<?php
include "../db/db.php";

$action = $_POST['action'];


if ($action == "add_department") {
    $department_name = trim($_POST['department_name']);

    $qry = "INSERT INTO `department_master`( `department_name`, `active`, `created_by`, `created_on`, `updated_by`, `updated_on`) VALUES ('" . $department_name . "','1','','" . date("Y-m-d H:i:s") . "','','" . date("Y-m-d H:i:s") . "')";
    $res = $mysqli->query($qry);
    echo "Department saved successfully";

}
if ($action == "update_department") {
    $department_name = trim($_POST['department_name']);
    $department_id = trim($_POST['department_id']);

    $qry = "UPDATE `department_master` SET `department_name`='" . $department_name . "', `updated_by`='',`updated_on`='" . date("Y-m-d H:i:s") . "' WHERE  id = '" . $department_id . "'";
    $res = $mysqli->query($qry);
    echo "Department updated successfully";

}
if ($action == "edit_department") {
    $department_id = trim($_POST['department_id']);

    $qry = "SELECT department_name FROM `department_master`  WHERE  id = '" . $department_id . "'";
    $res = $mysqli->query($qry);
    $row = $res->fetch_assoc();
    echo $row['department_name'];

}

if ($action == "del_department") {
    $department_id = trim($_POST['department_id']);

    $qry = "UPDATE `department_master` SET `active`='0', `updated_by`='',`updated_on`='" . date("Y-m-d H:i:s") . "' WHERE  id = '" . $department_id . "'";
    $res = $mysqli->query($qry);

    echo "Department deleted successfully";

}

if ($action == "check_duplicate") {
    $department_name = trim($_POST['department_name']);

    $qry = "SELECT id FROM `department_master` WHERE department_name = '" . $department_name . "'";
    $res = $mysqli->query($qry);

    if ($res->num_rows > 0) {
        echo "true";
    } else {
        echo "false";
    }
}
 
?>