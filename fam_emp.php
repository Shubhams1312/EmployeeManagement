<?php 

include "./db/db.php";  
if (!isset($_SESSION['username']) || $_SESSION['username'] == "") {header('Location:login.php');}
 
	  
$data = file_get_contents("http://localhost/hr_management/api/fem_api.php");
$res = json_decode($data, true);
  
$url = explode("?", $_SERVER['REQUEST_URI']); 
if(!isset($url[1])){
  echo "Accesss Denied";
  exit;
}
$qry = "SELECT * FROM tb_famliy_emp WHERE active ='1' AND emp_id ='$url[1]'"; 

$res2 = $mysqli->query($qry);
$arr = []; 
 if($res2->num_rows > 0){
	while($arr1 = $res2->fetch_assoc()){
	$arr[] = $arr1;

	}
 }
 $query = "SELECT * FROM `tb_emp_details`  WHERE active ='1' AND id = '".$url[1]."'";
$response = $mysqli->query($query);
if($response->num_rows > 0){
	
}
 
 else{
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
			<?php include "./includes/top.php"; ?>
			
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
													<label>Name of Member</label>
													<input type="hidden" id="emp_id" value="<?php echo $url[1] ;?>">
													<input type="text" class="form-control  input-sm" name="name_of_member" id="name_of_member" placeholder="Enter name of member">
												</div>
											</div> 

   								

											<div class="col-md-6">
												<div class="form-group">
													<label>Relation with Employee</label>
													<input type="text" class="form-control  input-sm" name="realtion_emp" id="realtion_emp" placeholder="Enter relation with employee">
												</div>
											</div>
										</div>
										<div class="row">
										<div class="col-md-6">
												<div class="form-group">
													<label>Residing with Employee</label>
													<input type="text" class="form-control  input-sm" name="residing" id="residing" placeholder="residing with employee">
												</div>
											</div> 
											<div class="col-md-6">
												<div class="form-group">
													<label>Address</label>
													<input type="text" class="form-control  input-sm" name="address" id="address" placeholder="Enter address">
												</div>
											</div>
										</div>
										<div class="row">
										
											<div class="col-md-6">
												<div class="form-group">
													<label>Dependent on Employee</label>
													<input type="text" class="form-control  input-sm" name="dependent_emp" id="dependent_emp" placeholder="dependent on employee "  >
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label>%age if P.F. Nominee</label>
													<input type="text" class="form-control  input-sm" name="pf_nominee" id="pf_nominee" placeholder="Enter %age if P.F. nominee"  >
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-md-6">
												<div class="form-group">
													<label>%age if E.S.I Nominee</span></label>
													<input type="text" class="form-control  input-sm" name="esi_nominee" id="esi_nominee" placeholder="Enter %age if E.S.I Nominee" >
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label>%age if gratuity Nominee</span></label>
													<input type="text" class="form-control  input-sm" name="gratuity" id="gratuity" placeholder="%age if gratuity nominee">
												</div>
											</div> 
										</div>  
										<div class="row">
											<div class="col-md-6">
												<div class="form-group">
													<label>Nominee Aadhaar Card</span></label>
													<input type="text" class="form-control  input-sm" name="nominee_aadhaar" id="nominee_aadhaar" placeholder="Nominee aadhaar card">
												</div>
											</div> 


											<div class="col-md-4">
												<div class="form-group">
													<br>
													<button type="button" class="btn btn-success save" id="save">Save</button> 
												</div>
											</div>
										</div>
										</div>
										<div class="col-md-8">
										<h2 style="background: #C0C0C0;margin: 0;font-size: 16px;font-weight:bold;padding:14px;color: #444; border-bottom: 1px solid #d7dfe3;">Experience</h2>
										<br> 
										<div class="row">
											<div class="col-md-12">
												<table id="customers">
												 <tr>
													<th style="width:1%;">Sr. no</th>
													<th style="width:8%;">Member name</th>
													<th style="width:5%;">Relation-ship</th>
													<th style="width:11%;">Residing with employee</th>
													<th style="width:11%;">Address</th>
													<th style="width:9%;">Dependent on Employee</th>
													<th style="width:10%;">%age if P.F. Nominee</th>
													<th style="width:10%;">%age if E.S.I. Nominee</th>
													<th style="width:10%;">%age if gratuity Nominee</th>
													<th style="width:10%;">Nominee Aadhaar Card</th> 
													<th style="width:6%;">Edit</th>
													<th style="width:5%;">Delete</th>			
												 </tr> 
													<?php
													if($arr){
														$i=1;
														foreach($arr as $key => $val){
													?>
														<tr><td><?php echo $i++; ?></td>
														<td><?php echo $val['member_name']; ?></td>
														<td><?php echo $val['realtion_with_emp'] ;?> </td>
														<td><?php echo $val['residing_with_emp']; ?> </td>
														<td><?php echo $val['address']; ?> </td>
														<td><?php echo $val['dependent_on_emp']; ?> </td>
														<td><?php echo $val['pf_nominee']; ?></td>
														<td><?php echo $val['esi_nominee']; ?></td>
														<td><?php echo $val['gratuity_nominee']; ?></td>
														<td><?php echo $val['nominee_aadhaar_card']; ?></td>
														<td><button class="btn btn-success btn-xs edit_btn" id="<?php echo $val['id'];?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>&nbsp;edit</button></td>
														<td><button class="btn btn-danger btn-xs delete" id="<?php echo $val['id'];?>"><i class="fa fa-trash-o" aria-hidden="true"></i>&nbsp;delete</button></td>
														</tr> 
													<?php
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
			var emp_id = $('#emp_id').val();
			var name_of_member = $("#name_of_member").val();
			var realtion_emp = $("#realtion_emp").val();
			var residing = $("#residing").val();
			var address = $("#address").val();
			var dependent_emp = $("#dependent_emp").val();
			var pf_nominee = $('#pf_nominee').val();
			var esi_nominee = $('#esi_nominee').val();
			var gratuity = $('#gratuity').val();
			var nominee_aadhaar = $('#nominee_aadhaar').val();
			

				$.ajax({
					url: '/hr_management/api/fem_emp_api.php',
					type: 'POST',
					data: {
						emp_id:emp_id,name_of_member:name_of_member,realtion_emp:realtion_emp,residing:residing,address:address,
						dependent_emp:dependent_emp,pf_nominee:pf_nominee,esi_nominee:esi_nominee,gratuity:gratuity,nominee_aadhaar:nominee_aadhaar, action:'add'
					},
					success: function(data) {
						alert(" Saved Successfully"); 
						location.reload();
						
					},
					
					});

			});
			$(".edit_btn").click(function(){
 
			var id = $(this).attr('id');
			 
			$.ajax({
				url:'edit_fam_emp.php',
				type:'POST',
				data:{  
					id:id,
				},
				success:function(response){
					//alert(response); 
					window.location = 'edit_fam_emp.php?'+id;


				}
				}) ;
			});

			$(".delete").click(function(){
				var fam_id = $(this).attr('id');
				alert(fam_id);
				$.ajax({
				url:'/hr_management/api/fem_emp_api.php',
				type:'POST',
				data:{  
					fam_id:fam_id,action:'del'
				},
				success:function(response){
					alert("Data deleted"); 
					location.reload();
 
				}
				});
			});


		});

     </script>




     