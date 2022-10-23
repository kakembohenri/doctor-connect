<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<!-- login23:11-->

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">
    <title>Doctor-Connect</title>
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <!--[if lt IE 9]>
		<script src="assets/js/html5shiv.min.js"></script>
		<script src="assets/js/respond.min.js"></script>
	<![endif]-->
    
</head>

<body style="height:100vh ;">
    <div class="main-wrapper account-wrapper" style="background-color:white">
        <div class="row" style="height:100% ;">


            <div class="col-lg-7">

                <div class="card">

                    <img src="assets/img/cover.jpg" style="min-height: 650px;object-fit: cover;">


                </div>



            </div>
            <div class="col-lg-5 ml-0" style="height:100% ;">
                <div class="card elevation-0" style="min-height:650px">

                    <div class="card-body">
                        <div class="account-logo">
                            <img src="assets/img/logo-dark.png" alt="" height="60" width="60">
                        </div>
                        <h1 class="text-center">Doctor Connect</h1>
                        <h3 class="text-center">Forgot password</h3>
                        <hr>
                        <form method="post" action="recover.php" class="form-signin ">

                            <div class="form-group">
                                <label>Email for password recovery</label>
                                <input type="text" autofocus="" class="form-control" name="email" required>
                            </div>
                            
                            <div class="form-group text-right">
                                <a href="login.php" id="adminContact1">Back to Login.</a>
                            </div>
                            <div class="form-group text-center">
                                <button type="submit" class="btn btn-primary account-btn form-control" name="submit">Submit</button>
                            </div>
                            <div class="text-center te register-link" id="adminContact" style="cursor:pointer">
                                Don’t have an account? <a href="register.php">Register</a>
                            </div>
                            
                        </form>
                    </div>


                </div>
            </div>
        </div>
    </div>
    <script src="assets/js/jquery-3.2.1.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/app.js"></script>
    <script src="assets/js/sweetalert.min.js"></script>


    <script>
        $(function() {
            $("#adminContact1").on("click", function(ev) {
                swal("Info", "Contact Administrator Support for help", "info");
            })
        })
    </script>


    <?php if (isset($_SESSION["success"])) : ?>

        <script>
            swal("Success", "<?php echo $_SESSION["success"] ?>", "success");
        </script>

    <?php endif ?>


    <?php if (isset($_SESSION["success"])) : ?>

        <script>
            swal("Success", "<?php echo $_SESSION["success"] ?>", "success");
        </script>

    <?php endif ?>

    <?php if (isset($_SESSION["error"])) : ?>
        <script>
            swal("Error", "<?php echo $_SESSION["error"] ?>", "error");
        </script>
    <?php endif ?>
    
</body>
<!-- login23:12-->

</html>


<?php
unset($_SESSION["success"]);
unset($_SESSION["error"]);
?>