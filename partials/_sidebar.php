<div class="sidebar" id="sidebar">
    <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: 100%; height: 271px;">
        <div class="sidebar-inner slimscroll" style="overflow: hidden; width: 100%; height: 271px;">
            <div id="sidebar-menu" class="sidebar-menu">
                <ul>
                    <li class="menu-title">Main</li>

                    <?php if ($_SESSION["role"] != "patient") : ?>
                        <li>
                            <a href="?view=dashboard" class="nav-link"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a>
                        </li>
                    <?php endif ?>
                    <li>
                        <a href="?view=doctors" class="nav-link"><i class="fa fa-user-md"></i> <span>Doctors</span></a>
                    </li>

                    <?php if ($_SESSION["role"] != "patient") : ?>
                        <li>
                            <a href="?view=patients" class="nav-link"><i class="fa fa-wheelchair"></i> <span>Patients</span></a>
                        </li>

                    <?php endif ?>


                    <li>
                        <a href="?view=appointments" class="nav-link"><i class="fa fa-calendar"></i> <span>Appointments</span></a>
                    </li>
                    <!-- <li>
                            <a href="schedule.html"><i class="fa fa-calendar-check-o"></i> <span>Doctor Schedule</span></a>
                        </li> -->
                    <?php if ($_SESSION["role"] == "admin" || $_SESSION["role"] == "doctor") : ?>
                        <li>
                            <a href="?view=sessions" class="nav-link"><i class="fa fa-hospital-o"></i> <span>Sessions</span></a>
                        </li>
                    <?php endif ?>
                    <?php if ($_SESSION['role'] == "admin") : ?>
                        <li>
                            <a href="?view=depts" class="nav-link"><i class="fa fa-hospital-o"></i> <span>Department</span></a>
                        </li>
                    <?php endif ?>

                    <?php if ($_SESSION["role"] != "admin") : ?>
                        <li>
                            <a href="?view=chat" class="nav-link"><i class="fa fa-comments"></i> <span>Chat</span> <span class="badge badge-pill bg-primary float-right chat-count">0</span> </a>
                        </li>
                    <?php endif ?>

                    <?php if ($_SESSION["role"] != "doctor" && $_SESSION["role"] != "admin") : ?>
                        <li>
                            <a href="tel:+256757878391" target="blank" class="nav-link"><i class="fa fa-ambulance"></i> <span>Emergency Call</span> </a>
                        </li>

                    <?php endif ?>

                    <?php if ($_SESSION["role"] != "patient" && $_SESSION["role"] != "admin") : ?>
                        <li>
                            <a href="video.php" target="blank" class="nav-link"><i class="fa fa-camera"></i> <span>Video Call</span> </a>
                        </li>

                    <?php endif ?>

                    <li>
                        <a href="?view=profile" class="nav-link"><i class="fa fa-user"></i> <span>My Profile</span></a>
                    </li>

                    <li><a class="text-danger" href="logout.php"><i class="fa fa-lock"></i>Logout</a></li>




                </ul>
            </div>
        </div>
        <div class="slimScrollBar" style="background: rgb(204, 204, 204) none repeat scroll 0% 0%; width: 7px; position: absolute; top: 0px; opacity: 0.4; display: none; border-radius: 7px; z-index: 99; right: 1px; height: 59.0362px;"></div>
        <div class="slimScrollRail" style="width: 7px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; background: rgb(51, 51, 51) none repeat scroll 0% 0%; opacity: 0.2; z-index: 90; right: 1px;"></div>
    </div>
</div>