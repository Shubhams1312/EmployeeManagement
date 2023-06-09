<?php  
include "../db/db.php";  
$query = "SELECT * FROM tbl_image where active ='1' AND emp_id = '' "; 
$result = $mysqli->query($query); 
$data = array();

if($result->num_rows > 0){
while ($row = mysqli_fetch_assoc($result)) {
    $data_t = array(
    'id' => $row['id'],
    'name' =>$row['name'],
    );
    array_push($data,$data_t);
}
 $res_data = array("result" => "true","data" =>$data);
    $json = json_encode($res_data, true);
    echo $json;
}else{
    $res_data = array("result" => "false");
    $json = json_encode($res_data, true);
    echo $json;
}
?>
