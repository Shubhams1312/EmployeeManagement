<?php
include "../db/db.php";

$action = $_POST['action'];


if ($action == "add_designation") {
    $designation_name = trim($_POST['designation_name']);

    $qry = "INSERT INTO `designation_master`( `designation_name`, `active`, `created_by`, `created_on`, `updated_by`, `updated_on`) VALUES ('" . $designation_name . "','1','','" . date("Y-m-d H:i:s") . "','','" . date("Y-m-d H:i:s") . "')";
    $res = $mysqli->query($qry);
    echo "Designation saved successfully";

}
if ($action == "update_designation") {
    $designation_name = trim($_POST['designation_name']);
    $designation_id = trim($_POST['designation_id']);

    $qry = "UPDATE `designation_master` SET `designation_name`='" . $designation_name . "', `updated_by`='',`updated_on`='" . date("Y-m-d H:i:s") . "' WHERE  id = '" . $designation_id . "'";
    $res = $mysqli->query($qry);
    echo "Designation updated successfully";

}
if ($action == "edit_designation") {
    $designation_id = trim($_POST['designation_id']);

    $qry = "SELECT designation_name FROM `designation_master`  WHERE  id = '" . $designation_id . "'";
    $res = $mysqli->query($qry);
    $row = $res->fetch_assoc();
    echo $row['designation_name'];

}

if ($action == "del_designation") {
    $designation_id = trim($_POST['designation_id']);

    $qry = "UPDATE `designation_master` SET `active`='0', `updated_by`='',`updated_on`='" . date("Y-m-d H:i:s") . "' WHERE  id = '" . $designation_id . "'";
    $res = $mysqli->query($qry);

    echo "Designation deleted successfully";

}

if ($action == "check_duplicate") {
    $designation_name = trim($_POST['designation_name']);

    $qry = "SELECT id FROM `designation_master` WHERE designation_name = '" . $designation_name . "'";
    $res = $mysqli->query($qry);

    if ($res->num_rows > 0) {
        echo "true";
    } else {
        echo "false";
    }
}
 
?>