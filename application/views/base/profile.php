<div class="card" style="width: 100%;">
	<div class="card-header">
		Biodata Dari <b><?= $pemohon['nama']; ?></b>
	</div>
	<div class="card-body">
		<span>NIK : <?= $pemohon['username']; ?></span><br>
		<span>Nama Lengkap : <?= $pemohon['nama']; ?></span><br>
		<span>Tanggal Lahir : <?= $pemohon['tanggal_lahir']; ?></span><br>
		<span>Tempat Lahir : <?= $pemohon['tempta_lahir']; ?></span><br>
		<span>Jenis Kelamin : <?= $pemohon['jenis_kelamin']; ?></span><br>
		<span>Pekerjaan : <?= $pemohon['pekerjan']; ?></span><br>
		<span>No. HP : <?= $pemohon['no_hp']; ?></span><br>
		<span>Email : <?= $pemohon['email']; ?></span>
	</div>
</div>
