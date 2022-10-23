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
    <title>Doctor-Connect Registration</title>
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <!--[if lt IE 9]>
		<script src="assets/js/html5shiv.min.js"></script>
		<script src="assets/js/respond.min.js"></script>
	<![endif]-->
    <style type="text/css">
        #passwordInput {
            width: 100%;
            display: flex;
            position: relative;
        }

        #passwordInput input[type="password"],
        #passwordInput input[type="text"] {
            width: 100%;
            padding: 10px;
            border: 1px solid lightgrey;
            font-size: 15px;

        }

        #passwordInput #showHide {
            font-size: 12px;
            font-weight: 600;
            position: absolute;
            color: red;
            right: 10px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
            user-select: none;
        }

        #passwordStrength {
            width: 100%;
            height: 5px;
            margin: 5px 0;
            display: none;
        }

        #passwordStrength span {
            position: relative;
            height: 100%;
            width: 100%;
            background: lightgrey;
            border-radius: 5px;
        }

        #passwordStrength span:nth-child(2) {
            margin: 0 3px;
        }

        #passwordStrength span.active:before {
            position: absolute;
            content: '';
            top: 0;
            left: 0;
            height: 100%;
            width: 100%;
            border-radius: 5px;
        }

        #passwordStrength span#poor:before {
            background-color: #ff4757;
        }

        #passwordStrength span#weak:before {
            background-color: orange;
        }

        #passwordStrength span#strong:before {
            background-color: #23ad5c;
        }

        #passwordInfo {
            font-size: 15px;
        }

        #passwordInfo #poor {
            color: red;
        }

        #passwordInfo #weak {
            color: orange;
        }

        #passwordInfo #strong {
            color: green;
        }
    </style>

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
                        <h3 class="text-center">Patient Registration</h3>
                        <hr>

                        <form method="post" action="actions/action.php" id="form">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>First Name <span class="text-danger">*</span></label>
                                        <input class="form-control" type="text" name="first_name" required>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Last Name</label>
                                        <input class="form-control" type="text" name="last_name" required>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Email <span class="text-danger">*</span></label>
                                        <input class="form-control" type="email" name="email" required>
                                    </div>
                                </div>


                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Password</label>
                                        <div id="passwordInput">
                                            <input class="form-control" id="password1" type="password" name="password" required>
                                            <span id="showHide">SHOW</span>
                                        </div>
                                        <div id="passwordStrength">
                                            <span id="poor"></span>
                                            <span id="weak"></span>
                                            <span id="strong"></span>
                                        </div>
                                        <div id="passwordInfo"></div>

                                        <!-- validate -->


                                        <!-- validate -->
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Confirm Password</label>
                                        <input class="form-control" id="password2" type="password" required>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group gender-select">
                                        <label class="gen-label">Gender:</label>
                                        <div class="form-check-inline">
                                            <label class="form-check-label">
                                                <input type="radio" name="gender" value="m" class="form-check-input" required>Male
                                            </label>
                                        </div>
                                        <div class="form-check-inline">
                                            <label class="form-check-label">
                                                <input type="radio" name="gender" value="f" class="form-check-input" required>Female
                                            </label>
                                        </div>
                                    </div>
                                </div>



                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Date of birth <span class="text-danger"></span></label>

                                        <input type="date" class="form-control" name="dob" required>
                                        <!-- <input type="date" name="dob" placeholder="dd-mm-yyyy" value="" min="1997-01-01" max="2030-12-31" class="form-control" required> -->

                                    </div>
                                </div>


                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Phone </label>
                                        <input class="form-control" id="submit" type="text" name="contact" required>
                                    </div>
                                </div>

                            </div>


                            <div class="m-t-20 text-center">
                                <button class="btn btn-primary form-control" name="add_patient">Create Account</button>
                            </div>
                            <br>
                            <div class="text-center  register-link" id="adminContact" style="cursor:pointer">
                                Have an account? <a href="login.php">login</a>
                            </div>
                        </form>

                    </div>


                </div>
            </div>
        </div>
    </div>
    <script src="assets/js/jquery-3.2.1.min.js"></script>
    <script src="assets/js/sweetalert.min.js"></script>
    <script src="assets/js/validate.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/app.js"></script>



    <script>
        $(function() {
            $("#adminContact").on("click", function(ev) {
                swal("Info", "Contact Administrator Support for help", "info");
            })

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

    <?php if (isset($_SESSION["info"])) : ?>
        <script>
            swal("Info", "<?php echo $_SESSION["info"] ?>", "info");
        </script>
    <?php endif ?>


    <script>
        let passwordInput = document.querySelector('#passwordInput input[type="password"]');
        let passwordStrength = document.getElementById('passwordStrength');
        let poor = document.querySelector('#passwordStrength #poor');
        let weak = document.querySelector('#passwordStrength #weak');
        let strong = document.querySelector('#passwordStrength #strong');
        let passwordInfo = document.getElementById('passwordInfo');

        let poorRegExp = /[a-z]/;
        let weakRegExp = /(?=.*?[0-9])/;;
        let strongRegExp = /(?=.*?[#?!@$%^&*-])/;
        let whitespaceRegExp = /^$|\s+/;


        passwordInput.oninput = function() {

            let passwordValue = passwordInput.value;
            let passwordLength = passwordValue.length;

            let poorPassword = passwordValue.match(poorRegExp);
            let weakPassword = passwordValue.match(weakRegExp);
            let strongPassword = passwordValue.match(strongRegExp);
            let whitespace = passwordValue.match(whitespaceRegExp);

            if (passwordValue != "") {

                passwordStrength.style.display = "block";
                passwordStrength.style.display = "flex";
                passwordInfo.style.display = "block";
                passwordInfo.style.color = "black";

                if (whitespace) {
                    passwordInfo.textContent = "whitespaces are not allowed";
                } else {
                    poorPasswordStrength(passwordLength, poorPassword, weakPassword, strongPassword);
                    weakPasswordStrength(passwordLength, poorPassword, weakPassword, strongPassword);
                    strongPasswordStrength(passwordLength, poorPassword, weakPassword, strongPassword);
                }


            } else {

                passwordStrength.style.display = "none";
                passwordInfo.style.display = "none";

            }
        }

        function poorPasswordStrength(passwordLength, poorPassword, weakPassword, strongPassword) {

            if (passwordLength <= 3 && (poorPassword || weakPassword || strongPassword)) {
                poor.classList.add("active");
                passwordInfo.style.display = "block";
                passwordInfo.style.color = "red";
                passwordInfo.textContent = "Your password is Poor";

            }
        }

        function weakPasswordStrength(passwordLength, poorPassword, weakPassword, strongPassword) {
            if (passwordLength >= 4 && poorPassword && (weakPassword || strongPassword)) {
                weak.classList.add("active");
                passwordInfo.textContent = "Your password is Weak";
                passwordInfo.style.color = "orange";

            } else {
                weak.classList.remove("active");

            }
        }

        function strongPasswordStrength(passwordLength, poorPassword, weakPassword, strongPassword) {

            if (passwordLength >= 6 && (poorPassword && weakPassword) && strongPassword) {
                poor.classList.add("active");
                weak.classList.add("active");
                strong.classList.add("active");
                passwordInfo.textContent = "Your password is strong";
                passwordInfo.style.color = "green";
            } else {
                strong.classList.remove("active");

            }
        }

        let showHide = document.querySelector('#passwordInput #showHide');

        showHide.onclick = function() {
            showHidePassword()
        }

        function showHidePassword() {
            if (passwordInput.type == "password") {
                passwordInput.type = "text";
                showHide.textContent = "HIDE";
                showHide.style.color = "green";
            } else {
                passwordInput.type = "password";
                showHide.textContent = "SHOW";
                showHide.style.color = "red";
            }
        }
    </script>
</body>
<!-- login23:12-->

</html>


<?php
unset($_SESSION["success"]);
unset($_SESSION["error"]);
unset($_SESSION["info"]);
?>