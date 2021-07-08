	<div class="card" style="width: 100%;">
		<div class="card-header">
			<h2>Form Edit</h2>
		</div>
		<div class="card-body">
			<form enctype="multipart/form-data" action="<?= base_url("UserController/proses_edit"); ?>" method="post">
				<div class="input-group mb-3">
					<div class="input-group-prepend">
						<span class="input-group-text">NIK</span>
					</div>
					<input type="text" value="<?= $user['username'] ?>" class="form-control" placeholder="Nama Pemilik" aria-label="Username" name="username" aria-describedby="basic-addon1">
					<input type="hidden" value="<?= $user['id'] ?>" class="form-control" placeholder="Nama Pemilik" aria-label="Username" name="id" aria-describedby="basic-addon1">
				</div>
				<div class="input-group mb-3">
					<div class="input-group-prepend">
						<span class="input-group-text">Password</span>
					</div>
					<input type="text" value="<?= $user['password'] ?>" class="form-control" placeholder="Nama Pemilik" aria-label="Username" name="password" aria-describedby="basic-addon1">
				</div>
				<div class="input-group mb-3">
					<div class="input-group-prepend">
						<span class="input-group-text">Nama</span>
					</div>
					<input type="text" value="<?= $user['nama'] ?>" class="form-control" name="nama">
				</div>
				<div class="input-group mb-3">
					<div class="input-group-prepend">
						<span class="input-group-text">Tempat Lahir</span>
					</div>
					<input type="text" value="<?= $user['tempta_lahir'] ?>" name="tempat_lahir" class="form-control" name="password">
				</div>
				<div class="input-group mb-3">
					<div class="input-group-prepend">
						<span class="input-group-text">Tanggal Lahir</span>
					</div>
					<input type="text" value="<?= $user['tanggal_lahir'] ?>" name="tanggal_lahir" class="form-control" name="password">
				</div>
				<div class="input-group mb-3">
					<div class="input-group-prepend">
						<span class="input-group-text">Alamat</span>
					</div>
					<input type="text" value="<?= $user['alamat'] ?>" name="alamat" class="form-control" name="password">
				</div>
				<div class="input-group mb-3">
					<div class="input-group-prepend">
						<span class="input-group-text">Jenis Kelamin</span>
					</div>
					<select class="form-control" name="jenis_kelamin" id="exampleFormControlSelect1">
						<option value="Pria">Pria</option>
						<option value="Wanita">Wanita</option>
					</select>
				</div>
				<div class="input-group mb-3">
					<div class="input-group-prepend">
						<span class="input-group-text">Pekerjaan</span>
					</div>
					<input type="text" name="pekerjaan" value="<?= $user['pekerjan'] ?>" class="form-control" name="password">
				</div>
				<div class="input-group mb-3">
					<div class="input-group-prepend">
						<span class="input-group-text">No. HP</span>
					</div>
					<input type="text" name="no_hp" value="<?= $user['no_hp'] ?>" class="form-control" name="password">
				</div>
				<div class="input-group mb-3">
					<div class="input-group-prepend">
						<span class="input-group-text">Email</span>
					</div>
					<input type="text" name="email" value="<?= $user['email'] ?>" class="form-control" name="password">
				</div>

				<!-- <div class="input-group"> -->
				<input type="submit" value="Simpan" class="btn btn-success" style="width: 400px; float: right;">
				<!-- </div> -->
			</form>
		</div>
	</div>
