<?php
/* 	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL); */

include "./db/db.php";  
if (!isset($_SESSION['username']) || $_SESSION['username'] == "") {header('Location:login.php');}
  
$data = file_get_contents("http://localhost/hr_management/api/state_master_api.php");
$states = json_decode($data, true);

$url = explode("?", $_SERVER['REQUEST_URI']);   

$qry = "SELECT `id`, `title`, `first_name`, `middle_name`, `last_name`, `gender`, `dob`, `blood_group`, `education_qualification`, `professional_qualification`, `religion`, `marital`, `spouse`, `anniversary`, `father_name`, `pancard`, `add_line1`, `add_line2`, `add_line3`, `add_line4`, `permanent_add_line1`, `permanent_add_line2`, `permanent_add_line3`, `permanent_add_line4`, `personal_email`, `telephone`, `mobile_no`, `driving_licence`, `dl_expiry`, `passport_no`, `passport_expiry`, `aadhar_card`, `visa`, `visa_type`, `visa_expiry`, `voter_id`, `disability`, `disability_percentage`, `worker_type`, `child_education`, `child_in_hostel`, `nationality`, `active`, `created_by`, `created_on`, `updated_by`, `updated_on` FROM `tb_emp_details` WHERE id = '".$url[1]."'";
$res = $mysqli->query($qry);
if($res->num_rows > 0){
    $row = $res->fetch_assoc();
  
}else{ 
    echo "Access Denied";
    exit;
}

 
?>

