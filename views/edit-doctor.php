

<?php foreach($doctors as $doctor):?>
        <div class="page-wrapper">
            <div class="content">
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                         <?php if($_SESSION["role"]=="doctor"):?>
                                 <h4 class="page-title">Edit Profile</h4>
                                <?php else: ?>
                                 <h4 class="page-title">Edit Doctor</h4>
                               <?php endif ?>
                       
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <form method="post" action="actions/action.php" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>First Name <span class="text-danger">*</span></label>
                                        <input required class="form-control" type="text" name="first_name" value="<?php echo($doctor["doctor_first_name"]) ?>">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Last Name</label>
                                        <input required class="form-control" type="text" name="last_name" value="<?php echo($doctor["doctor_last_name"]) ?>">
                                    </div>
                                </div>
                                
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Email <span class="text-danger">*</span></label>
                                        <input required class="form-control" type="email" name="email" value="<?php echo($doctor["doctor_email"]) ?>">
                                    </div>
                                </div>



                                <div class="col-sm-6">
									<div class="form-group gender-select">
										<label class="gen-label">Gender:</label>
										<div class="form-check-inline">
											<label class="form-check-label">
												<input type="radio" name="gender" value="m" <?php echo($doctor["doctor_gender"]=="m"?"checked":"") ?> class="form-check-input">Male
											</label>
										</div>
										<div class="form-check-inline">
											<label class="form-check-label">
												<input type="radio" name="gender" value="f" <?php echo($doctor["doctor_gender"]=="f"?"checked":"") ?> class="form-check-input">Female
											</label>
										</div>
									</div>
                                </div>


                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Deparment <span class="text-danger">*</span></label>

                                        <?php
                                        $id = $doctor["department_id"];
                                        ?>

                                        <select name="deparment_id" class="select form-control">
                                        <option value="<?php echo($doctor["department_id"]) ?>"><?php echo($doctor["department_name"]) ?></option>
                                      
                                        <?php foreach($depts as $dept) :?>

                                        <?php if($dept["department_id"]!=$id): ?>
                                        <option value="<?php echo($dept["department_id"]) ?>"><?php echo($dept["department_name"]) ?></option>

                                        <?php endif ?>
                                        <?php endforeach?>

                                        </select>
                                        </div>
                                </div>
								

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Phone </label>
                                        <input class="form-control" type="text" name="contact" value="<?php echo($doctor["doctor_contact"]) ?>">
                                    </div>
                                </div>
                                <div class="col-sm-6">
									<div class="form-group">
										<label>Avatar</label>
										<div class="profile-upload">
											<div class="upload-img">
												<img alt="" src="assets/img/<?php echo $doctor["profile_image"]  ?>">
											</div>
											<div class="upload-input">
												<input type="file" class="form-control" name="image" >
											</div>
										</div>
									</div>
                                </div>
                            </div>
							<div class="form-group">
                                <label>Short Biography</label>
                                <textarea class="form-control" name="biography" rows="3" cols="30"><?php echo($doctor["doctor_biography"]) ?></textarea>
                            </div>
                            <div class="form-group">
                                <label class="display-block">Status</label>
								<div class="form-check form-check-inline">
									<input class="form-check-input" type="radio" name="status" id="doctor_active" value="active" checked>
									<label class="form-check-label" for="doctor_active">
									Active
									</label>
								</div>
								<div class="form-check form-check-inline">
									<input class="form-check-input" type="radio" name="status" id="doctor_inactive" value="inactive">
									<label class="form-check-label" for="doctor_inactive">
									Inactive
									</label>
								</div>

                                <input name="id" value="<?php echo($doctor['doctor_id']) ?>" hidden >
                            </div>
                            <div class="m-t-20 text-center">
                                <button class="btn btn-primary submit-btn" name="edit_doctor">

                               <?php if($_SESSION["role"]=="doctor"):?>
                                 Update Profile
                                <?php else: ?>
                                 Update Doctor
                               <?php endif ?>

                            </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
   <?php endforeach ?>