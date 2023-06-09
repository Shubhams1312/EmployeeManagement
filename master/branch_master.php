<!DOCTYPE html>
<html lang="en">
<? include "./api/branch_master_api.php"; ?>

<head>
    <meta charset="utf-8" />

    <?php include "../includes/css_file_master.php" ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

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
    </style>
</head>


<body class="page-header-fixed page-sidebar-closed-hide-logo page-content-white page-full-width">

    <div class="page-wrapper">
        <!-- BEGIN HEADER -->
        <?php include "../includes/menu_master.php"; ?>
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
                    <div class="page-bar">
                        <ul class="page-breadcrumb">
                            <li>
                                <a href="../master_data.php">Home</a>
                            </li>
                        </ul>
                    </div>
                    <br>

                    <?php
                    // include "../includes/css_file.php";
                    $data = file_get_contents("http://localhost/HR_management/api/branch_master_api.php");
                    $res = json_decode($data, true);
                    ?>

                    <div class="container">
                        <h3>Branch Master</h3>
                        <!-- Trigger the modal with a button -->
                        <div><button type="button" class="btn btn-info" id="add_branch">Add</button></div>

                        <br>
                        <div class="row">
                            <div class="col-sm-12 table-view">
                                <table class="table table-bordered">
                                    <tr>
                                        <th>ID</th>
                                        <th>Branch</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                    </tr>
                                    <?php
                                    if ($res['result'] == "true") {
                                        $cnt = 1;
                                        foreach ($res['data'] as $key => $val) {
                                            ?>
                                            <tr class="branch-row">

                                                <td>
                                                    <?php echo $cnt++; ?>
                                                </td>
                                                <td>
                                                    <?php echo $val['branch_name']; ?>
                                                </td>
                                                <td>
                                                    <input type="button" class="edit_branch_btn btn-primary" value="Edit"
                                                        id='<?php echo $val['branch_id']; ?>'>
                                                </td>
                                                <td><input type="button" value="Delete" class="del_branch_btn btn-danger"
                                                        id='<?php echo $val['branch_id']; ?>'>
                                                </td>
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
                    </div>
                    <!-- END CONTENT BODY -->
                </div>
                <!-- END CONTENT -->

            </div>
            <!-- END CONTAINER -->

            <!-- BEGIN FOOTER -->
            <?php include "../includes/footer.php"; ?>
            <!-- END FOOTER -->

        </div>

        <!--[if lt IE 9]>
 
        <![endif]-->
        <!-- BEGIN CORE PLUGINS -->

        <?php include "../includes/js_file_master.php"; ?>
        <!-- END THEME LAYOUT SCRIPTS -->
        <!-- Modal for branch -->
        <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog" style="margin-top: 100px">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title" id="modal_header"></h4>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" id="branch_id_modal">
                        <!-- <p>Some text in the modal.</p> -->
                        <label class="col-sm-4">Branch Name</label>
                        <div class="m-4">
                            <input class="form-control" type="text" id="branch_name" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" id="saveBtn">Save</button>
                        <button type="submit" class="btn btn-primary" id="updateBtn"
                            style="display:none;">Update</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
</body>

</html>
<script>
    $(document).ready(function () {

        // Clear input field on modal close
        $('#myModal').on('hidden.bs.modal', function () {
            $('#branch_name').val('');
        });

        // Add branch
        $("#add_branch").click(function () {
            $("#myModal").modal("show");
            $("#modal_header").text("Add branch");
            $("#saveBtn").show();
            $("#updateBtn").hide();

        });
        // Save branch
        $("#saveBtn").click(function () {
            var branch_name = $("#branch_name").val();
            if (branch_name == "") {
                alert("Branch name cannot be empty!");
                return false;
            }
            // Check for duplicate branch name
            $.ajax({
                url: 'branch_ajax.php',
                method: 'POST',
                data: { branch_name: branch_name, action: 'check_duplicate' },
                success: function (response) {
                    if (response === 'true') {
                        alert('Banch name already exists!');
                        return false;
                    } else {
                        // Add branch
                        $.ajax({
                            url: 'branch_ajax.php',
                            method: 'POST',
                            data: { branch_name: branch_name, action: 'add_branch' },
                            success: function (response) {
                                alert(response);
                                location.reload();
                            }
                        });
                    }
                }
            }); 

        });

        // Update branch
        $("#updateBtn").click(function () {
            var branch_name = $("#branch_name").val();
            var branch_id = $("#branch_id_modal").val();

            $.ajax({
                url: 'branch_ajax.php',
                method: 'POST',
                data: { branch_name: branch_name, branch_id: branch_id, action: 'update_branch' },
                success: function (response) {
                    alert(response);
                    location.reload();
                }
            });

        });


        // Edit branch
        $(".edit_branch_btn").click(function () {
            var branch_id = $(this).attr("id");
            $("#branch_id_modal").val(branch_id);
            $.ajax({
                url: 'branch_ajax.php',
                method: 'POST',
                data: { branch_id: branch_id, action: 'edit_branch' },
                success: function (response) {
                    $("#branch_name").val(response);
                    $("#myModal").modal("show");
                    $("#modal_header").text("Edit branch");
                    $("#saveBtn").hide();
                    $("#updateBtn").show();
                }
            });

        });

        // Del branch 
        $(".del_branch_btn").click(function () {

            if (confirm("Are you sure you want to delete this branch ??")) {
                var branch_id = $(this).attr("id");

                $.ajax({
                    url: 'branch_ajax.php',
                    method: 'POST',
                    data: { branch_id: branch_id, action: 'del_branch' },
                    success: function (response) {
                        alert(response);
                        location.reload();
                    },
                    error: function (response) {
                        alert('Error deleting branch.', response);
                    }
                });
            }


        });


    });
</script>