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
    <title>Doctor-Connect Login</title>
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
                        <h3 class="text-center">Login</h3>
                        <hr>
                        <form method="post" action="actions/action.php" class="form-signin ">

                            <div class="form-group">
                                <label>Username or Email</label>
                                <input type="text" autofocus="" class="form-control" name="email" required>
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <!-- <input type="password" class="form-control" name="password" required> -->
                                <div id="passwordInput">
                                    <input class="form-control" id="password1" type="password" name="password" required>
                                    <span id="showHide">SHOW</span>
                                </div>
                                
                            </div>
                            <div class="form-group text-right">
                                <a href="forgot.php" id="adminContact1">Forgot your password?</a>
                            </div>
                            <div class="form-group text-center">
                                <button type="submit" class="btn btn-primary account-btn form-control" name="login">Login</button>
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
?>