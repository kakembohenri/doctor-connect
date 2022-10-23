<?php
$role = "patient";
?>

<?php foreach ($patients as $user) : ?>

    <div class="page-wrapper">
        <div class="content">

            <div class="row">
                <div class="col-sm-7 col-6">
                    <h4 class="page-title">Patient Profile</h4>
                </div>




            </div>
            <div class="card-box profile-header">
                <div class="row">
                    <div class="col-md-12" style="min-height:200px ;">
                        <div class="profile-view">
                            <div class="profile-img-wrap">






                                <div class="profile-img">
                                    <a href="#"><img class="avatar" src="assets/img/<?php echo ($user["patient_profile_image"]) ?>" alt=""></a>
                                </div>


                            </div>
                            <div class="profile-basic">
                                <div class="row">
                                    <div class="col-md-5">
                                        <div class="profile-info-left">
                                            <h3 class="user-name m-t-0 mb-0"><?php echo $user["$role" . "_" . "first_name"] ?> <?php echo $user["$role" . "_" . "last_name"] ?></h3>
                                            <small class="text-muted">Patient</small>


                                            <?php if ($_SESSION["role"] == "doctor") : ?>
                                                <div class="staff-msg"><a href="?view=chat&doctor_id=<?php echo $_SESSION['user'][0]["doctor_id"] ?>&patient_id=<?php echo $user["patient_id"] ?>&name=Patient.<?php echo $user["$role" . "_" . "first_name"] ?>" class="btn btn-primary "><?php echo $_SESSION["role"] == "admin" ? "No Chats" : "Chat Now" ?></a></div>

                                            <?php endif ?>
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



                                            <li>
                                                <span class="title">Age:</span>
                                                <span class="text"><?php echo $user["$role" . "_" . "age"] ?></span>
                                            </li>

                                            <li>
                                                <span class="title">Gender:</span>
                                                <span class="text"><?php echo $user["$role" . "_" . "gender"]; ?></span>
                                            </li>





                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="row mt-2">
                <div class="col-lg-12">
                    <div class="card" style="min-height:400px ;">
                        <div class="card-header">
                            <h3>Patient details

                                <?php if ($_SESSION["role"] == "patient") : ?>
                                    <a href="?view=edit-patient-details"><button class="btn btn-primary">
                                            Edit Details
                                        </button></a>
                                <?php endif ?>
                            </h3>
                        </div>

                        <div class="card-body">

                            <?php if (count($details)) : ?>
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
                                <p>No Details</p>
                            <?php endif ?>


                        </div>
                    </div>
                </div>
            </div>








        </div>




    </div>

<?php endforeach ?>