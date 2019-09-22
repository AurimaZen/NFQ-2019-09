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
	session_start(); 
	if(array_key_exists('id', $_SESSION)){
	$queryString="SELECT * FROM `specialistai`";
	$identify_user=mysqli_query($connection, $queryString . ' WHERE `id`= "'.$_SESSION['id'].'"');
	$useronline=mysqli_fetch_assoc($identify_user);?>

	<div class="alert alert-primary" role="alert">
  <?php echo "Gydytojas " . $useronline['specialisto_vardas'];  ?>
  </div>
  <?php
	$queryString="SELECT * FROM `registracija`";
	if (array_key_exists("specialistas", $_GET)){
		$specialistas = $_GET['specialistas'];
		if (strlen($specialistas)>0){
	$queryString=$queryString . ' WHERE `specialistas`= "' . $specialistas . '"';		
		}
	}

	$query= mysqli_query($connection, $queryString);
	$total=mysqli_num_rows($query); 
	?>
	<div class="container">
	<div class="alert alert-primary" role="alert">
  <h3>Pacientų registracijos eilė<h3>
</div>
<form action='index.php' method="get">
			<select class="form-control"; name="specialistas" value="specialistas">
			<option disabled selected value> -- Specialistas -- </option>
			<option>Petraitis</option>
			<option>Antanaitis</option>
			<option>Jonaitis</option>
			</select>
<input class="btn btn-primary mb-2";  type="submit" value="Pasirinkti">
</form>
	</div>
	<div class="container">
	<table class="table">
	<thead class="thead-light">
	<tr>
      <th scope="col" style="width:150px;">Eilės numeris</th>
      <th scope="col" style="width:150px;">Paciento vardas</th>
      <th scope="col" style="width:150px;">Specialistas</th>
      <th scope="col" style="width:150px;">Užsiregistravimo laikas</th>
	  <th scope="col" style="width:150px;">Pabaigtas vizitas</th>
	  <th scope="col" style="width:150px;"></th>
    </tr>
	</thead>
	</table>
	</div>
	<?php
	for ($i = 0; $i<$total; $i++){
		$pacientas = mysqli_fetch_assoc($query);?>
	<div class="container">
	<table class="table">
	<tbody>
    <tr>
		<th scope="row" style="width:150px;";><?php echo $pacientas['id'] ;?></th>
		<th style="width:150px;"><?php echo  htmlspecialchars($pacientas['vardas']);?></th>
		<th style="width:150px;"><?php echo  htmlspecialchars($pacientas['specialistas']);?></th>
		<th style="width:150px;"><?php echo  $pacientas['laikas'] ;?></th>
		<th style="width:150px;"><?php echo  $pacientas['galinislaikas'] ;?></th>
		<th style="width:150px;"><?php echo '<a href="delete.php?id='.htmlspecialchars($pacientas["id"]) .'"><button type="button" class="btn btn-danger btn-sm">Delete</button></a>';?>
		<?php echo ' <a href="edit.php?id='.htmlspecialchars($pacientas["id"]) .'"><button type="button" class="btn btn-primary btn-sm">Edit</button></a>';?></th>
		
	</tr>
	</tbody>
	</table>
</div>	
	<?php
	}
	?>
	<div class="container">
        <a href="logout.php"><button type="button" class="btn btn-outline-primary btn-lg">Specialisto atsijungimas</button></a>
		</div>
		<?php
	}else{
		$queryString="SELECT * FROM `registracija`";
	if (array_key_exists("specialistas", $_GET)){
		$specialistas = $_GET['specialistas'];
		if (strlen($specialistas)>0){
	$queryString=$queryString . ' WHERE `specialistas`= "' . $specialistas . '"';		
		}
	}

	$query= mysqli_query($connection, $queryString);
	$total=mysqli_num_rows($query); 
	?>
	<div class="container">
	<div class="alert alert-primary" role="alert">
  <h3>Pacientų registracijos eilė<h3>
</div>
<form action='index.php' method="get">
			<select class="form-control"; name="specialistas" value="specialistas">
			<option disabled selected value> -- Specialistas -- </option>
			<option>Petraitis</option>
			<option>Antanaitis</option>
			<option>Jonaitis</option>
			</select>
<input class="btn btn-primary mb-2";  type="submit" value="Pasirinkti">
</form>
	</div>
	<div class="container">
	<table class="table">
	<thead class="thead-light">
	<tr>
      <th scope="col" style="width:150px;">Eilės numeris</th>
      <th scope="col" style="width:150px;">Paciento vardas</th>
      <th scope="col" style="width:150px;">Specialistas</th>
      <th scope="col" style="width:150px;">Užsiregistravimo laikas</th>
	  <th scope="col" style="width:150px;">Pabaigtas vizitas</th>
	  <th scope="col" style="width:150px;"></th>
    </tr>
	</thead>
	</table>
	</div>	
	<?php 
	for ($i = 0; $i<$total; $i++){
		$pacientas = mysqli_fetch_assoc($query);?>
	<div class="container">
	<table class="table">
	<tbody>
    <tr>
		<th scope="row" style="width:150px;";><?php echo $pacientas['id'] ;?></th>
		<th style="width:150px;"><?php echo  htmlspecialchars($pacientas['vardas']);?></th>
		<th style="width:150px;"><?php echo  htmlspecialchars($pacientas['specialistas']);?></th>
		<th style="width:150px;"><?php echo  $pacientas['laikas'] ;?></th>
		<th style="width:150px;"><?php echo  $pacientas['galinislaikas'] ;?></th>	
	</tr>
	</tbody>
	</table>
</div>	<?php
	}
	}
		mysqli_close($connection);
		?>
		<div class="container">
		<a href="create.php"><button type="button" class="btn btn-outline-primary btn-lg">Naujo paciento registracija</button></a>
		</div>
		