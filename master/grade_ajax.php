<?php
include "../db/db.php";

$action = $_POST['action'];


if ($action == "add_grade") {
    $grade_name = trim($_POST['grade_name']);

    $qry = "INSERT INTO `grade_master`( `grade_name`, `active`, `created_by`, `created_on`, `updated_by`, `updated_on`) VALUES ('" . $grade_name . "','1','','" . date("Y-m-d H:i:s") . "','','" . date("Y-m-d H:i:s") . "')";
    $res = $mysqli->query($qry);
    echo "Grade saved successfully";

}
if ($action == "update_grade") {
    $grade_name = trim($_POST['grade_name']);
    $grade_id = trim($_POST['grade_id']);

    $qry = "UPDATE `grade_master` SET `grade_name`='" . $grade_name . "', `updated_by`='',`updated_on`='" . date("Y-m-d H:i:s") . "' WHERE  id = '" . $grade_id . "'";
    $res = $mysqli->query($qry);
    echo "Grade updated successfully";

}
if ($action == "edit_grade") {
    $grade_id = trim($_POST['grade_id']);

    $qry = "SELECT grade_name FROM `grade_master`  WHERE  id = '" . $grade_id . "'";
    $res = $mysqli->query($qry);
    $row = $res->fetch_assoc();
    echo $row['grade_name'];

}

if ($action == "del_grade") {
    $grade_id = trim($_POST['grade_id']);

    $qry = "UPDATE `grade_master` SET `active`='0', `updated_by`='',`updated_on`='" . date("Y-m-d H:i:s") . "' WHERE  id = '" . $grade_id . "'";
    $res = $mysqli->query($qry);

    echo "Grade deleted successfully";

}

if ($action == "check_duplicate") {
    $grade_name = trim($_POST['grade_name']);

    $qry = "SELECT id FROM `grade_master` WHERE grade_name = '" . $grade_name . "'";
    $res = $mysqli->query($qry);

    if ($res->num_rows > 0) {
        echo "true";
    } else {
        echo "false";
    }
}

 
?>