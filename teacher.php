<?php
// echo "<pre>";
// print_r($data);
// exit;
// header
include_view("layouts/header");

// sidebar
include_view("layouts/sidebar");
?>

<!-- content here -->
<!----- modal box ------->
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
    Add Teacher
</button>


    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="<?php echo route("teacher/add"); ?>" method="post" id="addForm">
                        <div class="form-group">
                            <input type="text" name="teacher_name" id="name" class="form-control" placeholder="Teacher Name" required="required">
                        </div>
                        <div class="form-group">
                            <input type="text" name="teacher_type" id="name" class="form-control" placeholder="Teacher Type" required="required">
                        </div>
                        <div class="form-group">
                            <input type="text" name="Age" id="name" class="form-control" placeholder="Age" required="required">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Add Teacher</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>

<!----- modal box end ------->

<!-- edit modal box -->


<div class="modal fade" id="boxmodal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <?php

                // foreach ($data as $teacher) { 
                ?>

                <form action="<?php echo route('teacher/update'); ?>" method="post">
                    <input type="hidden" class="form-control" id="teacher_id" name="teacher_id" value="">
                    <div class="form-group">
                        <input type="text" name="teacher_name" id="teacher_name" class="form-control" placeholder="Teacher Name" required="required" value="">
                    </div>
                    <div class="form-group">
                        <input type="text" name="teacher_type" id="teacher_type" class="form-control" placeholder="Teacher Type" required="required">
                    </div>
                    <div class="form-group">
                        <input type="text" name="Age" id="Age" class="form-control" placeholder="Age" required="required">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
                <?php // } 
                ?>
            </div>

        </div>
    </div>
</div>




<!------- table ------>
<table class="table table-success table-striped mt-3 ">
    <thead>
        <tr>
            <th>Teacher Id</th>
            <th>Teacher Name</th>
            <th>Teacher Type</th>
            <th>Age</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody id="load-table">


    </tbody>
</table>



<Script>
    $(document).ready(function() {
        function loadTable() {
            $.ajax({
                url: "<?= route('teacher/load') ?>",
                type: "POST",
                dataType: "json",
                success: function(data) {
                    if (data && data.length > 0) {
                        $("#load-table").empty();
                        $.each(data, function(key, value) {
                            $("#load-table").append(
                                "<tr>" + "<td>" + value.teacher_id + "</td>" +
                                "<td>" +
                                value.teacher_name +
                                "</td>" +
                                "<td>" +
                                value.teacher_type +
                                "</td>" +
                                "<td>" +
                                value.Age +
                                "</td>" +
                                "<td><button id='edit-btn' data-bs-target='#boxmodal2' data-bs-toggle='modal' class='btn btn-outline-success fw-bold edit-button' data-eid='" +
                                value.teacher_id +
                                "'><i class='fa-solid fa-pen-to-square'></i></button></td>" +

                                "<td><button class='delete-btn btn btn-outline-danger fw-bold' data-id='" +
                                value.teacher_id +
                                "'><i class='fa-solid fa-trash'></i></button></td>" +
                                "</tr>"
                            );
                        });
                    }
                },
            });
        }
        loadTable();

        // insert data
        $("#exampleModal form").submit(function(e) {
            e.preventDefault();
            var formData = $(this).serialize();
            // console.log(formData);
            $.ajax({
                url: "<?= route('teacher/add') ?>",
                type: "POST",
                data: formData,
                dataType:"json",
                success:function(data){
                     $("#exampleModal").modal("hide");
                    // $("#exampleModal .btn-close").trigger("click");
                    loadTable();
                    $("#exampleModal form").trigger("reset");
                    // form.reset();
                },
            });
        });





        // edit data
        $(document).on("click", "#edit-btn", function(e) {
            e.preventDefault();
            var teacher_id = $(this).data("eid");

            $.ajax({
                url: "<?= route('teacher/edit') ?>",
                type: "POST",
                data: {
                    teacher_id: teacher_id
                },
                dataType: "json",
                success: function(data) {
                    // console.log(data);
                    $("#boxmodal2 #teacher_name").val(data.teacher_name)
                    $("#boxmodal2 #teacher_type").val(data.teacher_type)
                    $("#boxmodal2 #Age").val(data.Age)
                    $("#boxmodal2 #teacher_id").val(data.teacher_id)
                    // $("#modal-form table").html(data);
                }
            });
        });

        // update data

        $("#boxmodal2 form").on("submit", function(e) {
            e.preventDefault();
            var formData = new FormData(this);
            // console.log(formData);

            $.ajax({
                url: "<?= route('teacher/update') ?>",
                type: "POST",
                data: formData,
                dataType: "json",
                processData: false,
                contentType: false,
                success: function(data) {
                    $("#boxmodal2").modal("hide");
                    loadTable();
                }
            });
        });


        // delete data
        $(document).on("click", ".delete-btn", function(e) {
            if (confirm("Do you want to delete, delete it")) {

                e.preventDefault();
                var teacher_id = $(this).data("id");
                $.ajax({
                    url: "<?= route('teacher/delete') ?>",
                    type: "POST",
                    data: {
                        teacher_id: teacher_id
                    },
                    success: function(data) {
                        loadTable();
                    }
                });
            }
        });
    });
</Script>




<!-- content here -->

<?php
// yield_data("content");
// footer
include_view("layouts/footer");
?>