<?php
include "./db/db.php";
if (!isset($_SESSION['username']) || $_SESSION['username'] == "") {
	header('Location:login.php');
}


$data = file_get_contents("http://localhost/hr_management/api/crud_emp_api.php");
$res = json_decode($data, true);



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

		.modal-header {
			background-color: #DCDCDC;
		}

		h4 {
			color: black;
		}

		label {
			color: black;
		}

		#profile_pic {

			border-radius: 60%;
			display: block;
			width: 35%;
			margin-left: 33%;

		}
	</style>
</head>
<!-- END HEAD -->


<body class="page-header-fixed page-sidebar-closed-hide-logo page-content-white page-full-width">

	<div class="page-wrapper">
		<!-- BEGIN HEADER -->
		<?php include "./includes/top_menu_master.php"; ?>

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
								<a href="#">Employee Data</a>
							</li>
						</ul>
					</div>
					<br> <br>
					<div class="container">
						<!-- Trigger the modal with a button -->
						<div> <a href="./emp_details.php"><button class="btn btn-info">Add</button></a></div>
						<br>
						<div class="row">
							<div class="col-sm-11 table_view">
								<table class="table table-bordered">
									<tr>
										<th>Sr.no</th>
										<th>Profile</th>
										<th>Name</th>
										<th>Contact</th>
										<th>Email</th>
										<th>Delete</th>
										<th>Edit</th>
										<th>Profile picture</th>
									</tr>
									<?php
									if ($res['result'] == "true") {
										$i = 1;
										foreach ($res['data'] as $key => $val) {
									?>
											<tr>
												<td><?php echo $i++; ?></td>
												<td><?php if ($val['profile_pic']) {
														echo "<img src='" . 'http://localhost/hr_management/images/document/profile/' . $val['profile_pic'] . "' style='width:90px;'>";
													} else {
														echo "No Image Uploaded";
													} ?></td>
												<td><?php echo $val['name']; ?></td>
												<td><?php echo $val['contact']; ?></td>
												<td><?php echo $val['email']; ?></td>
												<td><button class="btn btn-primary btn-xs edit_btn" id="<?php echo $val['id']; ?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>&nbsp;edit</button></td>
												<td><button class="btn btn-danger btn-xs del_btn" id="<?php echo $val['id']; ?>"><i class="fa fa-trash-o" aria-hidden="true"></i>&nbsp;delete</button></td>
												<td><button class="btn btn-primary btn-xs edit_profile" id="<?php echo $val['id']; ?>">&nbsp;profile </button></td>
											</tr>
									<?php
										}
									} else {
										echo "<tr><td>No Data Found</td></tr>";
									}
									?>

								</table>
							</div>
						</div>
					</div>


				</div>
				<!-- END CONTENT BODY -->
			</div>
			<!-- END CONTENT -->
			<div class="modal fade" id="add_pop">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
							<h4 class="modal-title">Profile</h4>
						</div>
						<div class="form-horizontal" enctype="multipart/form-data" method="POST" target="data_result" id="form_data">
							<div class="modal-body ">
								<div class="box-body">
									<input type="hidden" id="mod_emp_id" value="">
									<div class="form-group text-center" id="profile">
										<img src="./images/download.jpeg" id="profile_pic" />
										<label class="control-label" for="pro_pic">profile picture</label>
										<input type="file" id="pro_pic" name="pro_pic" onchange="displayImage(this)" style="display:none;">
									</div>
								</div>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
								<button type="submit" class="btn btn-primary update" id="<?php //echo $row[0]['id'];
																							?>">Save</button>
							</div>
						</div>
					</div>
				</div>
			</div>


		</div>
		<?php include "./includes/footer.php"; ?>
		<!-- END FOOTER -->

	</div>
	<?php include "./includes/js_file.php"; ?>
	<!-- END THEME LAYOUT SCRIPTS -->
</body>

</html>
<script type="text/javascript">
	$(document).ready(function() {
		/*----------Album Popup Create-----------------*/


		$(".edit_btn").click(function() {

			var id = $(this).attr('id');
			$.ajax({
				url: 'edit_emp_details.php',
				method: 'POST',
				data: {
					id: id
				},
				success: function(response) { 
					window.location = 'edit_emp_details.php?' + id;
				}
			});
		});

		$(".del_btn").click(function() {

			if (confirm("Are you sure you want to delete this record ??")) {
				var dl_id = $(this).attr("id");
				$.ajax({
					url: 'del_emp_details.php',
					method: 'POST',
					data: {
						dl_id: dl_id
					},
					success: function(response) {
						alert(response);
						location.reload();
					},
					error: function(response) {
						alert('Error deleting record.', response);
					}
				});
			}

		});

		$("#profile_pic").click(function() {
			document.querySelector("#pro_pic").click();
		});

		function displayImage(e) {
			if (e.files[0]) {
				var reader = new FileReader();
				reader.onload = function(e) {
					document.querySelector('#profile_pic').setAttribute('src', e.target.result);
				}
				reader.readAsDataURL(e.files[0]);
			}
		}

		$(".edit_profile").click(function() {
			var data = $(this).attr("id");
			$("#mod_emp_id").val(data);
			$("#add_pop").modal("show");

		});




		$('.update').click(function() {
			var emp_id = $('#mod_emp_id').val();
			var fileInput = $('#pro_pic')[0].files[0];

			var formData = new FormData();
			formData.append('file', fileInput);
			formData.append("emp_id", emp_id);
			formData.append("action", "profile");

			$.ajax({
				url: 'http://localhost/hr_management/api/api.php',
				type: 'POST',
				data: formData,
				processData: false,
				contentType: false,
				success: function(response) {
					location.reload();

				},
				error: function(xhr, status, error) {
					console.error(error);
				}
			});
		});



	});
</script>