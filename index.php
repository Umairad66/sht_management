<?php
// header
include_view("layouts/header");

// sidebar
include_view("layouts/sidebar");
?>

<!-- content here start -->
<div class="crms-title row bg-white">
    <div class="col  p-0">
        <h3 class="page-title m-0">
            <span class="page-title-icon bg-gradient-primary text-white me-2">
                <i class="feather-check-square"></i>
            </span> Users
        </h3>
    </div>
    <div class="col p-0 text-end">
        <ul class="breadcrumb bg-white float-end m-0 ps-0 pe-0">
            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
            <li class="breadcrumb-item active">Users</li>
        </ul>
    </div>
</div>

<!-- Page Header -->
<div class="page-header pt-3 mb-0 ">
    <div class="row">
        <div class="col">
            <div class="dropdown">
                <a class="dropdown-toggle recently-viewed" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"> All Users </a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="#">Items I'm following</a>
                    <a class="dropdown-item" href="#">All Completed Users</a>
                    <a class="dropdown-item" href="#">My Delegated Users</a>
                    <a class="dropdown-item" href="#">My Completed Users</a>
                    <a class="dropdown-item" href="#">My Open Users</a>
                    <a class="dropdown-item" href="#">My Users</a>
                    <a class="dropdown-item" href="#">All Users</a>
                </div>
            </div>
        </div>
        <div class="col text-end">
            <ul class="list-inline-item ps-0">
                <li class="nav-item dropdown list-inline-item add-lists">
                    <a class="nav-link dropdown-toggle" id="profileDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                        <div class="nav-profile-text">
                            <i class="fa fa-th" aria-hidden="true"></i>
                        </div>
                    </a>
                    <div class="dropdown-menu navbar-dropdown" aria-labelledby="profileDropdown">
                        <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#add-new-list">Add New
                            List View</a>
                    </div>
                </li>
                <li class="list-inline-item">

                    <button class="add btn btn-gradient-primary font-weight-bold text-white todo-list-add-btn btn-rounded" id="add-task" data-bs-toggle="modal" data-bs-target="#add_task">Add Users</button>
                </li>
            </ul>
        </div>
    </div>
</div>
<!-- /Page Header -->


<!-- Content Starts -->
<div class="row">
    <div class="col-md-12">
        <div class="card mb-0">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-nowrap custom-table mb-0 datatable">
                        <thead>
                            <tr>
                                <th class="checkBox">
                                    <label class="container-checkbox">
                                        <input type="checkbox">
                                        <span class="checkmark"></span>
                                    </label>
                                </th>
                                <th>User Name</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Edit</th>
                                <th>Delete</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php

                            // if(!empty($data)){
                            foreach ($data as $users) {  ?>


                                <tr>
                                    <td class="checkBox">
                                        <label class="container-checkbox">
                                            <input type="checkbox" name="users" value="">
                                            <span class="checkmark"></span>
                                        </label>
                                    </td>

                                    <td>
                                        <p><?= $users['username']; ?></p>
                                    </td>
                                    <td>
                                        <p><?= $users['email'] ?></p>
                                    </td>
                                    
                                    <td>
                                        <p><?= $users['role'] ?></p>
                                    </td>
                                    <td>
                                        <button class="add btn btn-gradient-primary font-weight-bold text-white todo-list-add-btn btn-rounded"  data-bs-toggle="modal" id="edit-btn" data-bs-target="#edit_users" data-eid="<?= $users['id'] ?>">Edit</button>
                                    </td>
                                    <td>
                                        <button class="add btn btn-gradient-primary font-weight-bold text-white todo-list-add-btn btn-rounded delete-btn" data-id="<?= $users['id'] ?>" >Delete</button>
                                    </td>
                                </tr>
                            <?php
                            }
                            // }

                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /Content End -->
<!-- content here end -->




<!-- Models Start -->
<?php
// footer
include_view("users/models");
?>
<!-- Models eMD -->



<?php
// yield_data("content");
// footer
include_view("layouts/footer");
?>