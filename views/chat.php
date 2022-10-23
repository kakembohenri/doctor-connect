<div class="page-wrapper">
    <div class="chat-main-row">
        <div class="chat-main-wrapper">
            <div class="col-lg-9 message-view chat-view">
                <div class="chat-window">
                    <div class="fixed-header">
                        <div class="navbar">
                            <div class="user-details mr-auto">
                                <div class="float-left user-img m-r-10" style="height:3rem; width:3rem;">
                                    <a href="?view=profile" title="Jennifer Robinson">

                                        <?php if ($_SESSION["role"] == "patient") : ?>
                                            <img src="assets/img/<?php echo $_SESSION["user"][0]["patient_profile_image"] ?>" alt="" style='height:100%; width:100%;' class="w-40 rounded-circle">
                                        <?php elseif ($_SESSION["role"] == "doctor") : ?>
                                            <img src="assets/img/<?php echo $_SESSION["user"][0]["profile_image"] ?>" alt="" style='height:100%; width:100%;' class="w-40 rounded-circle">
                                        <?php endif ?>

                                        <span class="status online"></span></a>
                                </div>


                                <div class="user-info float-left">
                                    <a href="#"><span class="font-bold"><?php echo isset($_GET["name"]) ? $_GET["name"] : "You" ?></span> </a>
                                    <span class="last-seen">Active now</span>
                                </div>
                            </div>
                            <div class="search-box">
                                <div class="input-group input-group-sm">
                                    <input type="text" class="form-control" placeholder="Search">
                                    <span class="input-group-append">
                                        <button class="btn" type="button"><i class="fa fa-search"></i></button>
                                    </span>
                                </div>
                            </div>
                            <ul class="nav custom-menu">
                                <li class="nav-item">
                                    <a href="#chat_sidebar" class="nav-link task-chat profile-rightbar float-right" id="task_chat"><i class="fa fa-user"></i></a>
                                </li>
                                <!-- <li class="nav-item">
                                            <a class="nav-link" href="voice-call.html"><i class="fa fa-phone"></i></a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="video-call.html"><i class="fa fa-video-camera"></i></a>
                                        </li> -->
                                <li class="nav-item dropdown dropdown-action">
                                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-cog"></i></a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item" href="javascript:void(0)">Delete Conversations</a>
                                        <a class="dropdown-item" href="javascript:void(0)">Settings</a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="chat-contents">
                        <div class="chat-content-wrap">
                            <div class="chat-wrap-inner">
                                <div class="chat-box">



                                    <div class="chats" id="chatDiv">
                                        <?php if (count($chats) > 0) : ?>

                                            <?php
                                            $date = ""; ?>



                                            <?php foreach ($chats as $chat) : ?>

                                                <?php $curr_date = date("M d Y", strtotime($chat["chat_create_date"])) ?>

                                                <?php
                                                $today = date("M d Y", time());
                                                ?>

                                                <?php if ($curr_date != $date) : ?>

                                                    <?php if ($curr_date == $today) : ?>

                                                        <div class="chat-line">
                                                            <span class="chat-date">Today</span>
                                                        </div>
                                                    <?php else : ?>

                                                        <div class="chat-line">
                                                            <span class="chat-date"><?php echo $curr_date; ?></span>
                                                        </div>

                                                    <?php endif ?>

                                                    <?php $date = $curr_date; ?>
                                                <?php endif ?>


                                                <?php if ($chat["sender_role"] == $_SESSION["role"]) : ?>
                                                    <div class="chat chat-right">
                                                        <div class="chat-body">
                                                            <div class="chat-bubble">
                                                                <div class="chat-content">
                                                                    <p><?php echo $chat["chat_message"] ?></p>
                                                                    <span class="chat-time text-sm"><?php echo date("h:i a", strtotime($chat["chat_create_date"])) ?></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                <?php else : ?>

                                                    <div class="chat chat-left">
                                                        <div class="chat-body">
                                                            <div class="chat-bubble">
                                                                <div class="chat-content">
                                                                    <p><?php echo $chat["chat_message"] ?></p>
                                                                    <span class="chat-time text-sm"><?php echo date("h:i a", strtotime($chat["chat_create_date"])) ?></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                <?php endif ?>

                                            <?php endforeach ?>

                                        <?php else : ?>



                                        <?php endif ?>


                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="chat-footer">
                        <div class="message-bar">
                            <div class="message-inner">
                                <a class="link attach-icon" href="#" data-toggle="modal" data-target="#drag_files">
                                    <img src="assets/img/attachment.png" alt="">
                                </a>
                                <div class="message-area">
                                    <form id="chat_form" action="actions/action.php" method="get" role="form">
                                        <div class="input-group">

                                            <?php

                                            $patient = 0;
                                            $doctor = 0;

                                            if (isset($_GET["patient_id"])) {
                                                $patient = $_GET["patient_id"];
                                            }

                                            if (isset($_GET["doctor_id"])) {
                                                $doctor = $_GET["doctor_id"];
                                            }


                                            ?>


                                            <input type="text" name="patient_id" value="<?php echo $patient ?>" hidden>
                                            <input type="text" name="sender_role" value="<?php echo $_SESSION["role"] == "doctor" ? "doctor" : "patient" ?>" hidden>
                                            <input type="text" name="add_chat" hidden>
                                            <input type="text" name="doctor_id" value="<?php echo $doctor ?>" hidden>
                                            <textarea class="form-control" placeholder="Type message..." id="message" name="message" <?php echo $patient == 0 ? "disabled" : "" ?>></textarea>
                                            <span class="input-group-append">
                                                <button type="submit" id="send" class="btn btn-primary" name="add_chat" <?php echo $patient == 0 ? "disabled" : "" ?>><i class="fa fa-send"></i></button>
                                            </span>

                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 message-view chat-profile-view chat-sidebar" id="chat_sidebar">
                <div class="chat-window video-window">
                    <div class="fixed-header">
                        <ul class="nav nav-tabs nav-tabs-bottom">
                            <li class="nav-item"><a class="nav-link" href="#calls_tab" data-toggle="tab">Select a Chats</a></li>
                        </ul>
                    </div>
                    <div class="tab-content chat-contents">
                        <div class="content-full tab-pane active" id="calls_tab">
                            <div class="chat-wrap-inner">
                                <div class="chat-box">
                                    <div class="chats">

                                        <?php if ($_SESSION["role"] != "patient") : ?>
                                            <?php foreach ($patients as $patient) : ?>
                                                <div class="chat chat-left">
                                                    <div class="chat-avatar">
                                                        <a href="#" class="avatar">
                                                            <img alt="Cristina Groves" src="assets/img/<?php echo $patient['patient_profile_image']; ?>" class="img-fluid rounded-circle">
                                                        </a>

                                                        <?php

                                                        $_doctor = $_SESSION["user"][0]["doctor_id"];


                                                        ?>
                                                    </div>
                                                    <div class="chat-body">
                                                        <div class="chat-bubble">
                                                            <div class="chat-content">
                                                                <a href="?view=chat&doctor_id=<?php echo $_doctor ?>&patient_id=<?php echo $patient["patient_id"] ?>&name=<?php echo "Patient. " . $patient["patient_first_name"] ?>"><span class="chat-user"><?php echo $patient["patient_first_name"] ?> <?php echo $patient["patient_last_name"] ?> </span></a> <span class="badge badge-pill bg-primary float-right  text-light" id="chat-<?php echo $patient["patient_id"] ?>" style="display:none">0</span>

                                                            </div>
                                                        </div>


                                                    </div>
                                                </div>

                                            <?php endforeach ?>

                                        <?php else : ?>

                                            <?php

                                            $_patient = $_SESSION["user"][0]["patient_id"];


                                            ?>



                                            <?php foreach ($doctors as $doctor) : ?>
                                                <div class="chat chat-left">
                                                    <div class="chat-avatar">
                                                        <a href="#" class="avatar">
                                                            <img alt="Cristina Groves" src="assets/img/<?php echo $doctor['profile_image']; ?>" class="img-fluid rounded-circle">
                                                        </a>
                                                    </div>
                                                    <div class="chat-body">
                                                        <div class="chat-bubble">
                                                            <div class="chat-content">
                                                                <a href="?view=chat&patient_id=<?php echo $_patient ?>&doctor_id=<?php echo $doctor["doctor_id"] ?>&name=<?php echo "Dr. " . $doctor["doctor_first_name"] ?>"> <span class="chat-user">Dr. <?php echo $doctor["doctor_first_name"] ?> <?php echo $doctor["doctor_last_name"] ?></span></a> <span class="badge badge-pill bg-primary float-right  text-light" id="chat-<?php echo $doctor["doctor_id"] ?>" style="display:none">0</span>

                                                            </div>
                                                        </div>


                                                    </div>
                                                </div>

                                            <?php endforeach ?>




                                        <?php endif ?>






                                    </div>
                                </div>
                            </div>
                        </div>



                    </div>
                </div>
            </div>
        </div>
    </div>











</div>