<?php
include "../db/db.php";

$action = $_POST['action'];


if ($action == "add_branch") {
    $branch_name = trim($_POST['branch_name']);

    $qry = "INSERT INTO `branch_master`( `branch_name`, `active`, `created_by`, `created_on`, `updated_by`, `updated_on`) VALUES ('" . $branch_name . "','1','','" . date("Y-m-d H:i:s") . "','','" . date("Y-m-d H:i:s") . "')";
    $res = $mysqli->query($qry);
    echo "Branch Name saved successfully";

}
if ($action == "update_branch") {
    $branch_name = trim($_POST['branch_name']);
    $branch_id = trim($_POST['branch_id']);

    $qry = "UPDATE `branch_master` SET `branch_name`='" . $branch_name . "', `updated_by`='',`updated_on`='" . date("Y-m-d H:i:s") . "' WHERE  id = '" . $branch_id . "'";
    $res = $mysqli->query($qry);
    echo "Branch Name updated successfully";

}
if ($action == "edit_branch") {
    $branch_id = trim($_POST['branch_id']);

    $qry = "SELECT branch_name FROM `branch_master`  WHERE  id = '" . $branch_id . "'";
    $res = $mysqli->query($qry);
    $row = $res->fetch_assoc();
    echo $row['branch_name'];

}

if ($action == "del_branch") {
    $branch_id = trim($_POST['branch_id']);

    $qry = "UPDATE `branch_master` SET `active`='0', `updated_by`='',`updated_on`='" . date("Y-m-d H:i:s") . "' WHERE  id = '" . $branch_id . "'";
    $res = $mysqli->query($qry);

    echo "Branch Name deleted successfully";

}

if ($action == "check_duplicate") {
    $branch_name = trim($_POST['branch_name']);

    $qry = "SELECT id FROM `branch_master` WHERE branch_name = '" . $branch_name . "'";
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