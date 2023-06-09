<?php  

include "../db/db.php"; 

 
if (!isset($_SESSION['username']) || $_SESSION['username'] == "") {header('Location:login.php');}
    $user_id = $_SESSION['user_id'];
  

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
$created_on = date('Y-m-d H:i:s'); 
  
   
if($title){ 
 

    $qry_saving = "INSERT INTO tb_emp_details(title,first_name,middle_name,last_name,gender,dob,blood_group,education_qualification,professional_qualification,religion,marital,spouse,anniversary,father_name,pancard,add_line1,add_line2,add_line3,add_line4,permanent_add_line1,permanent_add_line2,permanent_add_line3,permanent_add_line4,personal_email,telephone,mobile_no,driving_licence,dl_expiry,passport_no,passport_expiry,aadhar_card,visa,visa_type,visa_expiry,voter_id,disability,disability_percentage,worker_type,child_education,child_in_hostel,nationality,active,created_on,created_by)VALUES ('$title','$first_name','$middle_name','$last_name','$gender','$dob','$blood_g','$qualification', '$prof_qualification','$religion','$marital','$spouse','$anniversary','$father_name','$pancard','$correspondence_add','$correspondence_city','$correspondence_pincode','$correspondence_state','$permanent_add','$permanent_city','$permanent_pincode','$permanent_state','$personal_email','$telephone','$mobile_no','$driving_licence','$dl_expiry ','$passport_no','$passport_expiry','$aadhar_card','$visa','$visa_type','$visa_expiry','$voter_id','$disability','$disability_percentage','$worker_type','$child_education','$child_in_hostel','$nationality','$active','$created_on','$user_id')"; 
    //$res_album = $mysqli->query($qry_album);
    $res_album = $mysqli->query($qry_saving); 
    $insert_id = $mysqli->insert_id;
    echo $insert_id;
    }
else{
    echo"not store";
}
?> 