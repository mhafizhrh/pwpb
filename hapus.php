<?php

require 'koneksi.php';

if (isset($_GET['no'])) {
	
	$no = $_GET['no'];

	$delete = mysqli_query($con, "DELETE FROM data_siswa WHERE no = '$no'");

	if (!$delete) {
		
		echo "
			<script>alert('Hapus data gagal.'); window.location.href='data-siswa.php'</script>
		";
	} else {
		
		echo "
			<script>alert('Data telah dihapus.'); window.location.href='data-siswa.php'</script>
		";
	}
} else {

	header('location: data-siswa.php');
}

?>