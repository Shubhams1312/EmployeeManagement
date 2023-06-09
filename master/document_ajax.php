<?php
include "../db/db.php";

$action = $_POST['action'];


if ($action == "add_document") {
    $document_name = trim($_POST['document_name']);

    $qry = "INSERT INTO `document_master`( `document_name`, `active`, `created_by`, `created_on`, `updated_by`, `updated_on`) VALUES ('" . $document_name . "','1','','" . date("Y-m-d H:i:s") . "','','" . date("Y-m-d H:i:s") . "')";
    $res = $mysqli->query($qry);
    echo "Document saved successfully";

}
if ($action == "update_document") {
    $document_name = trim($_POST['document_name']);
    $document_id = trim($_POST['document_id']);

    $qry = "UPDATE `document_master` SET `document_name`='" . $document_name . "', `updated_by`='',`updated_on`='" . date("Y-m-d H:i:s") . "' WHERE  id = '" . $document_id . "'";
    $res = $mysqli->query($qry);
    echo "Document updated successfully";

}
if ($action == "edit_document") {
    $document_id = trim($_POST['document_id']);

    $qry = "SELECT document_name FROM `document_master`  WHERE  id = '" . $document_id . "'";
    $res = $mysqli->query($qry);
    $row = $res->fetch_assoc();
    echo $row['document_name'];

}

if ($action == "del_document") {
    $document_id = trim($_POST['document_id']);

    $qry = "UPDATE `document_master` SET `active`='0', `updated_by`='',`updated_on`='" . date("Y-m-d H:i:s") . "' WHERE  id = '" . $document_id . "'";
    $res = $mysqli->query($qry);

    echo "Document deleted successfully";

}

if ($action == "check_duplicate") {
    $document_name = trim($_POST['document_name']);

    $qry = "SELECT id FROM `document_master` WHERE document_name = '" . $document_name . "'";
    $res = $mysqli->query($qry);

    if ($res->num_rows > 0) {
        echo "true";
    } else {
        echo "false";
    }
}
?>