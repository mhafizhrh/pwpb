<!DOCTYPE html>
<html>
<head>
	<title>Anak Ayam</title>
	<style type="text/css">
		
		body {

			font-family: sans-serif;
		}

		.form-box {

			border-top: 10px solid green;
			border-left: 4px solid green;
			border-bottom: 10px solid red;
			border-right: 4px solid red;
			width: 60%;
			padding: 40px;
			margin: auto;
			box-sizing: border-box;
		}

		.form-control {

			border: 2px solid black;
			background-color: transparent;
			padding: 10px 20px 10px 20px;
			width: 100%;
			margin-top: 10px;
			box-sizing: border-box;
		}

		button {

			border: 2px solid black;
			background-color: transparent;
			padding: 10px 20px 10px 20px;
			margin-top: 10px;
		}
	</style>
</head>
<body>
<div class="form-box">
	<div class="form-box">
	<form method="post">
		<label>Jumlah Ayam</label>
		<input type="number" name="jumlah" class="form-control" required="">
		<button type="submit" name="kirim">Kirim</button>
	</form>
	</div>
	<?php

	if (isset($_POST['kirim'])) {
		
		$jumlah = $_POST['jumlah'];
		$jumlah_hidup = $jumlah;
		
		echo "<b><u>Ceritanya ada anak ayam turun {$jumlah} ekor.</u></b>";
		echo "<br>";

		for ($i = 1; $i < ($jumlah + 1); $i++) { 
			
			echo "Anak ayam turun {$jumlah_hidup}, ";

			$jumlah_hidup = $jumlah - $i;

			if ($jumlah_hidup <= 0) {

				echo "Mati satu tinggal Induknya....";
			} else {
				
				echo "Mati satu tinggalah " . $jumlah_hidup . ", ";
			}

			echo "<br>";
		}
	}

	?>
</div>
</body>
</html>