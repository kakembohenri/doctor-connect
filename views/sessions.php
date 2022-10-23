<style>
    .flex-img {
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }

    .session-card {
        box-shadow: 0rem 0rem 0.1rem;
        padding: 1rem;
        width: 15rem;
        margin: 0.8rem;
    }

    .btn-del {
        background: crimson;
        color: white;
        border: none;
    }

    .btn-edit {
        background: limegreen;
        color: white;
        border: none;
    }

    .sessions-header {
        width: 100%;
        display: flex;
        justify-content: space-between;
    }

    .sessions {
        margin: 1rem 0rem;
        display: flex;
        width: fit-content;
    }

    .overflow {
        width: 100%;
        overflow-y: auto;
    }

    .modal-add {
        background: black;
        opacity: 0.5;
    }

    .form-container {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100%;
    }

    .session-form {
        display: flex;
        flex-direction: column;
        padding: 1rem;
        box-shadow: 0rem 0rem 0.1rem;
        background: white;
        z-index: 10;
        width: 18rem;
    }

    .shifts {
        display: flex;
        justify-content: space-between;
    }

    .session-form label {
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }

    .backdrop {
        position: absolute;
        height: 100%;
        width: 100%;
        background-color: black;
        opacity: 0.5;
    }
</style>

<div class="page-wrapper">
    <div class="content">

        <div class="row">
            <div class="col-sm-7 col-6">
                <?php if ($_SESSION['role'] == "admin") : ?>

                    <h4 class="page-title">Sessions</h4>
                <?php else : ?>
                    <h4 class="page-title">My Sessions</h4>

                <?php endif ?>
            </div>


            <?php if ($_SESSION["role"] == "admin") : ?>
                <div class="col-sm-5 col-6 text-right m-b-30">
                    <!-- <input type="text" name="" id="" placeholder='Search doctor'> -->

                </div>
            <?php endif ?>
        </div>
        <?php foreach ($doctors as $doctor) : ?>

            <div class="card-box profile-header" style="margin:1.5rem 0rem">
                <div class="row">
                    <div class="col-md-12" style="min-height:200px ;">
                        <div class="profile-view">
                            <div class="profile-img-wrap flex-img">
                                <img class="avatar" src="assets/img/<?php echo $doctor['profile_image']; ?>" alt="" />
                                <span><?php echo $doctor['doctor_last_name'] . " " . $doctor['doctor_first_name']; ?></span>
                            </div>
                            <div class="profile-basic">
                                <div class="row">
                                    <!-- <div class="col-md-5">
                                    <div class="profile-info-left">
                                        <span>Doctors name</span>
                                    </div>
                                </div> -->
                                    <div class="col-md-7" style='max-width:100%;'>
                                        <div class='sessions-header'>
                                            <?php if ($_SESSION['role'] == "admin") : ?>

                                                <h4>Sessions</h4>
                                                <button class="add-session">Add session</button>
                                            <?php else : ?>
                                                <h4>Sessions</h4>
                                            <?php endif ?>
                                            <!-- Modals -->
                                            <div class='modal'>
                                                <div class="backdrop"></div>
                                                <div class='form-container'>
                                                    <form action="actions/action.php" method='post' class='session-form'>
                                                        <label for="date">
                                                            <b>
                                                                Date:
                                                            </b>
                                                            <input type="date" name="date" id="">
                                                        </label>
                                                        <label for="shifts">
                                                            <b>
                                                                Shifts:
                                                            </b>
                                                            <div class='shifts'>
                                                                <div>
                                                                    <input type="checkbox" name="morning" id="morning" value=1>
                                                                    <p>Morning</p>
                                                                </div>
                                                                <div>
                                                                    <input type="checkbox" name="afternoon" id="afternoon" value=1>
                                                                    <p>Afternoon</p>
                                                                </div>
                                                                <div>
                                                                    <input type="checkbox" name="evening" id="evening" value=1>
                                                                    <p>Evening</p>
                                                                </div>
                                                            </div>
                                                            <input type="text" name='doc_id' value="<?php echo $doctor['doctor_id']; ?>" hidden>
                                                        </label>

                                                        <input type="submit" name="add-session" value="Create">
                                                    </form>

                                                </div>
                                            </div>
                                        </div>
                                        <?php
                                        // Fetch a doctors sessions
                                        $id = $doctor["doctor_id"];

                                        $sessions = DB::getConnection()->query("SELECT * FROM session where doctor_id='$id'")->fetchAll();

                                        if (!count($sessions) > 0) :
                                        ?>
                                            <?php if ($_SESSION['role'] == "admin") : ?>
                                                <span>Doctor currently has no sessions</span>
                                            <?php else : ?>
                                                <span>You currently have no sessions</span>

                                            <?php endif ?>
                                        <?php else : ?>
                                            <div class="overflow">
                                                <div class='sessions'>


                                                    <?php foreach ($sessions as $session) : ?>
                                                        <div class='session-card'>
                                                            <h4>Date: <span><?php echo $session['date']; ?></span></h4>
                                                            <div>
                                                                <h5>Shifts:</h5>
                                                                <div>
                                                                    <?php if ($session['morning'] == 1) : ?>
                                                                        <p>Morning</p>
                                                                    <?php endif  ?>
                                                                    <?php if ($session['afternoon'] == 1) : ?>
                                                                        <p>Afternoon</p>
                                                                    <?php endif ?>

                                                                    <?php if ($session['evening'] == 1) : ?>
                                                                        <p>Evening</p>
                                                                    <?php endif ?>

                                                                </div>
                                                            </div>

                                                            <div style='display:flex;justify-content: space-between;'>
                                                                <?php if ($_SESSION['role'] == "admin") : ?>
                                                                    <form action="actions/action.php" onSubmit="return confirm('Are you sure you wanna delete this session')">
                                                                        <input type="text" name='del_session_id' hidden value="<?php echo $session['id']; ?>" />
                                                                        <button class="btn-del">Delete</button>
                                                                    </form>
                                                                    <button class="btn-edit">Edit</button>
                                                                <?php endif ?>
                                                                <!-- Modals -->
                                                                <div class='modal'>
                                                                    <div class="backdrop"></div>
                                                                    <div class='form-container'>
                                                                        <form action="actions/action.php" method='post' class='session-form'>
                                                                            <label for="date">
                                                                                Date:
                                                                                <input type="date" name="date" value="<?php echo $session['date']; ?>">
                                                                            </label>
                                                                            <label for="shifts">
                                                                                <b>
                                                                                    Shifts:
                                                                                </b>
                                                                                <div class='shifts'>
                                                                                    <div>
                                                                                        <input type="checkbox" name="morning" id="morning" value=1 <?php if ($session['morning']) : ?> checked <?php endif ?> />
                                                                                        <p>Morning</p>
                                                                                    </div>
                                                                                    <div>
                                                                                        <input type="checkbox" name="afternoon" id="afternoon" value=1 <?php if ($session['afternoon']) : ?> checked <?php endif ?> />
                                                                                        <p>Afternoon</p>
                                                                                    </div>
                                                                                    <div>
                                                                                        <input type="checkbox" name="evening" id="evening" value=1 <?php if ($session['evening']) : ?> checked <?php endif ?> />
                                                                                        <p>Evening</p>
                                                                                    </div>
                                                                                </div>
                                                                                <input type="text" name='session_id' value="<?php echo $session['id']; ?>" hidden>
                                                                            </label>
                                                                            <input type="submit" name="edit-session" value="Edit">
                                                                        </form>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    <?php endforeach ?>
                                                </div>
                                            </div>
                                        <?php endif ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach ?>


    </div>
    <script>
        let add = document.querySelectorAll(".add-session")
        let edit = document.querySelectorAll(".btn-edit")
        let backdrop = document.querySelectorAll(".backdrop")

        add.forEach(item => {
            item.addEventListener('click', addSession)

            function addSession() {
                item.nextElementSibling.style.display = 'block'
            }
        })

        edit.forEach(item => {
            item.addEventListener('click', editSession)

            function editSession() {
                item.nextElementSibling.style.display = "block"
            }
        })

        backdrop.forEach(item => {
            item.addEventListener("click", removeBackdrop)

            function removeBackdrop() {
                item.parentElement.style.display = 'none'
            }
        })
    </script>

</div>

<script src="assets/js/jquery-3.2.1.min.js"></script>
<script src="assets/js/popper.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/app.js"></script>
<script src="assets/js/sweetalert.min.js"></script>

<?php if (isset($_SESSION["success"])) :
?>

    <script>
        swal("Success", "<?php echo $_SESSION["success"] ?>");
    </script>

<?php endif
?>

<?php if (isset($_SESSION["error"])) : ?>
    <script>
        swal("Error", "<?php echo $_SESSION["error"] ?>");
    </script>
<?php endif ?>

<?php
// unset($_SESSION["success"]);
// unset($_SESSION["error"]);
?>
<!-- <script>
    let morning = document.querySelector('#morning')

    morning.addEventListener('click', getAmount)

    function getAmount(e) {
        console.log(e.target.checked)
    }
</script> -->