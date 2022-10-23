<?php
$role = $_SESSION["role"];
?>

<?php foreach ($_SESSION["user"] as $user) : ?>

    <div class="page-wrapper">
        <div class="content">

            <div class="row">
                <div class="col-sm-7 col-6">
                    <h4 class="page-title">My Profile</h4>
                </div>

                <?php if ($_SESSION["role"] == "patient") : ?>
                    <div class="col-sm-5 col-6 text-right m-b-30">
                        <a href="?view=edit-patient&id=<?php echo $user["patient_id"] ?>" class="btn btn-primary btn-rounded"><i class="fa fa-plus"></i> Edit Profile</a>
                    </div>
                <?php endif ?>


                <?php if ($_SESSION["role"] == "doctor") : ?>
                    <div class="col-sm-5 col-6 text-right m-b-30">
                        <a href="?view=edit-doctor&id=<?php echo $user["doctor_id"] ?>" class="btn btn-primary btn-rounded"><i class="fa fa-plus"></i> Edit Profile</a>
                    </div>
                <?php endif ?>
            </div>
            <div class="card-box profile-header">
                <div class="row">
                    <div class="col-md-12" style="min-height:200px ;">
                        <div class="profile-view">
                            <div class="profile-img-wrap">
                                <?php if ($_SESSION["role"] == "doctor") : ?>

                                    <div class="profile-img">
                                        <a href="#"><img class="avatar" src="assets/img/<?php echo ($_SESSION["user"][0]["profile_image"]) ?>" alt=""></a>
                                    </div>
                                <?php endif ?>


                                <?php if ($_SESSION["role"] == "admin") : ?>
                                    <div class="profile-img">
                                        <img class="avatar" src="assets/img/<?php echo ($_SESSION["user"][0]["profile_image"]); ?>" alt="">
                                    </div>

                                <?php endif ?>

                                <?php if ($_SESSION["role"] == "patient") : ?>

                                    <div class="profile-img">
                                        <a href="#"><img class="avatar" src="assets/img/<?php echo ($_SESSION["user"][0]["patient_profile_image"]) ?>" alt=""></a>
                                    </div>
                                <?php endif ?>


                            </div>
                            <div class="profile-basic">
                                <div class="row">
                                    <div class="col-md-5">
                                        <div class="profile-info-left">
                                            <h3 class="user-name m-t-0 mb-0"><?php echo $user["$role" . "_" . "first_name"] ?> <?php echo $user["$role" . "_" . "last_name"] ?></h3>
                                            <small class="text-muted"><?php echo $_SESSION["role"] ?></small>

                                            <?php if ($_SESSION["role"] != "patient") : ?>
                                                <div class="staff-id">Employee ID : DR-0001</div>
                                            <?php endif ?>
                                            <div class="staff-msg"><a href="<?php echo $_SESSION["role"] != "admin" ? "?view=chat" : "" ?>" class="btn btn-primary "><?php echo $_SESSION["role"] == "admin" ? "No Chats" : "Chat Now" ?></a></div>
                                        </div>
                                    </div>
                                    <div class="col-md-7">
                                        <ul class="personal-info">
                                            <li>
                                                <span class="title">Phone:</span>
                                                <span class="text"><a href="#"><?php echo $user["$role" . "_" . "contact"] ?></a></span>
                                            </li>
                                            <li>
                                                <span class="title">Email:</span>
                                                <span class="text"><a href="#"><?php echo $user["$role" . "_" . "email"] ?></a></span>
                                            </li>


                                            <?php if ($role == "patient") : ?>
                                                <li>
                                                    <span class="title">Date of Birth:</span>
                                                    <span class="text"><?php echo $user["$role" . "_" . "dob"] ?></span>
                                                </li>

                                                <li>
                                                    <span class="title">Gender:</span>
                                                    <span class="text">
                                                        <?php $gender = $user["$role" . "_" . "gender"];

                                                        if ($gender == "m") {
                                                            echo "Male";
                                                        } else {
                                                            echo "Female";
                                                        }
                                                        ?>
                                                    </span>

                                                </li>

                                            <?php endif ?>


                                            <?php if ($role == "doctor") : ?>
                                                <li>
                                                    <span class="title">Biography</span>
                                                    <span class="text"><?php echo $user["$role" . "_" . "biography"] ?></span>
                                                </li>

                                            <?php endif ?>


                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <?php if ($_SESSION["role"] == "patient") : ?>

                <div class="row mt-3">
                    <div class="col-lg-12">
                        <div class="card" style="min-height:400px ;">
                            <div class="card-header">
                                <h3>My details

                                    <?php if (count($details) > 0) : ?>
                                        <a href="?view=edit-patient-details">
                                            <button class="btn btn-primary">
                                                Edit Details
                                            </button>
                                        </a>
                                    <?php endif ?>
                                </h3>
                            </div>

                            <div class="card-body">


                                <?php if (count($details) > 0) : ?>
                                    <?php foreach ($details as $detail) : ?>
                                        <div class="row">



                                            <div class="col-lg-6">
                                                <h4 class="heading text-info">Patient Current Diseases</h4>
                                                <p><?php echo $detail["current_diseases"] ?></p>

                                            </div>

                                            <div class="col-lg-6">
                                                <h4 class="heading text-info">Patient Previous Diseases</h4>
                                                <p><?php echo $detail["previous_diseases"] ?></p>
                                                <h5>Documents</h5>

                                                <?php if ($detail["document"] != "nodoc") : ?>
                                                    <p><a download href="assets/docs/<?php echo $detail["document"] ?>">Document</a></p>
                                                <?php else : ?>
                                                    <p>No Documents Attached</p>
                                                <?php endif ?>
                                            </div>

                                        </div>
                                    <?php endforeach ?>
                                <?php else : ?>

                                    <a href="?view=add-patient-details"><button class="btn btn-primary"><i class="fa fa-add"></i> Add Details</button></a>
                                <?php endif ?>


                            </div>
                        </div>
                    </div>
                </div>


            <?php endif ?>






        </div>




    </div>

<?php endforeach ?>