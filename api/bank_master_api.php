<?php
include "../db/db.php";

$query = "SELECT * FROM `bank_master` WHERE `active`=1 ORDER BY `bank_name` ASC";
//$query = "SELECT * FROM state_master order by state_name asc";
$res_album = $mysqli->query($query);
$final_data = array();

if ($res_album->num_rows > 0) {
    while ($row = $res_album->fetch_assoc()) {
        $data1 = array(
            'bank_id' => $row['id'],
            'bank_name' => $row['bank_name']
        );
        array_push($final_data, $data1);

    }
    $res_data = array("result" => "true", "data" => $final_data);
    $json1 = json_encode($res_data, true);
    echo $json1;
} else {
    $res_data = array("result" => "false");
    $json1 = json_encode($res_data, true);
    echo $json1;
}
?>