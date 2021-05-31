<!DOCTYPE html>
<html>
<head>
	<title>LOGIN USER</title>

<style type="text/css">
body {

	font-family: sans-serif;
	background-color: #f0f0f0;
}

.box {

	width: 250px;
	margin: auto;
	padding: 40px;
	background-color: white;
	-webkit-animation-name: box;
	-webkit-animation-duration: 1s;
	animation-name: box;
	animation-duration: 1s;
	-webkit-transition: width 1s;
	transition: 1s;
}

@keyframes box {

	from {width: 350px}
	to {width: 250px}
}

input {

	box-sizing: border-box;
	margin-top: 10px;
	margin-bottom: 10px; 
	padding: 6px;
	width: 100%;
}

button {

	box-sizing: border-box;
	width: 100%;
	padding: 6px;
	border: none;
	background-color: #0083ff;
	color: white;
	cursor: pointer;
}
button:hover {

	background-color: #0083aa;
}
</style>
</head>
<body>

<center><h1>LOGIN USER</h1></center>

<div class="box">
	<form method="post" action="proseslogin.php">
		<label>Username :</label>
		<input type="text" name="username" autofocus="">
		<label>Password :</label>
		<input type="password" name="password"> 
		<button type="submit">Masuk</button>
	</form>
</div>

</body>
</html>