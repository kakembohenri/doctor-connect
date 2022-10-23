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


                        <?php
                        // -----------
                        //uncomment this code if you are on a server with smtp
                        if (isset($_POST['submit'])) {
                            $email = $_POST['email'];
                            $password = '123';
                            $password = md5($password);
                            $conn = new mysqli("localhost", "admin", "admin", "hospital");


                            if ($conn->connect_error) {
                                die("Connection failed: " . $conn->connect_error);
                            }
                            $sql = "SELECT * FROM patients WHERE patient_email='$email'";
                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                                // output data of each row
                                $sql = "UPDATE patients SET patient_password='$password1' , WHERE patient_email='$email'";

                                if ($conn->query($sql) === TRUE) {
                                    echo "<h3 class='text-center'>Check your email for recovery details.</h3>";
                                } else {
                                    echo "Error updating record: " . $conn->error;
                                }

                                // $to = $email;
                                // $subject = "Doctor-connect";
                                // $txt = "Your password has been reset to : ".$password." login and update your profile";
                                // $headers = "From: doctorconnectsys05@gmail.com" . "\r\n";

                                // mail($to,$subject,$txt,$headers);    
                            } else {
                                echo "<h3 class='text-center'>Email does not exist!.</h3>";
                            }



                            $conn->close();
                        } else {
                            header("Location:login.php");
                        }
                        // ======

                        ?>

                        <hr>

                        <div class="text-center te register-link" id="adminContact" style="cursor:pointer">
                            Go to <a href="login.php">Login</a>
                        </div>

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