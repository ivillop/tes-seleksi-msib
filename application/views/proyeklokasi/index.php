<!DOCTYPE html>
<html>

<head>
	<title>Proyek dan Lokasi</title>
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

		table,
		td,
		th {
			border: 1px solid;
		}


		table {
			width: 100%;
			border-collapse: collapse;
		}

		a {
			background-color: #94d3ff;
			padding: .5rem;
			border-radius: 10px;
			text-decoration: none;
			color: #000;
		}

		a:active {
			background-color: #89bee3;
		}

		td {
			padding: 1rem;
		}

		.add {
			display: flex;
			width: 15%;
			justify-content: center;
		}

		.action {
			display: flex;
			justify-content: center;
			gap: 1rem;
		}
	</style>
	<h1>Daftar Proyek</h1>
	<a class="add" href="<?= site_url('proyeklokasi/create_proyek') ?>">Tambah Proyek Baru</a>
	<table>
		<tr>
			<th>Nama Proyek</th>
			<th>Client</th>
			<th>Tanggal Mulai</th>
			<th>Tanggal Selesai</th>
			<th>Pimpinan Proyek</th>
			<th>Aksi</th>
		</tr>
		<?php foreach ($proyek as $p): ?>
			<tr>
				<td><?= $p['namaProyek'] ?></td>
				<td><?= $p['client'] ?></td>
				<td><?= $p['tglMulai'] ?></td>
				<td><?= $p['tglSelesai'] ?></td>
				<td><?= $p['pimpinanProyek'] ?></td>
				<td class="action">
					<a href="<?= site_url('proyeklokasi/edit_proyek/' . $p['id']) ?>">Edit</a>
					<a href="<?= site_url('proyeklokasi/delete_proyek/' . $p['id']) ?>" onclick="confirmDelete(event)">Hapus</a>
				</td>
			</tr>
		<?php endforeach; ?>
	</table>
	<h1>Daftar Lokasi</h1>
	<a class="add" href="<?= site_url('proyeklokasi/create_lokasi') ?>">Tambah Lokasi Baru</a>
	<table>
		<tr>
			<th>Nama Lokasi</th>
			<th>Negara</th>
			<th>Provinsi</th>
			<th>Kota</th>
			<th>Aksi</th>
		</tr>
		<?php foreach ($lokasi as $l): ?>
			<tr>
				<td><?= $l['namaLokasi'] ?></td>
				<td><?= $l['negara'] ?></td>
				<td><?= $l['provinsi'] ?></td>
				<td><?= $l['kota'] ?></td>
				<td class="action">
					<a href="<?= site_url('proyeklokasi/edit_lokasi/' . $l['id']) ?>">Edit</a>
					<a href="<?= site_url('proyeklokasi/delete_lokasi/' . $l['id']) ?>" onclick="confirmDelete(event)">Hapus</a>
				</td>
			</tr>
		<?php endforeach; ?>
	</table>

	<script>
		function confirmDelete(event) {
			event.preventDefault();
			var confirmed = confirm("Apakah yakin ingin dihapus?");
			if (confirmed) {
				window.location.href = event.target.href;
			}
		}
	</script>

</body>

</html>
