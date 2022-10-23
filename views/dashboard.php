<div class="page-wrapper">
	<style>
		.contact-list>li {
			display: flex;
		}
	</style>
	<div class="content">
		<div class="row">
			<div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
				<div class="dash-widget">
					<span class="dash-widget-bg1"><i class="fa fa-stethoscope" aria-hidden="true"></i></span>
					<div class="dash-widget-info text-right">
						<h3><?php echo count($doctors) ?></h3>
						<span class="widget-title1">Doctors <i class="fa fa-check" aria-hidden="true"></i></span>
					</div>
				</div>
			</div>
			<div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
				<div class="dash-widget">
					<span class="dash-widget-bg2"><i class="fa fa-user-o"></i></span>
					<div class="dash-widget-info text-right">
						<h3><?php echo count($patients) ?></h3>
						<span class="widget-title2">Patients <i class="fa fa-check" aria-hidden="true"></i></span>
					</div>
				</div>
			</div>
			<div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
				<div class="dash-widget">
					<span class="dash-widget-bg3"><i class="fa fa-user-md" aria-hidden="true"></i></span>
					<div class="dash-widget-info text-right">
						<h3><?php echo count($depts) ?></h3>
						<span class="widget-title3">Departments <i class="fa fa-check" aria-hidden="true"></i></span>
					</div>
				</div>
			</div>
			<div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
				<div class="dash-widget">
					<span class="dash-widget-bg4"><i class="fa fa-clock-o" aria-hidden="true"></i></span>
					<div class="dash-widget-info text-right">
						<h3><?php echo count($appointments) ?></h3>
						<span class="widget-title4">Appointments <i class="fa fa-check" aria-hidden="true"></i></span>
					</div>
				</div>
			</div>
		</div>
		<div class="row" style="display:none;">

			<div class="col-12 col-md-6 col-lg-6 col-xl-6">
				<div class="card">
					<div class="card-body">
						<!-- <div class="chart-title">
							<h4>Patients In</h4>
							<div class="float-right">
								<ul class="chat-user-total">
									<li><i class="fa fa-circle current-users" aria-hidden="true"></i>ICU</li>
									<li><i class="fa fa-circle old-users" aria-hidden="true"></i> OPD</li>
								</ul>
							</div>
						</div> -->
						<canvas id="bargraph"></canvas>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-12 col-md-6 col-lg-8 col-xl-8">
				<div class="card" style="min-height:300px ;">
					<div class="card-header">
						<h4 class="card-title d-inline-block">Upcoming Appointments</h4> <a href="?view=appointments" class="btn btn-primary float-right">View all</a>
					</div>
					<div class="card-body p-0">
						<div class="table-responsive">
							<table class="table mb-0">
								<thead class="d-none">
									<tr>
										<th>Patient Name</th>
										<th>Doctor Name</th>
										<th>Timing</th>
										<th class="text-right">Status</th>
									</tr>
								</thead>
								<tbody>

									<?php foreach ($appointments as $appointment) : ?>
										<tr>
											<td style="min-width: 200px;">
												<a href="profile.html"><img width="28" height="28" src="assets/img/<?php echo ($appointment["patient_profile_image"]) ?>" class="rounded-circle m-r-4" alt=""></a>
												<h2><a href="profile.html"><?php echo $appointment["patient_first_name"] ?><span><?php echo $appointment["patient_contact"] ?></span></a></h2>
											</td>
											<td>
												<h5 class="time-title p-0">Appointment With</h5>
												<p>Dr. <?php echo $appointment["doctor_first_name"] ?></p>
											</td>
											<td>
												<h5 class="time-title p-0">Time</h5>
												<p><?php echo $appointment["start_time"] . " - " . $appointment["end_time"]; ?></p>
											</td>
											<td class="text-right">
												<a href="?view=appointments&id=<?php echo $appointment['appointment_id']; ?>" class="btn btn-outline-primary take-btn">More</a>
											</td>
										</tr>

									<?php endforeach ?>




								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
			<div class="col-12 col-md-6 col-lg-4 col-xl-4">
				<div class="card member-panel">
					<div class="card-header bg-white">
						<h4 class="card-title mb-0">Doctors</h4>
					</div>
					<div class="card-body">
						<ul class="contact-list">

							<?php foreach ($doctors as $doctor) : ?>

								<li>
									<div class="contact-cont" style='display: flex;'>
										<div class="float-left user-img m-r-10" style="height:3rem; width:3rem;">
											<a href="profile.html" title="John Doe"><img src="assets/img/<?php echo ($doctor["profile_image"]) ?>" class="w-40 rounded-circle img-fluid" style='width:100%; height:100%; border-radius:50%;' alt=""></a>
										</div>
										<div class="contact-info">
											<span class="contact-name text-ellipsis"><?php echo $doctor["doctor_first_name"] ?></span>
											<span class="contact-date"><?php echo $doctor["doctor_contact"] ?></span>
										</div>
									</div>
								</li>

							<?php endforeach ?>

						</ul>


					</div>
					<div class="card-footer text-center bg-white">
						<a href="?view=doctors" class="text-muted">View all Doctors</a>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-12 col-md-6 col-lg-8 col-xl-8">
				<div class="card" style="min-height:300px ;">
					<div class="card-header">
						<h4 class="card-title d-inline-block">New Patients </h4> <a href="?view=patients" class="btn btn-primary float-right">View all</a>
					</div>
					<div class="card-block">
						<div class="table-responsive">
							<table class="table mb-0 new-patient-table">
								<tbody>


									<?php foreach ($patients as $patient) : ?>
										<tr>
											<td>
												<img width="28" height="28" class="rounded-circle" src="assets/img/<?php echo ($patient["patient_profile_image"]) ?>" alt="">
												<h2><?php echo $patient["patient_first_name"] ?> <?php echo $patient["patient_last_name"] ?></h2>
											</td>
											<td><?php echo $patient["patient_email"] ?></td>
											<td><?php echo $patient["patient_contact"] ?></td>
											<td><a href="?view=patients"><button class="btn btn-primary btn-primary-one float-right">Details</button></a> </td>
										</tr>

									<?php endforeach ?>


								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
			<?php if ($_SESSION["role"] == "admin") : ?>
				<div class="col-12 col-md-6 col-lg-4 col-xl-4">
					<div class="hospital-barchart">
						<h4 class="card-title d-inline-block">Hospital Management</h4>
					</div>
					<div class="bar-chart">
						<div class="legend">
							<div class="item">
								<h4>LOW</h4>
							</div>

							<div class="item">
								<h4>MODERATE</h4>
							</div>
							<div class="item text-right">
								<h4>HIGH</h4>
							</div>

						</div>
						<div class="chart clearfix">
							<div class="item">
								<div class="bar">

									<?php
									$numOfDoctors = count($doctors);
									$percentage = 100;
									$numOfPatients = count($patients);
									$totalNumOfUsers = count($doctors) + count($patients);
									$doctorsPercent = round((($numOfDoctors / $totalNumOfUsers) * $percentage), 2);
									$patientPercent = round((($numOfPatients / $totalNumOfUsers) * $percentage), 2);

									?>
									<span class="percent"> <?php echo $doctorsPercent ?> %</span>
									<div class="item-progress" data-percent="16" style="width:<?php echo $doctorsPercent . "%"; ?>">
										<span class="title">Doctors</span>
									</div>
								</div>
							</div>
							<div class="item">
								<div class="bar">
									<span class="percent"><?php echo $patientPercent ?> %</span>
									<div class="item-progress" data-percent="71" style="width:<?php echo $patientPercent . "%"; ?>">
										<span class="title">Patients</span>
									</div>
								</div>
							</div>
							<div class="item">
								<div class="bar">
									<span class="percent"> <?php echo count($appointments) ?> </span>
									<div class="item-progress" data-percent="82" style="width:<?php echo count($appointments) . "%"; ?>">
										<span class="title">Appointments</span>
									</div>
								</div>
							</div>


						</div>
					</div>
				</div>
			<?php endif ?>
		</div>
	</div>



	<div class="notification-box">
		<div class="msg-sidebar notifications msg-noti">
			<div class="topnav-dropdown-header">
				<span>Messages</span>
			</div>
			<div class="drop-scroll msg-list-scroll" id="msg_list">
				<ul class="list-box">

					<?php foreach ($patients as $patient) : ?>
						<li>
							<a href="?view=chat">
								<div class="list-item">
									<div class="list-left">
										<span class="avatar">R</span>
									</div>
									<div class="list-body">
										<span class="message-author"><?php echo ($patient["patient_first_name"])  ?> </span>

										<div class="clearfix"></div>
										<span class="message-content"><?php echo ($patient["patient_contact"])  ?></span>
									</div>
								</div>
							</a>
						</li>

						<?php




						?>

					<?php endforeach ?>

				</ul>


			</div>
			<div class="topnav-dropdown-footer">
				<a href="chat.html">See all messages</a>
			</div>
		</div>
	</div>
</div>

</div>