	<?php
	function connect(){
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "eilute";
	$connection = mysqli_connect($servername, $username, $password, $dbname);
	mysqli_set_charset($connection, "utf8");
	return $connection;
	}
	$connection = connect();