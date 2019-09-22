<!DOCTYPE html>
<html lang="en" dir="ltr"
<head>
	<title>Atsijungimas</title>
	<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">	
	<link rel="stylesheet" href="app/style.css">	
</head>
<body>
	<?php
	include'config.php';
	session_start();
	session_destroy();
	header("Location: index.php");
	exit;
	?>
</body>