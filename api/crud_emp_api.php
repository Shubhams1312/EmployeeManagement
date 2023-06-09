<?php 
include "../db/db.php";


$query = "SELECT * FROM tb_emp_details where active ='1' ";

$res = $mysqli->query($query);
$final_arr = array();
 
if($res->num_rows > 0){
   
    while ($row = $res->fetch_assoc()) {
        $data1 = array(
            'id' => $row['id'],
            'name' => $row['first_name']." ".$row['middle_name']." ".$row['last_name'],
            'profile_pic' => $row['profile_pic'],
            'contact' => $row['mobile_no'],
            'email' => $row['personal_email']
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

