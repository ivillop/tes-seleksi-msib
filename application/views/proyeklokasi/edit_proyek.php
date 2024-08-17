<!DOCTYPE html>
<html>

<head>
	<title>Edit Proyek</title>
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/styles.css') ?>">
</head>

<body>

	<h1>Edit Proyek</h1>

	<form action="<?= site_url('proyeklokasi/update_proyek/' . (isset($proyek['id']) ? $proyek['id'] : '')) ?>" method="post">
		<label>Nama Proyek:</label>
		<input type="text" name="nama_proyek" value="<?= $proyek['namaProyek'] ?>"><br>

		<label>Client:</label>
		<input type="text" name="client" value="<?= $proyek['client'] ?>"><br>

		<label>Tanggal Mulai:</label>
		<input type="date" name="tgl_mulai" value="<?= $proyek['tglMulai'] ?>"><br>

		<label>Tanggal Selesai:</label>
		<input type="date" name="tgl_selesai" value="<?= $proyek['tglSelesai'] ?>"><br>

		<label>Pimpinan Proyek:</label>
		<input type="text" name="pimpinan_proyek" value="<?= $proyek['pimpinanProyek'] ?>"><br>

		<label>Keterangan:</label>
		<textarea name="keterangan"><?= $proyek['keterangan'] ?></textarea><br>

		<button type="submit">Update</button>
	</form>


</body>

</html>
