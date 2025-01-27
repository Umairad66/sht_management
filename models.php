<!--modal section starts here-->
<div class="modal fade" id="add-new-list">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Add New List View</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <form class="forms-sample">
                    <div class="form-group row">
                        <label for="view-name" class="col-sm-4 col-form-label">New View Name</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="view-name" placeholder="New View Name">
                        </div>
                    </div>
                    <div class="form-group row pt-4">
                        <label class="col-sm-4 col-form-label">Sharing Settings</label>
                        <div class="col-sm-8">
                            <div class="form-group">
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input" name="optionsRadios" id="optionsRadios1" value=""> Just For Me <i class="input-helper"></i></label>
                                </div><br />
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input" name="optionsRadios" id="optionsRadios2" value="option2" checked=""> Share Filter with Everyone
                                        <i class="input-helper"></i></label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="text-center">
                        <button type="submit" class="btn btn-gradient-primary me-2">Submit</button>
                        <button class="btn btn-light">Cancel</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal right fade" id="add_task" tabindex="-1" role="dialog" aria-modal="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title text-center">Add Users</h4>
                <button type="button" class="btn-close xs-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <form action="<?php echo route("users/add"); ?>" method="post">
                         
                            <div class="form-group">
                                <label for="username">UserName<span>*</span></label>
                                <input id="username" name="username" class="form-control " type="text" value="">
                                <span class="invalid-feedback usernameError"></span>
                            </div>


                            <div class="form-group">
                                <label for="email">Email</label>
                                <input id="email" name="email" class="form-control" type="text" value="">
                                <span class="invalid-feedback emailError"></span>
                            </div>

                            <div class="form-group">
                                <label for="password">Password</label>
                                <input id="password" name="password" class="form-control" type="password" value="">
                                <span class="invalid-feedback passwordError"></span>
                            </div>

                            <div class="form-group">
                                <label for="role">Role</label>
                                <select id="role" name="role" class="form-select">
                                    <option value="">--Role</option>
                                    <option value="admin">admin</option>
                                    <option value="project_manager">project_manager</option>
                                    <option value="team_member">team_member</option>
                                </select>
                                <span class="invalid-feedback roleError"></span>
                            </div>

                            <div class="form-group text-center">
                                <button class="btn btn-primary account-btn" type="submit">Add Users</button>
                            </div>

                        </form>
                    </div>
                </div>

            </div>

        </div><!-- modal-content -->
    </div><!-- modal-dialog -->
</div><!-- modal -->

<!-- edit data modal -->
<div class="modal right fade" id="edit_users" tabindex="-1" role="dialog" aria-modal="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title text-center">Edit Users</h4>
                <button type="button" class="btn-close xs-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <form action="<?php echo route("users/update"); ?>" method="post">
                            <input type="hidden" class="form-control" id="id" name="id" value="">
                            <div class="form-group">
                                <label for="username">UserName</label>
                                <input id="username" name="username" class="form-control" type="text" value="">
                                <span class="invalid-feedback usernameError"></span>
                            </div>


                            <div class="form-group">
                                <label for="email">Email</label>
                                <input id="email" name="email" class="form-control " type="text" value="">
                                <span class="invalid-feedback emailError"></span>
                            </div>


                            <div class="form-group">
                                <label for="password">Password</label>
                                <input id="password" name="password" class="form-control" type="password" value="">
                                <span class="invalid-feedback passwordError"></span>
                            </div>

                            <div class="form-group">
                                <label for="role">Role</label>
                                <select name="role" id="role" class="form-select">
                                <option value="">--Select Role</option>
                                    <option value="admin">admin</option>
                                    <option value="project_manager">project_manager</option>
                                    <option value="team_member">team_member</option>
                                </select>
                                <span class="invalid-feedback roleError"></span>
                            </div>

                            <div class="form-group text-center">
                                <button class="btn btn-primary account-btn" type="submit">Update Users</button>
                            </div>

                        </form>
                    </div>
                </div>

            </div>

        </div><!-- modal-content -->
    </div><!-- modal-dialog -->
</div><!-- modal -->


<script>
    // insert data
    $("#add_task form").submit(function(e) {
        e.preventDefault();

        remove_errors("add_task");

        var formData = $(this).serialize();
        // console.log(formData);
        $.ajax({
            url: "<?= route('users/add') ?>",
            type: "POST",
            data: formData,
            dataType: "json",
            success: function(data) {
                //  console.log(data);
                if (data.success) {
                    $("#add_task").modal("hide");
                    $("#add_task form").trigger("reset");
                } else {
                    display_errors(data, "add_task");
                }

            },
        });
    });
    // edit data
    $(document).on("click", "#edit-btn", function(e) {
        e.preventDefault();
        var id = $(this).data("eid");

        $.ajax({
            url: "<?= route('users/edit') ?>",
            type: "POST",
            data: {
                id: id
            },
            dataType: "json",
            success: function(data) {
                // console.log(data);
                $("#edit_users #id").val(data.id)
                $("#edit_users #username").val(data.username)
                $("#edit_users #email").val(data.email)
                $("#edit_users #password").val(data.password)
                $("#edit_users #role").val(data.role)
            }
        });
    });

    $("#edit_users form").on("submit", function(e) {
        
        e.preventDefault();

        remove_errors("edit_users");

        var formData = new FormData(this);
    
        //  console.log(formData);
        $.ajax({
            url: "<?= route('users/update') ?>",
            type: "POST",
            data: formData,
            dataType: "json",
            processData: false,
            contentType: false,
            success: function(data) {
                // console.log(data);
                if(data.success){
                    $("#edit_users").modal("hide");
                }else{
                    display_errors(data, "edit_users"); 
                }
            }
        });
    });

    // delete data
    $(document).on("click", ".delete-btn", function(e) {
        if (confirm("Do you want to delete, delete it")) {
            e.preventDefault();
            var id = $(this).data("id");
            $.ajax({
                url: "<?= route('users/delete') ?>",
                type: "POST",
                data: {
                    id: id
                },
                success: function(data) {
                    location.reload();
                }
            });
        }
    });


    function display_errors(data, modal_id) {
            if (data) {
                $.each(data, function(key, value) {
                    $(`#${modal_id} .` + key + 'Error').html(value[0]);
                    $(`#${modal_id} [name=${key}]`).addClass('is-invalid');
                });
            }
        }

        function remove_errors(modal_id) {
            $(`#${modal_id} input`).each(function() {
                $(this).removeClass("is-invalid")
            })
            $(`#${modal_id} select`).each(function() {
                $(this).removeClass("is-invalid")
            })
            $(`#${modal_id} textarea`).each(function() {
                $(this).removeClass("is-invalid")
            })
        }
