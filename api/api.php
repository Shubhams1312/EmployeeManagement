<?php

include '../db/db.php';   
$action = $_POST['action'];

if($action == "doc"){
	$user_id = $_SESSION['user_id'];
	$emp_id = $_REQUEST['emp_id'];
	$id = $_REQUEST['id'];
	$name = $_REQUEST['val'];
	$created_on = date('Y-m-d H:m:s');
	$active =1;

	$data = json_decode(file_get_contents("php://input"), true);   
	$filename  = $emp_id."_".$name."_".str_replace(" ", "_", $_FILES['file']['name']);  
	$tempPath  =  $_FILES['file']['tmp_name'];
	$fileSize  =  $_FILES['file']['size'];
			
	if(empty($filename))
	{
		$errorMSG = json_encode(array("message" => "please select image", "status" => false));	
		echo $errorMSG;
	}
	else
	{
		$upload_path = '../images/document/'.$filename;   
		$fileExt = strtolower(pathinfo($filename,PATHINFO_EXTENSION));   
		$valid_extensions = array('pdf', 'jpg', 'png');  
		if(in_array($fileExt, $valid_extensions))
		{				 
			if(!file_exists($upload_path . $filename))
			{  
				if($fileSize < 5000000){
					move_uploaded_file($tempPath, $upload_path);  
				}
				else{		
					$errorMSG = json_encode(array("message" => "Sorry, your file is too large, please upload 5 MB size", "status" => false));	
					echo $errorMSG;
				}
			}
			else
			{		
				$errorMSG = json_encode(array("message" => "Sorry, file already exists check upload folder", "status" => false));	
				echo $errorMSG;
			}
		}
		else
		{		
			$errorMSG = json_encode(array("message" => "Sorry, only pdf, png, jpg files are allowed", "status" => false));	
			echo $errorMSG;		
		}
	} 
	if(!isset($errorMSG))
	{
		$query = "INSERT into tbl_image (emp_id,name,path,active,created_on,created_by) VALUES('$emp_id','$filename','$upload_path','$active','$created_on','$user_id')";
		$res_file = $mysqli->query($query);		 
		echo json_encode(array("message" => "file Uploaded Successfully", "status" => true));	 
	} 
} 
if($action == "profile"){ 
 
			$emp_id = $_POST['emp_id'];   
			$data = json_decode(file_get_contents("php://input"), true);   
			$filename  =  date('dmYHis').$_FILES['file']['name'];  
			$tempPath  =  $_FILES['file']['tmp_name'];
			$fileSize  =  $_FILES['file']['size']; 
			if(empty($filename))
			{
				$errorMSG = json_encode(array("message" => "please select image", "status" => false));	
				echo $errorMSG;
			}
			else
			{
				$upload_path = '../images/document/profile/'.$filename; 
				$fileExt = strtolower(pathinfo($filename,PATHINFO_EXTENSION)); 
				$valid_extensions = array('pdf','jpg','png');  
				if(in_array($fileExt, $valid_extensions))
				{				 
					if(!file_exists($upload_path))
					{ 
						if($fileSize < 5000000){
							move_uploaded_file($tempPath,$upload_path);   
						}
						else{		
							$errorMSG = json_encode(array("message" => "Sorry, your file is too large, please upload 5 MB size", "status" => false));	
							echo $errorMSG;
						}
					} 
				}
				else
				{		
					$errorMSG = json_encode(array("message" => "Sorry, only pdf,png,jpg files are allowed", "status" => false));	
					echo $errorMSG;		
				}
			} 
			if(!isset($errorMSG))
			{ 

				$query="UPDATE `tb_emp_details` SET `profile_pic` = '".$filename."' WHERE id='".$emp_id."' ";
					$res_file = $mysqli->query($query);	
					$imagePath = 'http://localhost/hr_management/images/document/profile/'.$filename;	
				echo "<img src='".$imagePath."' style='width:160px;'>";	
			}

	}

	 
if($action == "update_profile"){ 

	$user_id = $_SESSION['user_id'];
	$emp_id = $_POST['id'];
	$id = $_POST['pic_id'];
	$updated_on = date('Y-m-d H:m:s');
	$active = 1; 
	$data = json_decode(file_get_contents("php://input"), true);   
	$filename  = $emp_id."_". $_FILES['file']['name'];  
	$tempPath  =  $_FILES['file']['tmp_name'];
	$fileSize  =  $_FILES['file']['size']; 
	if(empty($filename))
	{
		$errorMSG = json_encode(array("message" => "please select image", "status" => false));	
		echo $errorMSG;
	}
	else
	{
		$upload_path = '../images/document/profile/'.$filename; 
		$fileExt = strtolower(pathinfo($filename,PATHINFO_EXTENSION)); 
		$valid_extensions = array('pdf','jpg','png');  
		if(in_array($fileExt, $valid_extensions))
		{				 
			if(!file_exists($upload_path))
			{ 
				if($fileSize < 5000000){
					move_uploaded_file($tempPath,$upload_path);   
				}
				else{		
					$errorMSG = json_encode(array("message" => "Sorry, your file is too large, please upload 5 MB size", "status" => false));	
					echo $errorMSG;
				}
			} 
		}
		else
		{		
			$errorMSG = json_encode(array("message" => "Sorry, only pdf,png,jpg files are allowed", "status" => false));	
			echo $errorMSG;		
		}
	}    
	if(!isset($errorMSG))
	{
		 
		$query="UPDATE `tbl_profile` SET `name` = '".$filename."', `path` = '".$upload_path."', `updated_on` = '".$updated_on."', `updated_by` = '".$user_id."', `last_login` = '".$user_id."' WHERE `id`='".$id."' AND emp_id='".$emp_id."' ";

		
		$res_file = $mysqli->query($query);	
			$imagePath = 'http://localhost/hr_management/images/document/profile/'.$filename;	
		//echo "<img src='".$imagePath."' style='width:160px;'>";	
		echo $emp_id."_".$id ;
	}

}
?>