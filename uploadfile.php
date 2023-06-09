<?php
	// ini_set('display_errors', 1);
	// ini_set('display_startup_errors', 1);
	// error_reporting(E_ALL); 

include "./db/db.php";  
if (!isset($_SESSION['username']) || $_SESSION['username'] == "") {header('Location:login.php');}
 
	  
$data = file_get_contents("http://localhost/HR_management/api/document_master_api.php");  
$res = json_decode($data, true);  
 
$url = explode("?", $_SERVER['REQUEST_URI']);  
if(!isset($url[1]))
{
	echo "Access Denied";
    exit;	
}
$qry = "SELECT * FROM `tbl_image`  WHERE active ='1' AND emp_id = '".$url[1]."'";
 
$res2 = $mysqli->query($qry); 
$row = [];
if($res2->num_rows > 0){
   while($row_arr = $res2->fetch_assoc())
   {
	  $row[] = $row_arr;
   }   
	
}
 $qry1 = "SELECT * FROM `tb_emp_details`  WHERE active ='1' AND id = '".$url[1]."'";
$res11 = $mysqli->query($qry1); 
 
if($res11->num_rows > 0){

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
						<br>
						<br>
                        <div class="container">
							<div class="row">	 
								<input type="hidden" id="emp_id" value="<?php echo $url[1]; ?>">						
									<div class="form-group">
										<label class="col-sm-2 control-label">Document type:</label>
										<div class="col-sm-2"> 
											<select id="doc" name="status" class="form-control input-sm" required>
												<option value="">--Select--</option>
												<?php  
												if ($res['result'] == 'true') {
													foreach ($res['data'] as $key => $val) {
														echo "<option value='" . $val['document_id'] . "'>" . $val['document_name'] . "</option>";
													}
												} 
												?>  
											</select>
										</div> 
																	
										<div class="col-sm-3">
											<input type="file" id="mydoc" name="mydoc"> 
										</div>
																	
										<div class="col-sm-3">
											<button type="submit" class="btn btn-success go"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>&nbsp;Go</button>
										</div>
									</div>  
							</div>   <br>
							
							<!-- <div class="row">	 
								<input type="hidden" id="emp_id" value="<?php echo $url[1]; ?>">						
									<div class="form-group">
										<label class="col-sm-2 control-label">Upload profile picture:</label>  		
										<div class="col-sm-3">
											<input type="file" id="pro_pic" name="pro_pic"> 
											
										</div>
										<div id="imageContainer">
											 
											<img src="<?php //echo $imagePath ;?>" alt="Upload profile" style="width:150px;">
										</div>	 	  

										<div class="col-sm-2">
											<button type="submit" class="btn btn-success upload "><i class="fa fa-pencil-square-o" aria-hidden="true"></i>&nbsp;Upload</button>
											<button type="button" class="btn btn-danger update" id="<?php echo $result_arr['id']; ?>" style="display: none;">Update</button>
											<button type="button" class="btn btn-danger delete" id="<?php echo $result_arr['id']; ?>" style="display: none;">Delete</button>
										</div>
									</div>  
							</div>  -->
							<br>  
                                <div class="row">
                                    <div class="col-sm-11 table_view">
                                        <table class="table table-bordered">
                                            <tr>
                                                <th style="width:1%;">Sr.no</th>
                                                <th style="width:5%;">Document Name</th>
												<th style="width:5%;">View</th>  
												<th style="width:5%;">Delete</th> 
                                            </tr> 
                                            <tr> <?php
												if ($row) {
													$cnt = 1;
													foreach ($row as $key => $val) {
														?>
														<tr class="document-row"> 
															<td>
																<?php echo $cnt++; ?>
															</td>
															<td>
																<?php echo $val['name']; ?>
															</td> 
															<td><a href="/hr_management/images/document/<?php echo $val['name']; ?>" target="_blank">View</a></td>  
															<td> <button  class="btn btn-danger btn-xs delete" id="<?php  echo $val['id']; ?>"><i class="fa fa-trash-o" aria-hidden="true"></i>&nbsp;delete</button> </td>  
																
														</tr>
														<?php
													}
												} else {
													echo " <tr> <td colspan='4'> No Data Found</td>  </tr>";
												}

												?>
                                            </tr>  
                                        </table>
                                    </div> 			 			
						</div> 
					</div> 
				</div> 
				<?php include "./includes/footer.php"; ?> 
				
			</div>  
		
        <?php include "./includes/js_file.php"; ?>
        <!-- END THEME LAYOUT SCRIPTS -->
     </body>


     </html>
     <script type="text/javascript">
     	$(document).ready(function() {  

			$('.go').click(function() { 
				var val = $('#doc option:selected ').text(); 
				var id = $( "#doc option:selected" ).val(); 
				var emp_id = $('#emp_id').val();
				var fileInput = $('#mydoc')[0].files[0];  
			
				var formData = new FormData();  
				formData.append('file', fileInput); 
				formData.append('val', val);
				formData.append('id', id); 
				formData.append('emp_id',emp_id);
				formData.append("action","doc");
	
				$.ajax({
					url: 'http://localhost/hr_management/api/api.php', 
					type: 'POST',
					data: formData,
					processData: false,
					contentType: false,
					success: function(response) {
						let text = "Press a button!\nOK for go next page or Cancel for upload other document.";
						if (confirm(text) == true) { 
							location.href = "pre_emp.php?"+emp_id;
						} else { 
							location.reload();
						} 
								 
					},
					error: function(xhr, status, error) { 
						console.error(error);
					}
				});
			});

			
			$(".delete").click(function(){
				var pic_id = $(this).attr('id');
				alert(pic_id);
				$.ajax({
				url:'/hr_management/api/api3.php',
				type:'POST',
				data:{  
					pic_id:pic_id,action:'del'
				},
				success:function(response){
					alert("Data deleted"); 
					location.reload();
 
				}
				});
			}); 

			// $('.upload').click(function() {   
			// 	var emp_id = $('#emp_id').val();
			// 	var fileInput = $('#pro_pic')[0].files[0];  
			
			// 	var formData = new FormData(); 
			// 	formData.append('file', fileInput); 
			// 	formData.append("emp_id",emp_id);  
			// 	formData.append("action","profile");
	
			// 	$.ajax({
			// 		url: 'http://localhost/hr_management/api/api.php', 
			// 		type: 'POST',
			// 		data: formData,
			// 		processData: false,
			// 		contentType: false,
			// 		success: function(response) {
			// 			let text = "Press a button!\nOK for go next page or Cancel for upload other document.";
			// 			if (confirm(text) == true) { 
			// 				//location.href = "pre_emp.php?"+emp_id;
			// 				alert("yes");
			// 			} else { 
			// 				//location.reload(); 

			// 				// Append the image to a container element
			// 				$('#imageContainer').html(response);

			// 				$('.upload').hide();
			// 				$('.update').show();
			// 				$('.delete').show();
			// 			} 
								  
			// 		},
			// 		error: function(xhr, status, error) { 
			// 			console.error(error);
			// 		}
			// 	});
			// });

			$('.update').click(function() {  
				var id = $(this).attr('id');
				alert(id);
				exit;
				var fileInput = $('#mydoc')[0].files[0];  
			
				var formData = new FormData();  
				formData.append('file', fileInput); 
				formData.append('val', val);
				formData.append('id', id); 
				formData.append('emp_id',emp_id);
				formData.append("action","doc");
	
				$.ajax({
					url: 'http://localhost/hr_management/api/api.php', 
					type: 'POST',
					data: formData,
					processData: false,
					contentType: false,
					success: function(response) {
						let text = "Press a button!\nOK for go next page or Cancel for upload other document.";
						if (confirm(text) == true) { 
							//location.href = "pre_emp.php?"+emp_id;
						} else { 
							//location.reload();
						} 
								 
					},
					error: function(xhr, status, error) { 
						console.error(error);
					}
				});
			});
 
 

     	});

     </script>




     


 