</script>




<!--system users Modal -->
<div class="modal right fade" id="system-user" tabindex="-1" role="dialog" aria-modal="true">
    <div class="modal-dialog" role="document">
        <button type="button" class="close md-close" data-bs-dismiss="modal" aria-label="Close"> </button>
        <div class="modal-content">

            <div class="modal-header">

                <div class="row w-100">
                    <div class="col-md-7 account d-flex">
                        <div class="company_img">
                            <img src="assets/img/system-user.png" alt="User" class="user-image" class="img-fluid" />
                        </div>
                        <div>
                            <p class="mb-0">System User</p>
                            <span class="modal-title">John Doe</span>
                            <span class="rating-star"><i class="fa fa-star" aria-hidden="true"></i></span>
                            <span class="lock"><i class="fa fa-lock" aria-hidden="true"></i></span>
                        </div>

                    </div>
                    <div class="col-md-5 text-end">
                        <ul class="list-unstyled list-style-none">
                            <li class="dropdown list-inline-item"><br />
                                <a class="dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"> Actions </a>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="#">Edit This Contact</a>
                                    <a class="dropdown-item" href="#">Change Contact Image</a>
                                    <a class="dropdown-item" href="#">Delete This Contact</a>
                                    <a class="dropdown-item" href="#">Clone This Contact</a>
                                    <a class="dropdown-item" href="#">Change Record Owner</a>
                                    <a class="dropdown-item" href="#">Generate Merge Document</a>
                                    <a class="dropdown-item" href="#">Change Contact To Lead</a>
                                    <a class="dropdown-item" href="#">Print This Contact</a>
                                    <a class="dropdown-item" href="#">Email This Contact</a>
                                    <a class="dropdown-item" href="#">Add New Task For Contact</a>
                                    <a class="dropdown-item" href="#">Add New Event For Contact</a>
                                    <a class="dropdown-item" href="#">Add Activity Set To Contact</a>
                                    <a class="dropdown-item" href="#">Add New Deal For Contact</a>
                                    <a class="dropdown-item" href="#">Add New Project For Contact</a>
                                </div>
                            </li>

                        </ul>

                    </div>
                </div>
                <button type="button" class="btn-close xs-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="card due-dates">
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <span>Title</span>
                            <p>VB of sales</p>
                        </div>
                        <div class="col">
                            <span>Companies</span>
                            <p>Solemen tech</p>
                        </div>
                        <div class="col">
                            <span>Phone</span>
                            <p>9876764875</p>
                        </div>
                        <div class="col">
                            <span>Email</span>
                            <p>johndoe@gmail.com</p>
                        </div>
                        <div class="col">
                            <span>Contact owner</span>
                            <p>John Doe</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal-body">
                <div class="task-infos">
                    <ul class="nav nav-tabs nav-tabs-solid nav-tabs-rounded nav-justified">
                        <li class="nav-item"><a class="nav-link active" href="#task-details" data-bs-toggle="tab">Details</a></li>
                        <li class="nav-item"><a class="nav-link" href="#task-related" data-bs-toggle="tab">Related</a>
                        </li>
                        <li class="nav-item"><a class="nav-link" href="#task-activity" data-bs-toggle="tab">Activity</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane show active" id="task-details">
                            <div class="crms-tasks">
                                <div class="tasks__item crms-task-item active">
                                    <div class="accordion-header js-accordion-header">Name & Occupation</div>
                                    <div class="accordion-body js-accordion-body">
                                        <div class="accordion-body__contents">
                                            <table class="table">
                                                <tbody>
                                                    <tr>
                                                        <td class="border-0">Record ID</td>
                                                        <td class="border-0">124192692</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="border-0">Name</td>
                                                        <td class="border-0">John Doe</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Company</td>
                                                        <td>Solemen</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Title</td>
                                                        <td>Phone Enquiry</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="tasks__item crms-task-item active">
                                    <div class="accordion-header js-accordion-header">Contact Details</div>
                                    <div class="accordion-body js-accordion-body">
                                        <div class="accordion-body__contents">
                                            <table class="table">
                                                <tbody>
                                                    <tr>
                                                        <td class="border-0">Email</td>
                                                        <td class="border-0">johndoe@gmail.com</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Email Opted out</td>
                                                        <td>
                                                            <div class="form-check m-0 ps-0">
                                                                <label class="form-check-label">
                                                                    <input class="checkbox" type="checkbox"> <i class="input-helper"></i><i class="input-helper"></i><i class="input-helper"></i></label>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Phone</td>
                                                        <td>9878767565</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Home Phone</td>
                                                        <td>0422-453444</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Mobile Phone</td>
                                                        <td>9788787888</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Other Phone</td>
                                                        <td>9098686787</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Assistant Phone</td>
                                                        <td>8755589866</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Assistant Name</td>
                                                        <td>Williams</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Fax</td>
                                                        <td>5345</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Linkedin</td>
                                                        <td>Lorem ipsum</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Facebook</td>
                                                        <td>Lorem ipsum</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Twitter</td>
                                                        <td>will_ams</td>
                                                    </tr>

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="tasks__item crms-task-item active">
                                    <div class="accordion-header js-accordion-header">Address Information</div>
                                    <div class="accordion-body js-accordion-body">
                                        <div class="accordion-body__contents">
                                            <table class="table">
                                                <tbody>
                                                    <tr>
                                                        <td class="border-0">Mailling Address</td>
                                                        <td class="border-0">USA</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Other Address</td>
                                                        <td>Winson Road</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>

                                    </div>
                                </div>
                                <div class="tasks__item crms-task-item active">
                                    <div class="accordion-header js-accordion-header">Dates To Remember</div>
                                    <div class="accordion-body js-accordion-body">
                                        <div class="accordion-body__contents">
                                            <table class="table">
                                                <tbody>
                                                    <tr>
                                                        <td class="border-0">Dates to Remember</td>
                                                        <td class="border-0">09/05/2000</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Date of Birth</td>
                                                        <td>01/01/2013</td>
                                                    </tr>

                                                </tbody>
                                            </table>
                                        </div>

                                    </div>
                                </div>
                                <div class="tasks__item crms-task-item active">
                                    <div class="accordion-header js-accordion-header">Additional Information</div>
                                    <div class="accordion-body js-accordion-body">
                                        <div class="accordion-body__contents">
                                            <table class="table">
                                                <tbody>
                                                    <tr>
                                                        <td class="border-0">Date of Next Activity</td>
                                                        <td class="border-0">01/04/2013</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Date of Last Activity</td>
                                                        <td>01/01/2013</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Contact Owner</td>
                                                        <td>John Doe</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Contact Created</td>
                                                        <td>Jun 20, 2020</td>
                                                    </tr>

                                                </tbody>
                                            </table>
                                        </div>

                                    </div>
                                </div>
                                <div class="tasks__item crms-task-item active">
                                    <div class="accordion-header js-accordion-header">Description Information</div>
                                    <div class="accordion-body js-accordion-body">
                                        <div class="accordion-body__contents">
                                            <table class="table">
                                                <tbody>
                                                    <tr>
                                                        <td class="border-0">Description</td>
                                                        <td class="border-0">Lorem Ipsum</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="tasks__item crms-task-item active">
                                    <div class="accordion-header js-accordion-header">Tag List</div>
                                    <div class="accordion-body js-accordion-body">
                                        <div class="accordion-body__contents">
                                            <table class="table">
                                                <tbody>
                                                    <tr>
                                                        <td class="border-0">Tag List</td>
                                                        <td class="border-0">Lorem Ipsum</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane task-related" id="task-related">
                            <div class="row pt-2">
                                <div class="col-md-4">
                                    <div class="card bg-gradient-danger card-img-holder text-white h-100">
                                        <div class="card-body">
                                            <img src="assets/img/circle.png" class="card-img-absolute" alt="circle-image">
                                            <h4 class="font-weight-normal mb-3">Companies</h4>
                                            <span>2</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card bg-gradient-info card-img-holder text-white h-100">
                                        <div class="card-body">
                                            <img src="assets/img/circle.png" class="card-img-absolute" alt="circle-image">
                                            <h4 class="font-weight-normal mb-3">Deals</h4>
                                            <span>2</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card bg-gradient-success card-img-holder text-white h-100">
                                        <div class="card-body">
                                            <img src="assets/img/circle.png" class="card-img-absolute" alt="circle-image">
                                            <h4 class="font-weight-normal mb-3">Projects</h4>
                                            <span>1</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row pt-3">
                                <div class="col-md-4">
                                    <div class="card bg-gradient-success card-img-holder text-white h-100">
                                        <div class="card-body">
                                            <img src="assets/img/circle.png" class="card-img-absolute" alt="circle-image">
                                            <h4 class="font-weight-normal mb-3">Contacts</h4>
                                            <span>2</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card bg-gradient-danger card-img-holder text-white h-100">
                                        <div class="card-body">
                                            <img src="assets/img/circle.png" class="card-img-absolute" alt="circle-image">
                                            <h4 class="font-weight-normal mb-3">Notes</h4>
                                            <span>2</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card bg-gradient-info card-img-holder text-white h-100">
                                        <div class="card-body">
                                            <img src="assets/img/circle.png" class="card-img-absolute" alt="circle-image">
                                            <h4 class="font-weight-normal mb-3">Files</h4>
                                            <span>2</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="crms-tasks p-2">
                                    <div class="tasks__item crms-task-item active">
                                        <div class="accordion-header js-accordion-header">Companies</div>
                                        <div class="accordion-body js-accordion-body">
                                            <div class="accordion-body__contents">
                                                <div class="table-responsive">
                                                    <table class="table table-striped table-nowrap custom-table mb-0 datatable">
                                                        <thead>
                                                            <tr>
                                                                <th>Company Name</th>
                                                                <th>Phone</th>
                                                                <th>Billing Country</th>
                                                                <th class="text-end">Actions</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>
                                                                    <a href="#" class="avatar"><img alt="" src="assets/img/c-logo2.png"></a>
                                                                    <a href="#" data-bs-toggle="modal" data-bs-target="#company-details">Clampett Oil
                                                                        and Gas Corp.</a>
                                                                </td>
                                                                <td>8754554531</td>
                                                                <td>United States</td>
                                                                <td class="text-end">
                                                                    <div class="dropdown dropdown-action">
                                                                        <a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                                                        <div class="dropdown-menu dropdown-menu-right">
                                                                            <a class="dropdown-item" href="#">Edit
                                                                                Link</a>
                                                                            <a class="dropdown-item" href="#">Delete
                                                                                Link</a>

                                                                        </div>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <a href="#" class="avatar"><img alt="" src="assets/img/c-logo.png"></a>
                                                                    <a href="#" data-bs-toggle="modal" data-bs-target="#company-details">Acme
                                                                        Corporation</a>
                                                                </td>
                                                                <td>8754554531</td>
                                                                <td>United States</td>
                                                                <td class="text-end">
                                                                    <div class="dropdown dropdown-action">
                                                                        <a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                                                        <div class="dropdown-menu dropdown-menu-right">
                                                                            <a class="dropdown-item" href="#">Edit
                                                                                Link</a>
                                                                            <a class="dropdown-item" href="#">Delete
                                                                                Link</a>

                                                                        </div>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tasks__item crms-task-item">
                                        <div class="accordion-header js-accordion-header">Deals</div>
                                        <div class="accordion-body js-accordion-body">
                                            <div class="accordion-body__contents">
                                                <div class="table-responsive">
                                                    <table class="table table-striped table-nowrap custom-table mb-0 datatable">
                                                        <thead>
                                                            <tr>
                                                                <th>Deal Name</th>
                                                                <th>Company</th>
                                                                <th>User Responsible</th>
                                                                <th>Deal Value</th>
                                                                <th></th>
                                                                <th class="text-end">Actions</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>

                                                                <td>
                                                                    Bensolet
                                                                </td>
                                                                <td>Globex</td>
                                                                <td>John Doe</td>
                                                                <td>USD $‎180</td>
                                                                <td><i class="fa fa-star" aria-hidden="true"></i></td>

                                                                <td class="text-end">
                                                                    <div class="dropdown dropdown-action">
                                                                        <a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                                                        <div class="dropdown-menu dropdown-menu-right">
                                                                            <a class="dropdown-item" href="#">Edit
                                                                                Link</a>
                                                                            <a class="dropdown-item" href="#">Delete
                                                                                Link</a>

                                                                        </div>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>

                                                                <td>
                                                                    Ansanio tech
                                                                </td>
                                                                <td>Lecto</td>
                                                                <td>John Smith</td>
                                                                <td>USD $‎180</td>
                                                                <td><i class="fa fa-star" aria-hidden="true"></i></td>

                                                                <td class="text-end">
                                                                    <div class="dropdown dropdown-action">
                                                                        <a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                                                        <div class="dropdown-menu dropdown-menu-right">
                                                                            <a class="dropdown-item" href="#">Edit
                                                                                Link</a>
                                                                            <a class="dropdown-item" href="#">Delete
                                                                                Link</a>

                                                                        </div>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tasks__item crms-task-item">
                                        <div class="accordion-header js-accordion-header">Projects</div>
                                        <div class="accordion-body js-accordion-body">
                                            <div class="accordion-body__contents">
                                                <div class="table-responsive">
                                                    <table class="table table-striped table-nowrap custom-table mb-0 datatable">
                                                        <thead>
                                                            <tr>
                                                                <th>Project Name</th>
                                                                <th>Status</th>
                                                                <th>User Responsible</th>
                                                                <th>Date Created</th>
                                                                <th class="text-end">Actions</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>
                                                                    Wilmer Deluna
                                                                </td>
                                                                <td>Completed</td>
                                                                <td>Williams</td>
                                                                <td>13-Jul-20 11:37 PM</td>
                                                                <td class="text-end">
                                                                    <div class="dropdown dropdown-action">
                                                                        <a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                                                        <div class="dropdown-menu dropdown-menu-right">
                                                                            <a class="dropdown-item" href="#">Edit
                                                                                Link</a>
                                                                            <a class="dropdown-item" href="#">Delete
                                                                                Link</a>

                                                                        </div>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tasks__item crms-task-item">
                                        <div class="accordion-header js-accordion-header">Contacts</div>
                                        <div class="accordion-body js-accordion-body">
                                            <div class="accordion-body__contents">
                                                <div class="table-responsive">
                                                    <table class="table table-striped table-nowrap custom-table mb-0 datatable">
                                                        <thead>
                                                            <tr>
                                                                <th>Name</th>
                                                                <th>Title</th>
                                                                <th>phone</th>
                                                                <th>Email</th>
                                                                <th class="text-end">Actions</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>

                                                                <td>
                                                                    Wilmer Deluna
                                                                </td>
                                                                <td>Call Enquiry</td>
                                                                <td>987675656</td>
                                                                <td>william@gmail.com</td>
                                                                <td class="text-end">
                                                                    <div class="dropdown dropdown-action">
                                                                        <a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                                                        <div class="dropdown-menu dropdown-menu-right">
                                                                            <a class="dropdown-item" href="#">Edit
                                                                                Link</a>
                                                                            <a class="dropdown-item" href="#">Delete
                                                                                Link</a>

                                                                        </div>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>

                                                                <td>
                                                                    John Doe
                                                                </td>
                                                                <td>Enquiry</td>
                                                                <td>987675656</td>
                                                                <td>john@gmail.com</td>
                                                                <td class="text-end">
                                                                    <div class="dropdown dropdown-action">
                                                                        <a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                                                        <div class="dropdown-menu dropdown-menu-right">
                                                                            <a class="dropdown-item" href="#">Edit
                                                                                Link</a>
                                                                            <a class="dropdown-item" href="#">Delete
                                                                                Link</a>

                                                                        </div>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tasks__item crms-task-item">
                                        <div class="accordion-header js-accordion-header">Notes</div>
                                        <div class="accordion-body js-accordion-body">
                                            <div class="accordion-body__contents">
                                                <div class="table-responsive">
                                                    <table class="table table-striped table-nowrap custom-table mb-0 datatable">
                                                        <thead>
                                                            <tr>
                                                                <th>Name</th>
                                                                <th>Size</th>
                                                                <th>Category</th>
                                                                <th>Date Added</th>
                                                                <th>Added by</th>
                                                                <th class="text-end">Actions</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>

                                                                <td>
                                                                    Document
                                                                </td>
                                                                <td>50KB</td>
                                                                <td>Enquiry</td>
                                                                <td>13-Jul-20 11:37 PM</td>
                                                                <td>John Doe</td>
                                                                <td class="text-end">
                                                                    <div class="dropdown dropdown-action">
                                                                        <a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                                                        <div class="dropdown-menu dropdown-menu-right">
                                                                            <a class="dropdown-item" href="#">Edit
                                                                                Link</a>
                                                                            <a class="dropdown-item" href="#">Delete
                                                                                Link</a>

                                                                        </div>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>

                                                                <td>
                                                                    Finance
                                                                </td>
                                                                <td>100KB</td>
                                                                <td>Enquiry</td>
                                                                <td>13-Jul-20 11:37 PM</td>
                                                                <td>Smith</td>
                                                                <td class="text-end">
                                                                    <div class="dropdown dropdown-action">
                                                                        <a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                                                        <div class="dropdown-menu dropdown-menu-right">
                                                                            <a class="dropdown-item" href="#">Edit
                                                                                Link</a>
                                                                            <a class="dropdown-item" href="#">Delete
                                                                                Link</a>

                                                                        </div>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tasks__item crms-task-item">
                                        <div class="accordion-header js-accordion-header">Files</div>
                                        <div class="accordion-body js-accordion-body">
                                            <div class="accordion-body__contents">
                                                <div class="table-responsive">
                                                    <table class="table table-striped table-nowrap custom-table mb-0 datatable">
                                                        <thead>
                                                            <tr>
                                                                <th>Name</th>
                                                                <th>Size</th>
                                                                <th>Category</th>
                                                                <th>Date Added</th>
                                                                <th>Added by</th>
                                                                <th class="text-end">Actions</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>

                                                                <td>
                                                                    Document
                                                                </td>
                                                                <td>50KB</td>
                                                                <td>Enquiry</td>
                                                                <td>13-Jul-20 11:37 PM</td>
                                                                <td>John Doe</td>
                                                                <td class="text-end">
                                                                    <div class="dropdown dropdown-action">
                                                                        <a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                                                        <div class="dropdown-menu dropdown-menu-right">
                                                                            <a class="dropdown-item" href="#">Edit
                                                                                Link</a>
                                                                            <a class="dropdown-item" href="#">Delete
                                                                                Link</a>

                                                                        </div>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>

                                                                <td>
                                                                    Finance
                                                                </td>
                                                                <td>100KB</td>
                                                                <td>Enquiry</td>
                                                                <td>13-Jul-20 11:37 PM</td>
                                                                <td>Smith</td>
                                                                <td class="text-end">
                                                                    <div class="dropdown dropdown-action">
                                                                        <a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                                                        <div class="dropdown-menu dropdown-menu-right">
                                                                            <a class="dropdown-item" href="#">Edit
                                                                                Link</a>
                                                                            <a class="dropdown-item" href="#">Delete
                                                                                Link</a>

                                                                        </div>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="task-activity">
                            <div class="row pt-2">
                                <div class="col-md-4">
                                    <div class="card bg-gradient-danger card-img-holder text-white h-100">
                                        <div class="card-body">
                                            <img src="assets/img/circle.png" class="card-img-absolute" alt="circle-image">
                                            <h4 class="font-weight-normal mb-3">Total Activities</h4>
                                            <span>2</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card bg-gradient-info card-img-holder text-white h-100">
                                        <div class="card-body">
                                            <img src="assets/img/circle.png" class="card-img-absolute" alt="circle-image">
                                            <h4 class="font-weight-normal mb-3">Last Activity</h4>
                                            <span>1</span>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="row">
                                <div class="crms-tasks  p-2">
                                    <div class="tasks__item crms-task-item active">
                                        <div class="accordion-header js-accordion-header">Upcoming Activity</div>
                                        <div class="accordion-body js-accordion-body">
                                            <div class="accordion-body__contents">
                                                <div class="table-responsive">
                                                    <table class="table table-striped table-nowrap custom-table mb-0 datatable">
                                                        <thead>
                                                            <tr>
                                                                <th>Type</th>
                                                                <th>Activity Name</th>
                                                                <th>Assigned To</th>
                                                                <th>Due Date</th>
                                                                <th>Status</th>
                                                                <th class="text-end">Actions</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>

                                                                <td>
                                                                    Meeting
                                                                </td>
                                                                <td>Call Enquiry</td>
                                                                <td>John Doe</td>
                                                                <td>13-Jul-20 11:37 PM</td>
                                                                <td>
                                                                    <label class="container-checkbox">
                                                                        <input type="checkbox" checked>
                                                                        <span class="checkmark"></span>
                                                                    </label>
                                                                </td>

                                                                <td class="text-end">
                                                                    <div class="dropdown dropdown-action">
                                                                        <a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                                                        <div class="dropdown-menu dropdown-menu-right">
                                                                            <a class="dropdown-item" href="#">Add New
                                                                                Task</a>
                                                                            <a class="dropdown-item" href="#">Add New
                                                                                Event</a>

                                                                        </div>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>

                                                                <td>
                                                                    Meeting
                                                                </td>
                                                                <td>Phone Enquiry</td>
                                                                <td>David</td>
                                                                <td>13-Jul-20 11:37 PM</td>

                                                                <td>
                                                                    <label class="container-checkbox">
                                                                        <input type="checkbox" checked>
                                                                        <span class="checkmark"></span>
                                                                    </label>
                                                                </td>

                                                                <td class="text-end">
                                                                    <div class="dropdown dropdown-action">
                                                                        <a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                                                        <div class="dropdown-menu dropdown-menu-right">
                                                                            <a class="dropdown-item" href="#">Add New
                                                                                Task</a>
                                                                            <a class="dropdown-item" href="#">Add New
                                                                                Event</a>

                                                                        </div>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tasks__item crms-task-item">
                                        <div class="accordion-header js-accordion-header">Past Activity </div>
                                        <div class="accordion-body js-accordion-body">
                                            <div class="accordion-body__contents">
                                                <div class="table-responsive">
                                                    <table class="table table-striped table-nowrap custom-table mb-0 datatable">
                                                        <thead>
                                                            <tr>
                                                                <th>Type</th>
                                                                <th>Activity Name</th>
                                                                <th>Assigned To</th>
                                                                <th>Due Date</th>
                                                                <th>Status</th>
                                                                <th class="text-end">Actions</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>

                                                                <td>
                                                                    Meeting
                                                                </td>
                                                                <td>Call Enquiry</td>
                                                                <td>John Doe</td>
                                                                <td>13-Jul-20 11:37 PM</td>
                                                                <td>
                                                                    <label class="container-checkbox">
                                                                        <input type="checkbox" checked>
                                                                        <span class="checkmark"></span>
                                                                    </label>
                                                                </td>

                                                                <td class="text-end">
                                                                    <div class="dropdown dropdown-action">
                                                                        <a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                                                        <div class="dropdown-menu dropdown-menu-right">
                                                                            <a class="dropdown-item" href="#">Add New
                                                                                Task</a>
                                                                            <a class="dropdown-item" href="#">Add New
                                                                                Event</a>

                                                                        </div>
                                                                    </div>
                                                                </td>
                                                            </tr>

                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div><!-- modal-content -->
    </div><!-- modal-dialog -->
