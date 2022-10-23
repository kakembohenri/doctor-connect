    <?php
    // Search for patient appointments which are approved and rating is null

    $patient_id = $_SESSION['user'][0]['patient_id'];


    $sql = "SELECT * FROM appointments where patient_id='$patient_id' and appointment_status='approved' and rating is NULL";

    $appointments = DB::getConnection()->query($sql)->fetchAll();

    if (count($appointments) > 0) :
    ?>
        <style>
            .modal-active {
                display: flex;
                justify-content: center;
                align-items: center;
            }

            .backdrop {
                background: black;
                opacity: 0.5;
                height: 100%;
                width: 100%;
                position: fixed;
            }
        </style>
        <div class='modal modal-active'>
            <div class='backdrop'></div>

            <?php

            foreach ($appointments as $appointment) {
                // get doctors

                $doctor_id = $appointment['doctor_id'];
                $sql = "SELECT * from doctors where doctor_id='$doctor_id' limit 1";

                $doctor = DB::getConnection()->query($sql)->fetchObject();

            ?>
                <div class="col-md-4 col-sm-4  col-lg-3">
                    <div class="profile-widget">

                        <span class="badge badge-pill bg-primary float-right  text-light" id="chat-<?php echo $doctor->doctor_id ?>" style="display:none">0</span>
                        <div class="doctor-img">
                            <img alt="" style='height:100%;width:100%; border-radius:50%;' src="assets/img/<?php echo ($doctor->profile_image) ?>">
                        </div>

                        <h4 class="doctor-name text-ellipsis"><?php echo ($doctor->doctor_first_name) ?> <?php echo ($doctor->doctor_last_name) ?> </h4>
                        <div class="doc-prof">

                            <?php
                            $dept_id = $doctor->department_id;

                            $dept = DB::getConnection()->query("SELECT * FROM departments where department_id='$dept_id' limit 1")->fetchObject();

                            echo $dept->department_name;

                            ?>

                        </div>
                        <div class="row justify-content-center rating-box" rating-value="<?php echo (floor($doctor->rating) > 0 ? $doctor->rating : 0) ?>">
                            <i class="fa fa-star doctor-<?php echo ($doctor->doctor_id) ?>" target-doctor-id="#doctor<?php echo ($doctor->doctor_id) ?>" value="1"></i>
                            <i class="fa fa-star doctor-<?php echo ($doctor->doctor_id) ?>" target-doctor-id="#doctor<?php echo ($doctor->doctor_id) ?>" value="2" doctor-class=".doctor-<?php echo ($doctor->doctor_id) ?>"></i>
                            <i class="fa fa-star doctor-<?php echo ($doctor->doctor_id) ?>" target-doctor-id="#doctor<?php echo ($doctor->doctor_id) ?>" value="3" doctor-class=".doctor-<?php echo ($doctor->doctor_id) ?>"></i>
                            <i class="fa fa-star doctor-<?php echo ($doctor->doctor_id) ?>" target-doctor-id="#doctor<?php echo ($doctor->doctor_id) ?>" value="4" doctor-class=".doctor-<?php echo ($doctor->doctor_id) ?>"></i>
                            <i class="fa fa-star doctor-<?php echo ($doctor->doctor_id) ?>" target-doctor-id="#doctor<?php echo ($doctor->doctor_id) ?>" value="5" doctor-class=".doctor-<?php echo ($doctor->doctor_id) ?>"></i>

                            <input hidden type="text" id="doctor<?php echo ($doctor->doctor_id) ?>" doctor-id="<?php echo ($doctor->doctor_id) ?>" value="">
                            <input type="text" name="appointment_id" value="" hidden id="">
                        </div>
                        <br>

                        <button class="btn btn-sm btn-primary btn-round save-rating" appointment-id="<?php echo $appointment["appointment_id"]; ?>" patient-id="<?php echo $_SESSION["user"][0]["patient_id"]
                                                                                                                                                                ?>" doctor-id="<?php echo ($doctor->doctor_id)
                                                                                                                    ?>" target-doctor-id="#doctor<?php echo (($doctor->doctor_id))
                                                                                                                                                    ?>">Save Rating</button>
                        <hr>
                        <div class="user-country">
                            <i class="fa fa-envelope"></i> <?php echo ($doctor->doctor_email) ?>
                        </div>

                        <div class="user-country">
                            <i class="fa fa-phone"></i> <?php echo ($doctor->doctor_contact) ?>
                        </div>
                    </div>
                </div>
        </div>


    <?php } ?>
    <?php endif ?>

    <script>
        let backdrop = document.querySelector('.backdrop')
        let modal = document.querySelector(".modal")
        let btn = document.querySelector('.save-rating')

        btn.addEventListener('click', removeBackdrop)

        function removeBackdrop() {
            modal.style.display = "none"
        }

        backdrop.addEventListener('click', setDisplay)

        function setDisplay() {
            modal.style.display = 'none'
        }
    </script>