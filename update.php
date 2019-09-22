<!DOCTYPE html>
<html lang="en" dir="ltr"
	<head>
	<title>Pažymėtas pacientas</title>
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
  </div>
</nav>
<?php
	include'config.php';
	session_start(); 
	if(array_key_exists('id', $_SESSION)){
if( empty($_POST["galinislaikas"]) ) {?>
		<div class="alert alert-warning" role="alert"> Nepažymėtas aptarnavimo laukelis!</div>
		<a href="index.php"><button class="btn btn-primary btn-lg" type="submit">Pacientų eilė</button></a>
	<?php }else { 
	$id= $_GET['id'];
	$galinislaikas=date(' H:i:s');
	$query= mysqli_query($connection,"SELECT *FROM `registracija` WHERE `id` ='".$id."'");
	$pacientas= mysqli_fetch_assoc($query);
	$total=mysqli_num_rows($query);	
	
	$queryString="SELECT * FROM `specialistai`";
	$identify_user=mysqli_query($connection, $queryString . ' WHERE `id`= "'.$_SESSION['id'].'"');
	$useronline=mysqli_fetch_assoc($identify_user);
	$specialisto_vardas=$useronline['specialisto_vardas'];
    $laikotarpas = abs(strtotime($galinislaikas) - strtotime($pacientas['laikas']));		

	$query= mysqli_query($connection,"UPDATE `registracija` SET  `galinislaikas`='".$galinislaikas."' WHERE `id`='".$id."'" );
	$query= mysqli_query($connection,"UPDATE `specialistai` SET `laikotarpas` ='".$laikotarpas." 'WHERE `specialisto_vardas`='".$specialisto_vardas."'");?>
	<div class="alert alert-success" role="alert">Pažymėjote aptarnautą pacientą!</div>
	<a href="index.php"><button class="btn btn-primary btn-lg" type="submit">Pacientų eilė</button></a>
	<?php }
	}
	mysqli_close($connection);



	