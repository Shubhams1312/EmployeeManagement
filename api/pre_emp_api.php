<?php  

include "../db/db.php"; 
$action = $_POST['action'];
 
if (!isset($_SESSION['username']) || $_SESSION['username'] == "") {header('Location:login.php');} 
  
if($action == "add"){
  $user_id = $_SESSION['user_id'];
  $emp_id = $_REQUEST['emp_id'];
  $name_emp = $_POST['employer_name'];
  $emp_add = $_POST['add'];
  $join_date = $_POST['join_date'];
  $leave_date = $_POST['leave_date'];
  $salary_drawn = $_POST['last_salary'];
  $department = $_POST['department'];
  $designation = $_POST['designation'];
  $job_profile = $_POST['job_profile'];
  $created_on = date('Y-m-d H:i:s');
  $active = 1;
    
        $qry = "INSERT INTO tb_previous_emp(emp_id,name_employer,address,join_date, leave_date,salary_drawn,department,designation,job_profile,created_by,created_on,active,last_login)VALUES('$emp_id','$name_emp','$emp_add','$join_date','$leave_date',' $salary_drawn','$department','$designation',' $job_profile','$user_id','$created_on','$active','$user_id')";
    
    $res = $mysqli->query($qry);
    echo  "Data stored ";
    
    }  
  
    if($action =="update"){
      $user_id = $_SESSION['user_id'];
      $id = $_POST['id'];
      $emp_id = $_POST['emp_id'];
      $name_emp = $_POST['employer_name'];
      $emp_add = $_POST['add'];
      $join_date = $_POST['join_date'];
      $leave_date = $_POST['leave_date'];
      $salary_drawn = $_POST['last_salary'];
      $department = $_POST['department'];
      $designation = $_POST['designation'];
      $job_profile = $_POST['job_profile'];
      $updated_on = date("Y-m-d H:i:s");
  
       $qry = "UPDATE tb_previous_emp SET name_employer='$name_emp', address='$emp_add', join_date='$join_date', leave_date='$leave_date', salary_drawn='$salary_drawn', department='$department', designation='$designation', job_profile='$job_profile',updated_by='$user_id',updated_on='$updated_on',last_login='$user_id' WHERE id='$id' AND emp_id='$emp_id'";

       $res = $mysqli->query($qry); 
           echo "Data updated successfully.";
        

    }
    if ($action == "del") {
      $user_id = $_SESSION['user_id'];
      $id = $_POST['id'];
      $updated_on = date("Y-m-d H:i:s");
       
   $qry = "UPDATE `tb_previous_emp` SET `active`='0',updated_by='$user_id',updated_on='$updated_on' where id=$id";
      $res = $mysqli->query($qry);
  
      echo "Data deleted successfully";
  
  }
    
  ?>