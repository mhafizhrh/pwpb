<?php require 'header.php'; ?>
<div class="box">
<center>

	<h1>Dashboard</h1>

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
	
	<h3>Selamat datang, <?php echo $data['full_name']; ?>!</h3>
	
	<?php

	}

	?>
</center>
</div>

</body>
</html>