<?php  

include "../db/db.php"; 

//if (!isset($_SESSION['username']) || $_SESSION['username'] == "") {header('Location:login.php');
    //$_SESSION['userid']= $_POST['userid'];

$emp_id = $_REQUEST['id'];    
$title = $_REQUEST['title']; 
$first_name = $_REQUEST['first_name']; 
$middle_name = $_REQUEST['middle_name']; 
$last_name = $_REQUEST['last_name']; 
$blood_g = $_REQUEST['blood_g'];
$gender = $_REQUEST['gender']; 
$dob = $_REQUEST['dob']; 
$blood_g = $_REQUEST['blood_g'];
$qualification = $_REQUEST['qualification']; 
$prof_qualification = $_REQUEST['prof_qualification']; 
$religion = $_REQUEST['religion']; 
$marital = $_REQUEST['marital']; 
$spouse = $_REQUEST['spouse']; 
$anniversary = $_REQUEST['anniversary']; 
$father_name = $_REQUEST['father_name']; 
$pancard = $_REQUEST['pancard']; 

$correspondence_add = $_REQUEST['correspondence_add'];
$correspondence_city = $_REQUEST['correspondence_city'];

$correspondence_pincode =$_REQUEST['correspondence_pincode']; 
$correspondence_state = $_REQUEST['correspondence_state']; 

$permanent_add = $_REQUEST['permanent_add'];
$permanent_city = $_REQUEST['permanent_city'];
$permanent_pincode = $_REQUEST['permanent_pincode'];
$permanent_state = $_REQUEST['permanent_state'];

$personal_email = $_REQUEST['personal_email']; 
$telephone = $_REQUEST['telephone']; 
$mobile_no = $_REQUEST['mobile_no']; 

$driving_licence = $_REQUEST['driving_licence']; 
$dl_expiry = $_REQUEST['dl_expiry']; 
$passport_no = $_REQUEST['passport_no']; 
$passport_expiry = $_REQUEST['passport_expiry']; 

$aadhar_card = $_REQUEST['aadhar_card']; 
$visa = $_REQUEST['visa']; 
$visa_type = $_REQUEST['visa_type']; 
$visa_expiry = $_REQUEST['visa_expiry']; 
$voter_id = $_REQUEST['voter_id']; 
$disability = $_REQUEST['disability']; 
$disability_percentage = $_REQUEST['disability_percentage']; 
$worker_type = $_REQUEST['worker_type']; 
$child_education = $_REQUEST['child_education']; 
$child_in_hostel = $_REQUEST['child_in_hostel']; 
$nationality = $_REQUEST['nationality']; 
$active = 1;
//$created_by = $_REQUEST[''];
//$created_on = date('Y-m-d H:i:s');
// $updated_by = $_REQUEST[''];
 $updated_on = date('Y-m-d H:i:s');
   
    $qry_update = "UPDATE tb_emp_details SET title='$title', first_name='$first_name', middle_name='$middle_name', last_name='$last_name', gender='$gender', dob='$dob', blood_group='$blood_g', education_qualification='$qualification', professional_qualification='$prof_qualification', religion='$religion', marital='$marital', spouse='$spouse', anniversary='$anniversary', father_name='$father_name', pancard='$pancard', add_line1='$correspondence_add', add_line2='$correspondence_city', add_line3='$correspondence_pincode', add_line4='$correspondence_state', permanent_add_line1='$permanent_add', permanent_add_line2='$permanent_city', permanent_add_line3='$permanent_pincode', permanent_add_line4='$permanent_state', personal_email='$personal_email', telephone='$telephone', mobile_no='$mobile_no', driving_licence='$driving_licence', dl_expiry='$dl_expiry', passport_no='$passport_no', passport_expiry='$passport_expiry', aadhar_card='$aadhar_card', visa='$visa', visa_type='$visa_type', visa_expiry='$visa_expiry', voter_id='$voter_id', disability='$disability', disability_percentage='$disability_percentage', worker_type='$worker_type', child_education='$child_education', child_in_hostel='$child_in_hostel', nationality='$nationality', active='$active', updated_on='$updated_on' WHERE id='$emp_id'";

    $res_update = $mysqli->query($qry_update); 
    
    if ($res_update) {
        echo "Data updated successfully";
    } else {
        echo "Error updating data: " . $mysqli->error;
    }

 
?> 