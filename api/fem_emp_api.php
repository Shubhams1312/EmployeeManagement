<?php
include "../db/db.php";

$action = $_POST['action'];


if ($action == "add") {
    $user_id = $_SESSION['user_id'];
    $emp_id = $_POST['emp_id'];
    $name_of_member = $_POST['name_of_member'];
    $realtion_emp = $_POST['realtion_emp'];
    $residing = $_POST['residing'];
    $address = $_POST['address'];
    $dependent_emp = $_POST['dependent_emp'];
    $pf_nominee = $_POST['pf_nominee'];
    $esi_nominee = $_POST['esi_nominee'];
    $gratuity = $_POST['gratuity'];
    $nominee_aadhaar = $_POST['nominee_aadhaar'];
    $created_on = date("Y-m-d H:i:s");
    $active = 1;
 
    $qry = "INSERT INTO `tb_famliy_emp` (`emp_id`,`member_name`, `realtion_with_emp`, `residing_with_emp`, `address`, `dependent_on_emp`, `pf_nominee`, `esi_nominee`, `gratuity_nominee`, `nominee_aadhaar_card`,`created_on`,`created_by`,`active`) VALUES ('$emp_id','$name_of_member', '$realtion_emp', '$residing', '$address ', '$dependent_emp', '$pf_nominee', '$esi_nominee', '$gratuity', '$nominee_aadhaar', '$created_on',' $user_id','$active')";
    $res = $mysqli->query($qry);
    echo "Data saved successfully";

}
if ($action == "update") {
    $user_id = $_SESSION['user_id'];
    $fam_id = $_POST['fam_id'];
    $name_of_member = $_POST['name_of_member'];
    $realtion_emp = $_POST['realtion_emp'];
    $residing = $_POST['residing'];
    $address = $_POST['address'];
    $dependent_emp = $_POST['dependent_emp'];
    $pf_nominee = $_POST['pf_nominee'];
    $esi_nominee = $_POST['esi_nominee'];
    $gratuity = $_POST['gratuity'];
    $nominee_aadhaar = $_POST['nominee_aadhaar'];
    $updated_on = date("Y-m-d H:i:s");

    $qry = "UPDATE tb_famliy_emp SET member_name='$name_of_member', realtion_with_emp='$realtion_emp', residing_with_emp='$residing', address='$address', dependent_on_emp='$dependent_emp', pf_nominee='$pf_nominee', esi_nominee='$esi_nominee', gratuity_nominee='$gratuity',nominee_aadhaar_card='$nominee_aadhaar',updated_on='$updated_on',updated_by='$user_id',last_login='$user_id' WHERE id=$fam_id";
 $res = $mysqli->query($qry);
    echo "Data updated successfully";

} 

if ($action == "del") {
    $fam_id = $_POST['fam_id'];

    $qry = "UPDATE `tb_famliy_emp` SET `active`='0', `updated_by`='',`updated_on`='" . date("Y-m-d H:i:s") . "' WHERE  id = '" . $fam_id . "'";
    $res = $mysqli->query($qry);

    echo "Data deleted successfully";

}  
?>