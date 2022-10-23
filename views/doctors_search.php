
        <div class="page-wrapper">
            <div class="content">
                <form  class="row col-lg-8">
                    <input type="text" value="doctors_search" name="view" hidden>
                    <input type="search" name="query" placeholder="Search Doctor here..." class="form-control col-lg-5 mr-2" >
                    <button name="search_doctor" class="btn btn-primary">Search</button>
                </form>
                <br>
                <div class="row">
                    <div class="col-sm-4 col-3">
                        <h4 class="page-title">Doctors</h4>
                    </div>
                    <div class="col-sm-8 col-9 text-right m-b-20">

                    <?php if($_SESSION["role"]=="admin"): ?>
                        <a href="?view=add-doctor&token=<?php echo(rand(12,1000000000).rand(7000,9000)) ?>" class="btn btn-primary btn-rounded float-right"><i class="fa fa-plus"></i> Add Doctor</a>
                    <?php endif ?>
                            </div>
                </div>
				<div class="row doctor-grid">


        
                    <?php if(isset($doctors)):?>
                    
                    <?php foreach($doctors as $doctor):?>

                    <div class="col-md-4 col-sm-4  col-lg-3">
                        <div class="profile-widget">
                        <span class="badge badge-pill bg-primary float-right  text-light" id="chat-<?php echo $doctor["doctor_id"] ?>" style="display:none">0</span>
                            <div class="doctor-img">
                                <a class="avatar" href="?view=doctor-profile&id=<?php echo($doctor["doctor_id"]) ?>"><img alt="" src="assets/img/<?php echo($doctor['profile_image'])?>"></a>
                            </div>

                            

                            <?php if($_SESSION["role"]=="admin"):?>
                            <div class="dropdown profile-action">
                                <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="?view=edit-doctor&id=<?php echo($doctor["doctor_id"]) ?>"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                    <a class="dropdown-item delete" href="#" data-toggle="modal" data-target="#delete_doctor"     data-button="#delete"  data-link="actions/action.php?delete_doctor=true&id=<?php echo($doctor["doctor_id"]) ?>"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
                                </div>
                            </div>
                            <?php endif ?>
                            <h4 class="doctor-name text-ellipsis"><?php echo($doctor["doctor_first_name"]) ?> <?php echo($doctor["doctor_last_name"]) ?> </h4>
                            <div class="doc-prof"><?php echo($doctor["department_name"]) ?></div>
                            <div class="row justify-content-center rating-box" rating-value="<?php echo(floor($doctor["rating"])>0?$doctor["rating"]:0) ?>" >
                                <i class="fa fa-star doctor-<?php echo($doctor["doctor_id"]) ?>" target-doctor-id="#doctor<?php echo($doctor["doctor_id"]) ?>" value="1"></i>
                                <i class="fa fa-star doctor-<?php echo($doctor["doctor_id"]) ?>" target-doctor-id="#doctor<?php echo($doctor["doctor_id"]) ?>" value="2"  doctor-class=".doctor-<?php echo($doctor["doctor_id"]) ?>"></i>
                                <i class="fa fa-star doctor-<?php echo($doctor["doctor_id"]) ?>" target-doctor-id="#doctor<?php echo($doctor["doctor_id"]) ?>" value="3" doctor-class=".doctor-<?php echo($doctor["doctor_id"]) ?>"></i>
                                <i class="fa fa-star doctor-<?php echo($doctor["doctor_id"]) ?>" target-doctor-id="#doctor<?php echo($doctor["doctor_id"]) ?>" value="4" doctor-class=".doctor-<?php echo($doctor["doctor_id"]) ?>"></i>
                                <i class="fa fa-star doctor-<?php echo($doctor["doctor_id"]) ?>" target-doctor-id="#doctor<?php echo($doctor["doctor_id"]) ?>" value="5" doctor-class=".doctor-<?php echo($doctor["doctor_id"]) ?>"></i>

                                <input hidden type="text" id="doctor<?php echo($doctor["doctor_id"]) ?>" doctor-id="<?php echo($doctor["doctor_id"]) ?>" value="">
                            </div>
                            <br>

                            <?php if($_SESSION["role"]=="patient"):?>
                            <button  class="btn btn-sm btn-primary btn-round save-rating" patient-id="<?php echo $_SESSION["user"][0]["patient_id"]?>" doctor-id="<?php echo($doctor["doctor_id"]) ?>"  target-doctor-id="#doctor<?php echo(($doctor["doctor_id"]))?>"  >Save Rating</button>
                            <?php endif ?>
                            <hr>
                            <div class="user-country">
                                <i class="fa fa-envelope"></i> <?php echo($doctor["doctor_email"]) ?>
                            </div>

                            <div class="user-country">
                                <i class="fa fa-phone"></i> <?php echo($doctor["doctor_contact"]) ?>
                            </div>
                        </div>
                    </div>

                    <?php endforeach ?>
                    <?php endif ?>


                   
  


                </div>
				
            </div>


            
            <div id="delete_doctor" class="modal fade delete-modal" role="dialog">
				<div class="modal-dialog modal-dialog-centered">
					<div class="modal-content">
						<div class="modal-body text-center">
							<img src="assets/img/sent.png" alt="" width="50" height="46">
							<h3>Are you sure want to delete this Doctor?</h3>
							<div class="m-t-20"> <a href="#" class="btn btn-white" data-dismiss="modal">Close</a>
								<a id="deleteLink"><button type="submit" class="btn btn-danger">Delete</button></a>
							</div>
						</div>
					</div>
				</div>
			</div>


        </div>
		