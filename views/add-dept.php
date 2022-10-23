
        <div class="page-wrapper">
            <div class="content">
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <h4 class="page-title">Add Department</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <form method="post" action="actions/action.php">
							<div class="form-group">
								<label>Department Name</label>
								<input class="form-control" type="text" name="dept_name">
							</div>
                            <div class="form-group">
                                <label>Description</label>
                                <textarea cols="30" rows="4" name="desc" class="form-control"></textarea>
                            </div>
                            <div class="form-group">
                                <label class="display-block">Department Status</label>
								<div class="form-check form-check-inline">
									<input class="form-check-input" type="radio" name="status" name="status" id="product_active" value="active" checked>
									<label class="form-check-label" for="product_active">
									Active
									</label>
								</div>
								<div class="form-check form-check-inline">
									<input class="form-check-input" type="radio" name="status" id="product_inactive" value="inactive">
									<label class="form-check-label" for="product_inactive">
									Inactive
									</label>
								</div>
                            </div>
                            <div class="m-t-20 text-center">
                                <button class="btn btn-primary submit-btn" name="add_dept">Add Department</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
   
