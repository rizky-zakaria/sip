	<div class="card" style="width: fit-content;">
		<div class="card-header bg-secondary">
			<h2>Daftar Pemilik Bangunan</h2>
			<!-- <a href="<?= base_url("BaseController/form_tambah") ?>" class="btn btn-primary float-left">Tambah</a> -->
		</div>
		<div class="card-body" style="width: 1230px;">
			<table id="example2" class="table table-bordered table-striped">
				<thead>
					<tr>
						<th>#</th>
						<th>Nomor Arsip</th>
						<th>Nama Pemohon</th>
						<th>Arsip</th>
						<th>Status</th>
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
							<td><?= $a['nama']; ?></td>
							<td><a href="<?= base_url("assets/upload/") . $a['arsip']; ?>"><?= $a['arsip']; ?></a></td>
							<td>
								<?php
								if ($a['status'] == 'diajukan') {
								?>
									<a href="<?= base_url("BaseController/ubahStatus/") . $a['id_peminjaman'] ?>" class="btn btn-danger">Setujui</a>
								<?php
								} else {
									echo '<a href="" class="btn btn-success">Telah DiSetujui</a>';
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
						<th>Nomor IMB</th>
						<th>Nama Pemilik</th>
						<th>Arsip</th>
						<th>Action</th>
					</tr>
				</tfoot>
			</table>
		</div>
	</div>
