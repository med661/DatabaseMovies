<!DOCTYPE html>
<html>
<head>
	<title>Page d'ajout</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="css/bootstrap.css">
</head>
<body>

	<?php
    require_once('includes\header.php');

	if(!isset(($_SESSION['matricule'])))
$_SESSION['matricule']="";
if(!isset(($_SESSION['nom'])))
$_SESSION['nom']="";
if(!isset(($_SESSION['prenom'])))
$_SESSION['prenom']="";
if(!isset(($_SESSION['adresse'])))
$_SESSION['adresse']="";
if(!isset(($_SESSION['email'])))
$_SESSION['email']="";

?>
	<center>








  













		<div class="container">

			<div class="panel-group" style="width: 500px;">
    <div class="panel panel-primary">
      <div class="panel-heading"> <span style="font-size: 2em;font-family: Times New Roman;">INSCRIPTION</span></b></div>
      <div class="panel-body">
			<form action="ajout2.php" method="post">
	

		<div class="media">
  <div class="media-left media-top">
    <img src="img/ins.jpg" class="media-object"  style="width: 100px;">
  </div>
  <div class="media-body">
		<table class="table table-striped">
			<tr>
				<th>Matricule</th>
				<td><input type="text" name="matricule" placeholder="Matricule" value="<?php echo $_SESSION['matricule'] ?>"></td>
			</tr>
			<tr>
				<th>first name</th>
				<td><input type="text" name="nom" placeholder="nom" value="<?php echo $_SESSION['nom'] ?>"></td>
			</tr>
			<tr>
				<th>last name</th>
				<td><input type="text" name="prenom" placeholder="prenom" value="<?php echo $_SESSION['prenom'] ?>">
				</td>
			</tr>
			<tr>
				<th>Adress</th>
				<td><input type="text" name="adresse" placeholder="adresse"  value="<?php echo $_SESSION['adresse'] ?>"></td>
			</tr>
			<tr>
				<th>Date of Birth</th>
				<td><input type="date" name="date" placeholder="Date de naissance"></td>
			</tr>
			<tr>
				<th>Email</th>
				<td><input type="email" name="email" placeholder="Email" value="<?php echo $_SESSION['email'] ?>"></td>
			</tr>
			<tr>
				<th>password</th>
				<td><input type="password" name="password" placeholder="Mot de passe"></td>
			</tr>
			<tr >
				<td colspan="2">
				<input type="submit" class="btn btn-default btn-lg btn-block">
			</td>
		</tr>
				<!--<td><a href="index2.php"><button type="button">Retour</button></td>-->
		
		</div>
	</div>

		</table>
	
</form>
</div>



  </div>
    </div>
</div>
</div>
</div>
</body>
</html>