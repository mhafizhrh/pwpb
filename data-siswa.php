<?php require 'header.php'; ?>
<div class="box">
<?php

if (!isset($_SESSION['username'])) {
	
?>

<p>Anda belum masuk.</p>
<p><a href='login.php' class="logout-text">klik disini</a> untuk masuk</p>

<?php

} else {

	$username = $_SESSION['username'];

	require 'koneksi.php';

	$query = mysqli_query($con, "SELECT * FROM tbl_login WHERE username = '{$username}'");
	$data = mysqli_fetch_array($query);
?>

<h1>Data Siswa</h1>
<form method="get">
	<input type="text" name="keyword" class="input-search" placeholder="Search...">
	<button class="btn-search">GO</button>
</form>

<table class="table">
	<thead>
		<tr>
			<th>NO</th>
			<th>NIS</th>
			<th>Nama Siswa</th>
			<th>Alamat</th>
			<th>Tanggal Lahir</th>
			<th>Tempat Lahir</th>
			<th>Jenis Kelamin</th>
			<th>Asal Sekolah</th>
			<th>Nama Orang Tua</th>
			<th>No. HP</th>
			<th colspan="2">Aksi</th>
		</tr>
	</thead>
	<tbody>
		<?php
			require 'koneksi.php';

			if (isset($_GET['keyword'])) {

				$keyword = $_GET['keyword'];

				$query = mysqli_query($con,
					"SELECT * FROM data_siswa
					WHERE nis LIKE '%$keyword%'
					OR nama LIKE '%$keyword%'
					OR alamat LIKE '%$keyword%'
					OR tgl_lahir LIKE '%$keyword%'
					OR tempat_lahir LIKE '%$keyword%'
					-- OR jk LIKE '%$keyword%'
					OR asal_sekolah LIKE '%$keyword%'
					OR nama_ortu LIKE '%$keyword%'
					-- (CASE WHEN '%$keyword%' = 'Perempuan' THEN 0
					-- WHEN '%$keyword%' = 'Laki-Laki' THEN 1
					-- ELSE 3)
					OR no_hp LIKE '%$keyword%'
					ORDER BY nis ASC");	
			} else {

				$query = mysqli_query($con, "SELECT * FROM data_siswa ORDER BY nis ASC");	
			}

			$no = 1;
			while ($data = mysqli_fetch_array($query)) {
		?>

		<tr>
			<td><?php echo $no++; ?></td>
			<td><?php echo $data['nis']; ?></td>
			<td><?php echo $data['nama']; ?></td>
			<td><?php echo $data['alamat']; ?></td>
			<td><?php echo $data['tgl_lahir']; ?></td>
			<td><?php echo $data['tempat_lahir']; ?></td>
			<td>
				<?php
				if ($data['jk'] == 'L')
				{
					echo "Laki-Laki";
				}
				else if ($data['jk'] == 'P')
				{
					echo "Perempuan";
				}
				else
				{
					echo "Rahasia";
				}
				?>
			</td>
			<td><?php echo $data['asal_sekolah']; ?></td>
			<td><?php echo $data['nama_ortu']; ?></td>
			<td><?php echo $data['no_hp']; ?></td>
			<td><a href="edit.php?no=<?php echo $data['no'] ?>">Ubah</a></td>
			<td><a href="hapus.php?no=<?php echo $data['no'] ?>">Hapus</a></td>
		</tr>

		<?php
			}
		?>
	</tbody>
</table>

<?php

}

?>
</center>
</div>

</body>
</html>