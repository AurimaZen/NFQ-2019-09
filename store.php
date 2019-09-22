<!DOCTYPE html>
<html lang="en" dir="ltr"
	<head>
	<title>Registracija</title>
	<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">		
	</head>
	<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Pacientų eilė <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="user-create.php">Specialistai</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="create.php">Paciento registracija</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="paciento-puslapis.php">Paciento talonėlis</a>
      </li>
    </ul>
</nav>
<?php
	session_start();
	include'config.php';
if (array_key_exists("vardas", $_POST) && array_key_exists("specialistas", $_POST)) {
		
	$vardas=addslashes($_POST['vardas']);
	$specialistas=addslashes($_POST['specialistas']);
	if (strlen($vardas) && strlen($specialistas)>0){
	$laikas= date('Y-m-d H:i:s');
	$query= mysqli_query($connection,"INSERT INTO `registracija` SET `vardas`='".$vardas."', `specialistas` ='".$specialistas."', `laikas` ='".$laikas."'" );

			header("Location: index.php");
			exit;
}else{?>
		<div class="alert alert-warning" role="alert"> Nepalikite tuščių laukelių!</div>
		<a href="index.php"><button class="btn btn-primary btn-lg" type="submit">Pacientų eilė</button></a>
	<?php }
}else{?>
		<div class="alert alert-warning" role="alert"> Nepalikite tuščių laukelių!</div>
		<a href="index.php"><button class="btn btn-primary btn-lg" type="submit">Pacientų eilė</button></a>
	<?php }
	mysqli_close($connection);
?>
</body>
	
	
	