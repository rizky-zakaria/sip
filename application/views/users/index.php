	<div class="card" style="width: fit-content;">
		<div class="card-header bg-secondary">
			<h2>Daftar Pengguna</h2>
			<!-- <a href="<?= base_url("BaseController/form_tambah") ?>" class="btn btn-primary float-left">Tambah</a> -->
		</div>
		<div class="card-body" style="width: 1230px;">
			<table id="example2" class="table table-bordered table-striped">
				<thead>
					<tr>
						<th>#</th>
						<th>Username</th>
						<th>Password</th>
						<th>Role</th>
						<th>action</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$no = 1;
					foreach ($data as $a) {
					?>
						<tr>
							<td><?= $no++; ?></td>
							<td><?= $a['username']; ?></td>
							<td><?= $a['password']; ?></td>
							<td>
								<?php
								if ($a['role'] == 1) {
									echo "Admin";
								} elseif ($a['role'] == 2) {
									echo "Kepala";
								} elseif ($a['role'] == 3) {
									echo "User";
								} else {
									echo "Anda Tidak Memilika Role";
								}
								?>
							</td>
							<td>
								<?php
								if ($this->session->userdata('role') == 3) {
									echo "Not Action";
								} else {
								?>
									<a href="<?= base_url("UserController/form_edit/" . $a['id']); ?>" class="btn btn-success">Edit</a>
									<!-- <a href="<?= base_url("UserController/hapus/" . $a['id']); ?>" class="btn btn-danger">Hapus</a> -->
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
						<th>Username</th>
						<th>Password</th>
						<th>Role</th>
						<th>Action</th>
					</tr>
				</tfoot>
			</table>
		</div>
	</div>
