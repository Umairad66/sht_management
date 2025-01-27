
<!-- Sidebar -->
<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <form action="search.html" class="mobile-view">
            <input class="form-control" type="text" placeholder="Search here">
            <button class="btn" type="button"><i class="fa fa-search"></i></button>
        </form>
        <div id="sidebar-menu" class="sidebar-menu">

            <ul>
                <li class="nav-item nav-profile">
                    <a href="#" class="nav-link">
                        <div class="nav-profile-image">
                            <img src="<?php echo asset("assets/img/profiles/avatar-17.jpg") ?>" alt="profile">

                        </div>
                        <div class="nav-profile-text d-flex flex-column">
                            <span class="font-weight-bold mb-2">David Grey. H</span>
                            <span class="text-white text-small">Project Manager</span>
                        </div>
                        <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>
                    </a>
                </li>
                <li class="menu-title">
                    <span>Main</span>
                </li>
                <li>
                    <a href="#"><i class="feather-home"></i> <span> Dashboard</span> <span
                            class="menu-arrow"></span></a>
                    <!-- <ul class="sub-menus">
                        <li><a href="index.html" class="active">Deals Dashboard</a></li>
                        <li><a href="projects-dashboard.html">Projects Dashboard</a></li>
                        <li><a href="leads-dashboard.html">Leads Dashboard</a></li>
                    </ul> -->
                </li>

                <li>
                    <a href="<?= route("tasks"); ?>">
                        <i class="feather-check-square"></i>
                        <span>Add Tasks</span>
                    </a>
                </li>
                <li>
                    <a href="<?= route("users"); ?>">
                        <i class="feather-check-square"></i>
                        <span>Add users</span>
                    </a>
                </li>
                <li>
                    <a href="<?= route("projects"); ?>">
                        <i class="feather-check-square"></i>
                        <span>Add Projects</span>
                    </a>
                </li>
                <li>
                    <a href="<?= route("files"); ?>">
                        <i class="feather-check-square"></i>
                        <span>Add files</span>
                    </a>
                </li>
                <li>
                    <a href="<?= route("chatbot"); ?>">
                        <i class="feather-check-square"></i>
                        <span>Chatbot</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
<!-- /Sidebar -->




        <!-- Page Wrapper -->
        <div class="page-wrapper">
            <div class="content container-fluid">