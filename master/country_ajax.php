<?php
include "../db/db.php";

$action = $_POST['action'];


if ($action == "add_country") {
    $country_name = trim($_POST['country_name']);

    $qry = "INSERT INTO `country_master`( `country_name`, `active`, `created_by`, `created_on`, `updated_by`, `updated_on`) VALUES ('" . $country_name . "','1','','" . date("Y-m-d H:i:s") . "','','" . date("Y-m-d H:i:s") . "')";
    $res = $mysqli->query($qry);
    echo "country saved successfully";

}
if ($action == "update_country") {
    $country_name = trim($_POST['country_name']);
    $country_id = trim($_POST['country_id']);

    $qry = "UPDATE `country_master` SET `country_name`='" . $country_name . "', `updated_by`='',`updated_on`='" . date("Y-m-d H:i:s") . "' WHERE  id = '" . $country_id . "'";
    $res = $mysqli->query($qry);
    echo "country updated successfully";

}
if ($action == "edit_country") {
    $country_id = trim($_POST['country_id']);

    $qry = "SELECT country_name FROM `country_master`  WHERE  id = '" . $country_id . "'";
    $res = $mysqli->query($qry);
    $row = $res->fetch_assoc();
    echo $row['country_name'];

}

if ($action == "del_country") {
    $country_id = trim($_POST['country_id']);

    $qry = "UPDATE `country_master` SET `active`='0', `updated_by`='',`updated_on`='" . date("Y-m-d H:i:s") . "' WHERE  id = '" . $country_id . "'";
    $res = $mysqli->query($qry);

    echo "country deleted successfully";

}

if ($action == "check_duplicate") {
    $country_name = trim($_POST['country_name']);

    $qry = "SELECT id FROM `country_master` WHERE country_name = '" . $country_name . "'";
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