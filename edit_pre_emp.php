<?php 

include "./db/db.php";  
if (!isset($_SESSION['username']) || $_SESSION['username'] == "") {header('Location:login.php');}
 
	  
$data = file_get_contents("http://localhost/hr_management/api/pre_emp_view.php");
$res = json_decode($data, true);
 

 
 
$url = explode("?", $_SERVER['REQUEST_URI']);   

$qry = "SELECT * FROM `tb_previous_emp` WHERE id = '".$url[1]."'";

$emp_id = $url[2]; 
$res1 = $mysqli->query($qry);
if($res1->num_rows > 0){
    $row = $res1->fetch_assoc(); 
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
			#customers {
   font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
   border-collapse: collapse;
   width: 100%;
   margin-top: 20px;
   }
   #customers td, #customers th {
   border: 1px solid #ddd;
   padding: 5px;
   }
   #customers tr:nth-child(even){background-color: #f2f2f2;}
   #customers tr:hover {background-color: #ddd;}
   #customers th {
   padding-top: 5px;
   padding-bottom: 5px;
   text-align: left;
   background-color: #545d55;
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
						<section class="content">
						<div class="row"> 
						<div class="col-sm-12 lobipanel-parent-sortable ui-sortable" data-lobipanel-child-inner-id="cT3potbCGE">
							<div class="panel panel-bd lobidrag lobipanel lobipanel-sortable" data-inner-id="cT3potbCGE" data-index="0">
								<div class="panel-heading ui-sortable-handle"> 
								<div class="panel-body">
								<div class="row">
									<div method="" >
										<div class="col-md-4">
										<div class="row">
											<h2 style="background: #C0C0C0;margin: 0;font-size: 16px;font-weight:bold;padding:14px;color: #444; border-bottom: 1px solid #d7dfe3;">Details</h2>
											<br>
										</div>
										<div class="row">
											<div class="col-md-6">
												<div class="form-group">
													<label>Employer</label>
													<input type="hidden" id="emp_id" value="<?php echo $url[2] ;?>" >
                                                    <input type="hidden" id="pre_id" name="pre_id" value="<?php echo $row['id']; ?>">
													<input type="text" class="form-control  " name="employer" id="employer" value="<?php echo  $row['name_employer'];?>">
												</div>
											</div> 
											<div class="col-md-6">
												<div class="form-group">
													<label>Address</label>
													<input type="text" class="form-control  input-sm" name="address" id="address" value="<?php echo $row['address']; ?>">
												</div>
											</div>
										</div>
										
										<div class="row">
											<div class="col-md-6">
												<div class="form-group">
													<label>Join date </label>
													<div class="input-group date">
													<input id="join_date" type="date" name="join_date"  class="form-control hasDatepicker input-sm"  value="<?php echo $row['join_date']; ?>">
													 
													</div>
												</div>
											</div> 
											<div class="col-md-6">
												<div class="form-group">
													<label>Leave date</label>
													<div class="input-group date">
													<input id="leave_date" type="date" name="leave_date" class="form-control hasDatepicker input-sm"  value="<?php echo $row['leave_date']; ?>">
 
													</div>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-md-6">
												<div class="form-group">
													<label>Last Salary drawn</label>
													<input type="text" class="form-control  input-sm" name="last_salary" id="last_salary" value="<?php echo $row['salary_drawn']; ?>">
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label>Department</label>
													<input type="text" class="form-control  input-sm" name="department" id="department" value="<?php echo $row['department']; ?>">
												</div>
											</div>
										</div>

										<div class="row">
											<div class="col-md-6">
												<div class="form-group">
													<label>Designation </span></label>
													<input type="text" class="form-control  input-sm" name="designation" id="designation" value="<?php echo $row['designation']; ?>">
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label>Job Profile </span></label>
													<input type="text" class="form-control  input-sm" name="job_profile" id="job_profile" value="<?php echo $row['job_profile']; ?>">
												</div>
											</div> 
										</div>  
										<div class="row">
											<div class="col-md-4">
												<div class="form-group">
												    <button type="button" class="btn btn-success save-btn " id="save" >Update</button>   
                                    	        </div>
											</div>
										</div>
										</div>
										<div class="col-md-8" >
										<h2 style="background: #C0C0C0;margin: 0;font-size: 16px;font-weight:bold;padding:14px;color: #444; border-bottom: 1px solid #d7dfe3;">Experience</h2>
										<br>
										<div class="row">
											<div class="col-md-12">
												<table id="customers">
													<tr>
													<th style="width:1%;">Sr. no</th>
													<th style="width:10%;">Employer</th>
													<th style="width:15%;">Address</th>
													<th style="width:13%;">Join date</th>
													<th style="width:13%;">Leaving date</th>
													<th style="width:10%;">Last Salary drawn</th>
													<th style="width:10%;">department</th>
													<th style="width:10%;">Designation</th>
													<th style="width:10%;">Job Profile</th> 
													</tr> 
													<?php
                                                        if($res['result'] == 'true'){
                                                            $i=1;
                                                            foreach($res['data'] as $key => $val){
																if($val['id'] == $url[1]){
                                                        ?>
                                                            <tr>
                                                            <td><?php echo $i++; ?> </td>
                                                            <td><?php echo $val['employer']; ?></td>
                                                            <td><?php echo $val['add'] ;?></td>
                                                            <td><?php echo $val['join_date']; ?> </td>
                                                            <td><?php echo $val['leave_date']; ?> </td>
                                                            <td><?php echo $val['salary_drawn']; ?> </td>
                                                            <td><?php echo $val['department']; ?></td>
                                                            <td><?php echo $val['designation']; ?></td>
                                                            <td><?php echo $val['job_profile']; ?></td>
                                                            
                                                            </tr> 
                                                        <?php
																}
                                                            }
                                                        } else {
                                                            echo " <tr> <td colspan='4'> No Data Found</td>  </tr>";
                                                        }

													?>
												</table>
											</div>
										</div>
										<br>  
										</div>
									</div>
								</div>
							</div>
							</div>
						</div>
					</div>
				</div>
				</section>
				<!-- END CONTAINER -->
				
				<!-- BEGIN FOOTER -->
				<?php include "./includes/footer.php"; ?>
				<!-- END FOOTER -->
			 
			
        <!--[if lt IE 9]>
 
        <![endif]--> 
		
        <?php include "./includes/js_file.php"; ?>
        <!-- END THEME LAYOUT SCRIPTS -->
     </body>


     </html>
     <script type="text/javascript">
     	$(document).ready(function() { 
     		/*----------Album Popup Create-----------------*/
			 $("#save").click(function(){ 
            var id = $("#pre_id").val();
			var emp_id = $('#emp_id').val();
			var employer_name = $("#employer").val();
			var add = $("#address").val();
			var join_date = $("#join_date").val();
			var leave_date = $("#leave_date").val();
			var last_salary = $("#last_salary").val();
			var department = $('#department').val();
			var designation = $('#designation').val();
			var job_profile = $('#job_profile').val();
			

				$.ajax({
					url: '/hr_management/api/pre_emp_api.php',
					type: 'POST',
					data: {
						emp_id:emp_id,id:id,employer_name:employer_name,add:add, join_date:join_date,leave_date:leave_date,last_salary:last_salary,department:department,designation:designation,job_profile:job_profile, action:'update'
					},
					success: function(data) {
						alert(" Updated Successfully"); 
                        window.location = 'pre_emp.php?'+emp_id;

						
					},
					
					});

			}); 
		});

     </script>




     