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
  </div>
</nav>	
<?php
	include'config.php';
	if (array_key_exists("id", $_POST)){	
	
	$eilnr=addslashes($_POST['id']);
	if (strlen($eilnr)>0){
	$query= mysqli_query($connection,"SELECT *FROM `registracija` WHERE `id` ='".$eilnr."'");
	$pacientas= mysqli_fetch_assoc($query);
	$filtrasgalinislaikas=$pacientas['galinislaikas'];

    $specvardas=$pacientas['specialistas'];
	$query= mysqli_query($connection,"SELECT *FROM `specialistai` WHERE `specialisto_vardas` ='".$specvardas."'");
	$kokslaikas= mysqli_fetch_assoc($query);
    $laikotarpas=$kokslaikas['laikotarpas'];
	$laikotarpas = gmdate("H:i:s", $laikotarpas);

 	$query= mysqli_query($connection,"SELECT *FROM `registracija`");
	$total=mysqli_num_rows($query);?>
	<div class="card bg-light mb-3" style="max-width: 18rem;">
		<div class="card-header">Registracijos bilietas</div>
		<div class="card-body">
			<h5 class="card-title">Pacientas: <?php echo $pacientas['vardas']  ?></h5>
			<p class="card-text">Jūsų gydytojas: <?php echo $specvardas  ?></p>
			<p class="card-text">Eilės numeris: <?php echo $pacientas['id']  ?></p>
			<p class="card-text">Gydytojas paskutinį pacientą aptarnavo per: <?php echo $laikotarpas  ?></p>
		</div>
</div>
	
<?php /*     for ($i = 0; $i<$total; $i++){
	$kiekprieky=0;
	$pacientas = mysqli_fetch_assoc($query);
	if(($specvardas)&&($filtrasgalinislaikas==false)){ 
	$kiekprieky=$kiekprieky+1;	
	echo $kiekprieky;
	echo $pacientas['vardas'];
	} 	
	} */
	}
	}else{?>
		<div class="alert alert-warning" role="alert"> Nepalikite tuščių laukelių!</div>
		<a href="index.php"><button class="btn btn-primary btn-lg" type="submit">Pacientų eilė</button></a>
	<?php }
	mysqli_close($connection);