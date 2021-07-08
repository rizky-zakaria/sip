<!-- aa -->
<div class="card" style="width: 100%;">
	<div class="card-header">
		Featured
	</div>
	<div class="card-body">
		<table id="example1" class="table table-bordered table-striped">
			<thead>
				<tr>
					<th>#</th>
					<th>Nomor Arsip</th>
					<th>Nama Pemohon</th>
					<th>NIK Pemohon</th>
					<th>Tanggal Mohon</th>
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
						<td><a href="<?= base_url("BaseController/viewArsip/" . $a['nomor_arsip']) ?>"><?= $a['nomor_arsip']; ?></a></td>
						<td><?= $a['nama']; ?></td>
						<td><a href="<?= base_url("BaseController/viewPemohon/" . $a['username']) ?>"><?= $a['username']; ?></a></td>
						<td><?= $a['tanggal_mohon']; ?></td>
						<td><a href="<?= base_url("assets/upload/") . $a['arsip']; ?>"><?= $a['arsip']; ?></a></td>
						<td>
							<?php
							if ($this->session->userdata('role') == 2) {
								if ($a['status'] == 'diajukan') {
							?>
									<span class="text-danger">Belum Di Setujui</span>
								<?php
								} else {
								?>
									<span class="text-success">Telah Di Setujui</span>
								<?php
								}
							} else {
								?>
								<?php
								if ($a['status'] == 'diajukan') {
								?>
									<a href="<?= base_url("BaseController/ubahStatus/") . $a['id_peminjaman'] ?>" class="btn btn-danger">Setujui</a>
								<?php
								} else {
									echo '<a href="" class="btn btn-success">Telah DiSetujui</a>';
								}
								?>
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
					<th>Tanggal Mohon</th>
					<th>Arsip</th>
					<th>Action</th>
					<th>status</th>
				</tr>
			</tfoot>
		</table>
	</div>
</div>
