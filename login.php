<?php

// echo "<pre>";
// print_r($_SESSION);
// exit;

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="description" content="CRMS - Bootstrap Admin Template">
    <meta name="keywords" content="admin, estimates, bootstrap, business, corporate, creative, management, minimal, modern, accounts, invoice, html5, responsive, CRM, Projects">
    <meta name="author" content="Dreamguys - Bootstrap Admin Template">
    <meta name="robots" content="noindex, nofollow">
    <title>Login - CRMS admin template</title>

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?php echo asset("assets/css/bootstrap.min.css"); ?>">

    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="<?php echo asset("assets/css/font-awesome.min.css"); ?>">

    <!-- Feathericon CSS -->
    <link rel="stylesheet" href="<?php echo asset("assets/css/feather.css"); ?>">

    <!--font style-->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@200;300;400;500;600&display=swap" rel="stylesheet">

    <!-- Main CSS -->
    <link rel="stylesheet" href="<?php echo asset("assets/css/style.css"); ?>" class="themecls">

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
                        <h3 class="account-title">Login</h3>
                        <p class="account-subtitle">Access to our dashboard</p>

                        <!-- Account Form -->
                        <form action="<?php echo route("login_submit"); ?>" method="post">
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
                                <div class="row">
                                    <div class="col">
                                        <label>Password</label>
                                    </div>
                                    <div class="col-auto">
                                        <a class="text-muted" href="">
												Forgot password?
											</a>
                                    </div>
                                </div>
                                <input id="password" name="password" class="form-control <?php echo $password_error ? "is-invalid": "" ?>" type="password" value="<?= old('password'); ?>">
                                <div id="validationServerpasswordFeedback" class="invalid-feedback">
                                    <?php echo $message_password; ?>
                                </div>
                            </div>
                            
                            <div class="form-group text-center">
                                <button class="btn btn-primary account-btn" type="submit">Login</button>
                            </div>
                            <div class="account-footer">
                                <p>Don't have an account yet? <a href="<?php echo route("register"); ?>">Register</a></p>
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

    <!-- jQuery -->
    <script src="<?php echo asset("assets/js/jquery-3.6.0.min.js"); ?>"></script>

    <!-- Bootstrap Core JS -->
    <script src="<?php echo asset("assets/js/bootstrap.bundle.min.js"); ?>"></script>

    <!-- Custom JS -->
    <!-- theme JS -->
    <script src="<?php echo asset("assets/js/theme-settings.js"); ?>"></script>

    <!-- Custom JS -->
    <script src="<?php echo asset("assets/js/app.js"); ?>"></script>

</body>

</html>