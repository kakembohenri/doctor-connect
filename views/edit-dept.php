
        <div class="page-wrapper">
            <div class="content">
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <h4 class="page-title">Edit Department</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">


                       <?php foreach($depts as $dept):?>
                        <form method="post" action="actions/action.php">
							<div class="form-group">
								<label>Department Name</label>
								<input class="form-control" required type="text" name="dept_name" value="<?php echo($dept["department_name"]) ?>" required>
							</div>
                            <div class="form-group">
                                <label>Description</label>
                                <textarea cols="30" rows="4" name="desc" class="form-control"><?php echo $dept["department_desc"]; ?></textarea>
                            </div>
                            <div class="form-group">
                                <label class="display-block">Department Status</label>
								<div class="form-check form-check-inline">
									<input class="form-check-input" type="radio" name="status" name="status" id="product_active" value="active" checked>
									<label class="form-check-label" for="product_active">
									Active
									</label>
								</div>

                                <input required type="text" name="id" value="<?php echo($dept["department_id"])?>" hidden>
								<div class="form-check form-check-inline">
									<input class="form-check-input" type="radio" name="status" id="product_inactive" value="inactive">
									<label class="form-check-label" for="product_inactive">
									Inactive
									</label>
								</div>
                            </div>
                            <div class="m-t-20 text-center">
                                <button class="btn btn-primary submit-btn" name="edit_dept">Update Department</button>
                            </div>
                        </form>

                    <?php endforeach ?>
                    </div>
                </div>
            </div>

        </div>
   
