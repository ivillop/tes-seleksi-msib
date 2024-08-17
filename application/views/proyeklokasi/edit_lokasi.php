<!DOCTYPE html>
<html>

<head>
	<title>Edit Lokasi</title>
	<link rel="stylesheet" href="style.css">
</head>

<body>

	<h1>Edit Lokasi</h1>

	<form action="<?= site_url('proyeklokasi/update_lokasi/' . (isset($lokasi['id']) ? $lokasi['id'] : '')) ?>" method="post">
		<label>Nama Lokasi:</label>
		<input type="text" name="nama_lokasi" value="<?= isset($lokasi['nama_lokasi']) ? $lokasi['nama_lokasi'] : '' ?>"><br>

		<label>Negara:</label>
		<input type="text" name="negara" value="<?= isset($lokasi['negara']) ? $lokasi['negara'] : '' ?>"><br>

		<label>Provinsi:</label>
		<input type="text" name="provinsi" value="<?= isset($lokasi['provinsi']) ? $lokasi['provinsi'] : '' ?>"><br>

		<label>Kota:</label>
		<input type="text" name="kota" value="<?= isset($lokasi['kota']) ? $lokasi['kota'] : '' ?>"><br>

		<button type="submit">Update</button>
	</form>

</body>

</html>
