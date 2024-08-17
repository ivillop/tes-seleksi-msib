<!DOCTYPE html>
<html>

<head>
	<title>Tambah Lokasi Baru</title>
	<link rel="stylesheet" href="style.css">
</head>

<body>

	<style>
		@import url("https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap");

		* {
			font-family: 'Poppins', sans-serif;
			margin: 0;
			padding: 0;
			box-sizing: border-box;
		}

		body {
			margin-block: 2rem;
			display: flex;
			gap: 1rem;
			flex-direction: column;
			margin-inline: 5rem;
		}

		input {
			width: 100%;
			padding: .5rem;
			margin-block: 1rem;
		}

		textarea {
			width: 100%;
			padding: .5rem;
			margin-block: 1rem;
		}

		button {
			padding: .5rem;
			padding-inline: 2rem;
			background-color: #94d3ff;
			border: 0;
			border-radius: 10px;
			cursor: pointer;
		}

		button:active {
			background-color: #89bee3;
		}
	</style>

	<h1>Tambah Lokasi Baru</h1>

	<?= validation_errors(); ?>

	<form action="<?= site_url('proyeklokasi/store_lokasi') ?>" method="post">
		<label>Nama Lokasi:</label>
		<input type="text" name="nama_lokasi"><br>

		<label>Negara:</label>
		<input type="text" name="negara"><br>

		<label>Provinsi:</label>
		<input type="text" name="provinsi"><br>

		<label>Kota:</label>
		<input type="text" name="kota"><br>

		<button type="submit">Simpan</button>
	</form>

</body>

</html>
