<div class="header">
    <div class="header-left">
        <a href="#" class="logo">
            <img src="assets/img/logo.png" alt="" width="35" height="35"> <span>Doctor Connect</span>
        </a>
    </div>
    <a id="toggle_btn" href="javascript:void(0);"><i class="fa fa-bars"></i></a>
    <a id="mobile_btn" class="mobile_btn float-left" href="#sidebar"><i class="fa fa-bars"></i></a>



    <ul class="nav user-menu float-right">

        <li class="nav-item dropdown d-none d-sm-block">
            <a href="javascript:void(0);" id="open_msg_box" class="hasnotifications nav-link"><i class="fa fa-comment-o"></i> <span class="badge badge-pill bg-danger float-right chat-count"></span></a>
        </li>
        <li class="nav-item dropdown has-arrow">
            <a href="#" class="dropdown-toggle nav-link user-link" data-toggle="dropdown">


                <?php if ($_SESSION["role"] == "doctor") : ?>
                    <span class="user-img" style='height:3rem; width:3rem;'><img class="rounded-circle" src="assets/img/<?php echo $_SESSION["user"][0]["profile_image"] ?>" alt="Doctor" style='width:100%; height:100%;'>
                    <?php endif ?>

                    <?php if ($_SESSION["role"] == "patient") : ?>

                        <span class="user-img" style='height:3rem; width:3rem;'><img class="rounded-circle" src="assets/img/<?php echo $_SESSION["user"][0]["patient_profile_image"] ?>" alt="Patient" style='width:100%; height:100%;'>

                        <?php endif ?>

                        <?php if ($_SESSION["role"] == "admin") : ?>

                            <span class="user-img" style='height:3rem; width:3rem;'><img class="rounded-circle" src="assets/img/pic.jpg" alt="Admin" style='width:100%; height:100%;'>

                            <?php endif ?>

                            <span class="status online"></span></span>
                            <?php if ($_SESSION["role"] == "admin") : ?>
                                <span><?php echo ($_SESSION["user"][0]["admin_first_name"] . " " . $_SESSION["user"][0]["admin_last_name"]) ?></span>
                            <?php elseif ($_SESSION["role"] == "patient") : ?>
                                <span><?php echo ($_SESSION["user"][0]["patient_first_name"] . " " . $_SESSION["user"][0]["patient_last_name"]) ?></span>
                            <?php elseif ($_SESSION["role"] == "doctor") : ?>
                                <span><?php echo ($_SESSION["user"][0]["doctor_first_name"] . " " . $_SESSION["user"][0]["doctor_last_name"]) ?></span>
                            <?php endif ?>
            </a>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="?view=profile">My Profile</a>
                <a class="dropdown-item" href="logout.php">Logout</a>
            </div>
        </li>
    </ul>

</div>



<?php


// if($request->hasFile()){

//     $file = $request->file("file_name");

//     $ext = $file->getClientOriginalExtention();
//     $file->stroreAs("ghhshshs.".$ext);
// }