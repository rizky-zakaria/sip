	<div class="card" style="width: fit-content;">
		<div class="card-header bg-secondary">
			<h2>Daftar Pemilik Arsip</h2>
			<a href="<?= base_url("BaseController/form_tambah") ?>" class="btn btn-primary float-left">Tambah</a>
		</div>
		<div class="card-body" style="width: 1230px;">
			<table id="example1" class="table table-bordered table-striped">
				<thead>
					<tr>
						<th>#</th>
						<th>Nomor Arsip</th>
						<th>Nama Pemilik</th>
						<th>Arsip</th>
						<th>action</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$no = 1;
					foreach ($arsip as $a) {
					?>
						<tr>
							<td><?= $no++; ?></td>
							<td><?= $a['nomor_arsip']; ?></td>
							<td><?= $a['nama_pemilik']; ?></td>
							<td><a href="<?= base_url("assets/upload/") . $a['arsip']; ?>"><?= $a['arsip']; ?></a></td>
							<td>
								<?php
								if ($this->session->userdata('role') == 2) {
									echo "Not Action";
								} else {
								?>
									<!-- <a href="<?= base_url("BaseController/form_edit/" . $a['id']); ?>" class="btn btn-success">Edit</a> -->
									<a href="<?= base_url("BaseController/hapus/" . $a['id']); ?>" class="btn btn-danger">Hapus</a>
								<?php
								}
								?>
							</td>
						</tr>
					<?php
					}
					?>
				</tbody>
				<tfoot>
					<tr>
						<th>#</th>
						<th>Nomor Arsip</th>
						<th>Nama Pemilik</th>
						<th>Arsip</th>
						<th>Action</th>
					</tr>
				</tfoot>
			</table>
		</div>
	</div>
