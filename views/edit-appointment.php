
       
       <?php foreach($appointments as $appointment): ?>
       <div class="page-wrapper">
            <div class="content">
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <h4 class="page-title">Edit Appointment</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <form method="post" action="actions/action.php">
                            <div class="row">
                                
                            </div>
                            <div class="row">
                               
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Doctor</label>
                                        <select class="select form-control" name="doctor_id">

                                        <?php foreach($doctors as $doctor): ?>
											<option value="<?php echo($doctor["doctor_id"]) ?>"><?php echo($doctor["doctor_first_name"]) ?> <?php echo($doctor["doctor_last_name"]) ?></option>
                                        <?php endforeach ?>
											
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group" >
                                        <label>Date</label>
                                        <div class="cal-icon">
                                            <input type="date" class="form-control datetimepicker" name="date" value="<?php echo($appointment["appointment_date"]) ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Time</label>
                                        <div class="time-icon">
                                            <input type="time" class="form-control"  name="time" value="<?php echo($appointment["appointment_time"]) ?>" required>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <input type="text" name="id" value="<?php echo($appointment["appointment_id"]) ?>" hidden>
                            
                            <div class="form-group">
                                <label>Message</label>
                                <textarea cols="30" rows="4" class="form-control" name="message" value="<?php echo($appointment["appointment_message"]) ?>"><?php echo($appointment["appointment_message"]) ?></textarea>
                            </div>
                            <div class="form-group">
                                <label class="display-block">Appointment Status</label>
								<div class="form-check form-check-inline">
									<input class="form-check-input" type="radio" <?php echo($appointment["appointment_status"]=="active"?"checked":"") ?> name="status" id="product_active" value="active">
									<label class="form-check-label" for="product_active">
									Active
									</label>
								</div>
								<div class="form-check form-check-inline">
									<input class="form-check-input" type="radio" name="status" <?php echo($appointment["appointment_status"]=="inactive"?"checked":"") ?> id="product_inactive" value="inactive">
									<label class="form-check-label" for="product_inactive">
									Inactive
									</label>
								</div>
                            </div>
                            <div class="m-t-20 text-center">
                                <button class="btn btn-primary submit-btn" name="edit_appointment">Update Appointment</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    <?php endforeach ?>
   