<!DOCTYPE html>  
<html lang="en">
<!--<![endif]-->
<!-- BEGIN HEAD --> 
<head>
	<meta charset="utf-8" /> 
	 
	<?php include "./includes/css_file.php"?>
	<style>
		.mt-widget-2 .mt-body .mt-body-title{margin-top: 30px;}
		.mt-widget-2 .mt-body .mt-body-description {margin-top: 0px;}
		p { margin:10px;}
		.shadows:hover { box-shadow: 3px 5px 11px 0px;  transition: 0.7s;}
		.btn.btn-outline.dark {
			border-color: #939393;
			color: #fff;
			background-color: #939393;
			
			
		}
		.btn.btn-outline.dark.active, .btn.btn-outline.dark:active, .btn.btn-outline.dark:active:focus, .btn.btn-outline.dark:active:hover, .btn.btn-outline.dark:focus, .btn.btn-outline.dark:hover {
			border-color: #939393;
			color: #939393;
			background: 0 0;
		}
		
		.modal{
			z-index: 11;   
		}
		
		.modal-backdrop{
			z-index: 10;        
			}​
			.page-header{
				background-color:black;
			}
			.form-group {
				margin-bottom: 5px; /* adjust as per your requirement */
				padding: 5px; /* adjust as per your requirement */
			}
			.update {
				text-decoration: none;
				display: inline-block;
				padding: 8px 16px;
			
				}

				.update:hover {
				background-color: #ddd;
				color: black;
				}
				.update {
				background-color: #04AA6D;
				color: white;
				} 
				 
		</style>
	</head>
	<!-- END HEAD -->
	

	<body class="page-header-fixed page-sidebar-closed-hide-logo page-content-white page-full-width" >
		
		<div class="page-wrapper">
			<!-- BEGIN HEADER -->
			<?php include "./includes/top_menu_master.php"; ?>
			
			<!-- END HEADER -->
			<!-- BEGIN HEADER & CONTENT DIVIDER -->
			<div class="clearfix"> </div>
			<!-- END HEADER & CONTENT DIVIDER -->
			<!-- BEGIN CONTAINER -->
			<div class="page-container" > 
				<!-- BEGIN CONTENT -->
				<div class="page-content-wrapper">
					<!-- BEGIN CONTENT BODY -->
					<div class="page-content" >
						<!-- BEGIN PAGE HEADER--> 
						<!-- BEGIN PAGE BAR -->
						<div class="page-bar">
							<ul class="page-breadcrumb">
								<li>
									<a href="master_data.php">Home</a>  
								</li> 
							</ul> 
						</div>
						 
 		 
					 <?php //} ?>
						<div class="clearfix"> </div>
						<?php
						//if ($_SESSION['user_type']!= '3') {
							?>
							<!-- <div class="row">
								<div class="col-md-12 ">
									<div class="note note-info" style="border-color: #939393;background-color:#f9f9f9; padding: 10px 22px 10px 10px;">
										<button type="button" class="btn dark btn-outline add_album" data-toggle="modal" href="#basic">Add Album <i class="fa fa-folder-o"></i></button>
										<a class="btn dark btn-outline"   href="upload_file.php">Upload Image <i class="fa fa-folder-o"></i></a>
									</div>
								</div>
								
							</div>  -->
							<form>
								<input type="hidden" id ="emp_data" value="<?php echo $row['id']; ?>">
							<div class ="row mt-2">
							<div class="form-group">
								<label  class="col-sm-2 control-label">Employee Name</label>
									<div class="col-sm-1"> 
									<select id="employee_name" name="status" class="form-control  input-sm" required>
											 
											 <option value="0"<?php if($row['title'] == "0"){echo "selected";}?> >Mr.</option>
											 <option value="1"<?php if($row['title'] == "1"){echo "selected";}?>>Ms.</option>
											 <option value="2"<?php if($row['title'] == "2"){echo "selected";}?>>Mrs.</option>
										 </select>
									</div> 
									<div class="col-sm-3">
										<input type="text" class="form-control" id="first_name" placeholder="Please enter First name" value='<?php echo  $row['first_name'];?>'  required>
									</div>
									<div class="col-sm-3">
										<input type="text" class="form-control" id="middle_name" placeholder="Please enter middle name" value='<?php echo  $row['middle_name'];?>' required>
									</div>
									<div class="col-sm-3">
										<input type="text" class="form-control" id="last_name" placeholder="Please enter last name" value='<?php echo  $row['last_name'];?>' required>
									</div>				 
							</div>
							</div>
							<div class="row">
								<div class="form-group">
									<label class="col-sm-2 control-label">Gender</label>
										<div class="col-sm-2">
											<select id="gender" name="gender" class="form-control input-sm" required>
												<option value="">--Select--</option>
												<option value="male"<?php if($row['gender'] == "Male"){echo "selected";}?>>Male</option>
												<option value="female"<?php if($row['gender'] == "Female"){echo "selected";}?>>Female</option>
												<option value="other"<?php if($row['gender'] == "Other"){echo "selected";}?>>Other</option>
											</select>
										</div>

									<label class="col-sm-2 control-label">Date of Birth</label>
									<div class="col-sm-2">
									<input type="date" class="form-control" id="dob" value='<?php echo  $row['dob'];?>' required>
									</div>
								
										<label class="col-sm-2 control-label">Blood Group</label>
											<div class="col-sm-2"> 
											<select id="blood_g" name="blood_g" class="form-control" >
												<option value="">Select</option>
												<option value="A+"<?php if($row['blood_group'] == "A+"){echo "selected";}?>>A+</option>
												<option value="A-"<?php if($row['blood_group'] == "A-"){echo "selected";}?>>A-</option>
												<option value="B+"<?php if($row['blood_group'] == "B+"){echo "selected";}?>>B+</option>
												<option value="B-"<?php if($row['blood_group'] == "B-"){echo "selected";}?>>B-</option>
												<option value="O+"<?php if($row['blood_group'] == "O+"){echo "selected";}?>>O+</option>
												<option value="O-"<?php if($row['blood_group'] == "O-"){echo "selected";}?>>O-</option>
												<option value="AB+"<?php if($row['blood_group'] == "AB+"){echo "selected";}?>>AB+</option>
												<option value="AB-"<?php if($row['blood_group'] == "AB-"){echo "selected";}?>>AB-</option>
											</select>
											</div> 
								</div>
							</div> 
							<div class="row">
								<div class = "form-group" >
									<label class="col-sm-2 control-label">Edu Qualification</label>
											<div class="col-sm-2"> 
											<input type="text" class="form-control" id="qualification" value='<?php echo  $row['education_qualification'];?>' required>
											</div> 

									<label class="col-sm-2 control-label" >prof Qualification</label>
									<div class="col-sm-2">
									<input type="text" class="form-control" id="prof_qualification" value='<?php echo  $row['professional_qualification'];?>'>
									</div>

									<label class="col-sm-2 control-label" >Religion</label>
									<div class="col-sm-2">
									<input type="text" class="form-control" id="religion" value='<?php echo  $row['religion'];?>'>
									</div>

								</div>

							</div>
							<div class="row">
								<div class="form-group">
								<label class="col-sm-2 control-label">Marital</label>
											<div class="col-sm-2"> 
											<select id="marital" name="marital" class="form-control input-sm" required>
												<option value="">--Select--</option>
												<option value="single"<?php if($row['marital'] == "Single"){echo "selected";}?>>Single</option>
												<option value="married"<?php if($row['marital'] == "Married"){echo "selected";}?>>Married</option>
											</select>
											</div> 
								<label class="col-sm-1 control-label" >Spouse</label>
									<div class="col-sm-3">
									<input type="text" class="form-control" id="spouse" value="<?php echo $row['spouse']; ?>"  disabled="disabled">
									</div>

								<label class="col-sm-2 control-label" >Anniversary</label>
									<div class="col-sm-2">
									<input type="date" class="form-control" id="anniversary" value="<?php echo $row['anniversary'];?>" disabled="disabled">
									</div>
								</div>
							</div>

							<div class= "row">
								<div class ="form-group">
									<label class="col-sm-2 control-label" >Father's full name</label>
										<div class="col-sm-4">
										<input type="text" class="form-control" id="f_name" value="<?php echo $row['father_name'];?>" required>
										</div>

									<label class="col-sm-1 control-label" >Pan Card</label>
									<div class="col-sm-4">
									<input type="text" class="form-control" id="p_card" value="<?php echo $row['pancard'];?>" required>
									</div> 

									</div>
									
								</div> 

							<div class ="row">
								<div class = "form-group">
									<label class="col-sm-2 control-label" >Add. of Correspondence</label>
										<div class="col-sm-4">
										<textarea type="text" class="form-control" id="c_add" value=""><?php echo $row['add_line1']; ?></textarea>
										</div>

									<label class="col-sm-1 control-label" >Permanent Add.</label>
                                    <div class="col-sm-3">
                                     <input type="checkbox" id="same_address"> Same as Correspondence Address
                                    </div>
										<div class="col-sm-4">
										<textarea type="text" class="form-control" id="p_add" value=""><?php echo $row['permanent_add_line1']; ?></textarea>
										</div>

								</div>
							</div>
							<div class="row">
								<div class="form-group">
									<label class="col-sm-2 control-label">City</label>
										<div class="col-sm-2">
											<input type="text" class="form-control" id="c_city" value="<?php echo $row['add_line2']; ?>">
										</div>

									<label class= "col-sm-1 control-label">pincode</label>
										<div class="col-sm-1">
											<input type="text" class="form-control" id="pincode" value="<?php echo $row['add_line3']; ?>">
										</div>	

									<label class="col-sm-1 control-label">City</label>
										<div class="col-sm-2">
											<input type="text" class="form-control" id="p_city" value="<?php echo $row['permanent_add_line2']; ?>">
										</div>

									<label class= "col-sm-1 control-label">pincode</label>
										<div class="col-sm-1">
											<input type="text" class="form-control" id="p_pincode" value="<?php echo $row['permanent_add_line3']; ?>" required>
										</div>	
								</div>
							</div>

							<div class= "row">
								<div class ="form-group">
									<label class="col-sm-2 control-label" >State</label>
										<div class="col-sm-4">
											<select name="c_state" class="form-control" id="c_state">
												<option value="">-- Select --</option>
												<?php  
												if ($states['result'] == 'true') {
														foreach ($states['data'] as $key => $val) {
															$selected = ($val['state_name'] == $row['add_line4']) ? 'selected' : '';
															echo "<option value='" . $val['state_name'] . "'$selected>" . $val['state_name'] . "</option>";
														}
													} 
												?> 
											</select>
										</div>
 
									<label class="col-sm-1 control-label" >State </label>
									<div class="col-sm-4">
									<input type="text" class="form-control" id="p_state" value="<?php echo $row['permanent_add_line4'];?>" required>
									</div> 

									</div>
									
								</div>

								<div class= "row">
								<div class ="form-group">
									<label class="col-sm-2 control-label" >Personal E-mail</label>
										<div class="col-sm-4">
										<input type="text" class="form-control" id="p_email" value="<?php echo $row['personal_email']; ?>">
										</div>

									<label class="col-sm-1 control-label" >Telephone </label>
										<div class="col-sm-2">
										<input type="text" class="form-control" id="telephone" value="<?php echo $row['telephone']; ?>">
										</div> 

									<label class="col-sm-1 control-label" >Mobile No.</label>
										<div class="col-sm-2">
										<input type="text" class="form-control" id="mobile" value="<?php echo $row['mobile_no']; ?>">
										</div> 

									</div>
									
								</div>
                            	<div class="row">
								<div class="form-group">
									<label class="col-sm-2 control-label">Driving Licence</label>
										<div class="col-sm-1"> 
                                         <input type="text" class="form-control" id="driving_licence" value="<?php echo $row['driving_licence']; ?>">
										</div>

									<label class="col-sm-1 control-label">Expiry</label>
									<div class="col-sm-2">
									<input type="date" class="form-control" id="dl_expiry" value="<?php echo $row['dl_expiry']; ?>">
									</div>
								
									<label class="col-sm-1 control-label">Passport No.</label>
											<div class="col-sm-2">
											<input type="text" class="form-control" id="passport_no" value="<?php echo $row['passport_no']; ?>">
											</div> 

                                    <label class="col-sm-1 control-label">Expiry</label>
									<div class="col-sm-2">
									<input type="date" class="form-control" id="passport_expiry" value="<?php echo $row['passport_expiry']; ?>">
									</div>
								</div>
							</div> 



							<div class="row">
								<div class="form-group">
									<label class="col-sm-2 control-label">Aadhar Card</label>
										<div class="col-sm-2">
											<input type="text" class="form-control" id="aadhar_card" value="<?php echo $row['aadhar_card']; ?>">
										</div>

									<label class= "col-sm-1 control-label">Visa No.</label>
										<div class="col-sm-1">
											<input type="text" class="form-control" id="visa" value="<?php echo $row['visa']; ?>">
										</div>	

									<label class="col-sm-1 control-label">Visa Type</label>
										<div class="col-sm-2">
											<input type="text" class="form-control" id="visa_type" value="<?php echo $row['visa_type']; ?>">
										</div>

									<label class= "col-sm-1 control-label">Expiry</label>
										<div class="col-sm-2">
											<input type="date" class="form-control" id="visa_expiry" value="<?php echo $row['visa_expiry']; ?>">
										</div>	
								</div>
							</div>

							<div class="row">
								<div class="form-group">
									<label class="col-sm-2 control-label">Voter Id</label>
										<div class="col-sm-2">
											<input type="text" class="form-control" id="voter_id" value="<?php echo $row['voter_id']; ?>">
										</div>

									<label class= "col-sm-1 control-label">Disability</label>
										<div class="col-sm-1">
											 
											<select id="disability" name="disability" class="form-control" >
												<option value="">Select</option>
												<option value="low vision" <?php if($row['disability'] == "low vision"){echo "selected";}?>>Low Vision</option>
												<option value="leprosy cured"<?php if($row['disability'] == "leprosy cured"){echo "selected";}?>>Leprosy Cured</option>
												<option value="hearing impaired"<?php if($row['disability'] == "hearing impaired"){echo "selected";}?>>Hearing Impaired</option>
												<option value="loco motor disability"<?php if($row['disability'] == "loco motor disability"){echo "selected";}?>>Loco motor Disability</option>
												<option value="mental illness"<?php if($row['disability'] == "mental illness"){echo "selected";}?>>Mental illness</option>
												<option value="mentally retarded"<?php if($row['disability'] == "mentally retarded"){echo "selected";}?>>Mentally Retarded</option>
											</select>
										</div>	

									<label class="col-sm-1 control-label">Disability</label>
										<div class="col-sm-1">
											<input type="number" class="form-control" id="disability_p" disabled="disabled" value="<?php echo $row['disability_percentage']; ?>">
										</div>

									<label class= "col-sm-2 control-label">Worker Type</label>
										<div class="col-sm-2">
											<input type="text" class="form-control" id="worker_type" value="<?php echo $row['worker_type']; ?>">
										</div>	
								</div>
							</div>
							<div class="row">
								<div class="form-group">
									<label class="col-sm-2 control-label">Child in Education</label>
										<div class="col-sm-1">
											<input type="number" class="form-control" id="child_education" value="<?php echo $row['child_education']; ?>">
										</div>

									<label class= "col-sm-2 control-label">Child in Hostel</label>
										<div class="col-sm-1"> 
										<input type="number" class="form-control" id="child_in_hostel" value="<?php echo $row['child_in_hostel']; ?>">
										</div>	

									<label class="col-sm-1 control-label">Nationality</label>
										<div class="col-sm-3"> 
											<select id="nationality" class="form-control" required>
												<option value="india" <?php if($row['nationality'] == "India"){echo "selected";}?> >India</option>
												 
											</select>
										</div> 	
								</div>
							</div>

						</form> <div class="btn_update"> <button  class="update">Update </button></div>

							<?php
						//}
						?>
						 					
						</div>
						<!-- END CONTENT BODY -->
					</div>
					<!-- END CONTENT -->
					
				</div>
				<!-- END CONTAINER -->
				
				<!-- BEGIN FOOTER -->
				<?php include "./includes/footer.php"; ?>
				<!-- END FOOTER -->
				
			</div>
			
        <!--[if lt IE 9]>
 
        <![endif]-->
        <!-- BEGIN CORE PLUGINS -->
		
        <?php include "./includes/js_file.php"; ?>
        <!-- END THEME LAYOUT SCRIPTS -->
     </body>


     </html>
     <script type="text/javascript">
     	$(document).ready(function() { 
     		/*----------Album Popup Create-----------------*/
     		$(".update").click(function(){

				var id = $('#emp_data').val();  
			    var title = $('#employee_name option:selected').text();  
				var first_name = $('#first_name').val(); 
				var middle_name = $('#middle_name').val();
				var last_name = $('#last_name').val(); 

				var gender = $('#gender option:selected').text();
				var dob = $('#dob').val();
				var blood_g = $('#blood_g option:selected').val();
				var qualification = $('#qualification').val();
				var prof_qualification = $('#prof_qualification').val();
				var religion = $('#religion').val(); 
				var marital = $('#marital option:selected').text();
				var spouse = $('#spouse').val();
				var anniversary = $('#anniversary').val();
				var father_name = $('#f_name').val();
				var pancard = $('#p_card').val(); 
				
				var correspondence_add = $('#c_add').val();  
				var correspondence_city =$('#c_city').val();  
				var correspondence_pincode =$('#pincode').val(); 
				var correspondence_state = $('#c_state option:selected').text();
 
				var permanent_add = $('#p_add').val();  
				var permanent_city =$('#p_city').val();  
				var permanent_pincode =$('#p_pincode').val(); 
				var permanent_state = $('#p_state').val();  
 
				var personal_email = $('#p_email').val(); 
				var telephone = $('#telephone').val(); 
				var mobile_no = $('#mobile').val(); 
                var driving_licence = $('#driving_licence').val();
                var dl_expiry = $('#dl_expiry').val();
                var passport_no =$('#passport_no').val();
                var passport_expiry = $('#passport_expiry').val();
				var aadhar_card =$('#aadhar_card').val(); 
				var visa =$('#visa').val(); 
				var visa_type = $('#visa_type').val(); 
				var visa_expiry = $('#visa_expiry').val(); 
				var voter_id = $('#voter_id').val(); 
				var disability = $('#disability option:selected').text(); 
				var disability_percentage = $('#disability_p').text(); 
				var worker_type = $('#worker_type').val(); 
				var child_education = $('#child_education').val(); 
				var child_in_hostel = $('#child_in_hostel').val(); 
				var nationality = $('#nationality option:selected').text();  

				if(first_name ==""){alert("Please enter your first name"); return;}
				if(middle_name == ""){alert("Please enter your middle name"); return;}
				if(last_name == ""){alert("Please enter your last name"); return;}
				if(gender == ""){alert("Please select gender"); return;}
				if(dob == ""){alert("Please enter date of birth"); return;}
				if(blood_g == ""){alert("Please enter your blood group"); return;}
				if(qualification == ""){alert("Please enter your qualification"); return;}
				if(prof_qualification == ""){alert("Please enter your professional qualification"); return;}
				if(religion == ""){alert("Please enter your  religion"); return;}
				if(marital == ""){alert("Please select marital status"); return;}
				//if(spouse == ""){alert("Please enter your middle name"); return;}
				//if(anniversary == ""){alert("Please enter your middle name"); return;}
				if(pancard == ""){alert("Please enter your pancard number"); return;}
				if(correspondence_add == ""){alert("Please enter your correspondence address"); return;}
				if(correspondence_city == ""){alert("Please enter your correspondence city"); return;}
				if(correspondence_pincode == ""){alert("Please enter your correspondence pincode"); return;}
				if(correspondence_state == ""){alert("Please enter your correspondence state"); return;}
				if(permanent_add == ""){alert("Please enter your permanent address"); return;}
				if(permanent_city == ""){alert("Please enter your permanent city"); return;}
				if(permanent_pincode == ""){alert("Please enter your permanent pincode"); return;}
				if(permanent_state == ""){alert("Please enter your permanent state"); return;}
				if(personal_email == ""){alert("Please enter your personal email address"); return;}
				if(telephone == ""){alert("Please enter your  telephone"); return;}
				
				if(mobile_no == ""){alert("Please enter your mobile number"); return;}
				if(driving_licence == ""){alert("Please enter your driving licence's number"); return;}
				if(dl_expiry == ""){alert("Please enter your  driving licence's expiry date"); return;}
				if(passport_no == ""){alert("Please enter your passport number"); return;}
				if(passport_expiry == ""){alert("Please enter your passport's expiry date"); return;}
				if(aadhar_card == ""){alert("Please enter your aadhar card"); return;}
				if(visa == ""){alert("Please enter your visa number"); return;}
				if(visa_type == ""){alert("Please enter your visa type"); return;}
				if(visa_expiry == ""){alert("Please enter your visa expiry date"); return;}
				if(voter_id == ""){alert("Please enter your voter id"); return;}
				if(disability == ""){alert("Please select disability"); return;}
				//if(disability_percentage == ""){alert("Please enter your middle name"); return;}
				if(worker_type == ""){alert("Please enter worker type "); return;}
				if(child_education == ""){alert("Please enter your child's education"); return;}
				if(child_in_hostel == ""){alert("Please enter   child in hostel"); return;}
				if(nationality == ""){alert("Please select your  nationality"); return;}

     			$.ajax({
     				type: 'POST',
     				data: {	
					id:id,
					title:title,
					first_name:first_name,
					middle_name:middle_name,
					last_name:last_name,
					gender: gender,
					blood_g:blood_g,
					dob: dob,
					qualification:qualification,
					prof_qualification:prof_qualification,
					religion:religion,
					marital:marital,
					spouse:spouse,
					anniversary:anniversary,
					father_name:father_name,
					pancard:pancard,

					correspondence_add:correspondence_add,
					correspondence_city:correspondence_city,
					correspondence_pincode:correspondence_pincode,
					correspondence_state:correspondence_state,

					permanent_add:permanent_add,
					permanent_city:permanent_city,
					permanent_pincode:permanent_pincode,
					permanent_state:permanent_state,

					personal_email:personal_email,
					telephone:telephone,
					mobile_no:mobile_no,

                    driving_licence:driving_licence,
                    dl_expiry:dl_expiry,
                    passport_no:passport_no,
                    passport_expiry:passport_expiry,

					aadhar_card:aadhar_card,
					visa:visa,
					visa_type:visa_type,
					visa_expiry:visa_expiry,
					voter_id:voter_id,
					disability:disability,
					disability_percentage:disability_percentage,
					worker_type:worker_type,
					child_education:child_education,
					child_in_hostel:child_in_hostel,
					nationality:nationality
					} ,
     				url: '/hr_management/api/emp_update_api.php',
     				success: function(data)
     				{ 	 
						alert("updated successfully");  
     				}
     			});
     		});

            $("#marital").change(function () {
            if ($(this).val() == "married") {
				if($('#spouse').val() == " "){
					alert("Please enter your anniversary date");
				}else{
                $("#anniversary").removeAttr("disabled");
                $("#anniversary").focus();
                $("#spouse").removeAttr("disabled");
                $("#spouse").focus();
				}
            } else {
                $("#anniversary").attr("disabled", "disabled");
                $("#spouse").attr("disabled", "disabled");
            }
        }); 
             $("#disability").change(function () {
            if ($(this).val() != "" ) {
                $("#disability_p").removeAttr("disabled");
                $("#disability_p").focus(); 
            } else {
                $("#disability_p").attr("disabled", "disabled"); 
            }
        });






            $('#same_address').click(function() {
            if ($(this).is(':checked')) {
                var c_add = $('#c_add').val(); $('#p_add').val(c_add);
                var c_city = $('#c_city').val(); $('#p_city').val(c_city);
                var pincode = $('#pincode').val();  $('#p_pincode').val(pincode);
                var state = $('#c_state').val(); $('#p_state').val(state);
            } 
            else {
                 $('#p_add').val('');
                 $('#p_city').val('');
                 $('#p_pincode').val('');
            }
        });

         $('#c_add').keyup(function() {
            if ($('#same_address').is(':checked')) {
                var c_add = $(this).val();
                $('#p_add').val(c_add); 
            }
        });

        $('#c_city').keyup(function() {
            if ($('#same_address').is(':checked')) {
                var c_city = $(this).val();
                $('#p_city').val(c_city); 
            }
        });

        $('#pincode').keyup(function() {
            if ($('#same_address').is(':checked')) {
                var pincode = $(this).val();
                $('#p_pincode').val(pincode); 
            }
        });

        $('#c_state').keyup(function() {
            if ($('#same_address').is(':checked')) {
                var state = $(this).val();
                $('#p_state').val(state); 
            }
        });




     	});

     </script>




     