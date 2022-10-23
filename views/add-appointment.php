<style>
    option#session {
        width: 30rem;
    }

    .session-box {
        display: flex;
        margin: 1rem 0rem;

    }

    .session {
        display: flex;
        align-items: center;
        flex-direction: column;
        width: 10rem;
        padding: 0.5rem;
        box-shadow: 0rem 0rem 0.1rem;
        margin: 1rem;
    }

    ul {
        margin-top: 0.5rem;
        padding-inline-start: 0rem;
    }
</style>

<div class="page-wrapper">
    <?php
    require_once("backend/controllers/calculate_time.php");

    ?>
    <div class="content">
        <div class="row">
            <div class="col-lg-8 offset-lg-2">
                <h4 class="page-title">Make Appointment</h4>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8 offset-lg-2">
                <form method="post" action="actions/action.php" id="add-form">

                    <div class="row">

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Doctor</label>
                                <form action="actions/action.php" method="post" id="get-sessions">
                                    <select class="select form-control" name="doctor_id">
                                        <?php if (isset($_SESSION['current'])) : ?>
                                            <?php if ($_SESSION['current'] != null) : ?>
                                                <option value="<?php echo $_SESSION['doctor_id']; ?>"> <?php echo ($_SESSION["current"][0]['doctor_first_name']) ?> <?php echo ($_SESSION["current"][0]["doctor_last_name"]) ?> </option>
                                            <?php else : ?>
                                                <option value="" selected>--Choose a doctor--</option>

                                            <?php endif ?>
                                        <?php else : ?>
                                            <option value="" selected>--Choose a doctor--</option>

                                        <?php endif ?>
                                        <?php foreach ($doctors as $doctor) : ?>
                                            <option value="<?php echo ($doctor["doctor_id"]) ?>">
                                                <?php echo ($doctor["doctor_first_name"]) ?> <?php echo ($doctor["doctor_last_name"]) ?> (<?php echo (round($doctor["rating"])) ?> stars)

                                            </option>

                                        <?php endforeach ?>

                                    </select>
                                    <button name='get-doctor-session' class='get-doctor-session'>Get doctor session</button>
                                </form>
                            </div>
                            <div class="form-group" style="display:flex; flex-direction:column;">
                                <label>Select a session</label>
                                <?php if (isset($_SESSION['sessions'])) : ?>
                                    <?php if ($_SESSION['sessions'] != null) : ?>
                                        <div class='session-box'>
                                            <?php foreach ($_SESSION['sessions'] as $session) : ?>
                                                <div class='session'>
                                                    <input type="radio" name="session_id" id="session_id" value='<?php echo $session['id']; ?>'>
                                                    <div>
                                                        <span>Date: <?php echo $session["date"]; ?></span>
                                                        <div>
                                                            <?php
                                                            // Get timeframes 
                                                            $timeframes = Calculate::makeCalculation($session['id']);
                                                            $newTimeFrames = Calculate::getValidTimeFrames($timeframes, $session['id']);

                                                            ?>
                                                            <ul>
                                                                <?php foreach ($newTimeFrames as $timeframe) : ?>

                                                                    <li>

                                                                        <input type="radio" name="time_frame" id="" value='<?php echo array_search($timeframe, $newTimeFrames); ?>' />
                                                                        <span>
                                                                            <?php echo $timeframe['start_time'] . " - " . $timeframe['end_time']; ?>
                                                                        </span>
                                                                    </li>
                                                                <?php endforeach ?>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php endforeach ?>
                                        </div>

                                    <?php else : ?>
                                        <span><b>This doctor has no sessions</b></span>

                                    <?php endif ?>
                                <?php else : ?>
                                    <span><b>This doctor has no sessions</b></span>
                                <?php endif ?>
                            </div>
                            <div class="form-group">
                                <label>Reason</label>
                                <textarea cols="30" rows="4" class="form-control" name="reason"></textarea>
                            </div>
                            <div class="m-t-20 text-center">
                                <button class="btn btn-primary" name="add_appointment" id="add_appointment">Make Appointment</button>
                            </div>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
    <script>
        let form = document.querySelector("#get-sessions")
        let formAdd = document.querySelector("#add-form")
        let getSessions = document.querySelector(".get-doctor-session")
        let add = document.querySelector("#add_appointment")

        getSessions.addEventListener('click', chooseDefault)
        add.addEventListener('click', addAppointment)


        function addAppointment() {
            // formAdd.preventDefault()
            console.log(formAdd)
            // formAdd.submit()

        }

        function chooseDefault() {
            form.preventDefault()
            form.submit()
        }
    </script>
    <script src="assets/js/jquery-3.2.1.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/app.js"></script>
    <script src="assets/js/sweetalert.min.js"></script>

    <?php if (isset($_SESSION["success"])) :
    ?>

        <script>
            swal("Success", "<?php echo $_SESSION['success']; ?>");
        </script>

    <?php endif
    ?>
    <?php if (isset($_SESSION["error"])) :
    ?>

        <script>
            swal("Success", "<?php echo $_SESSION['error']; ?>");
        </script>

    <?php endif
    ?>

    <?php
    unset($_SESSION["success"]);
    unset($_SESSION["error"]);
    ?>
</div>