

<?php foreach($doctors as $doctor):?>
        
        <div class="page-wrapper">
            <div class="content">
                <div class="row">
                    <div class="col-sm-7 col-6">
                        <h4 class="page-title">Doctor's Profile</h4>
                    </div>

                
                    <?php if($_SESSION["role"]=="admin"):?>
                    <div class="col-sm-5 col-6 text-right m-b-30">
                        <a href="?view=edit-doctor&id=<?php echo $doctor["doctor_id"] ?>" class="btn btn-primary btn-rounded"><i class="fa fa-plus"></i> Edit Profile</a>
                    </div>
                    <?php endif?>
                </div>
                <div class="card-box profile-header">
                    <div class="row">
                        <div class="col-md-12" style="min-height:200px ;">
                            <div class="profile-view">
                                <div class="profile-img-wrap">
                                    <div class="profile-img">
                                        <a href="#"><img class="avatar" src="assets/img/<?php echo($doctor["profile_image"]) ?>" alt=""></a>
                                    </div>
                                </div>
                                <div class="profile-basic">
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="profile-info-left">
                                                <h3 class="user-name m-t-0 mb-0"><?php echo $doctor["doctor"."_"."first_name"] ?> <?php echo $doctor["doctor"."_"."last_name"] ?></h3>
                                                <small class="text-muted">Doctor</small>
                                                <div class="staff-id">Employee ID : DR-000<?php echo $doctor["doctor"."_"."id"] ?></div>

                                                <?php if($_SESSION["role"]=="patient"):?>
										
                                                <div class="staff-msg"><a href="<?php echo $_SESSION["role"]!="admin"?"?view=chat&doctor_id=".$doctor["doctor"."_"."id"]:"" ?>&name=<?php echo "Dr. ".$doctor["doctor_first_name"] ?>" class="btn btn-primary "><?php echo $_SESSION["role"]=="admin"?"No Chats":"Chat Now" ?></a></div>
                                                <?php endif ?>
                                            </div>
                                        </div>
                                        <div class="col-md-7">
                                            <ul class="personal-info">
                                                <li>
                                                    <span class="title">Phone:</span>
                                                    <span class="text"><a href="#"><?php echo $doctor["doctor"."_"."contact"] ?></a></span>
                                                </li>
                                                <li>
                                                    <span class="title">Email:</span>
                                                    <span class="text"><a href="#"><?php echo $doctor["doctor"."_"."email"] ?></a></span>
                                                </li>


                                                

                                                
                                                    <li>
                                                    <span class="title">Biography</span>
                                                    <span class="text"><?php echo $doctor["doctor"."_"."biography"] ?></span>
                                                    </li>

                                                
                                                
                                                
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>                        
                        </div>
                    </div>
                </div>


            </div>
            
        
        </div>
   
        <?php endforeach ?>