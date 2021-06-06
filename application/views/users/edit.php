	<div class="card" style="width: fit-content;">
		<div class="card-header bg-secondary">
			<h2>Form Edit</h2>
		</div>
		<div class="card-body" style="width: 1230px;">
			<form enctype="multipart/form-data" action="<?= base_url("UserController/proses_edit"); ?>" method="post">
				<div class="input-group mb-3">
					<div class="input-group-prepend">
						<i class="fas fa-user input-group-text"></i>
					</div>
					<input type="text" value="<?= $user['username'] ?>" class="form-control" placeholder="Nama Pemilik" aria-label="Username" name="username" aria-describedby="basic-addon1">
					<input type="hidden" value="<?= $user['id'] ?>" class="form-control" placeholder="Nama Pemilik" aria-label="Username" name="id" aria-describedby="basic-addon1">
				</div>
				<div class="input-group mb-3">
					<div class="input-group-prepend">
						<i class="fas fa-user input-group-text"></i>
					</div>
					<input type="text" value="<?= $user['password'] ?>" class="form-control" placeholder="Nama Pemilik" aria-label="Username" name="password" aria-describedby="basic-addon1">
				</div>
				<!-- <div class="input-group"> -->
				<input type="submit" value="Simpan" class="btn btn-success" style="width: 400px; float: right;">
				<!-- </div> -->
			</form>
		</div>
	</div>
