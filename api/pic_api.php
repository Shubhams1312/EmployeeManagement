<?php 

include "./db/db.php" ;


$query = "SELECT * FROM tbl_profile where active ='1' ";

$res = $mysqli->query($query);
$final_arr = array();
 
if($res->num_rows > 0){
   
    while ($row = $res->fetch_assoc()) {
        $data1 = array(
            'id' => $row['id'],
            'name' => $row['name'],
            'path' => $row['path'], 
        );

        array_push($final_arr,$data1);
    }
    $res_data = array("result" => "true", "data" => $final_arr);
    $json = json_encode($res_data, true);
    echo $json;
}else {
    $res_data = array("result" => "false");
    $json1 = json_encode($res_data, true);
    echo $json1;
}


?>