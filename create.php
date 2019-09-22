<!DOCTYPE html>
<html lang="en" dir="ltr"
	<head>
	<title>Registruotis į eilę</title>
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
	<?php include'config.php';?>
		<div class="alert alert-primary" role="alert">
			<h3>Naujas pacientas</h3>
		</div>
<div class="container">
	<div class="row">
		<div class="col-sm"> 
			<form action='store.php' method="post">
				<div class="input-group mb-3">
					<div class="input-group-prepend" style="width:370px;">
						<span class="input-group-text" id="inputGroup-sizing-default" style="width:310px;">Vardas</span>
						<input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name='vardas' value="">
					</div>
				</div>
				<div class="input-group mb-3">
					<div class="input-group-prepend" style="width:370px;">
						<label class="input-group-text" id="inputGroup-sizing-default" style="width:310px;">Specialistas</label>
							<select name="specialistas" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default"  value="specialistas">
							<option>Petraitis</option>
							<option>Antanaitis</option>
							<option>Jonaitis</option>
							</select>
					</div>
				</div>
				<input class="btn btn-primary" type="submit" value="Registruotis">
			</form>
		</div>
		<div class="col-sm"> </div>
		<div class="col-sm"> </div>
	</div>
</div>
<div class="container">
<a href="index.php"><button type="button" class="btn btn-primary btn-lg" style="margin-top:20px;">Pacientų eilė</button></a>
</div>
</body>
<?php mysqli_close($connection);?>	