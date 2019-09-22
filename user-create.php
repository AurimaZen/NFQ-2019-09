<!DOCTYPE html>
<html lang="en" dir="ltr"
	<head>
	<title>Aptarnaujančip personalo interface</title>
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
	?>
<div class="container">
	<div class="row">
		<div class="col-sm-6 custom-forma"> 
		<div class="alert alert-primary" role="alert" style="width:370px;">
			<h3>Prisijungimas</h3>
		</div>
			<form action='user-login.php' name="prisijungimas" method="post">
				<div class="input-group mb-3">
					<div class="input-group-prepend" style="width:370px;">
						<span class="input-group-text" id="inputGroup-sizing-default" style="width:310px;">Pavardė</span>
						<input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name='specialisto_vardas' value="">
					</div>
				</div>
				<div class="input-group mb-3">
					<div class="input-group-prepend" style="width:370px;">
						<span class="input-group-text" id="inputGroup-sizing-default" style="width:310px;" >E-paštas</span>
						<input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name='pastas' value="">
					</div>
				</div>
				<div class="input-group mb-3">
					<div class="input-group-prepend" style="width:370px;">
						<span class="input-group-text" id="inputGroup-sizing-default" style="width:310px;" >Slaptažodis</span>
						<input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name='slaptazodis' value="">
					</div>
				</div>
			<input class="btn btn-primary" name="prisijungimas" type="submit" value="Prisijungti">
			</form>
		</div>
		<div class="col-sm-6 custom-forma">
<div class="alert alert-primary" role="alert" style="width:370px;">
			<h3>Registracija</h3>
		</div>
	<div class="container">
	<div class="row">
		<div class="col-sm" style="margin-left:-15px;"> 
			<form action='user-store.php' name="registravimas" method="post">
				<div class="input-group mb-3">
					<div class="input-group-prepend" style="width:370px;">
						<span class="input-group-text" id="inputGroup-sizing-default" style="width:310px;">Pavardė</span>
						<input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name='specialisto_vardas' value="">
					</div>
				</div>
				<div class="input-group mb-3">
					<div class="input-group-prepend" style="width:370px;">
						<span class="input-group-text" id="inputGroup-sizing-default" style="width:310px;" >E-paštas</span>
						<input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name='pastas' value="">
					</div>
				</div>
				<div class="input-group mb-3">
					<div class="input-group-prepend" style="width:370px;">
						<span class="input-group-text" id="inputGroup-sizing-default" style="width:310px;" >Slaptažodis</span>
						<input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name='slaptazodis' value="">
					</div>
				</div>
			<input class="btn btn-primary" name="registravimas" type="submit" value="Išsaugoti">
			</form>
		</div>
	</div>
</div>
		</div>
	</div>
</div>
<?php mysqli_close($connection);?>	
</body>
	</html>