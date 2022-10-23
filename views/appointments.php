<div class="page-wrapper">

    <div class="content">
        <div class="row">
            <div class="col-sm-4 col-3">
                <h4 class="page-title">Appointments</h4>
            </div>

            <?php if ($_SESSION["role"] == "patient") : ?>
                <div class="col-sm-8 col-9 text-right m-b-20">
                    <a href="?view=add-appointment" class="btn btn btn-primary btn-rounded float-right"><i class="fa fa-plus"></i> Add Appointment</a>
                </div>
            <?php endif ?>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table id="example1" class="table table-striped custom-table">
                        <!-- <table id="example1" class="table table-bordered table-striped"> -->
                        <thead>
                            <tr>
                                <th>Appointment ID</th>
                                <th>Queue number</th>
                                <th>Patient Name</th>
                                <th>Age</th>
                                <th>Doctor Name</th>
                                <th>Department</th>
                                <th>Appointment Date</th>
                                <th>Appointment Time</th>
                                <th>Status</th>
                                <?php if ($_SESSION["role"] != "admin") : ?>
                                    <th class="text-right">Action</th>
                                <?php endif ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($appointments as $appointment) : ?>
                                <tr>
                                    <td>APT00<?php echo ($appointment["appointment_id"]) ?></td>
                                    <td><?php echo $appointment['queue_number']; ?></td>
                                    <td><img width="28" height="28" src="assets/img/<?php echo ($appointment["patient_profile_image"]) ?>" class="rounded-circle m-r-5" alt=""> <?php echo ($appointment["patient_first_name"]) ?> <?php echo ($appointment["patient_last_name"]) ?></td>
                                    <?php
                                    $dateOfBirth = $appointment["patient_dob"];
                                    $today = date("Y-m-d");
                                    $diff = date_diff(date_create($dateOfBirth), date_create($today));

                                    ?>
                                    <td><?php echo ($diff->format('%y')) ?></td>


                                    <td><?php echo ($appointment["doctor_first_name"]) ?> <?php echo ($appointment["doctor_last_name"]) ?></td>
                                    <td><?php echo ($appointment["department_name"]) ?></td>
                                    <td>
                                        <?php
                                        $id = $appointment['session_id'];
                                        $apt = DB::getConnection()->query("SELECT * FROM session where id='$id' limit 1")->fetchObject();

                                        echo $apt->date;
                                        ?>
                                    </td>
                                    <td>
                                        <?php echo "<b>" . $appointment["start_time"] . "</b>" . " to " . "<b>" . $appointment["end_time"] . "</b>" ?>
                                    </td>
                                    <td>
                                        <?php $status =  $appointment["appointment_status"]; ?>
                                        <?php if ($status == "approved") : ?>
                                            <button class="custom-badge status-green">Approved</button>
                                        <?php endif ?>

                                        <?php if ($status  == "pending") : ?>
                                            <button class="custom-badge status-orange">Pending</button>
                                        <?php endif ?>

                                        <?php if ($status  == "rejected") : ?>
                                            <button class="custom-badge status-red">Rejected</button>
                                        <?php endif ?>
                                    </td>















                                    <?php if ($_SESSION["role"] == "doctor") : ?>

                                        <td class="text-right">
                                            <div class="dropdown dropdown-action">
                                                <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                                                <div class="dropdown-menu dropdown-menu-right">

                                                    <?php if ($status == "pending") : ?>

                                                        <a class="dropdown-item" href="actions/action.php?apt_action=true&action=approve&id=<?php echo ($appointment["appointment_id"]) ?>">Approve</a>
                                                        <a class="dropdown-item" href="actions/action.php?apt_action=true&action=reject&id=<?php echo ($appointment["appointment_id"]) ?>">Reject</a>
                                                    <?php endif    ?>

                                                    <?php if ($status == "rejected") : ?>

                                                        <a class="dropdown-item" href="actions/action.php?apt_action=true&action=approve&id=<?php echo ($appointment["appointment_id"]) ?>">Approve</a>
                                        </td>

                                    <?php endif    ?>

                                    <?php if ($status == "approved") : ?>

                                        <a class="dropdown-item" href="actions/action.php?apt_action=true&action=pend&id=<?php echo ($appointment["appointment_id"]) ?>">Pause</a>

                                    <?php endif    ?>
                </div>
            </div>
            </td>
        <?php endif ?>










        <?php if ($_SESSION["role"] == "patient") : ?>
            <td class="text-right">
                <div class="dropdown dropdown-action">
                    <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item" href="?view=edit-appointment&id=<?php echo ($appointment["appointment_id"]); ?>"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                        <a class="dropdown-item delete" href="#" data-toggle="modal" data-target="#delete_appointment" data-button="#delete" data-link="actions/action.php?delete_apt=true&id=<?php echo ($appointment["appointment_id"]) ?>"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
                    </div>
                </div>
            </td>
        <?php endif ?>
        </tr>
    <?php endforeach ?>

    </tbody>
    </table>
        </div>
    </div>
</div>
</div>




<div id="delete_appointment" class="modal fade delete-modal" role="dialog">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body text-center">
                <img src="assets/img/sent.png" alt="" width="50" height="46">
                <h3>Are you sure want to delete this Appointment?</h3>
                <div class="m-t-20"> <a href="#" class="btn btn-white" data-dismiss="modal">Close</a>
                    <a id="deleteLink"><button type="submit" class="btn btn-danger">Delete</button></a>
                </div>
            </div>
        </div>
    </div>
</div>
</div>