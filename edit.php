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

		<div class="alert alert-primary" role="alert">Jūs prisijungęs kaip <?php echo $useronline['specialisto_vardas']; ?></div>
		
		<?php $id= $_GET['id'];
		$query= mysqli_query($connection,"SELECT *FROM `registracija` WHERE `id` ='".$id."'");
		$pacientas= mysqli_fetch_assoc($query);
		$total=mysqli_num_rows($query);	
		if ($pacientas['specialistas']==$useronline['specialisto_vardas']){?>
		<form action='update.php?id=<?php echo $id;?>' method="post">
			<div class="alert alert-success" role="alert">Paciento vardas <?php echo $pacientas['vardas']; ?></div>
			<div class="alert alert-success" role="alert">Aptarnaujantis specialistas <?php echo $pacientas['specialistas']; ?></div>
			<div class="alert alert-success" role="alert">Paciento registracijos laikas <?php echo $pacientas['laikas']; ?></div>
			<div class="form-check form-check-inline">
				<input class="form-check-input" type="radio" name="galinislaikas" id="inlineRadio1" value="galinislaikas">
				<label class="form-check-label" for="inlineRadio1">Aptarnautas</label>
			</div>
				<input type="submit" class="btn btn-primary btn-lg" value="PAŽYMĖTI">
		</form>
<?php
}else{?>
	<div class="alert alert-warning" role="alert"> Pasirinkite savo pacientą!</div>
	<a href="index.php"><button class="btn btn-primary btn-lg" type="submit">Pacientų eilė</button></a>
<?php
	}
	}
 mysqli_close($connection); 