<!DOCTYPE html>
<html lang="en">
<? include "./api/department_master_api.php"; ?>

<head>
    <meta charset="utf-8" />

        <?php include "../includes/css_file_master.php"?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
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
                    include "../includes/css_file.php";
                    $data = file_get_contents("http://localhost/HR_management/api/department_master_api.php");
                    $res = json_decode($data, true);
                    ?>

                    <div class="container">
                        <h3>Department Master</h3>
                        <!-- Trigger the modal with a button -->
                        <div><button type="button" class="btn btn-info" id="add_department">Add</button></div>
                        <br>

                        <div class="row">
                            <div class="col-sm-12 table-view">
                                <table class="table table-bordered">
                                    <tr>
                                        <th>ID</th>
                                        <th>Department</th>
                                        <th>Edit</th>
                                        <th>Del</th>
                                    </tr>
                                    <?php
                                    if ($res['result'] == "true") {
                                        $cnt = 1;
                                        foreach ($res['data'] as $key => $val) {
                                            ?>
                                            <tr class="department-row">

                                                <td>
                                                    <?php echo $cnt++; ?>
                                                </td>
                                                <td>
                                                    <?php echo $val['department_name']; ?>
                                                </td>
                                                <td>
                                                    <input type="button" class="edit_department_btn btn-primary" value="Edit"
                                                        id='<?php echo $val['department_id']; ?>'>
                                                </td>
                                                <td><input type="button" value="Delete" class="del_department_btn btn-danger"
                                                        id='<?php echo $val['department_id']; ?>'>
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
                        <!-- END CONTENT BODY -->
                    </div>
                    <!-- END CONTENT -->

                </div>
                <!-- END CONTAINER -->
            </div>
            <!-- BEGIN FOOTER -->
            <?php include "../includes/footer.php"; ?>
            <!-- END FOOTER -->

        </div>

        <!--[if lt IE 9]>
 
        <![endif]-->
        <!-- BEGIN CORE PLUGINS -->

        <?php include "../includes/js_file.php"; ?> 
        <!-- END THEME LAYOUT SCRIPTS -->
        <!-- Modal for department -->
        <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog" style="margin-top: 100px">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title" id="modal_header"></h4>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" id="department_id_modal">
                        <!-- <p>Some text in the modal.</p> -->
                        <label class="col-sm-4">Department Name</label>
                        <div class="m-4">
                            <input class="form-control" type="text" id="department_name" required>
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

    </div>
</body>

</html>
<script>
    $(document).ready(function () {

        // Clear input field on modal close
        $('#myModal').on('hidden.bs.modal', function () {
            $('#department_name').val('');
        });

        // Add Department
        $("#add_department").click(function () {
            $("#myModal").modal("show");
            $("#modal_header").text("Add Department");
            $("#saveBtn").show();
            $("#updateBtn").hide();

        });
        // Save Department
        $("#saveBtn").click(function () {
            var department_name = $("#department_name").val();
            if (department_name == "") {
                alert("Department name cannot be empty!");
                return false;
            }
            // Check for duplicate department name
            $.ajax({
                url: 'department_ajax.php',
                method: 'POST',
                data: { department_name: department_name, action: 'check_duplicate' },
                success: function (response) {
                    if (response === 'true') {
                        alert('Department name already exists!');
                        return false;
                    } else {
                        // Add department
                        $.ajax({
                            url: 'department_ajax.php',
                            method: 'POST',
                            data: { department_name: department_name, action: 'add_department' },
                            success: function (response) {
                                alert(response);
                                location.reload();
                            }
                        });
                    }
                }
            });

            // $.ajax({
            //     url: 'state_ajax.php',
            //     method: 'POST',
            //     data: { state_name: state_name, action: 'add_state' },
            //     success: function (response) {
            //         alert(response);
            //         location.reload();
            //     }
            // });

        });

        // Update Department
        $("#updateBtn").click(function () {
            var department_name = $("#department_name").val();
            var department_id = $("#department_id_modal").val();

            $.ajax({
                url: 'department_ajax.php',
                method: 'POST',
                data: { department_name: department_name, department_id: department_id, action: 'update_department' },
                success: function (response) {
                    alert(response);
                    location.reload();
                }
            });

        });


        // Edit Department
        $(".edit_department_btn").click(function () {
            var department_id = $(this).attr("id");
            $("#department_id_modal").val(department_id);
            $.ajax({
                url: 'department_ajax.php',
                method: 'POST',
                data: { department_id: department_id, action: 'edit_department' },
                success: function (response) {
                    $("#department_name").val(response);
                    $("#myModal").modal("show");
                    $("#modal_header").text("Edit Department");
                    $("#saveBtn").hide();
                    $("#updateBtn").show();
                }
            });

        });

        // Del Department 
        $(".del_department_btn").click(function () {

            if (confirm("Are you sure you want to delete this department ??")) {
                var department_id = $(this).attr("id");

                $.ajax({
                    url: 'department_ajax.php',
                    method: 'POST',
                    data: { department_id: department_id, action: 'del_department' },
                    success: function (response) {
                        alert(response);
                        location.reload();
                    },
                    error: function (response) {
                        alert('Error deleting department.', response);
                    }
                });
            }


        });


    });
</script>