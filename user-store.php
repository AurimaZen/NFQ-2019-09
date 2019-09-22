<!DOCTYPE html>
<html lang="en" dir="ltr"
	<head>
	<title>Specialisto registracija</title>
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
<?php session_start();
include'config.php';
if (array_key_exists("specialisto_vardas", $_POST) && array_key_exists("pastas", $_POST) && array_key_exists("slaptazodis", $_POST) && array_key_exists('registravimas', $_POST)) {
	$queryString="SELECT * FROM `specialistai`";
	$specialisto_vardas=addslashes($_POST['specialisto_vardas']);
	$pastas=addslashes($_POST['pastas']);
	$slaptazodis=addslashes($_POST['slaptazodis']);

		if (strlen($specialisto_vardas) && strlen($pastas) && strlen($slaptazodis)>0){
		$result = mysqli_query($connection, $queryString . ' WHERE  `specialisto_vardas`= "' . $specialisto_vardas . '" and `pastas`= "' . $pastas . '" and `slaptazodis`="'. $slaptazodis .'"');
			if (mysqli_num_rows($result) == 0) {
			$query= mysqli_query($connection,"INSERT INTO `specialistai` SET `specialisto_vardas`='".$specialisto_vardas."', `pastas` ='".$pastas."', `slaptazodis` ='".$slaptazodis."'" );
			$id=mysqli_insert_id ($connection);
			$_SESSION['id']=$id; 
			header("Location: index.php");
			exit;?>
			<?php
			}
			else{
			echo '
			<div class="container alert">
				<div class="alert alert-success" role="alert">
					<h3 style="text-align:center;">Toks vartotojas jau egzistuoja! </h3>
				</div>
			</div>';
			}
		}
	else{
	echo '
	<div class="container alert">
		<div class="alert alert-success" role="alert">
			<h3 style="text-align:center;">Nepalikite tuščių laukelių! </h3>
		</div>
	</div>'
	;
	}
} 
mysqli_close($connection);?>	