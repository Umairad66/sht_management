<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="description" content="CRMS - Bootstrap Admin Template">
    <meta name="keywords" content="admin, estimates, bootstrap, business, corporate, creative, management, minimal, modern, accounts, invoice, html5, responsive, CRM, Projects">
    <meta name="author" content="Dreamguys - Bootstrap Admin Template">
    <meta name="robots" content="noindex, nofollow">
    <title>Register - CRMS admin template</title>

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?php echo asset("assets/css/bootstrap.min.css") ?>">

    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="<?php echo asset("assets/css/font-awesome.min.css") ?>">

    <!-- Feathericon CSS -->
    <link rel="stylesheet" href="<?php echo asset("assets/css/feather.css") ?>">

    <!--font style-->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@200;300;400;500;600&display=swap" rel="stylesheet">

    <!-- Main CSS -->
    <link rel="stylesheet" href="<?php echo asset("assets/css/style.css") ?>" class="themecls">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
			<script src="assets/js/html5shiv.min.js"></script>
			<script src="assets/js/respond.min.js"></script>
		<![endif]-->
</head>

<body class="account-page">

    <!-- Main Wrapper -->
    <div class="main-wrapper">
        <div class="account-content">

            <div class="container">

                <!-- Account Logo -->
                <div class="account-logo">
                    <a href="index.html"><img src="assets/img/logo.png" alt="Dreamguy's Technologies"></a>
                </div>
                <!-- /Account Logo -->

                <div class="account-box">
                    <div class="account-wrapper">
                        <h3 class="account-title">Register</h3>
                        <p class="account-subtitle">Access to our dashboard</p>

                        <!-- Account Form -->
                        <form action="<?php echo route("register_submit"); ?>" method="post">
                            <?php
                                $username_error = false;
                                $message_username = "";
                                if ($_SESSION['form_errors']['username'] ?? null) {
                                    $username_error = true;
                                    $message_username = $_SESSION['form_errors']['username'][0];
                                }
							?>
                            <div class="form-group">
                                <label for="username">UserName</label>
                                <input id="username" name="username" class="form-control <?php echo $username_error ? "is-invalid": "" ?>" type="text" value="<?= old('username'); ?>">
                                <div id="validationServerusernameFeedback" class="invalid-feedback">
                                    <?php echo $message_username; ?>
                                </div>
                            </div>
                            
                            <?php
                                $email_error = false;
                                $message_email = "";
                                if ($_SESSION['form_errors']['email'] ?? null) {
                                    $email_error = true;
                                    $message_email = $_SESSION['form_errors']['email'][0];
                                }
							?>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input id="email" name="email" class="form-control <?php echo $email_error ? "is-invalid": "" ?>" type="text" value="<?= old('email'); ?>">
                                <div id="validationServeremailFeedback" class="invalid-feedback">
                                    <?php echo $message_email; ?>
                                </div>
                            </div>
                            
                            <?php
                                $password_error = false;
                                $message_password = "";
                                if ($_SESSION['form_errors']['password'] ?? null) {
                                    $password_error = true;
                                    $message_password = $_SESSION['form_errors']['password'][0];
                                }
							?>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input id="password" name="password" class="form-control <?php echo $password_error ? "is-invalid": "" ?>" type="password" value="<?= old('password'); ?>">
                                <div id="validationServerpasswordFeedback" class="invalid-feedback">
                                    <?php echo $message_password; ?>
                                </div>
                            </div>

                            <div class="form-group text-center">
                                <button class="btn btn-primary account-btn" type="submit">Register</button>
                            </div>
                            <div class="account-footer">
                                <p>Already have an account? <a href="<?php echo route("login"); ?>">Login</a></p>
                            </div>
                        </form>
                        <!-- /Account Form -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php 
        unset($_SESSION['form_errors']);
    ?>
    <!-- /Main Wrapper -->

    <!--theme settings modal-->

    <div class="modal right fade settings" id="settings" role="dialog" aria-modal="true">
        <div class="toggle-close">
            <div class="toggle" data-bs-toggle="modal" data-bs-target="#settings"><i class="fa fa-cog fa-w-16 fa-spin fa-2x"></i>
            </div>

        </div>
        <div class="modal-dialog" role="document">
            <div class="modal-content">

                <div class="modal-header p-3">
                    <h4 class="modal-title" id="myModalLabel2">Theme Customizer</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"> </button>
                </div>

                <div class="modal-body pb-3">
                    <div class="scroll">

                        <div>
                            <ul class="list-group">
                                <li class="list-group-item border-0">
                                    <div class="row">
                                        <div class="col">
                                            <h5 class="pb-2">Primary Skin</h5>
                                        </div>
                                        <div class="col text-end d-none">
                                            <a class="reset text-white bg-dark" id="ChangeprimaryDefault">Reset Default</a>
                                        </div>
                                    </div>
                                    <div class="theme-settings-swatches">
                                        <div class="themes">
                                            <div class="themes-body">
                                                <ul id="theme-changes" class="theme-colors border-0 list-inline-item list-unstyled mb-0">

                                                    <li class="theme-title">Solid Color</li>
                                                    <li class="list-inline-item"><span onclick="toggleTheme('style')" class="theme-defaults bg-warnings"></span></li>
                                                    <li class="list-inline-item"><span onclick="toggleTheme('style-green')" class="theme-solid-purple bg-warnings"></span></li>
                                                    <li class="list-inline-item"><span onclick="toggleTheme('style-blue')" class="theme-solid-black bg-blue"></span></li>
                                                    <li class="list-inline-item"><span onclick="toggleTheme('style-orange')" class="theme-solid-pink bg-orange"></span></li>
                                                    <li class="list-inline-item"><span onclick="toggleTheme('style-pink')" class="theme-solid-pink bg-pink"></span></li>
                                                    <li class="list-inline-item"><span onclick="toggleTheme('style-purple')" class="theme-solid-purle bg-purple"></span></li>
                                                    <li class="list-inline-item"><span onclick="toggleTheme('style-red')" class="theme-solid-danger bg-danger"></span></li>
                                                    <li><br /></li>
                                                    <li>
                                                        <hr />
                                                    </li>

                                                    <li class="theme-title">Gradient Color</li>


                                                    <li class="list-inline-item"><span onclick="toggleTheme('style-gradient-blue')" class="theme-orange bg-sunny-mornings"></span></li>
                                                    <li class="list-inline-item"><span onclick="toggleTheme('style-gradient-green')" class="theme-blue bg-tempting-azures"></span></li>
                                                    <li class="list-inline-item"><span onclick="toggleTheme('style-gradient-maroon')" class="theme-grey bg-amy-crisps"></span></li>
                                                    <li class="list-inline-item"><span onclick="toggleTheme('style-gradient-orange')" class="theme-lgrey bg-mean-fruits"></span></li>
                                                    <li class="list-inline-item"><span onclick="toggleTheme('style-gradient-pink')" class="theme-dblue bg-malibu-beachs"></span></li>
                                                </ul>
                                            </div>
                                        </div>


                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div>
                            <ul class="list-group">
                                <li class="list-group-item border-0">
                                    <div class="row">
                                        <div class="col">
                                            <h5 class="pb-2">Header Style</h5>
                                        </div>
                                        <div class="col text-end">
                                            <a class="reset text-white bg-dark" id="ChageheaderDefault">Reset Default</a>
                                        </div>
                                    </div>
                                    <div class="theme-settings-swatches">
                                        <div class="themes">
                                            <div class="themes-body">
                                                <ul id="theme-change1" class="theme-colors border-0 list-inline-item list-unstyled mb-0">
                                                    <li class="theme-title">Solid Color</li>
                                                    <li class="list-inline-item"><span class="header-solid-black bg-black"></span></li>
                                                    <li class="list-inline-item"><span class="header-solid-pink bg-primary"></span></li>
                                                    <li class="list-inline-item"><span class="header-solid-orange bg-secondary1"></span></li>
                                                    <li class="list-inline-item"><span class="header-solid-purple bg-success"></span></li>
                                                    <!-- <li class="list-inline-item"><span class="header-solid-blue bg-info"></span></li> -->
                                                    <li class="list-inline-item"><span class="header-solid-green bg-warnings"></span></li>
                                                    <li><br></li>
                                                    <li>
                                                        <hr>
                                                    </li>

                                                    <li class="theme-title">Gradient Color</li>

                                                    <li class="list-inline-item"><span class="header-gradient-color1 bg-sunny-morning"></span></li>
                                                    <li class="list-inline-item"><span class="header-gradient-color2 bg-tempting-azure"></span></li>
                                                    <li class="list-inline-item"><span class="header-gradient-color3 bg-amy-crisp"></span></li>
                                                    <li class="list-inline-item"><span class="header-gradient-color4 bg-mean-fruit"></span></li>
                                                    <li class="list-inline-item"><span class="header-gradient-color5 bg-malibu-beach"></span></li>
                                                    <li class="list-inline-item"><span class="header-gradient-color6 bg-ripe-malin"></span></li>
                                                    <li class="list-inline-item"><span class="header-gradient-color7 bg-plum-plate"></span></li>

                                                </ul>
                                            </div>
                                        </div>

                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div>
                            <ul class="list-group m-0">
                                <li class="list-group-item border-0">
                                    <div class="row">
                                        <div class="col">
                                            <h5 class="pb-2">Apps Sidebar Style</h5>
                                        </div>
                                        <div class="col  text-end">
                                            <a class="reset text-white bg-dark" id="ChagesidebarDefault">Reset Default</a>
                                        </div>
                                    </div>
                                    <div class="theme-settings-swatches">
                                        <div class="themes">
                                            <div class="themes-body">
                                                <ul id="theme-change2" class="theme-colors border-0 list-inline-item list-unstyled">
                                                    <li class="theme-title">Solid Color</li>
                                                    <li class="list-inline-item"><span class="sidebar-solid-black bg-black"></span></li>
                                                    <li class="list-inline-item"><span class="sidebar-solid-pink bg-primary"></span></li>
                                                    <li class="list-inline-item"><span class="sidebar-solid-orange bg-secondary1"></span></li>
                                                    <li class="list-inline-item"><span class="sidebar-solid-purple bg-success"></span></li>
                                                    <!-- <li class="list-inline-item"><span class="sidebar-solid-blue bg-info"></span></li> -->
                                                    <li class="list-inline-item"><span class="sidebar-solid-green bg-warnings"></span></li>
                                                    <li><br></li>
                                                    <li>
                                                        <hr>
                                                    </li>

                                                    <li class="theme-title">Gradient Color</li>

                                                    <li class="list-inline-item"><span class="sidebar-gradient-color1 bg-sunny-morning"></span></li>
                                                    <li class="list-inline-item"><span class="sidebar-gradient-color2 bg-tempting-azure"></span></li>
                                                    <li class="list-inline-item"><span class="sidebar-gradient-color3 bg-amy-crisp"></span></li>
                                                    <li class="list-inline-item"><span class="sidebar-gradient-color4 bg-mean-fruit"></span></li>
                                                    <li class="list-inline-item"><span class="sidebar-gradient-color5 bg-malibu-beach"></span></li>
                                                    <li class="list-inline-item"><span class="sidebar-gradient-color6 bg-ripe-malin"></span></li>
                                                    <li class="list-inline-item"><span class="sidebar-gradient-color7 bg-plum-plate"></span></li>

                                                </ul>
                                            </div>
                                        </div>

                                    </div>
                                </li>
                            </ul>
                            <div class="row Default-font">
                                <div class="col">
                                    <h5 class="pb-2">Font Style</h5>
                                </div>
                                <div class="col text-end">
                                    <a class="reset text-white bg-dark font-Default">Reset Default</a>
                                </div>
                            </div>
                            <ul class="list-inline-item list-unstyled font-family border-0 p-0" id="theme-change">

                                <li class="list-inline-item roboto-font">Roboto</li>
                                <li class="list-inline-item poppins-font">Poppins</li>
                                <li class="list-inline-item montserrat-font">Montserrat</li>
                                <li class="list-inline-item inter-font">Inter</li>
                            </ul>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>

    <!--theme settings-->
    <div class="sidebar-contact">
        <div class="toggle" data-bs-toggle="modal" data-bs-target="#settings"><i class="fa fa-cog fa-w-16 fa-spin fa-2x"></i></div>

    </div>

    <!-- jQuery -->
    <script src="<?php echo asset("assets/js/jquery-3.6.0.min.js") ?>"></script>

    <!-- Bootstrap Core JS -->
    <script src="<?php echo asset("assets/js/bootstrap.bundle.min.js") ?>"></script>

    <!-- Custom JS -->
    <!-- theme JS -->
    <script src="<?php echo asset("assets/js/theme-settings.js") ?>"></script>

    <!-- Custom JS -->
    <script src="<?php echo asset("assets/js/app.js") ?>"></script>

</body>

</html>