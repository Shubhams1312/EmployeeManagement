<?php 

include "../db/db.php";

$qry = "SELECT * FROM `tb_famliy_emp` where active ='1' ";
$res_qry = $mysqli->query($qry);

$arr = array();

if($res_qry->num_rows > 0){
    while($row =$res_qry->fetch_assoc() ){
        $data = array(
            'id' =>$row['id'],
            'member_name' =>$row['member_name'],
            'realtion_with_emp' =>$row['realtion_with_emp'],
            'residing_with_emp' =>$row['residing_with_emp'],
            'address' =>$row['address'],
            'dependent_on_emp' =>$row['dependent_on_emp'],
            'pf_nominee' =>$row['pf_nominee'],
            'esi_nominee' =>$row['esi_nominee'],
            'gratuity_nominee' =>$row['gratuity_nominee'],
            'nominee_aadhaar_card' =>$row['nominee_aadhaar_card'] 
  
        );
        array_push($arr,$data);
    }
    $res_data = array("result" => "true", "data" => $arr);
    $json1 = json_encode($res_data, true);
    echo $json1;
} else {
    $res_data = array("result" => "false");
    $json1 = json_encode($res_data, true);
    echo $json1;
} 



?>