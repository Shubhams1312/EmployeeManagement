<?php 
include "../db/db.php"; 

$query = "SELECT * FROM tb_previous_emp where active ='1' ";

$res = $mysqli->query($query);
$final_arr = array();
 
if($res->num_rows > 0){
   
    while ($row = $res->fetch_assoc()) {
        $data1 = array(
            'id' => $row['id'],
            'employer' =>$row['name_employer'],
            'add' =>$row['address'],
            'join_date' =>$row['join_date'],
            'leave_date'=>$row['leave_date'],
            'salary_drawn' => $row['salary_drawn'],
            'department' => $row['department'],
            'designation' => $row['designation'],
            'job_profile' => $row['job_profile']

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