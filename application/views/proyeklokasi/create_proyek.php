<!DOCTYPE html>
<html>

<head>
	<title>Tambah Proyek Baru</title>
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

	<h1>Tambah Proyek Baru</h1>

	<?= validation_errors(); ?>

	<form action="<?= site_url('proyeklokasi/store_proyek') ?>" method="post">
		<label>Nama Proyek:</label>
		<input type="text" name="nama_proyek"><br>

		<label>Client:</label>
		<input type="text" name="client"><br>

		<label>Tanggal Mulai:</label>
		<input type="date" name="tgl_mulai"><br>

		<label>Tanggal Selesai:</label>
		<input type="date" name="tgl_selesai"><br>

		<label>Pimpinan Proyek:</label>
		<input type="text" name="pimpinan_proyek"><br>

		<label>Keterangan:</label>
		<textarea name="keterangan"></textarea><br>

		<button type="submit">Simpan</button>
	</form>

</body>

</html>
