<?php

include "./db/db.php";
if (!isset($_SESSION['username']) || $_SESSION['username'] == "") {
	header('Location:login.php');
}

$data = file_get_contents("http://localhost/hr_management/api/pre_emp_view.php");
$res = json_decode($data, true);

$url = explode("?", $_SERVER['REQUEST_URI']);
if (!isset($url[1])) {
	echo "Access Denied";
	exit;
}


$qry = "SELECT * FROM  tb_previous_emp WHERE active='1' AND emp_id ='$url[1]'";

$res2 = $mysqli->query($qry);
$row = [];
if ($res2->num_rows > 0) {
	while ($arr = $res2->fetch_assoc()) {
		$row[] = $arr;
	}
}

$query = "SELECT * FROM `tb_emp_details`  WHERE active ='1' AND id = '" . $url[1] . "'";
$response = $mysqli->query($query);
if ($response->num_rows > 0) {
} else {
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

	<?php include "./includes/css_file.php" ?>
	<style>
		.mt-widget-2 .mt-body .mt-body-title {
			margin-top: 30px;
		}

		.mt-widget-2 .mt-body .mt-body-description {
			margin-top: 0px;
		}

		p {
			margin: 10px;
		}

		.shadows:hover {
			box-shadow: 3px 5px 11px 0px;
			transition: 0.7s;
		}

		.btn.btn-outline.dark {
			border-color: #939393;
			color: #fff;
			background-color: #939393;


		}

		.btn.btn-outline.dark.active,
		.btn.btn-outline.dark:active,
		.btn.btn-outline.dark:active:focus,
		.btn.btn-outline.dark:active:hover,
		.btn.btn-outline.dark:focus,
		.btn.btn-outline.dark:hover {
			border-color: #939393;
			color: #939393;
			background: 0 0;
		}

		.modal {
			z-index: 11;
		}

		.modal-backdrop {
			z-index: 10;
		}

		​ .page-header {
			background-color: black;
		}

		#customers {
			font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
			border-collapse: collapse;
			width: 100%;
			margin-top: 20px;
		}

		#customers td,
		#customers th {
			border: 1px solid #ddd;
			padding: 5px;
		}

		#customers tr:nth-child(even) {
			background-color: #f2f2f2;
		}

		#customers tr:hover {
			background-color: #ddd;
		}

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


