<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">
	<meta name="description" content="BigBlueButton enables universities and colleges to deliver a high-quality learning experience to remote students.">
	<meta name="keywords" content="BigBlueButton, Open Source Web Conferencing, Distance Education, Courses Online, Web Conferencing, Open Source, Desktop Sharing, Video Conferencing, Video Collaboration, Presentation Sharing, Audio Sharing, Voice Collaboration, Public Chat, Webcam Sharing, Annotation, Whiteboard, Integrated Voice Over IP, Collaboration Software, Online Collaboration, Collaborative Learning, Virtual Classroom">
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />

	<title>Sistem Informasi Pengarsipan</title>

	<!-- Custom fonts for this template-->
	<link href="<?= base_url(); ?>assets/login/css/all.min.css" rel="stylesheet" type="text/css">
	<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
	<link rel="icon" href="<?= base_url(); ?>assets/login/images/favicon.png">
	<!-- Custom styles for this template-->
	<link href="<?= base_url(); ?>assets/login/css/sb-admin-2.min.css" rel="stylesheet">
	<script src="<?= base_url(); ?>assets/login/js/bootstrap.min.js"></script>
	<script src="<?= base_url(); ?>assets/login/js/bigbluebutton.js"></script>
	<style>
		body {
			background-image: url(<?= base_url("assets/login/images/blue1.png"); ?>);
			-webkit-background-size: 100% 100%;
			-moz-background-size: 100% 100%;
			-o-background-size: 100% 100%;
			background-size: 100% 100%;
		}

		#footer {
			width: 100%;
			position: fixed;
			height: 50px;
			line-height: 50px;
			color: #000;
		}
	</style>

</head>

<body>
	<div class="container">

		<!-- Outer Row -->
		<div class="row justify-content-center">

			<div class="col-xl-10 col-lg-12 col-md-9">

				<div class="card o-hidden border-0 shadow-lg my-5">
					<div class="card-body p-0">
						<!-- Nested Row within Card Body -->
						<div class="row">
							<div class="col-lg-6 d-none d-lg-block" style="align-self: center;">
								<img src="<?= base_url(); ?>assets/login/images/undraw.png" width="100%" style="margin: 5%;">
							</div>
							<div class="col-lg-6">
								<div class="p-5">
									<div class="text-justify" style="margin-bottom: 20px;">
										<img src="<?= base_url(); ?>assets/login/images/document.png" width="53" style="float: left; margin-right: 10px;">
										<h5>SIP</h5>
										<h6 style="margin-top: -5px;">Sistem Informasi Pengarsipan</h6>
									</div>
									<div class="text-justify" style="margin-bottom: 20px; margin-top: 20px;">
										<h2>Cek Arsip Anda DiSini!</h2>
									</div>
									<form class="user" method="POST" action="<?= base_url("CustomerController"); ?>" id="form">
										<div class="form-group">
											<input type="text" class="form-control form-control-user" placeholder="Masukan Nama atau Nomor IMB" name="cek" id="user" required>
										</div>
										<input type="submit" value="Cek" class="btn btn-outline-primary btn-user btn-block">
									</form>
									<a class="btn btn-outline-success btn-user btn-block mt-5" href="<?= base_url("BaseController"); ?>">Login</a>
									<span style="margin-top: 10mm;">

									</span>
								</div>
							</div>
						</div>
					</div>
				</div>
				<?php
				if (isset($data)) {
				?>
					<div class="card o-hidden border-0 shadow-lg my-5">
						<div class="card-body p-0">
							<?php
							if ($data != null) {
							?>
								<center class="mt-4 mb-4">
									<table class="table">
										<thead class="thead-light">
											<tr>
												<th scope="col">#</th>
												<th scope="col">Nomor IMB</th>
												<th scope="col">Nama Pemilik</th>
												<th scope="col">Arsip</th>
											</tr>
										</thead>
										<?php
										$no = 1;
										foreach ($data as $dt) {
										?>
											<tbody>
												<tr>
													<th scope="row"><?= $no++; ?></th>
													<td><?= $dt['nomor_imb']; ?></td>
													<td><?= $dt['nama_pemilik']; ?></td>
													<td><a href="<?= base_url("CustomerController/preview/") . $dt['arsip']; ?>">Preview Now </td>
												</tr>
											</tbody>
										<?php
										}
										?>
									</table>
								</center>
							<?php
							} else {
							?>
								<center class="mt-4 mb-4">
									<h5 style="color: red;">Data Anda Tidak Di Temukan</h5>
								</center>
							<?php
							}
							?>
						</div>
					</div>
				<?php
				}
				?>


			</div>

		</div>

	</div>
	<div id="footer" class="text-center">
		Development by @Rizky Zakaria 2021
	</div>

	<!-- modal -->
	<div class="modal fade" id="myModal">
		<div class="modal-dialog">
			<div class="modal-content">

				<!-- Modal Header -->
				<div class="modal-header">
					<h4 class="modal-title">Modal Heading</h4>
					<button type="button" class="close" data-dismiss="modal">×</button>
				</div>

				<!-- Modal body -->
				<div class="modal-body">
					Modal body..
				</div>

				<!-- Modal footer -->
				<div class="modal-footer">
					<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
					<a href="/demo/demoHTML5.jsp" class="btn btn-primary">Lanjutkan</a>
				</div>

			</div>
		</div>
	</div>

	<!-- Bootstrap core JavaScript-->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="vendor/jquery/jquery.min.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

	<!-- Core plugin JavaScript-->
	<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

	<!-- Custom scripts for all pages-->
	<script src="js/sb-admin-2.min.js"></script>
</body>

</html>
