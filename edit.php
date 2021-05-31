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

	$no = isset($_GET['no']) ? $_GET['no'] : header('location: data-siswa.php');

	$query2 = mysqli_query($con, "SELECT * FROM data_siswa WHERE no = '{$no}'");
	$data2 = mysqli_fetch_array($query2);
?>

<center><h1>Edit Data</h1></center>

<form method="post" class="box-form">
	<div class="form-group">
		<?php

		if (isset($_POST['edit'])) {

			echo '<div class="alert text-center">';

			$form_data = $_POST;
			foreach ($form_data as $key => $value) {
				
				$value = trim($value);

				if (empty($value)) {
					
					$error = "Harap isi semua inputan dengan benar.";
				}
			}

			if (empty($error)) {

				$update = mysqli_query($con,
					"UPDATE data_siswa
					SET nis = '{$form_data['nis']}',
					nama = '{$form_data['nama']}',
					alamat = '{$form_data['alamat']}',
					tgl_lahir = '{$form_data['tgl_lahir']}',
					tempat_lahir = '{$form_data['tempat_lahir']}',
					jk = '{$form_data['jk']}',
					asal_sekolah = '{$form_data['asal_sekolah']}',
					nama_ortu = '{$form_data['nama_ortu']}',
					no_hp = '{$form_data['no_hp']}'
					WHERE no = {$no}"
				);

				if (!$update) {
					
					echo "Gagal : " . mysqli_error();
				} else {

					$update;
					echo "
						<script>alert('Data berhasil disimpan.'); window.location.href='edit.php?no=".$no."'</script>
					";
				}	
			} else {

				echo $error;
			}

			echo "</div>";
		}

		?>
	</div>
	<div class="form-group">
		<label>NO</label>
		<input type="text" name="no" class="form-control" value="<?php echo $data2['no'] ?>" disabled>
	</div>
	<div class="form-group">
		<label>NIS</label>
		<input type="text" name="nis" class="form-control" value="<?php echo $data2['nis'] ?>" autofocus="">
	</div>
	<div class="form-group">
		<label>Nama Siswa</label>
		<input type="text" name="nama" class="form-control" value="<?php echo $data2['nama'] ?>">
	</div>
	<div class="form-group">
		<label>Alamat</label>
		<input type="text" name="alamat" class="form-control" value="<?php echo $data2['alamat'] ?>">
	</div>
	<div class="form-group">
		<label>Tanggal Lahir</label>
		<input type="date" name="tgl_lahir" class="form-control" value="<?php echo $data2['tgl_lahir'] ?>">
	</div>
	<div class="form-group">
		<label>Tempat Lahir</label>
		<input type="text" name="tempat_lahir" class="form-control" value="<?php echo $data2['tempat_lahir'] ?>">
	</div>
	<div class="form-group">
		<label>Jenis Kelamin</label> <br>
		<input type="radio" name="jk" value="L" <?php echo $data2['jk'] == 'L' ? 'checked' : false?>> Laki-laki
		<input type="radio" name="jk" value="P" <?php echo $data2['jk'] == 'P' ? 'checked' : false?>> Perempuan
		<input type="radio" name="jk" value="R" <?php echo $data2['jk'] == 'R' ? 'checked' : false?>> Rahasia
	</div>
	<div class="form-group">
		<label>Asal Sekolah</label>
		<input type="text" name="asal_sekolah" class="form-control" value="<?php echo $data2['asal_sekolah'] ?>">
	</div>
	<div class="form-group">
		<label>Nama Orang Tua</label>
		<input type="text" name="nama_ortu" class="form-control" value="<?php echo $data2['nama_ortu'] ?>">
	</div>
	<div class="form-group">
		<label>No. Telp</label>
		<input type="text" name="no_hp" class="form-control" value="<?php echo $data2['no_hp'] ?>">
	</div>
	<div class="form-group">
		<button type="submit" name="edit" value="1" class="btn btn-block">Ubah</button>
	</div>
</form>

<?php

}

?>
</center>
</div>

</body>
</html>