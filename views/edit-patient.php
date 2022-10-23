
        <?php foreach($patients as $patient):?>
    
        <div class="page-wrapper">
            <div class="content">
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">

                    <?php if($_SESSION["role"]=="patient"):?>
                        <h4 class="page-title">Edit Profile</h4>
                    <?php else: ?>
                        <h4 class="page-title">Edit Patient Details</h4>
                    <?php endif?>
                       
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <form method="post" action="actions/action.php" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>First Name <span class="text-danger">*</span></label>
                                        <input class="form-control" type="text" name="first_name" value="<?php echo($patient['patient_first_name']) ?>">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Last Name</label>
                                        <input class="form-control" type="text" name="last_name" value="<?php echo($patient['patient_last_name']) ?>">
                                    </div>
                                </div>
                                
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Email <span class="text-danger">*</span></label>
                                        <input class="form-control" type="email" name="email" value="<?php echo($patient['patient_email']) ?>">
                                    </div>
                                </div>




                               
								<input name="id" value="<?php echo($patient['patient_id']) ?>" hidden >
                                <div class="col-sm-6">
									<div class="form-group gender-select">
										<label class="gen-label">Gender:</label>
										<div class="form-check-inline">
											<label class="form-check-label">
												<input type="radio" name="gender" value="m" <?php echo($patient['patient_gender']=="m"?"checked":"") ?> class="form-check-input">Male
											</label>
										</div>
										<div class="form-check-inline">
											<label class="form-check-label">
												<input type="radio" name="gender" value="f" class="form-check-input" <?php echo($patient['patient_gender']=="f"?"checked":"") ?>>Female
											</label>
										</div>
									</div>
                                </div>



                            
								
                                <input type="text" name="img_name" value="<?php echo $patient['patient_profile_image'] ?>" hidden>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Phone </label>
                                        <input class="form-control" type="text" name="contact" value="<?php echo($patient['patient_contact']) ?>">
                                    </div>
                                </div>
                                <div class="col-sm-6">
									<div class="form-group">
										<label>Avatar</label>
										<div class="profile-upload">
											<div class="upload-img">
												<img alt="" src="assets/img/<?php echo $patient['patient_profile_image'] ?>" id="prevImage">
											</div>
											<div class="upload-input">
												<input type="file" class="form-control" name="profile_image" id="imgInput" accept="image/jpeg">
											</div>
										</div>
									</div>
                                </div>
                            </div>
							
                           <?php if($_SESSION["role"]=="patient"):?>
                            <div class="m-t-20 text-center">
                                <button class="btn btn-primary submit-btn" name="edit_patient">Update Profile</button>
                            </div>
                            <?php else: ?>
                                <div class="m-t-20 text-center">
                                <button class="btn btn-primary submit-btn" name="edit_patient">Edit Patient</button>
                            </div>
                            <?php endif?>
                        </form>
                    </div>
                </div>
            </div>
        </div>
 <?php endforeach ?>