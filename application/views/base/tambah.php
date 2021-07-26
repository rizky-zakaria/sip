	<div class="card" style="width: 100%;">
		<h5 class="card-header">Form Tambah</h5>
		<div class="card-body">
			<form enctype="multipart/form-data" action="<?= base_url("BaseController/proses_tambah"); ?>" method="post">
				<div class="input-group mb-3">
					<div class="input-group-prepend">
						<!-- <i class="input-group-text" id="basic-addon1"></i> -->
						<i class="fas fa-user input-group-text"></i>
					</div>
					<input type="text" class="form-control" placeholder="Nama Pemilik" aria-label="Username" name="nama" aria-describedby="basic-addon1">
				</div>
				<div class="input-group mb-3">
					<div class="input-group-prepend">
						<!-- <i class="input-group-text" id="basic-addon1"></i> -->
						<i class="fas fa-user input-group-text"></i>
					</div>
					<input type="text" class="form-control" placeholder="Jenis Arsip" aria-label="Username" name="jenis" aria-describedby="basic-addon1">
				</div>
				<div class="input-group mb-3">
					<div class="input-group-prepend">
						<!-- <i class="input-group-text" id="basic-addon1"></i> -->
						<i class="fas fa-user input-group-text"></i>
					</div>
					<input type="text" class="form-control" placeholder="Keterangan" aria-label="Username" name="keterangan" aria-describedby="basic-addon1">
				</div>
				<div class="input-group mb-3">
					<div class="input-group-prepend">
						<!-- <i class="input-group-text" id="basic-addon1"></i> -->
						<i class="fas fa-edit input-group-text"></i>
					</div>
					<input type="date" class="form-control" placeholder="Date" aria-label="Username" name="tanggal" aria-describedby="basic-addon1">
				</div>
				<div class="input-group mb-3">
					<div class="input-group-prepend">
						<i class="fas fa-file input-group-text"></i>
					</div>
					<div class="custom-file">
						<input type="file" class="custom-file-input" id="inputGroupFile01" name="file">
						<label class="custom-file-label" for="inputGroupFile01">Tambahkan File</label>
					</div>
				</div>
				<!-- <div class="input-group"> -->
				<input type="submit" value="Simpan" class="btn btn-success" style="width: 400px; float: right;">
				<!-- </div> -->
			</form>
		</div>
	</div>
