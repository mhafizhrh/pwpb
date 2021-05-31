<?php

session_start();

?>

<!DOCTYPE html>
<html>
<head>
	<title>Dashboard</title>
	<meta charset="utf-8" name="viewport" content="width=device-width, height=device-height, inital-scale=1.0">
	<link rel="stylesheet" type="text/css" href="style.css">
	<style type="text/css">
		.table {

			border-collapse: collapse;
			width: 100%;
		}

		.table th, td {

			border: 1px solid black;
			padding: 6px 10px 6px 10px;
			font-weight: normal;
		}

		.table th {

			background-color: #f1f1f1;
			color: black;
			padding-top: 14px;
			padding-bottom: 14px;
			font-weight: bold;
		}

		tr:hover {

			background-color: #666;
			color: white;
		}

		.table td:hover {

			background-color: #666;
			color: white;
		}

		.input-search {

			border: 2px solid #666;
			border-bottom-left-radius: 26px;
			border-top-left-radius: 26px;
			border-right: none;
			font-size: 14px;
			float: left;
			margin-bottom: 10px;
			outline: none;
			padding: 8px 16px;
		}

		.btn-search {

			background-color: #666;
			border: 2px solid #666;
			border-left: none;
			border-bottom-right-radius: 26px;
			border-top-right-radius: 26px;
			color: white;
			float: left;
			font-size: 14px;
			outline: none;
			padding: 8px 16px;
		}

		.btn-search:hover {

			background-color: #777;
			cursor: pointer;
		}

		.btn {

			padding: 8px 16px;
			border: 2px solid green;
			outline: none;
			background-color: transparent;
		}

		.btn:hover {

			background-color: green;
			opacity: 0.8;
			color: white;
			cursor: pointer;
		}

		.btn-block {

			width: 100%;
		}

		.box-form {

			border: 2px solid black;
			width: 50%;
			margin: auto;
			padding: 20px;
		}

		.form-group {

			margin-bottom: 10px;
		}

		.form-group label {

			font-weight: bold;
		}

		.form-control {

			width: 100%;
			box-sizing: border-box;
			padding: 8px 0px 16px;
			font-size: 16px;
			margin-top: 4px;
			outline: none;
			border: none;
			border-bottom: 2px solid grey;
		}

		.alert {

			width: 100%;
			padding: 20px 10px 20px 10px;
			box-sizing: border-box;
			font-size: 16px;
			background-color: #f0f0f0; 
		}

		.text-center {

			text-align: center;
		}
	</style>
</head>
<body>
<div class="nav">
	<ul class="nav-list">
		<li><a href="index.php">Dashboard</a></li>
		<li><a href="data-siswa.php">Data Siswa</a></li>
		<li><a href="tambah-data.php">Tambah Data</a></li>
		<li><a href="logout.php">Keluar</a></li>
	</ul>
</div>