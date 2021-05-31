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

<form method="post" class="box-form">
	<div class="form-group">
		<?php

		if (isset($_POST['tambah'])) {

			echo '<div class="alert text-center">';
			
			// $nis 			= $_POST['nis'];
			// $nama 			= $_POST['nama'];
			// $alamat 		= $_POST['alamat'];
			// $tgl_lahir  	= $_POST['tgl_lahir'];
			// $tempat_lahir	= $_POST['tempat_lahir'];
			// $jk 			= $_POST['jk'];
			// $asal_sekolah   = $_POST['asal_sekolah'];
			// $nama_ortu		= $_POST['nama_ortu'];
			// $no_hp 			= $_POST['no_hp'];

			$form_data = $_POST;
			foreach ($form_data as $key => $value) {
				
				$value = trim($value);

				if (empty($value)) {
					
					$error = "Harap isi semua inputan dengan benar.";
				}
			}

			if (empty($error)) {

				$insert = mysqli_query($con,
					"INSERT INTO data_siswa
					(nis, nama, alamat, tgl_lahir, tempat_lahir, jk, asal_sekolah, nama_ortu, no_hp)
					VALUES
					(
						'{$form_data['nis']}',
						'{$form_data['nama']}',
						'{$form_data['alamat']}',
						'{$form_data['tgl_lahir']}',
						'{$form_data['tempat_lahir']}',
						'{$form_data['jk']}',
						'{$form_data['asal_sekolah']}',
						'{$form_data['nama_ortu']}',
						'{$form_data['no_hp']}'
					)"
				);

				if (!$insert) {
					
					echo "Gagal : " . mysqli_error();
				} else {

					$insert;
					echo "Data Berhasil ditambahkan.";
				}	
			} else {

				echo $error;
			}

			echo "</div>";
		}

		?>
	</div>
	<div class="form-group">
		<label>NIS</label>
		<input type="text" name="nis" class="form-control" autofocus="" onkeypress="return Angka(event)">
	</div>
	<div class="form-group">
		<label>Nama Siswa</label>
		<input type="text" name="nama" class="form-control" onkeypress="return Huruf(event)">
	</div>
	<div class="form-group">
		<label>Alamat</label>
		<input type="text" name="alamat" class="form-control">
	</div>
	<div class="form-group">
		<label>Tanggal Lahir</label>
		<input type="date" name="tgl_lahir" class="form-control">
	</div>
	<div class="form-group">
		<label>Tempat Lahir</label>
		<input type="text" name="tempat_lahir" class="form-control">
	</div>
	<div class="form-group">
		<label>Jenis Kelamin</label> <br>
		<input type="radio" name="jk" value="L"> Laki-laki
		<input type="radio" name="jk" value="P"> Perempuan
		<input type="radio" name="jk" value="R"> Rahasia
	</div>
	<div class="form-group">
		<label>Asal Sekolah</label>
		<input type="text" name="asal_sekolah" class="form-control">
	</div>
	<div class="form-group">
		<label>Nama Orang Tua</label>
		<input type="text" name="nama_ortu" class="form-control" onkeypress="return Huruf(event)">
	</div>
	<div class="form-group">
		<label>No. Telp</label>
		<input type="text" name="no_hp" class="form-control" onkeypress="return Angka(event)">
	</div>
	<div class="form-group">
		<button type="submit" name="tambah" value="1" class="btn btn-block">Tambah</button>
	</div>
</form>

<?php

}

?>
</center>
</div>

<script>

// function cek_valid(text) {

// 	var pola =/[^a-z\d]/i;

// 	return !(pola.test(text));
// }

// function validasiAbjad(text) {

// 	if (cek_valid(document.getElementById('nama').value) == true) {

// 		$("#alert_nama").html("");
// 	} else {

// 		$("#alert_nama").html("!!");
// 	}
// }

function Huruf(value) {

	var code = (value.which) ? value.which : event.keyCode;
	if (code > 31 && (code < 65 || code > 90) && (code < 97 || code > 122) & code > 32) {
		
		return false;
	}
}

function Angka(value) {

	var code = (value.which) ? value.which : event.keyCode;
	if (code > 31 && (code < 48 || code > 57)) {

		return false;6
	}
}

</script>
</body>
</html>