<div class="page-wrapper">
	<div class="content">
		<div class="row">
			<div class="col-sm-4 col-3">
				<h4 class="page-title">Patients</h4>
			</div>

		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="table-responsive">
					<table class="table table-border table-striped custom-table datatable mb-0">
						<thead>
							<tr>
								<th>First Name</th>
								<th>Last Name</th>
								<th>Age</th>
								<th>Phone</th>
								<th>Email</th>


								<th class="text-right">Action</th>

							</tr>
						</thead>
						<tbody>


							<?php foreach ($patients as $patient) : ?>

								<tr>
									<td>
										<img width="28" height="28" src="assets/img/<?php echo ($patient["patient_profile_image"]) ?>" class="rounded-circle m-r-5" alt=""> <?php echo ($patient["patient_first_name"]) ?><span class="badge badge-pill badge-sm bg-primary float-right  text-light" id="chat-<?php echo $patient["patient_id"] ?>" style="display:none">0</span>
									</td>
									<td><?php echo ($patient["patient_last_name"]) ?></td>
									<?php
									$dateOfBirth = $patient["patient_dob"];
									$today = date("Y-m-d");
									$diff = date_diff(date_create($dateOfBirth), date_create($today));
									
									?>
									<td><?php echo ($diff->format('%y')) ?></td>

									<td><?php echo ($patient["patient_contact"]) ?></td>
									<td><?php echo ($patient["patient_email"]) ?></td>

									<?php if ($_SESSION["role"] == "admin") : ?>

										<td class="text-right">
											<div class="dropdown dropdown-action">
												<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
												<div class="dropdown-menu dropdown-menu-right">
													<a class="dropdown-item" href="?view=edit-patient&id=<?php echo ($patient["patient_id"]) ?>"><i class="fa fa-pencil m-r-5"></i> Edit</a>
													<a class="dropdown-item delete" href="#" data-toggle="modal" data-target="#delete_patient" data-button="#delete" data-link="actions/action.php?delete_patient=true&id=<?php echo ($patient["patient_id"]) ?>"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
													<a class="dropdown-item" href="?view=patient-profile&id=<?php echo ($patient["patient_id"]) ?>"><i class="fa fa-pencil m-r-5"></i>Profile</a>

												</div>
											</div>
										</td>
									<?php endif ?>

									<?php if ($_SESSION["role"] == "doctor") : ?>

										<td class="text-right">
											<div class="dropdown dropdown-action">
												<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
												<div class="dropdown-menu dropdown-menu-right">
													<a class="dropdown-item" href="?view=patient-profile&id=<?php echo ($patient["patient_id"]) ?>"><i class="fa fa-pencil m-r-5"></i>Profile</a>
												</div>
											</div>
										</td>
									<?php endif ?>

								</tr>


							<?php endforeach ?>



						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>







</div>
<div id="delete_patient" class="modal fade delete-modal" role="dialog">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-body text-center">
				<img src="assets/img/sent.png" alt="" width="50" height="46">
				<h3>Are you sure want to delete this Patient?</h3>
				<div class="m-t-20"> <a href="#" class="btn btn-white" data-dismiss="modal">Close</a>
					<a id="deleteLink"><button type="submit" class="btn btn-danger">Delete</button></a>
				</div>
			</div>
		</div>
	</div>

</div>
</div>

</body>


<!-- patients23:19-->

</html>