<body class="page-header-fixed page-sidebar-closed-hide-logo page-content-white page-full-width">

	<div class="page-wrapper">
		<!-- BEGIN HEADER -->
		<?php include "./includes/top.php"; ?>

		<!-- END HEADER -->
		<!-- BEGIN HEADER & CONTENT DIVIDER -->
		<div class="clearfix"> </div>
		<!-- END HEADER & CONTENT DIVIDER -->
		<!-- BEGIN CONTAINER -->
		<div class="page-container">
			<!-- BEGIN CONTENT -->
			<div class="page-content-wrapper">
				<!-- BEGIN CONTENT BODY -->
				<div class="page-content">
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
												<div method="">
													<div class="col-md-4">
														<div class="row">
															<h2 style="background: #C0C0C0;margin: 0;font-size: 16px;font-weight:bold;padding:14px;color: #444; border-bottom: 1px solid #d7dfe3;">Details</h2>
															<br>
														</div>
														<div class="row">
															<div class="col-md-6">
																<div class="form-group">
																	<input type="hidden" id="emp_id" value="<?php echo $url[1]; ?>">
																	<label>Employer</label>
																	<input type="text" class="form-control  input-sm" name="employer" id="employer" placeholder="Enter Employer's name">
																</div>
															</div>
															<div class="col-md-6">
																<div class="form-group">
																	<label>Address</label>
																	<input type="text" class="form-control  input-sm" name="address" id="address" placeholder="Employer's address">
																</div>
															</div>
														</div>

														<div class="row">
															<div class="col-md-6">
																<div class="form-group">
																	<label>Join date </label>
																	<div class="input-group date">
																		<input id="join_date" type="date" name="join_date" class="form-control hasDatepicker input-sm" placeholder="dd-mm-yy" autocomplete="off">

																	</div>
																</div>
															</div>
															<div class="col-md-6">
																<div class="form-group">
																	<label>Leave date</label>
																	<div class="input-group date">
																		<input id="leave_date" type="date" name="leave_date" class="form-control hasDatepicker input-sm" placeholder="dd-mm-yy" autocomplete="off">

																	</div>
																</div>
															</div>
														</div>
														<div class="row">
															<div class="col-md-6">
																<div class="form-group">
																	<label>Last Salary drawn</label>
																	<input type="text" class="form-control  input-sm" name="last_salary" id="last_salary" placeholder="Enter last salary drawn">
																</div>
															</div>
															<div class="col-md-6">
																<div class="form-group">
																	<label>Department</label>
																	<input type="text" class="form-control  input-sm" name="department" id="department" placeholder="Enter the department">
																</div>
															</div>
														</div>

														<div class="row">
															<div class="col-md-6">
																<div class="form-group">
																	<label>Designation </span></label>
																	<input type="text" class="form-control  input-sm" name="designation" id="designation" placeholder="Enter Designation">
																</div>
															</div>
															<div class="col-md-6">
																<div class="form-group">
																	<label>Job Profile </span></label>
																	<input type="text" class="form-control  input-sm" name="job_profile" id="job_profile" placeholder="Enter job profile">
																</div>
															</div>
														</div>
														<div class="row">
															<div class="col-md-4">
																<div class="form-group">
																	<button type="button" class="btn btn-danger save-btn " id="save">Save</button>
																	<button type="button" class="btn btn-danger tl_update" id="l_update" style="display: none;">Update</button>
																	<span id="show_topic_ajax" style="display: none;"><img style="width: 57px;" src="https://int.kanalytics.in/image/ajax-loader.gif"></span>
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
																		<th style="width:10%;">Employer</th>
																		<th style="width:15%;">Address</th>
																		<th style="width:13%;">Join date</th>
																		<th style="width:13%;">Leaving date</th>
																		<th style="width:10%;">Last Salary drawn</th>
																		<th style="width:10%;">department</th>
																		<th style="width:10%;">Designation</th>
																		<th style="width:10%;">Job Profile</th>
																		<th style="width:8%;">Edit</th>
																		<th style="width:8%;">Delete</th>
																	</tr>
																	<?php
																	if ($row) {
																		$i = 1;
																		foreach ($row as $key => $val) {
																	?>
																			<tr>
																				<td><?php echo $i++; ?> </td>
																				<td><?php echo $val['name_employer']; ?></td>
																				<td><?php echo $val['address']; ?></td>
																				<td><?php echo $val['join_date']; ?> </td>
																				<td><?php echo $val['leave_date']; ?> </td>
																				<td><?php echo $val['salary_drawn']; ?> </td>
																				<td><?php echo $val['department']; ?></td>
																				<td><?php echo $val['designation']; ?></td>
																				<td><?php echo $val['job_profile']; ?></td>
																				<td><button class="btn btn-success btn-xs edit_btn" id="<?php echo $val['id']; ?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>&nbsp;edit</button></td>
																				<td><button class="btn btn-danger btn-xs del_btn" id="<?php echo $val['id']; ?>"><i class="fa fa-trash-o" aria-hidden="true"></i>&nbsp;delete</button></td>

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
													</form>
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
		$("#save").click(function() {
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
					emp_id: emp_id,
					employer_name: employer_name,
					add: add,
					join_date: join_date,
					leave_date: leave_date,
					last_salary: last_salary,
					department: department,
					designation: designation,
					job_profile: job_profile,
					action: 'add'
				},
				success: function(data) {
					let text = "Saved Successfully \nOk for go to next page or Cancle for add record";
					if (confirm(text) == true) {
						location.href = 'fam_emp.php?' + emp_id;
					} else {
						location.reload();
					}

				},

			});

		});

		$(".edit_btn").click(function() {
			var emp_id = $('#emp_id').val();
			var id = $(this).attr('id');
			alert(id);
			$.ajax({
				url: 'edit_pre_emp.php',
				type: 'POST',
				data: {
					id: id,
					emp_id: emp_id
				},
				success: function(response) {
					window.location = 'edit_pre_emp.php?' + id + "?" + emp_id;


				},
			});


		});

		$(".del_btn").click(function() {
			var id = $(this).attr('id');
			alert(id);
			$.ajax({
				url: '/hr_management/api/pre_emp_api.php',
				type: 'POST',
				data: {
					id: id,
					action: 'del'
				},
				success: function(response) {
					alert(response);
					location.reload();

				},
			});
		});
	});
</script>