<!DOCTYPE html>
<html>
<head>
	<title>Authentification</title>
	<link rel="stylesheet" href="css/bootstrap.css">
</head>
<body>
	<?php


require_once('includes\header.php');

	if(!isset(($_SESSION['email'])))
$_SESSION['email']="";
if(!isset(($_SESSION['password'])))
$_SESSION['password']="";


	?>
 

<center>
<br>

<div class="container">

			<div class="panel-group" style="width: 500px;">
    <div class="panel panel-default">
      <div class="panel-heading"> <span style="font-size: 1.8em;font-family: Times New Roman;">CONNEXION</span></b></div>
      <div class="panel-body">


	
<form action="aut2.php" method="post">
	
		<div class="media">
  <div class="media-left">
    <img src="img/img.jpg" class="media-object" style="width:80px">
  </div>
  <div class="media-body">
	<div class="input-group">
      <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
      <input id="email" type="text" class="form-control" name="email" placeholder="Email">
    </div>
    <div class="input-group">
      <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
      <input id="password" type="password" class="form-control" name="password" placeholder="Password">
    </div>
    <br>
    <input type="submit" value="Connexion" name="login_btn" class="btn btn-primary btn-block">
</div>
</fieldset>
</form>
<br><br>
</div>
</div>
<a href="ajout.php">Inscription</a>
</div>


</body>
</html>


