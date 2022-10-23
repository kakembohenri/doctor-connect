


        <div class="page-wrapper">
            <div class="content">
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <h4 class="page-title">Edit Your Details Here</h4>
                    </div>
                </div>

                <?php foreach($details as $detail): ?>
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <form method="post" action="actions/action.php" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Current Diseases<span class="text-danger">*</span></label>
                                        <textarea rows="10" class="form-control" type="text" name="curr_dis" required ><?php echo $detail["current_diseases"] ?></textarea>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Previous Diseases<span class="text-danger">*</span></label>
                                        <textarea rows="10" class="form-control" type="text" name="prev_dis" required><?php echo $detail["previous_diseases"] ?></textarea>
                                    </div>
                                </div>

                                <input hidden type="text" name="doc_name" value="<?php echo $detail["document"] ?>">

                                
                                <div class="col-sm-6">
									<div class="form-group">
										<label>Document<span class="text-danger">*</span></label>
									
                                        <div class="upload-input">
                                            <input type="file" class="form-control" name="doc">
                                        </div>
										
									</div>
                                </div>
                            </div>
							
                           
                            <div class="m-t-20 text-center">
                                <button class="btn btn-primary submit-btn" name="edit_patient_details">Update Details</button>
                            </div>
                        </form>
                    </div>
                </div>

                <?php endforeach ?>
            </div>




        </div>
   