</div><!-- modal -->

<!--Task Details Modal -->
<div class="modal right fade" id="task-details-modal" tabindex="-1" role="dialog" aria-modal="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <div class="row w-100">
                    <div class="col-md-7 account d-flex">
                        <div class="company_img">
                            <img src="assets/img/task.png" alt="User" class="user-image" class="img-fluid" />
                        </div>
                        <div>
                            <p class="mb-0">Task</p>
                            <span class="modal-title">Personalize your Account</span>
                            <span class="rating-star"><i class="fa fa-star" aria-hidden="true"></i></span>
                            <span class="lock"><i class="fa fa-lock" aria-hidden="true"></i></span>
                        </div>

                    </div>

                    <div class="col-md-5 text-end">
                        <ul class="list-unstyled list-style-none">
                            <li class="dropdown list-inline-item"><br />
                                <a class="dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"> Actions </a>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="#">Edit This Task</a>
                                    <a class="dropdown-item" href="#">Mark as Incomplete</a>
                                    <a class="dropdown-item" href="#">Change Record Owner</a>
                                    <a class="dropdown-item" href="#">Delete This Task</a>
                                    <a class="dropdown-item" href="#">Clone This Task</a>
                                    <a class="dropdown-item" href="#">Print This Task</a>
                                </div>
                            </li>

                        </ul>

                    </div>
                </div>

                <button type="button" class="btn-close xs-close" data-bs-dismiss="modal"></button>

            </div>

            <div class="card due-dates">
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <span>Due Date</span>
                            <p>03-Jul-2020</p>
                        </div>
                        <div class="col">
                            <span>Priority</span>
                            <p>Medium</p>
                        </div>
                        <div class="col">
                            <span>Status</span>
                            <p>Not Started</p>
                        </div>
                        <div class="col">
                            <span>Progress</span>
                            <p>0</p>
                        </div>
                        <div class="col">
                            <span>Assigned To</span>
                            <p>John Doe</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal-body">
                <div class="task-infos">
                    <ul class="nav nav-tabs nav-tabs-solid nav-tabs-rounded nav-justified">
                        <li class="nav-item"><a class="nav-link active" href="#tasks-details" data-bs-toggle="tab">Details</a></li>
                        <li class="nav-item"><a class="nav-link" href="#tasks-related" data-bs-toggle="tab">Related</a>
                        </li>

                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane show active" id="tasks-details">
                            <div class="crms-tasks">
                                <div class="tasks__item crms-task-item active">
                                    <div class="accordion-header js-accordion-header">Name & Occupation</div>
                                    <div class="accordion-body js-accordion-body">
                                        <div class="accordion-body__contents">
                                            <table class="table">
                                                <tbody>
                                                    <tr>
                                                        <td class="border-0">Record ID</td>
                                                        <td class="border-0">124192692</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="border-0">Name</td>
                                                        <td class="border-0">John Doe</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Company</td>
                                                        <td>Claimpitt</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Title</td>
                                                        <td>Phone Call</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="tasks__item crms-task-item">
                                    <div class="accordion-header js-accordion-header">Task Details</div>
                                    <div class="accordion-body js-accordion-body">
                                        <div class="accordion-body__contents">
                                            <table class="table">
                                                <tbody>
                                                    <tr>
                                                        <td class="border-0">Record ID</td>
                                                        <td class="border-0">124192692</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Task Name</td>
                                                        <td>1. Personalize your account</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Assigned To</td>
                                                        <td>John Doe</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Category</td>
                                                        <td><label class="badge badge-gradient-danger">Get
                                                                Started</label></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Date Due</td>
                                                        <td>07/12/2000</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>


                                <div class="tasks__item crms-task-item">
                                    <div class="accordion-header js-accordion-header">Additional Information</div>
                                    <div class="accordion-body js-accordion-body">
                                        <div class="accordion-body__contents">
                                            <table class="table">
                                                <tbody>
                                                    <tr>
                                                        <td>Start Date</td>
                                                        <td>05/10/2012</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Reminder Date</td>
                                                        <td>05/01/2012</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Repeats</td>
                                                        <td>Lorem</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Progress</td>
                                                        <td>0%</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Priorit</td>
                                                        <td>Medium</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Status</td>
                                                        <td>Not Started</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Last Updated</td>
                                                        <td>04-Jun-20</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Created</td>
                                                        <td>03-Jun-20 1:14 AM</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Task Created By</td>
                                                        <td>John Doe</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Task Owner</td>
                                                        <td>John Doe</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>

                                    </div>
                                </div>
                                <div class="tasks__item crms-task-item">
                                    <div class="accordion-header js-accordion-header">Related To</div>
                                    <div class="accordion-body js-accordion-body">
                                        <div class="accordion-body__contents">
                                            <table class="table">
                                                <tbody>
                                                    <tr>
                                                        <td>Related To</td>
                                                        <td>Lorem Ipsum</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>

                                <div class="tasks__item crms-task-item">
                                    <div class="accordion-header js-accordion-header">Description Information</div>
                                    <div class="accordion-body js-accordion-body">
                                        <div class="accordion-body__contents">
                                            <table class="table">
                                                <tbody>
                                                    <tr>
                                                        <td class="border-0">Description</td>
                                                        <td class="border-0">Lorem Ipsum</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="tasks__item crms-task-item">
                                    <div class="accordion-header js-accordion-header">Task Comments</div>
                                    <div class="accordion-body js-accordion-body">
                                        <div class="accordion-body__contents">
                                            <button class="btn btn-secondary text-white w-25">Add Comments</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="tasks__item crms-task-item">
                                    <div class="accordion-header js-accordion-header">Permissions</div>
                                    <div class="accordion-body js-accordion-body">
                                        <div class="accordion-body__contents">
                                            <table class="table">
                                                <tbody>
                                                    <tr>
                                                        <td>Task visibility</td>
                                                        <td>Private</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane task-related" id="tasks-related">
                            <div class="row pt-2">
                                <div class="col-md-4">
                                    <div class="card bg-gradient-success card-img-holder text-white h-100">
                                        <div class="card-body">
                                            <img src="assets/img/circle.png" class="card-img-absolute" alt="circle-image">
                                            <h4 class="font-weight-normal mb-3">Contacts</h4>
                                            <span>2</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card bg-gradient-info card-img-holder text-white h-100">
                                        <div class="card-body">
                                            <img src="assets/img/circle.png" class="card-img-absolute" alt="circle-image">
                                            <h4 class="font-weight-normal mb-3">Deals</h4>
                                            <span>2</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card bg-gradient-success card-img-holder text-white h-100">
                                        <div class="card-body">
                                            <img src="assets/img/circle.png" class="card-img-absolute" alt="circle-image">
                                            <h4 class="font-weight-normal mb-3">Projects</h4>
                                            <span>1</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row pt-3">

                                <div class="col-md-4">
                                    <div class="card bg-gradient-danger card-img-holder text-white h-100">
                                        <div class="card-body">
                                            <img src="assets/img/circle.png" class="card-img-absolute" alt="circle-image">
                                            <h4 class="font-weight-normal mb-3">Companies</h4>
                                            <span></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card bg-gradient-info card-img-holder text-white h-100">
                                        <div class="card-body">
                                            <img src="assets/img/circle.png" class="card-img-absolute" alt="circle-image">
                                            <h4 class="font-weight-normal mb-3">Leads</h4>
                                            <span>1</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="crms-tasks  p-2">
                                    <div class="tasks__item crms-task-item active">
                                        <div class="accordion-header js-accordion-header">Contacts</div>
                                        <div class="accordion-body js-accordion-body">
                                            <div class="accordion-body__contents">
                                                <div class="table-responsive">
                                                    <table class="table table-striped table-nowrap custom-table mb-0 datatable">
                                                        <thead>
                                                            <tr>
                                                                <th>Name</th>
                                                                <th>Title</th>
                                                                <th>phone</th>
                                                                <th>Email</th>
                                                                <th>Status</th>
                                                                <th class="text-end">Actions</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>

                                                                <td>
                                                                    Wilmer Deluna
                                                                </td>
                                                                <td>Call Enquiry</td>
                                                                <td>987675656</td>
                                                                <td>william@gmail.com</td>
                                                                <td>
                                                                    <label class="badge badge-gradient-success">Not
                                                                        Started</label>
                                                                </td>
                                                                <td class="text-end">
                                                                    <div class="dropdown dropdown-action">
                                                                        <a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                                                        <div class="dropdown-menu dropdown-menu-right">
                                                                            <a class="dropdown-item" href="#">Edit
                                                                                Link</a>
                                                                            <a class="dropdown-item" href="#">Delete
                                                                                Link</a>

                                                                        </div>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>

                                                                <td>
                                                                    John Doe
                                                                </td>
                                                                <td>Enquiry</td>
                                                                <td>987675656</td>
                                                                <td>john@gmail.com</td>
                                                                <td>
                                                                    <label class="badge badge-gradient-info">Not
                                                                        Started</label>
                                                                </td>
                                                                <td class="text-end">
                                                                    <div class="dropdown dropdown-action">
                                                                        <a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                                                        <div class="dropdown-menu dropdown-menu-right">
                                                                            <a class="dropdown-item" href="#">Edit
                                                                                Link</a>
                                                                            <a class="dropdown-item" href="#">Delete
                                                                                Link</a>

                                                                        </div>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tasks__item crms-task-item">
                                        <div class="accordion-header js-accordion-header">Deals </div>
                                        <div class="accordion-body js-accordion-body">
                                            <div class="accordion-body__contents">
                                                <div class="table-responsive">
                                                    <table class="table table-striped table-nowrap custom-table mb-0 datatable">
                                                        <thead>
                                                            <tr>
                                                                <th>Deal Name</th>
                                                                <th>Company</th>
                                                                <th>User Responsible</th>
                                                                <th>Deal Value</th>
                                                                <th></th>
                                                                <th class="text-end">Actions</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>
                                                                    Bensolet
                                                                </td>
                                                                <td>Globex</td>
                                                                <td>John Doe</td>
                                                                <td>USD $‎180</td>
                                                                <td><i class="fa fa-star" aria-hidden="true"></i></td>

                                                                <td class="text-end">
                                                                    <div class="dropdown dropdown-action">
                                                                        <a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                                                        <div class="dropdown-menu dropdown-menu-right">
                                                                            <a class="dropdown-item" href="#">Edit
                                                                                Link</a>
                                                                            <a class="dropdown-item" href="#">Delete
                                                                                Link</a>

                                                                        </div>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>

                                                                <td>
                                                                    Ansanio tech
                                                                </td>
                                                                <td>Lecto</td>
                                                                <td>John Smith</td>
                                                                <td>USD $‎180</td>
                                                                <td><i class="fa fa-star" aria-hidden="true"></i></td>

                                                                <td class="text-end">
                                                                    <div class="dropdown dropdown-action">
                                                                        <a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                                                        <div class="dropdown-menu dropdown-menu-right">
                                                                            <a class="dropdown-item" href="#">Edit
                                                                                Link</a>
                                                                            <a class="dropdown-item" href="#">Delete
                                                                                Link</a>

                                                                        </div>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tasks__item crms-task-item">
                                        <div class="accordion-header js-accordion-header">Projects </div>
                                        <div class="accordion-body js-accordion-body">
                                            <div class="accordion-body__contents">
                                                <div class="table-responsive">
                                                    <table class="table table-striped table-nowrap custom-table mb-0 datatable">
                                                        <thead>
                                                            <tr>
                                                                <th>Project Name</th>
                                                                <th>Status</th>
                                                                <th>User Responsible</th>
                                                                <th>Date Created</th>
                                                                <th class="text-end">Actions</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>
                                                                    Wilmer Deluna
                                                                </td>
                                                                <td>Completed</td>
                                                                <td>Williams</td>
                                                                <td>13-Jul-20 11:37 PM</td>
                                                                <td class="text-end">
                                                                    <div class="dropdown dropdown-action">
                                                                        <a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                                                        <div class="dropdown-menu dropdown-menu-right">
                                                                            <a class="dropdown-item" href="#">Edit
                                                                                Link</a>
                                                                            <a class="dropdown-item" href="#">Delete
                                                                                Link</a>

                                                                        </div>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tasks__item crms-task-item">
                                        <div class="accordion-header js-accordion-header">Companies</div>
                                        <div class="accordion-body js-accordion-body">
                                            <div class="accordion-body__contents">
                                                <p>There are no companies added.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tasks__item crms-task-item">
                                        <div class="accordion-header js-accordion-header">Leads </div>
                                        <div class="accordion-body js-accordion-body">
                                            <div class="accordion-body__contents">
                                                <div class="table-responsive">
                                                    <table class="table table-striped table-nowrap custom-table mb-0 datatable">
                                                        <thead>
                                                            <tr>
                                                                <th>Full Name</th>
                                                                <th>Company</th>
                                                                <th>Phone</th>
                                                                <th>Lead Status</th>
                                                                <th>Lead Created</th>
                                                                <th>Lead Owner</th>
                                                                <th class="text-end">Actions</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>
                                                                    Wilmer Deluna
                                                                </td>
                                                                <td>Howe-Blanda LLC</td>
                                                                <td>978675656</td>
                                                                <td>OPEN - NotContacted </td>
                                                                <td>13-Jul-20 11:37 PM</td>
                                                                <td>John Doe</td>
                                                                <td class="text-end">
                                                                    <div class="dropdown dropdown-action">
                                                                        <a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                                                        <div class="dropdown-menu dropdown-menu-right">
                                                                            <a class="dropdown-item" href="#">Edit
                                                                                Link</a>
                                                                            <a class="dropdown-item" href="#">Delete
                                                                                Link</a>

                                                                        </div>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                    </div>

                </div>
            </div>

        </div><!-- modal-content -->
    </div><!-- modal-dialog -->
</div><!-- modal -->